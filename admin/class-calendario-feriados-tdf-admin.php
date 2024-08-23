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
	 * The plugin custom post type.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $post_type    The plugin custom post type.
	 */
	protected $post_type;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct($plugin_name, $version, $post_type)
	{
		$this->plugin_name = $plugin_name;
		$this->version = $version;
		$this->post_type = $post_type;
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
			// 'calendario-feriados-tdf-plugin-agregar-nuevo-feriado'
		);
		$page = isset($_REQUEST['page']) ? $_REQUEST['page'] : "";

		if (in_array($page, $valid_pages)) {
			// wp_enqueue_style('dataTables', plugin_dir_url(__FILE__) . 'css/dataTables.dataTables.css', array(), false, 'all');
			wp_enqueue_style('micromodal', plugin_dir_url(__FILE__) . 'css/micromodal.css', array(), false, 'all');
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
			// 'calendario-feriados-tdf-plugin-agregar-nuevo-feriado'
		);
		$page = isset($_REQUEST['page']) ? $_REQUEST['page'] : "";

		if (in_array($page, $valid_pages)) {
			// wp_enqueue_script('dataTables', plugin_dir_url(__FILE__) . 'js/dataTables.js', array('jquery'), false, false);
			wp_enqueue_script('micromodal', plugin_dir_url(__FILE__) . 'js/micromodal.min.js', array('jquery'), false, false);
			wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/calendario-feriados-tdf-admin.js', array('jquery'), $this->version, false);

			// Add global object to js
			// wp_localize_script($this->plugin_name, 'feriado_calendario_global', array(
			// 	'ajax_url' => admin_url('admin-ajax.php'),
			// 	'nonce' => wp_create_nonce($this->plugin_name),
			// ));
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
	 * Retrieve The plugin custom post type.
	 *
	 * @since     1.0.0
	 * @return    string    The plugin custom post type.
	 */
	public function get_post_type()
	{
		return $this->post_type;
	}

	/**
	 * Register the settings link in plugin description.
	 *
	 * @since    1.0.0
	 */
	public function add_settings_link($links)
	{
		error_log('Calendario_Feriados_TDF_Admin::add_settings_link()');
		$settings_link = '<a href="admin.php?page=calendario_feriados_tdf_plugin">Settings</a>';
		array_push($links, $settings_link);
		return $links;
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
			array($this, 'get_admin_dashboard_template'),
			'dashicons-calendar-alt',
			25
		);

		add_submenu_page(
			'calendario-feriados-tdf-plugin',
			'Todos los feriados',
			'Todos los feriados',
			'manage_options',
			'calendario-feriados-tdf-plugin',
			array($this, 'get_admin_dashboard_template')
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
	public function get_admin_dashboard_template()
	{
		require_once plugin_dir_path(__FILE__) . 'partials/calendario-feriados-tdf-admin-dashboard-display.php';
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

	// /**
	//  * Ajax request handler for wp_ajax_calendario_feriado_tdf_create_feriado
	//  *
	//  * @since    1.0.0
	//  */
	// public function ajax_handler_create_feriado()
	// {
	// 	error_log('Calendario_Feriados_TDF_Admin::ajax_handler_create_feriado()');

	// 	// Check valid nonce
	// 	check_ajax_referer($this->plugin_name);

	// 	// Get new calendario_feriado data
	// 	$data = array(
	// 		// 'name' => wp_unslash($_POST['name']),
	// 		// 'apellido' => wp_unslash($_POST['apellido']),
	// 		'post_author' => get_current_user_id(),
	// 		'post_status' => 'publish',
	// 		'post_type' => $this->post_type,
	// 		'post_title' => 'San martin',
	// 		'post_content' => json_encode(
	// 			array(
	// 				'name' => 'San martin',
	// 				'date' => '2023-03-21',
	// 			)
	// 		),
	// 	);

	// 	error_log('Creating new feriado: ' . json_encode($data));

	// 	$new_feriado_id = wp_insert_post($data, true);

	// 	if ($new_feriado_id !== 0) {
	// 		wp_send_json_error();
	// 	} else {
	// 		wp_send_json($data);
	// 	}

	// 	// Don't forget to stop execution afterward.
	// 	wp_die();
	// }
}
