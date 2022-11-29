<?php
/**
 * Smarty plugin
 * 
 * @package Smarty
 * @subpackage PluginsModifier
 */

/**
 * Returns groups..
 * 
 * Type:     modifier<br>
 * Name:     logs<br>
 * Purpose:  Returns language friendly tag (user level).
 * 
 * @author Nate 'L0
 * @param integer
 * @param boolean
 * @param boolean
 * @return string
 */
function smarty_modifier_groups($group, $suspended, $break=true)
{	
	if (!function_exists('API'))
		$api = new API();
			
	# Sorts tags
	$group = $api->ACLtag($group);
	
	# We may not want to break the line so use space..
	$br = ($break ? "<br />" : ' ');
	
	# Appends to end of the tag.
	$append = ($suspended ? $br . "<b>".$api->language('CL_SUSPENDED').'</b>' : '');
	
	return $group . $append;
} 
