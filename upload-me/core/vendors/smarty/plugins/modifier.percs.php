<?php
/**
 * Smarty plugin
 * 
 * @package Smarty
 * @subpackage PluginsModifier
 */

/**
 * Gets percents..
 * 
 * Type:     modifier<br>
 * Name:     percs<br>
 * Purpose:  Gets percents
 * 
 * @author Nate 'L0
 * @param value
 * @param value2
 * @return value
 */
function smarty_modifier_percs($sum, $count)
{	
	$sum =  round(floatval($sum), 3);
	$count = round(floatval($count), 3);
	
	$sum = !$sum ? 1 : $sum;
	$count = !$count ? 1 : $count;
		
	if (!$count)
		return 0;
	else
		return round(($count * 100 / $sum ), 2); 
} 
