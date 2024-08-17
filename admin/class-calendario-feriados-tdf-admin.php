<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://justierradelfuego.gov.ar
 * @since      1.0.0
 *
 * @package    Calendario_Feriados_TDF
 * @subpackage Calendario_Feriados_TDF/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Calendario_Feriados_TDF
 * @subpackage Calendario_Feriados_TDF/admin
 * @author     Lautaro Barba <lbarba@justierradelfuego.gov.ar>
 */
class Calendario_Feriados_TDF_Admin
{
	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct($plugin_name, $version)
	{
		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles()
	{
		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Calendario_Feriados_TDF_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Calendario_Feriados_TDF_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		// Load only for this plugin
		$valid_pages = array(
			'calendario-feriados-tdf-plugin',
			'calendario-feriados-tdf-plugin-agregar-nuevo-feriado'
		);
		$page = isset($_REQUEST['page']) ? $_REQUEST['page'] : "";

		if (in_array($page, $valid_pages)) {
			// wp_enqueue_style('bootstrap', plugin_dir_url(__FILE__) . 'css/bootstrap.min.css', array(), false, 'all');
			wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/calendario-feriados-tdf-admin.css', array(), $this->version, 'all');
		}
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts()
	{
		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Calendario_Feriados_TDF_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Calendario_Feriados_TDF_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		// Load only for this plugin
		$valid_pages = array(
			'calendario-feriados-tdf-plugin',
			'calendario-feriados-tdf-plugin-agregar-nuevo-feriado'
		);
		$page = isset($_REQUEST['page']) ? $_REQUEST['page'] : "";

		if (in_array($page, $valid_pages)) {
			// wp_enqueue_script('bootstrap', plugin_dir_url(__FILE__) . 'js/bootstrap.min.js', array('jquery'), false, false);
			wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/calendario-feriados-tdf-admin.js', array('jquery'), $this->version, false);
		}
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name()
	{
		return $this->plugin_name;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version()
	{
		return $this->version;
	}

	/**
	 * Register the dashboard for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function add_admin_dashboard()
	{
		error_log('Calendario_Feriados_TDF_Admin::add_admin_dashboard()');
		add_menu_page(
			'Calendario de feriados',
			'Calendario de feriados',
			'manage_options',
			'calendario-feriados-tdf-plugin',
			array($this, 'get_admin_dashboard_list_template'),
			'dashicons-calendar-alt',
			25
		);

		add_submenu_page(
			'calendario-feriados-tdf-plugin',
			'Todos los feriados',
			'Todos los feriados',
			'manage_options',
			'calendario-feriados-tdf-plugin',
			array($this, 'get_admin_dashboard_list_template')
		);

		add_submenu_page(
			'calendario-feriados-tdf-plugin',
			'Agregar nuevo feriado',
			'Agregar nuevo feriado',
			'manage_options',
			'calendario-feriados-tdf-plugin-agregar-nuevo-feriado',
			array($this, 'get_admin_dashboard_create_template')
		);
	}

	/**
	 * The dashboard list template
	 *
	 * @since    1.0.0
	 */
	public function get_admin_dashboard_list_template()
	{
		require_once plugin_dir_path(__FILE__) . 'partials/calendario-feriados-tdf-admin-list-display.php';
	}

	/**
	 * The dashboard create template
	 *
	 * @since    1.0.0
	 */
	public function get_admin_dashboard_create_template()
	{
		require_once plugin_dir_path(__FILE__) . 'partials/calendario-feriados-tdf-admin-create-display.php';
	}
}
