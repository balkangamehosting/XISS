<?php
# Disallow direct access
if (!_ROUTING_)	die("Error (NO ROUTING) :: Direct access not allowed...");

/**
 * Action controller 
 * 
 * @desc Deals with various actions.
 */
class actionController extends API
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
	 * Index page
	 */
	public function _default()
	{  
		return header("location: " . $this->url);		
	}

	/**
	 * Toggles language
	 */
	public function lang()
	{
		$lang = @$this->params[0];
		$previous = @$_SERVER['HTTP_REFERER'];
		
		if (!$lang)
			return header("location: " .($previous ? $previous : $this->url) );
		
		# See if language exists
		if (@is_file('lang/'. $lang . '/language.php'))
		{
			$_SESSION['lang'] = $lang;
			return header("location: " .($previous ? $previous : $this->url) );
		}
		
		# Just dies out..
		return header("location: " .($previous ? $previous : $this->url) );
	}
	
	/**
	 * LOGINS AND STUFF
	 */
	
	/**
	 * Flood protection 
	 * 
	 * Basically it just delays using session..if user kills the browser it's cleared but non the less
	 * using database is useless as ip's can get easily spoofed so it's extra query for nothing..
	 * 
	 * @param string $type
	 * @return boolean Basically returns time (if flooding) or nothing..
	 */
	private function failed($type)
	{			
		# Scrambled (cheap)
		if (@$_SESSION['fld'.$type] > 5)
		{
			if (@$_SESSION['fldt'.$type] && @$_SESSION['fldt'.$type] > time())
			{	
				return $_SESSION['fldt'.$type] - time();
			}
			else 
			{			
				@$_SESSION['fldt'.$type]= time() + 30;
				return false;
			}
		}
	}
	
	/**
	 * Marks attempt (really cheap..)
	 * 
	 * @param string $type
	 * @param boolean $destroy
	 */
	private function markThem($type, $destroy=false)
	{
		$_SESSION['fld'.$type]++;	
		
		if ($destroy)
		{	
			unset($_SESSION['fld'.$type]);
			unset($_SESSION['fldt'.$type]);
		}
	}
	
	/**
	 * Login
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
		);
				
		# Basic flood check
		if ($this->failed('lgn'))
		{
			return $this->info(
				'',
				$this->language("L_FLOODWAIT", $this->failed('lgn')),
				'warning',
				false,
				false,
				'',
				$arr,
				'login'
			);
		}
		
		$user = @trim(strip_tags($_POST['login']));
		$pass = @trim(strip_tags($_POST['pass']));
		
		if (!$user OR !$pass)
		{			
			# Errors out
			return $this->info(
				'',
				$this->language('L_NOTFILLED'),
				'warning',
				false,
				false,
				'',
				$arr,						
				'login'	
			);
		}		
		
		# Try to login user
		$accounts = new Accounts();		
		$do = $accounts->login($user, $pass);
		
		if ($do == 1)
		{
			# Clean attempts
			@$this->markThem('lgn', true);
			
			# Success
			return header("location: " .$this->url);
		}
		else
		{
			# Mark attempts			
			@$this->markThem('lgn');
			
			# Fail	
			return $this->info(
				'',
				( ($do != 2) ? $this->language('L_LOGFAIL') : $this->language('L_LOGSUSPENDED', $user) ),
				'error',
				false,
				false,
				'',
				$arr,						
				'login'			
			);
		}
		
		$this->render('login', $this->arrs($arr));
	}
	
	/**
	 * Reset password
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
		);
		
		# Basic flood check
		if ($this->failed('lrsp'))
		{
			return $this->info(
				'',
				$this->language("L_FLOODWAIT", $this->failed('lrsp')),
				'warning',
				false,
				false,
				'',
				$arr,
				'reset_password'
			);
		}
		
		$in = @trim(strip_tags($_POST['reset']));				
		if (!$in)
		{
			return $this->info(
				'',
				$this->language('L_ENTERMAIL'),
				'error',
				false,
				false,
				'',
				$arr,
				'reset_password'
			);
		}
		
		# Reset password
		$accounts = new Accounts();
		$do = $accounts->reset_password($in);		
				
		if ($do)
		{	
			# Mail
			$mail = new Mail();
			$mail = $mail->system_mail($in, $this->language('MAIL_RESETPASS'), $this->language('MAIL_RESETPASSMSG', $do));
			
			# Clean attempts
			@$this->markThem('lrsp', true);
			
			# Response
			return $this->info(
				'',
				($mail ? $this->language('L_RESETSUCCESS') : $this->language('L_RESETSUCCESSMAILFAIL') ),
				'info',
				($mail ? true : false), 
				$this->url . 'show/login',
				'3000',
				$arr,
				'reset_password'
			);
		}
		else
		{			
			# Mark attempts
			@$this->markThem('lrsp');
		
			return $this->info(
					'',
					$this->language('L_RESETFAIL'),
					'error',
					false,
					false,
					'',
					$arr,
					'reset_password'
			);
		}		
	}
	
	/**
	 * Restores user's right (hijacked session)
	 */
	public function restore()
	{
		if (@!$_SESSION['user_logged'] OR 			
			@!$_SESSION['hijacked'])
		{
			return header("location: " . $this->url);
		}
		
		# Sort sessions
		$_SESSION['hijacked'] = false;
		$_SESSION['user_id'] = $_SESSION['bck_user_id'];
		$_SESSION['user_group'] = $_SESSION['bck_user_group'];
		$_SESSION['user_alias'] = $_SESSION['bck_user_alias'];
			
		unset($_SESSION['hijacked']);
		unset($_SESSION['bck_user_id']);
		unset($_SESSION['bck_user_group']);
		unset($_SESSION['bck_user_alias']);
			
		return $this->info(
			'',
			$this->language("CL_HIJACK_RESTORED"),
			'info',
			true,
			$this->url,
			'3000'
		);
		
	}
	
	/**
	 * Logs user out
	 */
	public function logout()
	{
		if (!@$_SESSION['user_logged'])
		{
			return header("location: " . $this->url);
		}
		
		$accounts = new Accounts();
		
		return $accounts->logout();
	}
}
