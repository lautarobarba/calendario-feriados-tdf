<?php

/**
 * Fired during plugin deactivation
 *
 * @link       https://justierradelfuego.gov.ar
 * @since      1.0.0
 *
 * @package    Calendario_Feriados_TDF
 * @subpackage Calendario_Feriados_TDF/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Calendario_Feriados_TDF
 * @subpackage Calendario_Feriados_TDF/includes
 * @author     Lautaro Barba <lbarba@justierradelfuego.gov.ar>
 */
class Calendario_Feriados_TDF_Deactivator
{

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate()
	{
		error_log('Calendario_Feriados_TDF_Deactivator::deactivate()');

		// Remove role for Cargador de feriados and set role to subscriber
		$users = get_users(['role'    => 'cargador_feriados']);
		foreach ($users as $user) {
			$user->set_role('subscriber');
		}
		// error_log(json_encode($users));
		remove_role('cargador_feriados');

		// Remove capability to administrators
		$role_admin = get_role('administrator');
		$role_admin->remove_cap('carga_feriados');

		flush_rewrite_rules();
	}
}
