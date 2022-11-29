<?php
# Disallow direct access
if (!_ROUTING_)	die("Error (NO ROUTING) :: Direct access not allowed...");

/**
 * Injects global tags
 *
 * @return array
 *
 */
class Tags extends API
{
	/**
	 * Somewhat messy but basically bounces any non-logged users to login page..
	 * NOTE: It accounts for password reset page..
	 * 
	 * @return Returns logins page or nothing if client is logged..
	 */
	private function showPanel()
	{
		if (!@$_SESSION['user_logged'])
		{
			# Login or reset pass
			if ($this->controller == 'show')
			{				
				if ($this->function != 'login')
				{
					if ($this->function != 'reset_password')
					{	
						return header('location: ' .$this->url. 'show/login' );
					}
				}
			}
			# Login or reset pass code execution
			# NOTE that function them self redirect so it's not a problem..
			elseif ($this->controller == "action")
			{
				if ($this->function != 'login')
				{
					if ($this->function != 'reset_password')
					{
						return header('location: ' .$this->url. 'show/login' );
					}
				}
			}	
			else # Random page so bounce to login..
			{				
				return header('location: ' .$this->url. 'show/login' );
			}
		}
		# Client is logged don't bother with anything..
	}
		
	/**
	 * Builds list of global tags so they can be inject at page load
	 * 
	 * @return array 
	 */
	public function inject()
	{
		$inject = array(
			'url' => 				$this->url,
			'template' => 			$this->template,
			'systemplate' => 		$this->adminTemplate,
			'sitestatsistics' => 	($this->isAllowed(ADMIN) ? $this->site_stats() : null),
			'errormsg' => 			$this->language('ERROR_GENERIC'),
			'is_logged' => 			(@$_SESSION['user_logged'] ? true : false),
			'is_Admin'	=>			($this->isAllowed(ADMIN) ? true : false),		
			'breadcrumbs' => 		$this->breadcrumbs(),
			'sitename' =>			WS_SITENAME,
			'siteurl' => 			WS_URL,
			'sitelang' =>			WS_LANG,
			'showPanel' => 			$this->showPanel(),
			'hijacked'	=>			(@$_SESSION['hijacked'] ? true : false),
			
			# Global language vars..				
			'LOGOUT' => 			$this->language('LOGOUT'),
			'LOGGED_AS' => 			$this->language('LOGGED_AS', (@$_SESSION['user_logged'] ? $_SESSION['user_alias'] : $this->language('GUEST'))),
			'COPYRIGHT' =>			$this->language('COPYRIGHT'),	
			'RIGHTSRESERVED' =>		$this->language('RIGHTSRESERVED'),	
			'SELECT' =>				$this->language('SELECT'),		
			'OTHER' =>				$this->language('OTHER'),
			'GUEST' => 				$this->language('GUEST'),
			'MEMBER' => 			$this->language('USER'),
			'RESELLER' => 			$this->language('RESELLER'),
			'ADMIN' => 				$this->language('ADMIN'),
			'HIJACKED_RESTORE' 	=>	$this->language('HIJACKED_RESTORE'),
			## Nav		
			'HOME' => 				$this->language('HOME'),
			'CLIENTS' => 			$this->language('CLIENTS'),
			'SERVERS' => 			$this->language('SERVERS'),
			'BOXES' => 				$this->language('BOXES'),
			'UTILITIES' =>			$this->language('UTILITIES'),
			'LICENSE_INFO' =>		$this->language('LICENSEINFO'),
			'SYSLOGS' =>			$this->language('SYSLOGS'),
			'SETTINGS' =>			$this->language('SETTINGS'),
			'GENERAL_SETTINGS'=>	$this->language('GENERAL_SETTINGS'),
			'MANAGE_GAMES'	=> 		$this->language('MANAGE_GAMES'),
			'EMAIL_TEMPLATE' => 	$this->language('EMAIL_TEMPLATE'),
			'LICENSE_SETTINGS' =>	$this->language('LICENSE_SETTINGS'),
			'CRON_JOBS' =>			$this->language('CRON_JOBS'),
			'ACCOUNT'	=>			$this->language('ACCOUNT'),
			'ORDERS'	=>			$this->language('ORDERS'),
			'SERVER'	=>			$this->language('SERVER'),
			'INVOICES' =>			$this->language('INVOICES'),
			'ORDER'	=>				$this->language('ORDER'),
			'SUPPORT' =>			$this->language('SUPPORT'),				
			## Error
			'PRINT_TITLE' => 		$this->language('ERROR_TITLE'),
			'PRINT_CSS' => 			'error',
			'PRINT_MSG' => 			$this->language('ERROR_NOTFOUND'),
			## jQuery
			'JQ_ARE_YOU_SURE'	=>	$this->language('JQ_ARE_YOU_SURE'),
			'JQ_YES'			=>	$this->language('JQ_YES'),
			'JQ_CANCEL'			=> 	$this->language('JQ_CANCEL'),
		);
				
		return $inject;
	}	
}
 