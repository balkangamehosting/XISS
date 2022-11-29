<?php
# Disallow direct access
if (!_ROUTING_)	die("Error (NO ROUTING) :: Direct access not allowed...");

/**
 * Error page
 *
 * @desc Default error page 
 */
class errorController extends API
{	
	/**
	 * Generic error page
	 */
	public function _default()
	{  
		# FIXME 
		if (@$_SESSION['user_group'] == 10)
			$this->render('../admin/_error');
		else
			$this->render('_error');   
	}
        
	/**
	 * Generic Critical Error page
	 */
	public function _error()
	{
		# FIXME
		if (@$_SESSION['user_group'] == 10)
			$this->render('../admin/_error');
		else
			$this->render('_error');       
	}
}
