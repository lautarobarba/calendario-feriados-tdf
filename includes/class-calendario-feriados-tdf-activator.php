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

		// Register custom post type for feriados
		register_post_type(
			$this->post_type,
			array(
				'labels' => array(
					'name' => 'Feriados',
					'singular_name' => 'Feriado',
					'add_new' => 'Agregar nuevo',
					'add_new_item' => 'Agregar nuevo feriado',
					'new_item' => 'Nuevo feriado',
					'edit_item' => 'Editar feriado',
					'view_item' => 'Ver feriado',
					'all_items' => 'Ver feriados',
					'search_items' => 'Buscar feriados',
					'not_found' => 'No se encontraron feriados',
					'filter_items_list' => 'Lista de feriados filtrada',
					'items_list_navigation' => 'Lista de feriados_??',
					'items_list' => 'Lista de feriados',
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

		// Register custom taxonomy for tipo de feriados

		// Register new role for Cargador de feriados
		$subscriber_capabilities = get_role('subscriber')->capabilities;
		$custom_capabilities = array_merge($subscriber_capabilities, ['carga_feriados' => true]);
		add_role(
			'cargador_feriados',
			'Cargador feriados',
			$custom_capabilities,
		);

		// Add capability to administrators
		$role_admin = get_role('administrator');
		$role_admin->add_cap('carga_feriados');

		flush_rewrite_rules();
	}
}
