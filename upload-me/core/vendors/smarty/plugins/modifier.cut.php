<?php
/**
 * Smarty plugin
 * 
 * @package Smarty
 * @subpackage PluginsModifier
 */

/**
 * Cuts string after X chars (with utf8 support)
 * 
 * Type:     modifier<br>
 * Name:     cut<br>
 * Purpose:  Cuts sttring
 * 
 * @author Nate 'L0
 * @param string
 * @return string
 */
function smarty_modifier_cut($string, $after=20)
{	
	# Don't add nothing if string is not bigger..	
	$end = ((strlen($string) > $after) ? '...' : '');
	
	return mb_substr(strip_tags($string), 0, $after, 'utf-8') . $end;
} 
