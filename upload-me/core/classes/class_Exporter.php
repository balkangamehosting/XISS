<?php
# Disallow direct access
if (!_ROUTING_)	die("Error (NO ROUTING) :: Direct access not allowed...");

/**
 * Exports varius functionality so it can be used across various functions.
 * 
 * @author Nate 'L0
 *
 */
class core_class_Exporter
{
	/**
	 * getScriptUrl
	 *
	 * @return Current script path
	 */
	public function getScriptUrl()
	{
		$scriptName = explode('/',$_SERVER['SCRIPT_NAME']);
		unset($scriptName[sizeof($scriptName)-1]);
		$scriptName = array_values($scriptName);
		
		return 'http://'.$_SERVER['SERVER_NAME'].implode('/',$scriptName).'/';
	}
	
	/**
	 * getTemplate
	 * 
	 * @return Current template path
	 */
	public function getTemplate()
	{
		$scriptName = explode('/',$_SERVER['SCRIPT_NAME']);
		unset($scriptName[sizeof($scriptName)-1]);
		$scriptName = array_values($scriptName);
		
		return 'http://'.$_SERVER['SERVER_NAME'].implode('/',$scriptName).'/templates/'.WS_TEMPLATE.'/';
	}
	
	/**
	 * getAdminTemplate
	 *
	 * @return Admin's template path
	 */
	public function getAdminTemplate()
	{
		$scriptName = explode('/',$_SERVER['SCRIPT_NAME']);
		unset($scriptName[sizeof($scriptName)-1]);
		$scriptName = array_values($scriptName);
	
		return 'http://'.$_SERVER['SERVER_NAME'].implode('/',$scriptName).'/templates/admin/';
	}
	
	/**
	 * Tries to get user's real IP
	 * 
	 * @return string;
	 */
	public function ip() {
		if (isset($_SERVER["HTTP_CLIENT_IP"])) return $_SERVER["HTTP_CLIENT_IP"];
		else if (isset($_SERVER["HTTP_X_FORWARDED_FOR"])) return $_SERVER["HTTP_X_FORWARDED_FOR"];
		else if (isset($_SERVER["HTTP_X_FORWARDED"])) return $_SERVER["HTTP_X_FORWARDED"];
		else if (isset($_SERVER["HTTP_FORWARDED_FOR"]))	return $_SERVER["HTTP_FORWARDED_FOR"];
		else if (isset($_SERVER["HTTP_FORWARDED"])) return $_SERVER["HTTP_FORWARDED"];
		else if (isset($_SERVER["HTTP_XONNECTION"])) return $_SERVER["HTTP_XONNECTION"];
		else if (isset($_SERVER["HTTP_CACHE_INFO"])) return $_SERVER["HTTP_CACHE_INFO"];
		else if (isset($_SERVER["HTTP_XPROXY"])) return $_SERVER["HTTP_XPROXY"];
		else if (isset($_SERVER["HTTP_PROXY"])) return $_SERVER["HTTP_PROXY"];
		else if (isset($_SERVER["HTTP_PROXY_CONNECTION"])) return $_SERVER["HTTP_PROXY_CONNECTION"];
		else if (isset($_SERVER["HTTP_CLIENT_IP"])) return $_SERVER["HTTP_CLIENT_IP"];
		else if (isset($_SERVER["HTTP_VIA"])) return $_SERVER["HTTP_VIA"];
		else if (isset($_SERVER["HTTP_X_COMING_FROM"])) return $_SERVER["HTTP_X_COMING_FROM"];
		else if (isset($_SERVER["HTTP_COMING_FROM"])) return $_SERVER["HTTP_COMING_FROM"];
		else if (isset($_SERVER["ZHTTP_CACHE_CONTROL"])) return $_SERVER["ZHTTP_CACHE_CONTROL"];
		else return $_SERVER["REMOTE_ADDR"];
	}
}
