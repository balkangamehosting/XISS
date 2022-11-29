<?php
# Disallow direct access
if (!_ROUTING_)	die("Error (NO ROUTING) :: Direct access not allowed...");

/**
 * SSH
 *
 * Handles SSH.
 *
 */
class SSH
{
	public $ssh;
	
	/**
	 * Includes path and establishes connection
	 */
	public function __construct($url, $port=22)
	{	
		set_include_path('core/vendors/phpseclib0.3.5' . PATH_SEPARATOR . 'phpseclib');
		
		include_once('Net/SSH2.php');
		
		$this->ssh = new Net_SSH2($url, $port); 
		
	}
	
	/**
	 * Just invokes stuff..it's error prone so keep it close..
	 * 
	 * @param string $method Function invoked
	 * @param string $args Params passed
	 */
	public function __call($method, $args) 
	{
		return call_user_func_array(array($this->ssh, $method), $args);
	}
	
	/**
	 * Verify connection
	 */
	public function verify($user, $pass)
	{	
		if (!$this->ssh->login($user, $pass))
			return false;
		else
			return true;  		
	}
} 