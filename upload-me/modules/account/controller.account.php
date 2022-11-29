<?php
# Disallow direct access
if (!_ROUTING_)	die("Error (NO ROUTING) :: Direct access not allowed...");

/**
 * Account page
 * 
 * @desc Client's account page 
 */
class accountController extends API
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
			'PRINT_MSG' => $this->language('ERROR_NOTFOUND'),
				
			# Language
			'GROUP' => 	$this->language('ACC_GROUP'),
			'LASTVISIT' => $this->language('ACC_LASTVISIT'),
			'LASTIP' => $this->language('ACC_LASTIP'),
			'FIRSTNAME' => $this->language('ACC_FIRSTNAME'),
			'LASTNAME' => $this->language('ACC_LASTNAME'),
			'LANGUAGE' => $this->language('ACC_LANGUAGE'),
			'USERNAME' => $this->language('ACC_USERNAME'),
			'EMAIL'	=> $this->language('ACC_EMAIL'),
			'PASS'	=> $this->language('ACC_PASS'),
			'PASSCONFIRM' => $this->language('ACC_PASSCONFIRM'),
			'SAVE' => $this->language('SAVE')
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
		if ($this->isAllowed(RESELLER))
			return header("location: " . $this->url .'admin/account');		
		
		$this->db->bind('id', $_SESSION['user_id']);
		$data = $this->db->row("
				SELECT
				`group`,
				suspended,
				date_format(last_visit,'%m/%d %H:%i.%s') AS last_visit,
				ip,
				firstname,
				lastname,
				lang,
				username,
				email
				FROM ".$this->prefix('users')."
				WHERE id = :id
				");
		
		
		$arr = array(
			'data' => $data
		);
	
		$this->render('account', $this->arrs($arr));
	}	
	
	/**
	 * 
	 * Actions
	 * 
	 */
	
	/**
	 * Update account
	 */
	public function edit()
	{
		if ($this->isAllowed(RESELLER))
			return header("location: " . $this->url);		
	
		# First check password before trying anything..
		$pass = @$_POST['password'];
		$confirm = @$_POST['confirm'];
		
		if ($pass && $pass != $confirm)
		{
			return $this->info(
				'',
				$this->language('ACC_PASS_MISMATCH'),
				'warning',
				true,
				$this->previous_page(),
				'3000'
			);
		}
		elseif ($pass && !(strlen($pass) > 5))
		{
			return $this->info(
				'',
				$this->language('ACC_PASS_TOO_SHORT'),
				'warning',
				true,
				$this->previous_page(),
				'3000'
			);
		}
	
		$id = $_SESSION['user_id'];
	
		$failed = false;
		$do = $this->db->query(
			# Builds SQL syntax
			$this->forms->sqlUpdate($this->forms->bindList($_POST['client']), $this->prefix('users'), "WHERE id= :id"),
			# Builds Bind list
			$this->forms->bindList($_POST['client'], array("id" => $id))
		);
	
		# A hack to load language..
		if ($_POST['client']['lang_str'])
		$_SESSION['lang'] = $_POST['client']['lang_str'];	
					
		if ($pass)
		{
			$pass = $pass.PEPPER;
			
			$this->db->bind('pass', $pass);
			$this->db->bind('id', $id);
			$failed = $this->db->query("
				UPDATE ".$this->prefix('users')." SET password=SHA1(CONCAT(salt, :pass)), password_temp = password WHERE id = :id
			");
		}
	
		# Intentionally ignored $do as it will always fail if nothing changed..
		return $this->info(
			'',
			$this->language('CHANGES_SAVED_OK'),
			'info',
			true,
			$this->previous_page(),
			'1400'
		);
	}
}
