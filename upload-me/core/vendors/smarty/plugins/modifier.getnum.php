<?php
/**
 * Smarty plugin
 * 
 * @package Smarty
 * @subpackage PluginsModifier
 */

/**
 * Strips all but numbers..
 * 
 * Type:     modifier<br>
 * Name:     getnum<br>
 * Purpose:  Strips letters..
 * 
 * @author Nate 'L0 
 */
function smarty_modifier_getnum($in, $round='null')
{		
	if ($round != 'null')		
		return @round(floatval($in), $round);
	else
		return @floatval($in);
} 
