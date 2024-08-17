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

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define('CALENDARIO_FERIADOS_TDF_VERSION', '1.0.0');

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-calendario-feriados-tdf-activator.php
 */
function activate_calendario_feriados_tdf()
{
    require_once plugin_dir_path(__FILE__) . 'includes/class-calendario-feriados-tdf-activator.php';
    Calendario_Feriados_TDF_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-calendario-feriados-tdf-deactivator.php
 */
function deactivate_calendario_feriados_tdf()
{
    require_once plugin_dir_path(__FILE__) . 'includes/class-calendario-feriados-tdf-deactivator.php';
    Calendario_Feriados_TDF_Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_calendario_feriados_tdf');
register_deactivation_hook(__FILE__, 'deactivate_calendario_feriados_tdf');

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path(__FILE__) . 'includes/class-calendario-feriados-tdf.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_calendario_feriados_tdf()
{
    $plugin = new Calendario_Feriados_TDF();
    $plugin->run();
}
run_calendario_feriados_tdf();



//     class Calendario_Feriados_TDF
//     {
//         function register()
//         {
//             add_filter('plugin_action_links_' . $this->plugin, array($this, 'settings_link'));
//         }


//         public function settings_link($links)
//         {
//             $settings_link = '<a href="admin.php?page=calendario_feriados_tdf_plugin">Settings</a>';
//             array_push($links, $settings_link);
//             return $links;
//         }
//     }
