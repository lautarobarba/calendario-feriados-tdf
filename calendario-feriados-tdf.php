<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://justierradelfuego.gov.ar
 * @since             1.0.0
 * @package           Calendario_Feriados_TDF
 *
 * @wordpress-plugin
 * Plugin Name:       Calendario de feriados TDF
 * Plugin URI:        https://justierradelfuego.gov.ar
 * Description:       Plugin para desplegar un calendario con los feriados anuales de la provincia de Tierra del Fuego.
 * Version:           1.0.0
 * Author:            Lautaro Barba
 * Author URI:        https://justierradelfuego.gov.ar/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       calendario-feriados-tdf
 * Domain Path:       /languages
 */


// If this file is called directly, abort.
if (! defined('WPINC')) {
    error_log('WPINC not defined!');
    die;
}

if (! defined('ABSPATH')) {
    error_log('ABSPATH not defined!');
    die;
}


if (!class_exists('CalendarioFeriadosTDF')) {
    class CalendarioFeriadosTDF
    {
        public $plugin;

        function __construct()
        {
            $this->plugin = plugin_basename(__FILE__);
        }

        function activate()
        {
            // error_log();
            require_once plugin_dir_path(__FILE__) . 'includes/class-calendario-feriados-tdf-activator.php';
            Calendario_Feriados_TDF_Activator::activate();
        }

        function register()
        {
            // add_action('admin_enqueue_scripts', array($this, 'enqueue'));
            add_action('admin_menu', array($this, 'add_admin_dashboard'));
            // add_filter('plugin_action_links_$this->plugin', array($this, 'settings_link'));
        }

        public function add_admin_dashboard()
        {
            add_menu_page(
                'Calendario de feriados',
                'Calendario de feriados',
                'manage_options',
                'calendario_feriados_tdf_plugin',
                array($this, 'get_admin_dashboard_template'),
                'dashicons-calendar-alt',
                25
            );
        }

        public function get_admin_dashboard_template()
        {
            require_once plugin_dir_path(__FILE__) . 'templates/admin_dashboard_template.php';
        }
    }

    $calendarioFeriadosTDF = new CalendarioFeriadosTDF();
    $calendarioFeriadosTDF->register();

    // activation
    register_activation_hook(__FILE__, array($calendarioFeriadosTDF, 'activate'));

    // deactivation
    require_once plugin_dir_path(__FILE__) . 'includes/class-calendario-feriados-tdf-deactivator.php';
    register_deactivation_hook(__FILE__, array('Calendario_Feriados_TDF_Deactivator', 'deactivate'));
}
