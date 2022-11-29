<?php
/**
 * Smarty plugin
 * 
 * @package Smarty
 * @subpackage PluginsModifier
 */

/**
 * Offsets ID so it's 'scrambled'
 * 
 * Type:     modifier<br>
 * Name:     Offset<br>
 * Purpose:  Offsets id
 * 
 * @author Nate 'L0
 * @param integer
 * @return integer
 */
function smarty_modifier_offset($string)
{		
	return OFFSET . $string;
} 

