<?php
# Disallow direct access
if (!_ROUTING_)	die("Error (NO ROUTING) :: Direct access not allowed...");

/**
 * Clients
 * 
 * @desc Handles clients
 */
class clientsController extends API
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
			## Shared
			'JANUARY' => 	$this->language('JANUARY'),
			'FEBRUARY' => 	$this->language('FEBRURARY'),
			'MARCH' =>		$this->language('MARCH'),
			'APRIL' =>		$this->language('APRIL'),
			'MAY'	=>		$this->language('MAY'),
			'JUNE' =>		$this->language('JUNE'),
			'JULY'	=>		$this->language('JULY'),
			'AUGUST' =>		$this->language('AUGUST'),
			'SEPTEMBER' =>	$this->language('SEPTEMBER'),
			'OCTOBER' =>	$this->language('OCTOBER'),
			'NOVEMBER' =>	$this->language('NOVEMBER'),
			'DECEMBER'	=>	$this->language('DECEMBER'),
			'SUNDAY' => 	$this->language('SUNDAY'),
			'MONDAY' =>		$this->language('MONDAY'),
			'TUESDAY' =>	$this->language('TUESDAY'),
			'WEDNESDAY' =>	$this->language('WEDNESDAY'),
			'THURSDAY' =>	$this->language('THURSDAY'),
			'FRIDAY' =>		$this->language('FRIDAY'),
			'SATURDAY'	=>	$this->language('SATURDAY'),
			'NEXT' => $this->language('NEXT'),
			'PREVIOUS' => $this->language('PREVIOUS'),
			## Add client
			'ADDACCOUNT' => $this->language('CL_ADDACCOUNT'),
			'USER_DETAILS' => $this->language('CL_USER_DETAILS'),
			'GROUP' => $this->language('CL_GROUP'),
			'FIRSTNAME' => $this->language('CL_FIRSTNAME'),
			'LASTNAME' => $this->language('CL_LASTNAME'),
			'USERNAME' => $this->language('CL_USERNAME'),
			'EMAIL' => $this->language('CL_EMAIL'),
			'PASSWORD' => $this->language('CL_PASSWORD'),
			'EMAILUSER' => $this->language('CL_EMAILUSER'),
			'SUSPEND_ACCOUNT' => $this->language('CL_SUSPEND_ACCOUNT'),
			'ADD_ACCOUNT' => $this->language('ADD_ACCOUNT'),
			'CANCEL' => $this->language('CANCEL'),
			'EMAIL_LANG' => $this->language('CL_EMAIL_LANG'),
			## Clients
			'ADD_A_CLIENT' => $this->language('ADD_A_CLIENT'),
			'CLIENTS' => $this->language('CL_CLIENTS'),
			'ID' =>		$this->language('CL_ID'),
			'SERVERS' => $this->language('CL_SERVERS'),
			'LAST_LOGIN' => $this->language('CL_LAST_LOGIN'),
			'ACCOUNT'	=> $this->language('CL_ACCOUNT'),
			## View Client
			'VIEW_CLIENT' => $this->language('CL_VIEW_CLIENT'),
			'DETAILS' => $this->language('CL_DETAILS'),
			'EDIT_CLIENT' => $this->language('CL_EDIT_CLIENT'),
			'SAVE' => $this->language('SAVE'),
			'LAST_VISIT' => $this->language('CL_LASTVISIT'),
			'LAST_IP' => $this->language('CL_LAST_IP'),
			'DELETE_CLIENT' => $this->language('DELETE_CLIENT'),
			'LOGIN_AS' => $this->language('LOGIN_AS'),
			'PAC_PACKAGE'	=>		$this->language('CL_PACKAGE'),
			'PAC_TYPE' =>		$this->language('CL_PACKAGE_TYPE'),
			'PAC_BOXES' =>		$this->language('CL_PACKAGE_BOXES'),
			'PAC_SERVERS'=>		$this->language('CL_PACKAGE_SERVERS'),
			'PAC_CLIENTS' =>		$this->language('CL_PACKAGE_CLIENTS'),
			'PAC_UNLIMITED' =>	$this->language('CL_PACKAGE_UNLIMITED'),
			'PAC_EXPIRES' =>		$this->language('CL_PACKAGE_EXPIRES')
			
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
		if (!$this->isAllowed(RESELLER))
		{
			return $this->info(
				$this->language('ERROR_TITLE'),
				$this->language("ERROR_INSUFFICENT"),
				'error',
				true,
				$this->url,
				'3000'
			);
		}
		
		$this->render('../admin/_error', $this->arrs());
	}	
	
	/**
	 * Index page
	 */
	public function _default()
	{  
		if (!$this->isAllowed(RESELLER))
		{
			return $this->info(
				$this->language('ERROR_TITLE'),
				$this->language("ERROR_INSUFFICENT"),
				'error',
				true,
				$this->url,
				'3000'
			);
		}	

		$sql = "
			SELECT 
				u.id,
				u.username,
				u.firstname,
				u.lastname,
				u.email,
				date_format(u.last_visit,'%m/%d %H:%i.%s') AS last_visit,
				u.group,
				u.suspended,
				(SELECT COUNT(serverid) FROM ".$this->prefix('server')." WHERE clientid=u.id) AS servers			 
			FROM ".$this->prefix('users')." u
			".(!$this->isAllowed(ADMIN) ? ' WHERE u.parent = :user' : ' ')."
			ORDER BY username ASC
		";
		
		# Pagination
		$paginate = new Pagination();
		
		# Pagination
		if (!$this->isAllowed(ADMIN))
			$this->db->bind('user', $_SESSION['user_id']);
		$total = $this->db->countRows($sql);
		
		$pages = $paginate->limit(@$this->params[0], @$this->params[1], $total);
		
		# Query
		if (!$this->isAllowed(ADMIN))
			$this->db->bind('user', $_SESSION['user_id']);
		$data = $this->db->query($sql . $pages);
		
		$arr = array(
			'data' => $data,
			'pagination' => $paginate->layout($total)
		);
		
		$this->render('../admin/clients', $this->arrs($arr));
	}	
	
	/**
	 * Deals with packages..
	 *
	 * @return boolean
	 */
	private function canAdd()
	{
		$sql = "SELECT unlimited, clients FROM ".$this->prefix('packages')." WHERE user = :user";
	
		$this->db->bind("user", $_SESSION['user_id']);
		$data = $this->db->row($sql);
	
		if ($data['unlimited'])
		{
			return true;
		}
		else
		{
			$this->db->bind("user", $_SESSION['user_id']);
			$cnt = $this->db->row("SELECT COUNT(id) AS cnt FROM ".$this->prefix('users')." WHERE parent = :user");
				
			if ($cnt['cnt'] < $data['clients'])
				return true;
			else
				return false;
		}
			
		return false;
	}
	
	/**
	 * Adds new client
	 */
	public function add()
	{
		if (!$this->isAllowed(RESELLER))
		{
			return $this->info(
				$this->language('ERROR_TITLE'),
				$this->language("ERROR_INSUFFICENT"),
				'error',
				true,
				$this->url,
				'3000'
			);
		}
		
		# Check if box can be added
		if (!$this->isAllowed(ADMIN))
		{
			if (!$this->canAdd())
				return $this->info(
					'',
					$this->language("CL_LIMITED"),
					'warning',
					true,
					$this->url.'clients', # FIXME : Redirect to packages..
					'3800'
				);
		}
		
		$arr = array(
			'isAdmin' => $this->isAllowed(ADMIN)
		);
		
		$this->render('../admin/addclient', $this->arrs($arr));
	}
	
	/**
	 * Shows client details
	 */
	public function show()
	{
		if (!$this->isAllowed(RESELLER))
		{
			return $this->info(
				$this->language('ERROR_TITLE'),
				$this->language("ERROR_INSUFFICENT"),
				'error',
				true,
				$this->url,
				'3000'
			);
		}
		
		$client = @$this->cleanOffset($this->params[0]);
		if (!$client)
		{
			return header("location: " . $this->url.'clients');
		}
		
		$this->db->bind('client', $client);
		if (!$this->isAllowed(ADMIN))
			$this->db->bind('parent', $_SESSION['user_id']);
		$data = $this->db->row("
			SELECT
				u.id,
				u.username,
				u.firstname,
				u.lastname,
				u.email,
				date_format(u.last_visit,'%m/%d/%y, %H:%i.%s') AS last_visit,
				u.password,
				u.group,
				u.ip,
				u.suspended,
				(SELECT COUNT(serverid) FROM ".$this->prefix('server')." WHERE clientid=u.id) AS servers,
				p.type AS package_type,
				p.boxes AS package_boxes,
				p.servers AS package_servers,
				p.clients AS package_clients,
				p.unlimited AS package_unlimited,
				date_format(p.expires,'%Y-%m-%d') AS package_expires,
				date_format(p.expires,'%d/%m/%Y') AS package_expires_nicer
			FROM ".$this->prefix('users')." u
			LEFT OUTER JOIN ".$this->prefix('packages')." p 
				ON p.user = u.id
			WHERE u.id=:client" . 
			(!$this->isAllowed(ADMIN) ? ' AND u.parent = :parent ' : '')		
		);		
		
		# Disallow editing if user is reseller and target is not a member.
		if (!$this->isAllowed(ADMIN) && $data['group'] != MEMBER )
		{
			return $this->info(
				$this->language('ERROR_TITLE'),
				$this->language("ERROR_INSUFFICENT"),
				'error',
				true,
				$this->url . 'clients/',
				'2400'
			);
		}
		
		$self = ( ($_SESSION['user_id'] == $data['id']) ? true : false );
		$admin = $this->isAllowed(ADMIN) ? true : false;
		
		$arr = array(
			'data' => $data, 
			'isSelf' => $self, 
			'isAdmin' => $admin, 
			'hijacked' => (@$_SESSION['hijacked'] ? true : false)
		);
		
		$this->render('../admin/showclient', $this->arrs($arr));
	}
	
	/**
	 * Actions
	 */
	
	/**
	 * Edit client
	 *
	 */
	public function edit()
	{
		if (!$this->isAllowed(RESELLER))
		{
			return $this->info(
				$this->language('ERROR_TITLE'),
				$this->language("ERROR_INSUFFICENT"),
				'error',
				true,
				$this->url,
				'3000'
			);
		}
		
		$client = @$this->cleanOffset($this->params[0]);
		if (!$client)
		{
			return header("location: " . $this->url.'clients');			
		}	
		
		# Resellers can only sort members.
		if ($this->isAllowed(RESELLER, '=='))
		{
			$this->db->bind('client', $client);			
			$this->db->bind('user', $_SESSION['user_id']);
			
			$check = $this->db->single("
				SELECT `group` FROM ".$this->prefix('users')." WHERE id=:client AND parent = :user "
			);
			
			if ($check > 1)
			{
				return $this->info(
					'',
					$this->language("ERROR_INSUFFICENT_LEVEL"),
					'warning',
					true,
					$this->url . 'clients/show/'.$this->doOffset($client),
					'2400'
				); 
			}
		}
		
		# Hack to prevent suspending own account
		if ($client == $_SESSION['user_id'])
		{
			$_POST['client']['suspended_inline'] = 0;
		}
		
		# A hack to prevent upping level on newly created users..
		if (!$this->isAllowed(ADMIN))
			$_POST['client']['group_int'] = 1;
		
		$do = $this->db->query(
			# Builds SQL syntax
			$this->forms->sqlUpdate(
				$this->forms->bindList($_POST['client']), $this->prefix('users'), 'WHERE id=:target'
			),
			# Builds Bind list
			$this->forms->bindList(
				$_POST['client'], array('target' => $client)
			)
		);
		
		# Poor man's solution
		$this->db->bind("client", $client);
		$check = $this->db->row("SELECT user FROM ".$this->prefix('packages')." WHERE user=:client");
		if (!$check)
		{
			$this->db->bind("client", $client);
			$this->db->query("
				INSERT INTO ".$this->prefix('packages')."
					(user, expires)
				VALUES
					(:client, DATE_ADD(NOW(), INTERVAL 1 WEEK) )					
			");
		}
		
		# Packages..
		if ($this->isAllowed(ADMIN))
		{	
			# A date Hack..
			if (@!$_POST['package']['expires_str'])
			{
				$date = new DateTime(date("Y-m-d"));
			
				$date->modify('+1 week');				
				$_POST['package']['expires_str'] = $date->format('Y-m-d');
			}
			
			$package = $this->db->query(
				# Builds SQL syntax
				$this->forms->sqlUpdate(
					$this->forms->bindList($_POST['package']), $this->prefix('packages'), 'WHERE user=:target'
				),
				# Builds Bind list
				$this->forms->bindList(
					$_POST['package'], array('target' => $client)
				)
			);
		}
		
		# Has to bo performed separetly
		$newpass = false;			
		if (@$_POST['password'])
		{
			$this->db->bind('pass', @$_POST['password'].PEPPER);			
			$this->db->bind('user', $client);
			$newpass = $this->db->query("
				UPDATE ".$this->prefix('users')." 
				SET password = SHA1(CONCAT(salt, :pass)), password_temp = password
				WHERE id=:user
			");
		}
		
		# Sent E-mail
		$sendMail = @$_POST['send_email'];
		if ($sendMail)
		{
			$mail = new Mail();			
			$email = $_POST['client']['email_str'];
			
			if (@!$_POST['password'] && !$do)
			{
				return $this->info(
					'',
					$this->language("CL_MISSING_PASS"),
					'warning',
					true,
					$this->url . 'clients/show/'.$this->doOffset($client),
					'4000'
				);
			}
			
			# Sends mail in selected language.. (A Hack)
			$lang = @$_POST['mail_lang'];			
			if ($lang)
			{
				$_SESSION['user_backup'] = $_SESSION['lang'];
				$_SESSION['lang'] = $lang;
			}			
			
			$mail->system_mail($email,
				$this->language('MAIL_EDITED_ACCOUNT_TITLE'), 
				$this->language('MAIL_EDITED_ACCOUNT', 
					array(
						$_POST['client']['username_str'], 
						$_POST['client']['username_str'], 
						$_POST['password'], 
					)
				)
			);
			
			# Restore user's lang now..
			$_SESSION['lang'] = $_SESSION['user_backup'];
			unset($_SESSION['user_backup']);
		}
		
		if ($do OR $package)
			return $this->info(
				'',
				$this->language("CL_USER_UPDATED"),
				'info',
				true,
				$this->url . 'clients/show/'.$this->doOffset($client),
				'1800'
			);
		elseif (!$do && $sendMail && $mail)
			return $this->info(
				'',
				$this->language("CL_USER_UPDATED"),
				'info',
				true,
				$this->url . 'clients/show/'.$this->doOffset($client),
				'1800'
			);
		elseif (!$do && !$sendMail && $newpass)
			return $this->info(
				'',
				$this->language("CL_USER_UPDATED"),
				'info',
				true,
				$this->url . 'clients/show/'.$this->doOffset($client),
				'1800'
			);
		else
			return header('location: ' . $this->previous_page());
	}
	
	/**
	 * Adds new client
	 */
	public function add_new()
	{
		if (!$this->isAllowed(RESELLER))
		{
			return $this->info(
				$this->language('ERROR_TITLE'),
				$this->language("ERROR_INSUFFICENT"),
				'error',
				true,
				$this->url,
				'3000'
			);
		}
		
		$username = @$this->xss($_POST['username']);
		$password = @$this->xss($_POST['password']);
		$email = @$this->xss($_POST['email']);
		$firstname = @$this->xss($_POST['firstname']);
		$lastname = @$this->xss($_POST['lastname']);
		$suspended = @(int)$_POST['suspended'] ? 1 : 0;
		$sent_email = @$this->xss($_POST['send_mail']);
		$group = @(int)$_POST['group'];
		
		if (!$username OR
			!$firstname OR 
			!$lastname OR 
			!$email	
		)
		{
			return $this->info(
				'',
				$this->language("CL_REQ_FIELDS"),
				'warning',
				true,
				$this->url.'clients/add',
				'2400'
			);
		}
		
		# Check email but only if email sent is enabled..
		if(!filter_var($email, FILTER_VALIDATE_EMAIL) && $sent_email)
		{
			return $this->info(
				'',
				$this->language("CL_INVALID_EMAIL"),
				'warning',
				true,
				$this->url.'clients/add',
				'2400'
			);
		}
		
		# Resellers can only add members.
		if ($this->isAllowed(RESELLER, '=='))
		{
			
			if (!$this->canAdd())
				return $this->info(
					'',
					$this->language("CL_LIMITED"),
					'warning',
					true,
					$this->url.'clients', # FIXME : Redirect to packages..
					'3800'
				);
			else			
				$group = 1;
		}
		
		# Add now
		$accounts = new Accounts();
		
		$do = $accounts->register(
			$username, $password, $email, $firstname, $lastname, $group, $suspended
		);
		
		if ($do)
		{
			if ($sent_email)
			{
				$mail = new Mail();
				
				# Sends mail in selected language.. (A Hack)
				$lang = @$_POST['mail_lang'];
				if ($lang)
				{
					$_SESSION['user_backup'] = $_SESSION['lang'];
					$_SESSION['lang'] = $lang;
				}
				
				$mail->system_mail($email,
					$this->language('MAIL_NEW_ACCOUNT_TITLE'),
					$this->language('MAIL_NEW_ACCOUNT',
						array(
							$firstname,
							$this->url,	
							$username,
							$do,
							$this->url.'account'
						)
					)
				);
				
				# Restore user's lang now..
				$_SESSION['lang'] = $_SESSION['user_backup'];
				unset($_SESSION['user_backup']);
			}
			
			return $this->info(
				'',
				$this->language("CL_NEW_SUCCESS"),
				'success',
				true,
				$this->url.'clients',
				'2400'
			);
		}
		else
		{
			return $this->info(
				'',
				$this->language("CL_NEW_FAIL"),
				'warning',
				true,
				$this->url.'clients/add',
				'2400'
			);
		}
	}
	
	/**
	 * Delete client
	 */
	public function delete()
	{
		if (!$this->isAllowed(RESELLER))
		{
			return $this->info(
				$this->language('ERROR_TITLE'),
				$this->language("ERROR_INSUFFICENT"),
				'error',
				true,
				$this->url,
				'3000'
			);
		}
		
		$user = @$this->cleanOffset($this->params[0]);
		
		if (!$user)
		{
			return header("location: ", $this->url . 'clients');
		}
		# Can't delete self..
		if ($user == $_SESSION['user_id'])
		{
			return $this->info(
				'',
				$this->language("CL_DELETE_SELF_FAIL"),
				'warning',
				true,
				$this->url . 'clients/show/'.$this->doOffset($user),
				'3000'
			);
		}
		
		# Resellers can only delete members..
		if ($this->isAllowed(RESELLER, "=="))
		{
			$this->db->bind('target', $user);
			$this->db->bind('user', $_SESSION['user_id']);
			$do = $this->db->query("
				DELETE FROM ".$this->prefix('users')."
				WHERE id=:target AND `group` = 1 AND parent = :user		
			");
			
			
			if ($do)
			{
				# Silently delete package if delete succeds
				$this->db->bind('target', $user);
				$this->db->query("DELETE FROM ".$this->prefix('packages')." WHERE user=:target");
				
				return $this->info(
					'',
					$this->language("CL_DELETE_SUCCESS"),
					'success',
					true,
					$this->url . 'clients',
					'3000'
				);
			}
			else
			{
				return $this->info(
						'',
						$this->language("CL_DELETE_INSUFFICIENT"),
						'error',
						true,
						$this->url . 'clients/show/'.$this->doOffset($user),
						'3000'
				);
			}
		}
		else # Admin
		{
			$this->db->bind('target', $user);
			$do = $this->db->query("
					DELETE FROM ".$this->prefix('users')."
					WHERE id=:target
			");
				
			if ($do)
			{	
				# Silently delete package if delete succeds
				$this->db->bind('target', $user);
				$this->db->query("DELETE FROM ".$this->prefix('packages')." WHERE user=:target");
				
				return $this->info(
						'',
						$this->language("CL_DELETE_SUCCESS"),
						'success',
						true,
						$this->url . 'clients',
						'3000'
				);
			}
			else
			{
				return $this->info(
						'',
						$this->language("CL_DELETE_FAIL"),
						'error',
						true,
						$this->url . 'clients/show/'.$this->doOffset($user),
						'3000'
				);
			}
		}
	}
	
	/**
	 * Hijacks account (logs as that user)
	 */
	public function hijack()
	{
		if (!$this->isAllowed(RESELLER))
		{
			return $this->info(
				$this->language('ERROR_TITLE'),
				$this->language("ERROR_INSUFFICENT"),
				'error',
				true,
				$this->url,
				'3000'
			);
		}
		
		$user = $this->cleanOffset($this->params[0]);		
		if ($user == $_SESSION['user_id'])
		{
			return $this->info(
				'',
				$this->language("CL_HIJACK_SELF_ERROR"),
				'warning',
				true,
				$this->url.'clients/show/'.$this->doOffset($user),
				'3000'
			);
		}
	
		$this->db->bind("user", $user);
		if (!$this->isAllowed(ADMIN))
			$this->db->bind("parent", $_SESSION['user_id']);
		$do = $this->db->row("
			SELECT * FROM ".$this->prefix('users')." WHERE id = :user" .
			(!$this->isAllowed(ADMIN) ? ' AND parent = :parent' : '')		
		);
		
		if ($do)
		{
			if ($do['group'] >= $_SESSION['user_group'])
			{
				return $this->info(
					'',
					$this->language("CL_HIJACKED_FAIL"),
					'warning',
					true,
					$this->url.'clients/show'.$this->doOffset($user),
					'3000'
				);
			}
			
			# Sort sessions
			$_SESSION['hijacked'] = true;
			$_SESSION['bck_user_id'] = $_SESSION['user_id'];
			$_SESSION['bck_user_group'] = $_SESSION['user_group'];
			$_SESSION['bck_user_alias'] = $_SESSION['user_alias'];
			
			# Hijack session now
			$_SESSION['user_id'] = $do['id'];
			$_SESSION['user_alias'] = $do['username'];
			$_SESSION['user_group'] = $do['group'];
			
			return $this->info(
				'',
				$this->language("CL_HIJACKED", $do['username']),
				'info',
				true,
				$this->url,
				'3000'
			);
		}
		else
		{
			return $this->info(
				'',
				$this->language("CL_HIJACKED_FAIL"),
				'warning',
				true,
				$this->url.'clients/show/'.$this->doOffset($user),
				'3000'
			);
		}
	}
}
