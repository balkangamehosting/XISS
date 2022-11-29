<?php
/**
 * Smarty plugin
 * 
 * @package Smarty
 * @subpackage PluginsModifier
 */

/**
 * Icon toggler
 * 
 * Type:     modifier<br>
 * Name:     ssh<br>
 * Purpose:  Checks the link
 * 
 * @author Nate 'L0 
 */
function smarty_modifier_ssh($status)
{	
	if (@$status == 1)
		return "ok";
	else
		return "warning";
} 

