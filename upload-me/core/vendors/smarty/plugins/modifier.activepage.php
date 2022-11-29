<?php
/**
 * Smarty plugin
 * 
 * @package Smarty
 * @subpackage PluginsModifier
 */

/**
 * Sorts which page is currently active and highlights the link
 * 
 * Type:     modifier<br>
 * Name:     activepage<br>
 * Purpose:  Highlights current page in navigation type
 * 
 * @author Nate 'L0
 * @param string $string Label of page to cross match it
 * @return string Returns "selected" so css can anchor it
 */
function smarty_modifier_activepage($string)
{		
	$api = new API();
	
	$page = $api->controller;
	
	if ($string == $page)
		return 'class="selected"';
} 

