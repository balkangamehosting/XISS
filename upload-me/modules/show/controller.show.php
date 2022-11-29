<?php
# Disallow direct access
if (!_ROUTING_)	die("Error (NO ROUTING) :: Direct access not allowed...");

/**
 * Show page
 * 
 * @desc Shows login and usual static pages..
 */
class showController extends API
{	
	/**
	 * Static errors (if empty)
	 */
	private function arrs($arr=false)
	{
		$static = array(
			'redirect' => false,
			'PRINT_TITLE' => $this->language('ERROR_TITLE'),
			'PRINT_CSS' => 'error',
			'PRINT_MSG' => $this->language('ERROR_NOTFOUND')
		);
		
		if (!$arr)
			return $static;
		else # Arr last so it overwrites any static stuff..
			return array_merge($static, $arr);
	}
	
	/**
	 * Generic Critical Error page
	 */
	public function _error()
	{			 		
		$this->render('_error', $this->arrs());
	}	
	
	/**
	 * Redirect if index is called..
	 */
	public function _default()
	{  		
		return header("Location: " . $this->url);
	}	
	
	/**
	 * Login
	 * 
	 * Shows login page
	 */
	public function login()
	{
		if (@$_SESSION['user_logged'])
		{
			return header("location: " . $this->url);
		}
		
		$arr = array(
			'USERNAME' => $this->language('L_USERNAME'),
			'PASSWORD' => $this->language('L_PASSWORD'),
			'LOGIN' => $this->language('L_LOGIN'),
			'FORGOTPASS' => $this->language('L_FORGOTPASS'),
			'notify' => false	
		);		
		$this->render('login', $arr);
	}
	
	/**
	 * Reset password
	 * 
	 * Shows password reset page
	 */
	public function reset_password()
	{
		if (@$_SESSION['user_logged'])
		{
			return header("location: " . $this->url);
		}
		
		$arr = array(
			'RESETPASS' => $this->language('L_RESETPASS'),
			'USERORMAIL' => $this->language('L_USERORMAIL'),
			'BACKTOLOGIN' => $this->language('L_BACKTOLOGIN'),				
			'notify' => false
		);
		$this->render('reset_password', $arr);
	}
}
