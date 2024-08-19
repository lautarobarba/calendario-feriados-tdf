<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://justierradelfuego.gov.ar
 * @since      1.0.0
 *
 * @package    Calendario_Feriados_TDF
 * @subpackage Calendario_Feriados_TDF/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Calendario_Feriados_TDF
 * @subpackage Calendario_Feriados_TDF/includes
 * @author     Lautaro Barba <lbarba@justierradelfuego.gov.ar>
 */
class Calendario_Feriados_TDF
{
    /**
     * The loader that's responsible for maintaining and registering all hooks that power
     * the plugin.
     *
     * @since    1.0.0
     * @access   protected
     * @var      Calendario_Feriados_TDF_Loader    $loader    Maintains and registers all hooks for the plugin.
     */
    protected $loader;

    /**
     * The unique identifier of this plugin.
     *
     * @since    1.0.0
     * @access   protected
     * @var      string    $plugin_name    The string used to uniquely identify this plugin.
     */
    protected $plugin_name;

    /**
     * The current version of the plugin.
     *
     * @since    1.0.0
     * @access   protected
     * @var      string    $version    The current version of the plugin.
     */
    protected $version;

    /**
     * The plugin custom post type.
     *
     * @since    1.0.0
     * @access   protected
     * @var      string    $post_type    The plugin custom post type.
     */
    protected $post_type;

    /**
     * Define the core functionality of the plugin.
     *
     * Set the plugin name and the plugin version that can be used throughout the plugin.
     * Load the dependencies, define the locale, and set the hooks for the admin area and
     * the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function __construct()
    {
        $this->version = CALENDARIO_FERIADOS_TDF_VERSION;
        $this->plugin_name = CALENDARIO_FERIADOS_TDF_PLUGIN_NAME;
        $this->post_type = CALENDARIO_FERIADOS_TDF_POST_TYPE;

        $this->load_dependencies();
        // $this->set_locale();
        $this->define_admin_hooks();
        $this->define_api_hooks();
        // $this->define_public_hooks();
    }

    /**
     * Load the required dependencies for this plugin.
     *
     * Include the following files that make up the plugin:
     *
     * - Calendario_Feriados_TDF_Loader. Orchestrates the hooks of the plugin.
     * - Calendario_Feriados_TDF_i18n. Defines internationalization functionality.
     * - Calendario_Feriados_TDF_Admin. Defines all hooks for the admin area.
     * - Calendario_Feriados_TDF_Public. Defines all hooks for the public side of the site.
     *
     * Create an instance of the loader which will be used to register the hooks
     * with WordPress.
     *
     * @since    1.0.0
     * @access   private
     */
    private function load_dependencies()
    {
        /**
         * The class responsible for orchestrating the actions and filters of the
         * core plugin.
         */
        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-calendario-feriados-tdf-loader.php';

        /**
         * The class responsible for defining internationalization functionality
         * of the plugin.
         */
        // require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-calendario-feriados-tdf-i18n.php';

        /**
         * The class responsible for defining all actions that occur in the admin area.
         */
        require_once plugin_dir_path(dirname(__FILE__)) . 'admin/class-calendario-feriados-tdf-admin.php';

        /**
         * The class responsible for defining api rest actions.
         */
        require_once plugin_dir_path(dirname(__FILE__)) . 'api/class-calendario-feriados-tdf-api.php';

        /**
         * The class responsible for defining all actions that occur in the public-facing
         * side of the site.
         */
        // require_once plugin_dir_path(dirname(__FILE__)) . 'public/class-calendario-feriados-tdf-public.php';

        $this->loader = new Calendario_Feriados_TDF_Loader();
    }

    /**
     * Register all of the hooks related to the admin area functionality
     * of the plugin.
     *
     * @since    1.0.0
     * @access   private
     */
    private function define_admin_hooks()
    {
        $plugin_admin = new Calendario_Feriados_TDF_Admin($this->get_plugin_name(), $this->get_version(), $this->get_post_type());

        $this->loader->add_action('admin_enqueue_scripts', $plugin_admin, 'enqueue_styles');
        $this->loader->add_action('admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts');

        // error_log('plugin_action_links_' . $this->plugin_name);
        // // Add settings links
        // $this->loader->add_filter('plugin_action_links_' . $this->plugin_name,  $plugin_admin, 'add_settings_link');

        // Add admin dashboard
        $this->loader->add_action('admin_menu', $plugin_admin, 'add_admin_dashboard');

        // Add ajax handler hook
        // TODO: sacar esto y reemplazar por api rest
        $this->loader->add_action('wp_ajax_calendario_feriado_tdf_create_feriado', $plugin_admin, 'ajax_handler_create_feriado');
    }

    /**
     * Register all of the hooks related to the api rest functionality
     * of the plugin.
     *
     * @since    1.0.0
     * @access   private
     */
    private function define_api_hooks()
    {
        $plugin_api = new Calendario_Feriados_TDF_Api($this->get_plugin_name(), $this->get_version(), $this->get_post_type());

        // Register REST API routes
        // $this->loader->add_action('admin_menu', $plugin_admin, 'add_admin_dashboard');
    }

    /**
     * Run the loader to execute all of the hooks with WordPress.
     *
     * @since    1.0.0
     */
    public function run()
    {
        $this->loader->run();
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
}
