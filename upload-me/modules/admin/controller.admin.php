<?php
# Disallow direct access
if (!_ROUTING_)	die("Error (NO ROUTING) :: Direct access not allowed...");

/**
 * Admin page
 * 
 * @desc Main Admin landing page.
 */
class adminController extends API
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
			## Account
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
			'SAVE' => $this->language('SAVE'),		
			## Index page
			'VIEW_ALL' => $this->language('VIEW_ALL'),
			'IND_HOME' => 	$this->language('IND_HOME'),
			'IND_WELCOME' => $this->language('IND_WELCOME'),
			'IND_CLIENTS' => $this->language('IND_CLIENTS'),
			'IND_ACTIVE' => $this->language('IND_ACTIVE'),
			'IND_EXPIRED' => $this->language('IND_EXPIRED'),
			'IND_INACTIVE' => $this->language('IND_INACTIVE'),
			'IND_SUSPENDED' => $this->language('IND_SUSPENDED'),
			'IND_SERVERS' => $this->language('IND_SERVERS'),
			'IND_PENDING' => $this->language('IND_PENDING'),
			'IND_BOXES' => $this->language('IND_BOXES'),
			'IND_ONLINE' => $this->language('IND_ONLINE'),
			'IND_OFFLINE' => $this->language('IND_OFFLINE'),
			'IND_UNREACHABLE' => $this->language('IND_UNREACHABLE'),
			'IND_ANNOUNCEMENT' => $this->language('IND_ANNOUNCEMENT'),
			'IND_LAST_15_EVENTS' =>$this->language('IND_LAST_15_EVENTS'),
			'IND_ID'	=> $this->language('IND_ID'),
			'IND_MESSAGE' => $this->language('IND_MESSAGE'),
			'IND_CLIENT' => $this->language('IND_CLIENT'),
			'IND_IP' => $this->language('IND_IP'),
			'IND_TIMESTAMP' => $this->language('IND_TIMESTAMP'),
			'PUBLISH'	=> $this->language('PUBLISH'),
			## Announcement
			'ANNOUNCEMENT' => $this->language('ANN_ANNOUNCEMENT'),
			'GO_BACK'	=> $this->language('GO_BACK'),
			'DELETE'	=> $this->language('DELETE')
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
		$this->render('../admin/_error', $this->arrs());
	}	
	
	/**
	 * Index page
	 * 
	 * FIXME : Boxes available will check against license..
	 */
	public function _default()
	{  
		# Send regulars to hell...
		if (!$this->isAllowed(RESELLER))
			return header("location:" . $this->url );
		
		# Resellers get info about their stuff only..
		if (!$this->isAllowed(ADMIN))			
		{	
			# I Know it's waste of queries but single query is prone to errors a it gets unreadable..
			$this->db->bind('user', $_SESSION['user_id']);
			$data = $this->db->row("
				SELECT
					COUNT(id) AS users,
					SUM(IF(suspended='0', 1, 0)) AS users_active,
					SUM(IF(suspended='1', 1, 0)) AS users_suspended
				FROM ".$this->prefix('users')."
				WHERE parent = :user
			");
			
			$this->db->bind('user', $_SESSION['user_id']);			
			$boxes = $this->db->row("
				SELECT
					COUNT(id) AS boxes
				FROM ".$this->prefix('box')."
				WHERE user = :user
			");
			
			# Merge
			if (is_array($boxes));
				$data = array_merge($data, $boxes);
			
			if (!$boxes)
			{
				$servers = array(
					'servers' => 0,
					'servers_pending' => 0,
					'servers_active' => 0		
				);
			}
			else
			{
				$this->db->bind('user', $_SESSION['user_id']);
				$servers = $this->db->row("
					SELECT
						COUNT(serverid) AS servers,
						SUM(IF(boxid='0', 1, 0))  AS servers_pending,
						SUM(IF(boxid !='0', 1, 0))  AS servers_active
					FROM ".$this->prefix('server')."
					WHERE owner = :user	
				");
			}
			
			# Merge it..
			if (is_array($servers))
				$data = array_merge($data, $servers);			
		
			# Logs
			$this->db->bind('user', $_SESSION['user_id']);
			$logs = $this->db->query("
				SELECT
					l.id AS lid,
					l.type,
					l.holder,
					date_format(l.created,'%m/%d %H:%i.%s') AS created,
					u.username AS username,
					u.id AS id
				FROM ".$this->prefix('logs_actions')." l
				LEFT OUTER JOIN ".$this->prefix('users')." u
					ON u.id = l.user
				LEFT OUTER JOIN ".$this->prefix('box')." b
					ON b.id = l.boxid	
				WHERE b.user = :user
				ORDER BY l.created DESC
				LIMIT 15
			");
		}
		else
		{
			$data = $this->db->row("
				SELECT
					COUNT(id) AS users,
					(SELECT COUNT(id) FROM ".$this->prefix('users')." WHERE suspended = 0 ) AS users_active,
					(SELECT COUNT(id) FROM ".$this->prefix('users')." WHERE suspended != 0 ) AS users_suspended,
					(SELECT COUNT(serverid) FROM ".$this->prefix('server')." WHERE boxid != 0) AS servers,
					(SELECT COUNT(serverid) FROM ".$this->prefix('server')." WHERE boxid = 0) AS servers_pending,
					(SELECT COUNT(serverid) FROM ".$this->prefix('server')." WHERE boxid != 0) AS servers_active,				
					(SELECT COUNT(id) FROM ".$this->prefix('box').") AS boxes
				FROM ".$this->prefix('users')."
			");
			
			# Logs
			$logs = $this->db->query("
				SELECT 
					l.id AS lid,
					l.type,
					l.holder,
					date_format(l.created,'%m/%d %H:%i.%s') AS created,
					u.username AS username,
					u.id AS id
				FROM ".$this->prefix('logs_actions')." l
				LEFT OUTER JOIN ".$this->prefix('users')." u
					ON u.id = l.user
				ORDER BY l.created DESC
				LIMIT 15		
			");
		}
		
		# Announcement
		$news = $this->db->single("
			SELECT news FROM ".$this->prefix('news')." WHERE created > NOW() - INTERVAL 1 WEEK ORDER BY created DESC
		");
		
		# Stats percentage for bars..
		$usr_active = @round((($data['users'] - $data['users_suspended']) / $data['users'] * 100), 2);
		$usr_suspended = @round((($data['users'] - $data['users_active']) / $data['users'] * 100), 2); 
				
		$srv_active = @round((($data['servers'] - $data['servers_pending']) / $data['servers'] * 100), 2);
		$srv_pending = @round((($data['servers'] - $data['servers_active']) / $data['servers'] * 100), 2);
		
		$arr = array(
			'data' => $data,
			'usrActive' => $usr_active,
			'usrSuspended'	=> $usr_suspended,
			'srvPending' => $srv_pending,	
			'srvActive' => $srv_active,	
			'logs' => $logs,
			'isAdmin' => ($this->isAllowed(ADMIN) ? true : false),
			'news' => nl2br($news)
		);
		
		$this->render('../admin/index', $this->arrs($arr));
	}	
	
	/**
	 * Show Announcement
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
		
		$news = @$this->cleanOffset($this->params[0]);
		if (!$news)
		{
			return header("location: " . $this->url);
		}
		
		$this->db->bind('id', $news);
		$data = $this->db->row("
			SELECT id, news FROM ".$this->prefix('news')." WHERE id = :id 
		");
		
		if (!$data)
		{
			return $this->info(			
				'',
				$this->language("IND_NEWS_NOT_FOUND"),
				'warning',
				true,
				$this->url,
				'3000'
			);
		}
		
		$isAdmin = $this->isAllowed(ADMIN) ? true : false;
		
		$this->render('../admin/announcement', $this->arrs(array('data' => $data, 'isAdmin' => $isAdmin, 'news' => nl2br($data['news']))));
	}
	
	/**
	 * Admin account	 
	 */
	public function account()
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
		
		$this->render('../admin/account', $this->arrs($arr));
	}
	
	/**
	 * 
	 * Actions
	 * 
	 */
	
	/**
	 * Adds new announcement
	 */
	public function announce()
	{
		if (!$this->isAllowed(ADMIN))
		{
			return $this->info(
				$this->language('ERROR_TITLE'),
				$this->language("ERROR_INSUFFICENT_LEVEL"),
				'error',
				true,
				$this->url,
				'3000'
			);
		}
		
		$text = @$this->xss($_POST['news']);
		if (!$text OR !(strlen(trim($text)) > 10))
		{
			return header("location: " . $this->url);
		}
		
		$this->db->bind("text", $text);
		$this->db->bind("user", $_SESSION['user_id']);
		$do = $this->db->query("
			INSERT INTO ".$this->prefix('news')."
				(news, author, created)	
			VALUES 
				(:text, :user, NOW())		
		");
		
		if ($do)
		{	
			# Get's last ID
			$id = $this->db->row("SELECT id, news FROM ".$this->prefix('news')." ORDER BY created DESC");
			$link = '<a href="' .$this->url . 'admin/show/'.$this->doOffset($id['id']).'">' . substr($id['news'],0,10) . '..</a>';	
		
			$this->log("NEWS_NEW", 0, 0, 0, $link);
			
			return $this->info(
				'',
				$this->language("IND_NEWS_ADDED"),
				'info',
				true,
				$this->url,
				'4000'
			);
		}
		else
		{
			return $this->info(
				'',
				$this->language("IND_NEWS_FAILED"),
				'warning',
				true,
				$this->url,
				'3000'
			);
		}
	}
	
	/**
	 * News actions (Save or Delete)
	 */
	public function news_action()
	{
		if (!$this->isAllowed(ADMIN))
		{
			return $this->info(
				$this->language('ERROR_TITLE'),
				$this->language("ERROR_INSUFFICENT_LEVEL"),
				'error',
				true,
				$this->url,
				'3000'
			);
		}
		
		$id = @$this->cleanOffset($this->params[0]);
		$save = @$_POST['save'];
		$delete = @$_POST['delete'];
		$text = @$this->xss($_POST['content']);
		
		if (!$id OR (!$save && !$delete) OR !$text)
		{
			return header('location: ' . $this->url);
		}
		
		# Update
		if ($save)
		{	
			$this->db->bind('text', $text);
			$this->db->bind('id', $id);
			$do = $this->db->query("
				UPDATE ".$this->prefix('news')." SET news=:text WHERE id = :id		
			");
			
			if ($do)
			{
				$link = '<a href="' .$this->url . 'admin/show/'.$this->doOffset($id).'">' . substr($text,0,10) . '..</a>';				
				$this->log("NEWS_UPDATED", 0, 0, 0, $link);
				
				return $this->info(
					'',
					$this->language("CHANGES_SAVED_OK"),
					'info',
					true,
					$this->url .'admin/show/'.$this->doOffset($id),
					'1400'
				);
			}
			else
			{
				return $this->info(
					'',
					$this->language("CHANGES_SAVED_FAIL"),
					'warning',
					true,
					$this->url .'admin/show/'.$this->doOffset($id),
					'3000'
				);
			}
		}
		elseif ($delete) # Delete
		{
			$this->db->bind('id', $id);
			$do = $this->db->query("
				DELETE FROM ".$this->prefix('news')." WHERE id = :id
			");
			
			if ($do)
			{	
				$link = '#' .$this->doOffset($id);
				$this->log("NEWS_DELETED", 0, 0, 0, $link);
				
				return $this->info(
					'',
					$this->language("IND_NEWS_DELETED"),
					'info',
					true,
					$this->url,
					'1400'
					);
			}
			else
			{
				return $this->info(
					'',
					$this->language("IND_NEWS_DELETE_FAIL"),
					'warning',
					true,
					$this->url .'admin/show/'.$this->doOffset($id),
					'3000'
				);
			}
		}
		
		header("location: " . $this->url);
	}
	
	/**
	 * Update account
	 */
	public function update_account()
	{
		if (!$this->isAllowed(RESELLER))
		{
			return $this->info(
				$this->language('ERROR_TITLE'),
				$this->language("ERROR_INSUFFICENT_LEVEL"),
				'error',
				true,
				$this->url,
				'3000'
			);
		}
		
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
