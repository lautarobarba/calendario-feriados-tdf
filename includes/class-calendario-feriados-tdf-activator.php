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
	public static function activate()
	{
		error_log('Calendario_Feriados_TDF_Activator::activate()');
		flush_rewrite_rules();
	}
}
