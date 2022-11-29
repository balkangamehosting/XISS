<?php
# Disallow direct access
if (!_ROUTING_)	die("Error (NO ROUTING) :: Direct access not allowed...");

/** 
 * Smarty template parser so it's easier to invoke it.
 * 
 * @author Nate 'L0
 *
 */
class core_class_Template
{
	/**
	 * Renders file
	 * 
	 * @param string $file
	 * @param array $asign
	 */
	public function render($file, $asign=array())
	{
		# Load it
		require_once'core/vendors/smarty/Smarty.class.php';
	
		$smarty = new Smarty();
		
		# Configure
		$smarty->template_dir = 'templates/'.WS_TEMPLATE.'/';
		$smarty->compile_dir  = 'core/vendors/smarty/templates_c/';
		$smarty->config_dir   = 'core/vendors/smarty/configs/';
		$smarty->cache_dir    = 'cache/';
		$smarty->caching = SMARTY_CACHING;
	
		# Solves templates_c (false) caching
		if (DEBUG)
			$smarty->force_compile = true;
		
		# Asign
		foreach ($asign AS $key => $value) 
		{
			$smarty->assign($key, $value);
		}
	
		return $smarty->display($file.'.tpl');
	}
}