<?php
/**
 * Smarty plugin
 * 
 * @package Smarty
 * @subpackage PluginsModifier
 */

/**
 * Queries game and returns info..
 * 
 * Type:     modifier<br>
 * Name:     gamequery<br>
 * Purpose:  Queries game
 * 
 * @author Nate 'L0
 * @param string $name
 * @param string $query
 * @param string $ip
 * @param value	$port
 * @param string $row
 * @param boolean $count If enabled it invokes filters so player list can be obtained
 * @return array
 */
function smarty_modifier_gamequery($name, $query, $ip, $port, $row, $count=false)
{	
	if (!function_exists('Query'))
		$sq = new Query($name, $query, $ip, $port);
	
	# Filters have to be set so we can get players..
	if ($count) 
	{		
		$sq->instance->setFilter('normalise');
		$sq->instance->setFilter('sortplayers', 'gq_ping');
	}

	$data = $sq->data();
	
	return $data[$name][$row];
} 
