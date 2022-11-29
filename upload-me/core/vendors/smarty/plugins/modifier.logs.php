<?php
/**
 * Smarty plugin
 * 
 * @package Smarty
 * @subpackage PluginsModifier
 */

/**
 * Converts logs
 * 
 * Type:     modifier<br>
 * Name:     logs<br>
 * Purpose:  Converts logs to language friendly string
 * 
 * @author Nate 'L0
 * @param string
 * @return string
 */
function smarty_modifier_logs($str, $params)
{	
	if (!function_exists('Logs'))
		$logs = new Logs();
		
	return $logs->sortTypes($str, $params);
} 
