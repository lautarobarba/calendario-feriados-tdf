<?php

/**
 * The api-rest-specific functionality of the plugin.
 *
 * @link       https://justierradelfuego.gov.ar
 * @since      1.0.0
 *
 * @package    Calendario_Feriados_TDF
 * @subpackage Calendario_Feriados_TDF/api
 */

/**
 * The api-rest-specific functionality of the plugin.
 *
 * @package    Calendario_Feriados_TDF
 * @subpackage Calendario_Feriados_TDF/api
 * @author     Lautaro Barba <lbarba@justierradelfuego.gov.ar>
 */
class Calendario_Feriados_TDF_Api
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
