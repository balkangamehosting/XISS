<?php
/**
 * Smarty plugin
 * 
 * @package Smarty
 * @subpackage PluginsModifier
 */

/**
 * Sorts blank strings
 * 
 * Type:     modifier<br>
 * Name:     sortBlank<br>
 * Purpose:  Replaces blank strings - As it's much nicer then bloating templates.
 * 
 * @author Nate 'L0 
 */
function smarty_modifier_sortBlank($str)
{	
	return (!$str ? 'N/a' : $str);
} 

