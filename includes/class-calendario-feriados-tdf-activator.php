<?php

/**
 * Fired during plugin activation
 *
 * @link       https://justierradelfuego.gov.ar
 * @since      1.0.0
 *
 * @package    Calendario_Feriados_TDF
 * @subpackage Calendario_Feriados_TDF/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Calendario_Feriados_TDF
 * @subpackage Calendario_Feriados_TDF/includes
 * @author     Lautaro Barba <lbarba@justierradelfuego.gov.ar>
 */
class Calendario_Feriados_TDF_Activator
{
	/**
	 * The plugin custom post type.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $post_type    The plugin custom post type.
	 */
	protected $post_type;

	public function __construct()
	{
		$this->post_type = CALENDARIO_FERIADOS_TDF_POST_TYPE;
	}

	public function activate()
	{
		error_log('Calendario_Feriados_TDF_Activator::activate()');

		register_post_type(
			$this->post_type,
			array(
				'labels' => array(
					'name' => 'Feriados',
					'singular_name' => 'Feriado',
				),
				'description' => 'Feriados para el calendario TDF',
				'public' => false,
				'exclude_from_search' => true,
				'publicly_queryable' => false,
				'hierarchical' => false,
				'delete_with_user' => false,
				'capability_type' => 'post',
			)
		);

		flush_rewrite_rules();
	}
}
