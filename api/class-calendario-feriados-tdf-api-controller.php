<?php

/**
 * The api-rest-controller functionality of the plugin.
 *
 * @link       https://justierradelfuego.gov.ar
 * @since      1.0.0
 *
 * @package    Calendario_Feriados_TDF
 * @subpackage Calendario_Feriados_TDF/api
 */

/**
 * The api-rest-controller functionality of the plugin.
 *
 * @package    Calendario_Feriados_TDF
 * @subpackage Calendario_Feriados_TDF/api
 * @author     Lautaro Barba <lbarba@justierradelfuego.gov.ar>
 */
class Calendario_Feriados_TDF_Api_Controller
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
     * The version of this api rest plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $api_version    The current version of this api rest plugin.
     */
    private $api_version;

    /**
     * The api rest namespace.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $api_rest_namespace    The api rest namespace.
     */
    private $api_rest_namespace;

    /**
     * The plugin custom post type.
     *
     * @since    1.0.0
     * @access   protected
     * @var      string    $post_type    The plugin custom post type.
     */
    protected $post_type;

    /**
     * The service that's responsible for crud operations
     *
     * @since    1.0.0
     * @access   protected
     * @var      Calendario_Feriados_TDF_Api_Service    $service    Does all crud operations.
     */
    protected $service;

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
        $this->api_version = 'v1';
        $this->api_rest_namespace = $this->plugin_name . '/' . $this->api_version;
        $this->post_type = $post_type;

        $this->load_dependencies();
    }

    /**
     * Load the required dependencies for this controller.
     *
     * Include the following files that make up the plugin:
     *
     * - Calendario_Feriados_TDF_Api_Service. Does all crud operations.
     *
     * Create an instance of the service which will be used to do all crud operations.
     *
     * @since    1.0.0
     * @access   private
     */
    private function load_dependencies()
    {
        /**
         * The class responsible for do all crud operations
         */
        require_once plugin_dir_path(dirname(__FILE__)) . 'api/class-calendario-feriados-tdf-api-service.php';

        $this->service = new Calendario_Feriados_TDF_Api_Service($this->get_post_type());
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
     * Retrieve the version number of the api rest plugin.
     *
     * @since     1.0.0
     * @return    string    The version number of the api rest plugin.
     */
    public function get_api_version()
    {
        return $this->api_version;
    }

    /**
     * Retrieve the api rest namespace.
     *
     * @since     1.0.0
     * @return    string    The api rest namespace.
     */
    public function get_api_rest_namespace()
    {
        return $this->api_rest_namespace;
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
     * Register the create POST route.
     *
     * @since    1.0.0
     */
    public function add_create_feriado_route()
    {
        error_log('Calendario_Feriados_TDF_Api_Controller::add_create_feriado_route()');
        register_rest_route($this->get_api_rest_namespace(), '/feriados', array(
            'methods' => 'POST',
            'callback' => array($this, 'create_feriado_endpoint'),
            // 'args' => array(
            //   'id' => array(
            //     'validate_callback' => 'is_numeric'
            //   ),
            // ),
            // 'permission_callback' => function () {
            //   return current_user_can( 'edit_others_posts' );
            // }
        ));
    }

    /**
     * Create feriado endpoint
     *
     * @since    1.0.0
     */
    public function create_feriado_endpoint()
    {
        return $this->service->create_feriado();
    }

    /**
     * Register the read all GET route.
     *
     * @since    1.0.0
     */
    public function add_read_feriados_route()
    {
        error_log('Calendario_Feriados_TDF_Api_Controller::add_read_feriados_route()');
        register_rest_route($this->get_api_rest_namespace(), '/feriados', array(
            'methods' => 'GET',
            'callback' => array($this, 'read_feriados_endpoint'),
            // 'args' => array(
            //   'id' => array(
            //     'validate_callback' => 'is_numeric'
            //   ),
            // ),
            // 'permission_callback' => function () {
            //   return current_user_can( 'edit_others_posts' );
            // }
        ));
    }

    /**
     * Read all feriados endpoint
     *
     * @since    1.0.0
     */
    public function read_feriados_endpoint()
    {
        return $this->service->read_feriados();
    }

    /**
     * Register the read one GET route.
     *
     * @since    1.0.0
     */
    public function add_read_feriado_route()
    {
        error_log('Calendario_Feriados_TDF_Api_Controller::add_read_feriado_route()');
        register_rest_route($this->get_api_rest_namespace(), '/feriados/(?P<id>\d+)', array(
            'methods' => 'GET',
            'callback' => array($this, 'read_feriado_endpoint'),
            // 'args' => array(
            //   'id' => array(
            //     'validate_callback' => 'is_numeric'
            //   ),
            // ),
            // 'permission_callback' => function () {
            //   return current_user_can( 'edit_others_posts' );
            // }
        ));
    }

    /**
     * Read feriado endpoint
     *
     * @since    1.0.0
     */
    public function read_feriado_endpoint()
    {
        return $this->service->read_feriado();
    }

    /**
     * Register the update PUT route.
     *
     * @since    1.0.0
     */
    public function add_update_feriado_route()
    {
        error_log('Calendario_Feriados_TDF_Api_Controller::add_read_feriado_route()');
        register_rest_route($this->get_api_rest_namespace(), '/feriados/(?P<id>\d+)', array(
            'methods' => 'PUT',
            'callback' => array($this, 'update_feriado_endpoint'),
            // 'args' => array(
            //   'id' => array(
            //     'validate_callback' => 'is_numeric'
            //   ),
            // ),
            // 'permission_callback' => function () {
            //   return current_user_can( 'edit_others_posts' );
            // }
        ));
    }

    /**
     * Update feriado endpoint
     *
     * @since    1.0.0
     */
    public function update_feriado_endpoint()
    {
        return $this->service->update_feriado();
    }

    /**
     * Register the delete DELETE route.
     *
     * @since    1.0.0
     */
    public function add_delete_feriado_route()
    {
        error_log('Calendario_Feriados_TDF_Api_Controller::add_delete_feriado_route()');
        register_rest_route($this->get_api_rest_namespace(), '/feriados/(?P<id>\d+)', array(
            'methods' => 'DELETE',
            'callback' => array($this, 'delete_feriado_endpoint'),
            // 'args' => array(
            //   'id' => array(
            //     'validate_callback' => 'is_numeric'
            //   ),
            // ),
            // 'permission_callback' => function () {
            //   return current_user_can( 'edit_others_posts' );
            // }
        ));
    }

    /**
     * Delete feriado endpoint
     *
     * @since    1.0.0
     */
    public function delete_feriado_endpoint()
    {
        return $this->service->delete_feriado();
    }
}
