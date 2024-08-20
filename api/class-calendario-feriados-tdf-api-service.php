<?php

/**
 * The api-rest-service functionality of the plugin.
 *
 * @link       https://justierradelfuego.gov.ar
 * @since      1.0.0
 *
 * @package    Calendario_Feriados_TDF
 * @subpackage Calendario_Feriados_TDF/api
 */

/**
 * The api-rest-service functionality of the plugin.
 *
 * @package    Calendario_Feriados_TDF
 * @subpackage Calendario_Feriados_TDF/api
 * @author     Lautaro Barba <lbarba@justierradelfuego.gov.ar>
 */
class Calendario_Feriados_TDF_Api_Service
{
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
    public function __construct($post_type)
    {
        $this->post_type = $post_type;
        // TODO: capaz necesite la conexion a la base de datos aca
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
     * Create feriado
     *
     * @since    1.0.0
     */
    public function create_feriado()
    {
        error_log('Calendario_Feriados_TDF_Api_Service::create_feriado()');
        return "POST created";
    }

    /**
     * Read feriados
     *
     * @since    1.0.0
     */
    public function read_feriados()
    {
        error_log('Calendario_Feriados_TDF_Api_Service::read_feriados()');
        return "GET ALL read";
    }

    /**
     * Read feriado
     *
     * @since    1.0.0
     */
    public function read_feriado()
    {
        error_log('Calendario_Feriados_TDF_Api_Service::read_feriado()');
        return "GET ONE read";
    }

    /**
     * Update feriado
     *
     * @since    1.0.0
     */
    public function update_feriado()
    {
        error_log('Calendario_Feriados_TDF_Api_Service::update_feriado()');
        return "PUT update";
    }

    /**
     * Delete feriado
     *
     * @since    1.0.0
     */
    public function delete_feriado()
    {
        error_log('Calendario_Feriados_TDF_Api_Service::delete_feriado()');
        return "DELETE delete";
    }
}
