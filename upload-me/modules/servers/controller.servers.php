<?php
# Disallow direct access
if (!_ROUTING_)	die("Error (NO ROUTING) :: Direct access not allowed...");

/**
 * Servers
 * 
 * @desc Handles servers
 */
class serversController extends API
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
			## Add Server		
			'ADDSERVER' => $this->language('S_ADDSERVER'),
			'CLIENT' => $this->language('S_CLIENT'),
			'CLIENTNAME' => $this->language('S_CLIENTNAME'),
			'GAME' => $this->language('S_GAME'),
			'SERVER_PROPERTIES' => $this->language('S_SERVER_PROPERTIES'),
			'NAME' => $this->language('S_NAME'),
			'EXPIRES' => $this->language('S_EXPIRES'),
			'NEVER' => $this->language('S_NEVER'),
			'SERVER_SETTINGS' => $this->language('S_SERVER_SETTINGS'),
			'PRIORITY' => $this->language('S_PRIORITY'),
			'MAXSLOTS' => $this->language('S_MAXSLOTS'),
			'TYPE' => $this->language('S_TYPE'),
			'PUBLIC' => $this->language('S_PUBLIC'),
			'PRIVATE' => $this->language('S_PRIVATE'),
			'ALLOW_CLIENT' => $this->language('S_ALLOW_CLIENT'),
			'STARTUP_LINE' => $this->language('S_STARTUP_LINE'),
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
			'ADD' => $this->language('ADD'),
			'CANCEL' => $this->language('CANCEL'),				
			'PRIORITY_MAX' =>		$this->language('G_PRIORITY_MAX'),
			'PRIORITY_NORMAL' => 	$this->language('G_PRIORITY_NORMAL'),
			'PRIORITY_MIN'	=>	$this->language('G_PRIORITY_MIN'),
			'G_TYPE'	=> $this->language('G_TYPE'),
			## Manage Server
			'MANAGE'	=> $this->language('S_MANAGE'),
			'REBUILD_SERVER'	=> $this->language('S_REBUILD_SERVER'),
			'DELETE_SERVER' => $this->language('S_DELETE_SERVER'),
			'INSTALL_SERVER' => $this->language('S_INSTALL_SERVER'),
			'ADVANCED'	=>$this->language('S_ADVANCED'),
			'SERVER_BOX' => $this->language('S_SERVER_BOX'),
			'STATUS' => $this->language('S_STATUS'),
			'PENDING' => $this->language('S_PENDING'),
			'IS_PENDING' => $this->language('IND_PENDING'),
			'ACTIVE'	=> $this->language('S_ACTIVE'),
			'SUSPENDED' => $this->language('S_SUSPENDED'),
			'IP' => $this->language('S_IP'),
			'PORT' => $this->language('S_PORT'),
			'GAME_QUERY' => $this->language('S_GAME_QUERY'),
			'QUERY_CODE' => $this->language('S_QUERY_CODE'),
			'QUERY_PORT'	=> $this->language('S_QUERY_PORT'),
			'SSH_SETTINGS' => $this->language('S_SSH_SETTINGS'),
			'SSH_USER'	=> $this->language('S_SSH_USER'),
			'SSH_PASSWORD' => $this->language('S_SSH_PASSWORD'),
			'SSH_HOMEDIR'	=> $this->language('S_SSH_HOMEDIR'),
			'SSH_INSTALLDIR' =>  $this->language('S_SSH_INSTALLDIR'),
			'SSH_UPDATEUSER' => $this->language('S_SSH_UPDATEUSER'),
			'SERVER_OWNER'  => $this->language('S_SERVER_OWNER'),
			'SAVE' => $this->language('SAVE'),
			'BACKTO' => $this->language('SERVERS_BACKTO'),
			## Servers			
			'SERVERS_FOUND' => $this->language('S_SERVERS_FOUND'),
			'INFO'	=> $this->language('S_INFO'),
			'ACTIONS' => $this->language('S_ACTIONS'),
			'REFRESH' => $this->language('REFRESH'),
			'ADD_SERVER' => $this->language('ADD_SERVER'),
			'SLOTS' => $this->language('S_SLOTS'),
			'PLAYERS' => $this->language('S_PLAYERS'),
			'PENDING' => $this->language('S_INACTIVE'),
			## Show Server
			'SHOW'	=> $this->language('S_SHOW'),
			'WEBFTP'	=> $this->language('S_WEBFTP'),
			'CONSOLE' => $this->language('S_CONSOLE'),
			'CLIENT_DETAILS' => $this->language('S_CLIENT_DETAILS'),
			'GROUP'	=> 	$this->language('S_GROUP'),
			'LAST_VISIT' => $this->language('S_LAST_VISIT'),
			'LAST_IP' => $this->language('S_LAST_IP'),
			'FIRSTNAME' => $this->language('S_FIRSTNAME'),
			'LASTNAME' => $this->language('S_LASTNAME'),
			'USERNAME' => $this->language('S_USERNAME'),
			'EMAIL' => $this->language('S_EMAIL'),
			'SERVERS'	=> $this->language('S_SERVERS'),
			'LOCATION' => $this->language('S_LOCATION'),
			'FTP_IP'	=> $this->language('S_FTP_IP'),
			'FTP_PORT' => $this->language('S_FTP_PORT'),
			'FTP_USER' => $this->language('S_FTP_USER'),
			'FTP_PASSWORD' => $this->language('S_FTP_PASSWORD'),
			## Console
			'ENTER_COMMAND' => $this->language('S_ENTER_COMMAND'),
			'ENTER' => $this->language('S_ENTER'),
			'BACKTO_SERVER' => $this->language('SERVER_BACKTO'),
			'PURGE_CONSOLE'	=> $this->language('PURGE_CONSOLE'),
			'DOWNLOAD_CONSOLE' => $this->language('DOWNLOAD_CONSOLE'),
			## WebFTP			
			'FTP_DETAILS' => $this->language('S_FTP_DETAILS'),			
			'FTP_FILE' => $this->language('S_FTP_FILE'),
			'FTP_SIZE' => $this->language('S_FTP_SIZE'),
			'FTP_OWNER' => $this->language('S_FTP_OWNER'),
			'FTP_GROUP' => $this->language('S_FTP_GROUP'),
			'FTP_PERMS' => $this->language('S_FTP_PERMS'),
			'FTP_UPLOAD' => $this->language('S_FTP_UPLOAD'),
			'FTP_NEWDIR' => $this->language('S_FTP_NEWDIR'),
			'UPLOAD' => $this->language('UPLOAD'),
			'CREATE' => $this->language('CREATE'),
			'NEWFILE' => $this->language('S_FTP_NEWFILE'),
			### Edit FTP
			'BACK_TO_FTP' => $this->language('BACK_TO_FTP'),
			## Install Server
			'INSTALLSERVER' => $this->language('S_INSTALLSERVER'),
			'INSTALL_BOX'	 =>	$this->language('S_INSTALL_BOX'),
			'INSTALL_IP'	=>		$this->language('S_INSTALL_IP'),
			'USER_NOTE'	=>		$this->language('S_USER_NOTE'),
			'PASSWORD_NOTE' => 	$this->language('S_PASSWORD_NOTE'),
			'CREATE_USER' =>	$this->language('S_CREATE_USER'),
			'AUTOINSTALL' =>	$this->language('S_AUTOINSTALL'),
			'USER'		=>	$this->language('S_USER'),
			'PASSWORD'	=>	$this->language('S_PASSWORD'),
			'HOMEDIR'		=>	$this->language('S_HOMEDIR'),
			'INSTALLDIR'	=>	$this->language('S_INSTALLDIR'),
			'ENABLED'		=>	$this->language('S_ENABLED'),
			'FINISH'		=>  $this->language('FINISH'),
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
		if ($this->isAllowed(RESELLER))
			$this->render('../admin/_error', $this->arrs());
		else
			$this->render('_error', $this->arrs());
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
			s.serverid,
			s.name,
			g.name AS game,
			g.version AS version,
			s.slots,
			s.boxid,
			u.username AS user,
			u.firstname AS firstname,
			u.lastname AS lastname,
			i.ip AS ip,
			s.port AS port,
			s.started AS started,
			g.querycode AS querycode			
		FROM ".$this->prefix('server')." s
		LEFT OUTER JOIN ".$this->prefix('game')." g
			ON g.id = s.game
		LEFT OUTER JOIN ".$this->prefix('users')." u
			ON s.clientid = u.id
		LEFT OUTER JOIN ".$this->prefix('ip')." i
			ON i.id = s.ipid
		LEFT OUTER JOIN ".$this->prefix('box')." b
			ON b.id = s.boxid
		".(!$this->isAllowed(ADMIN) ? ' WHERE b.user = :user OR s.owner= :owner ' : '')."
		ORDER BY s.name ASC
		";
		
		# Pagination
		$paginate = new Pagination();
		
		# Pagination
		if (!$this->isAllowed(ADMIN))
		{
			$this->db->bind('user', $_SESSION['user_id']);
			$this->db->bind('owner', $_SESSION['user_id']);
		}
		$total = $this->db->countRows($sql);
		
		$pages = $paginate->limit(@$this->params[0], @$this->params[1], $total);
		
		# Query
		if (!$this->isAllowed(ADMIN))
		{
			$this->db->bind('user', $_SESSION['user_id']);
			$this->db->bind('owner', $_SESSION['user_id']);
		}
		$data = $this->db->query($sql . $pages);	
	
		$arr = array(
			'data' => $data,
			'pagination' => $paginate->layout($total)
		);
		
		$this->render('../admin/servers', $this->arrs($arr));
	}

	/**
	 * Show servers
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
		
		$server = @$this->cleanOffset($this->params[0]);
		
		if (!$server)
		{
			return header('location: ' . $this->url . 'servers');
		}
		
		$this->db->bind('server', $server);
		if (!$this->isAllowed(ADMIN))
		{
			$this->db->bind('user', $_SESSION['user_id']);
			$this->db->bind('owner', $_SESSION['user_id']);
		}
		$data = $this->db->row("
			SELECT 
				s.serverid AS id,
				s.started,
				u.group,
				u.suspended,
				date_format(u.last_visit,'%m/%d %H:%i.%s') AS last_visit,
				u.ip,
				u.firstname,
				u.lastname,
				u.username, 
				u.email,
				s.name,
				g.name AS game,
				g.version,
				i.ip AS serverip,
				s.port,
				b.location,
				b.ip AS ftpip,
				s.ftpuser,
				b.ftpport,
				s.ftpuser,
				s.ftppass,
				s.boxid,
				g.querycode								
			FROM ".$this->prefix('server')." s
			LEFT OUTER JOIN ".$this->prefix('users')." u
				ON u.id = s.clientid	
			LEFT OUTER JOIN ".$this->prefix('game')." g
				ON g.id = s.game
			LEFT OUTER JOIN ".$this->prefix('ip')." i
				ON i.id = s.ipid
			LEFT OUTER JOIN ".$this->prefix('box')." b
				ON b.id = s.boxid
			WHERE s.serverid = :server" .
			(!$this->isAllowed(ADMIN) ? ' AND b.user = :user OR s.owner = :owner' : '')				
		);
		
		if (!$data)
		{
			return header("location: " . $this->url.'servers');
		}
		
		# Server Query
		$q = new Query($data['name'], $data['querycode'], $data['serverip'], $data['port']);
		$serverData = $q->data();
		
		$arr = array(
			'data' => $data,
			'serverData' => $serverData	
		);
		
		$this->render('../admin/showserver', $this->arrs($arr));
	}
	
	/**
	 * WebFTP Path constructor
	 * 
	 * @params boolean $dir Toggle construction type (listnings/url)
	 * @return string Returns builded path..
	 */
	private function ftpPath($type)
	{
		# Bounce out..nothing to show unless if download..
		if (@!$this->params[1] && !$type == "download")
		{
			if ($type == 'dir')
				return './';
			else
				return $this->url . $this->controller  . '/' .$this->function . '/' . $this->params[0];	
		}
		
		# Listings (Goes one back)
		if ($type == "go_up")
		{	
			$params = array_slice($this->params, 0, count($this->params) -1);
		
			return $this->url . $this->controller  . '/' .$this->function . '/' . @implode('/', $params);	
		}
		
		# Directory (FTP)
		if ($type == "dir")
		{
			# Get rid of the first..
			$params = array_slice($this->params, 1);
			
			return './' . implode('/', $params) . '/';
		}
		
		# File path
		if ($type == 'url')
		{	
			$params = $this->params;
			
			if (is_array($params))
				return $this->url . $this->controller  . '/' .$this->function . '/' . @implode('/', $params);
			else
				return $this->url . $this->controller  . '/' .$this->function . '/' . @$this->params[0];
		}
		
		# Downloads
		if ($type == "download")
		{
			# Get rid of the first..
			$params = array_slice($this->params, 1);
				
			$slash = (@!$this->params[1] ? '' : '/');
		
			return implode('_', $params) . $slash;
		}
	}
	
	/**
	 * WebFTP
	 */
	public function webftp()
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
		
		$server = @$this->cleanOffset($this->params[0]);
		
		if (!$server)
		{
			return header('location: ' . $this->url . 'servers');
		}
		
		$this->db->bind('server', $server);
		if (!$this->isAllowed(ADMIN))
			$this->db->bind('user', $_SESSION['user_id']);
		$data = $this->db->row("
			SELECT 
				s.serverid AS id,				
				s.ftpuser,
				b.ftpport,
				s.ftpuser,
				s.ftppass,
				i.ip AS ftpip,
				b.ftppassive AS passive
			FROM ".$this->prefix('server')." s
			LEFT OUTER JOIN ".$this->prefix('users')." u
				ON u.id = s.clientid	
			LEFT OUTER JOIN ".$this->prefix('game')." g
				ON g.id = s.game
			LEFT OUTER JOIN ".$this->prefix('ip')." i
				ON i.id = s.ipid
			LEFT OUTER JOIN ".$this->prefix('box')." b
				ON b.id = s.boxid
			WHERE s.serverid = :server" .
			(!$this->isAllowed(ADMIN) ? ' AND b.user = :user' : '')	
		);
		
		if (!$data)
		{
			return header("location: " . $this->url.'servers');
		}
		
		$ftp = new FTP($data['ftpip'], $data['ftpport']);
		
		if (!$ftp->ftp_login($data['ftpuser'], $data['ftppass']))
		{
			return $this->info(
				'',
				$this->language("S_FTP_CONNECTION_FAIL"),
				'warning',
				true,
				$this->previous_page(),
				'3000'
			);
		}	
		
		# Sort passive mode
		ftp_pasv($ftp->conn, $data['passive']);
		
		# Dir		
		$arr = array(
			'FTP_DETAILS_FULL' => $this->language('S_FTP_DETAILS_FULL',
					array($data['ftpip'], $data['ftpport'], $data['ftpuser'], $data['ftppass'])),
			'data' => $data,			
			'goup' => ((@!$this->params[1]) ? false : true),
			# Retarded FTP sorting..
			'list' => $ftp->raw_listing(ftp_rawlist($ftp->conn,  $this->ftpPath("dir") )),
			'fileurl' => $this->ftpPath("url"),
			'filepath' => $this->ftpPath("go_up"),
			'file'	=> $this->ftpPath("download"),
		);
		
		$this->render('../admin/webftp', $this->arrs($arr));
	}
	
	/**
	 * Console
	 */
	public function console()
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
		
		$server = @$this->cleanOffset($this->params[0]);		
		if (!$server)
		{
			return header('Location: ' . $this->url .'servers');
		}
		
		$this->db->bind('server', $server);
		if (!$this->isAllowed(ADMIN))
			$this->db->bind('user', $_SESSION['user_id']);
		$data = $this->db->row("
			SELECT  
				s.started AS started,
				b.ip AS sship,
				b.sshport AS sshport,
				s.ftpuser AS sshuser,
				s.ftppass AS sshpass,
				b.sudo AS sudo, 
				s.serverid AS id,
				s.homedir AS homedir
			FROM ".$this->prefix('server')." s 
			LEFT OUTER JOIN ".$this->prefix('box')." b
				ON b.id = s.boxid
			WHERE s.serverid = :server" .
			(!$this->isAllowed(ADMIN) ? ' AND b.user = :user' : '')
		);
		
		if (!$data)
		{
			return header("Location: " . $this->url . 'servers');
		}
		
		if (!$data['started'])
		{
			return $this->info(
				$this->language('ERROR_TITLE'),
				$this->language("S_SERVER_NOT_RUNNING"),
				'warning',
				true,
				$this->url . 'servers/show/' . $this->doOffset($server),
				'2000'
			);
		}
		
		# Create connection
		$ssh = new SSH($data['sship'], $data['sshport']);
		if (!$ssh->ssh->login($data['sshuser'], $data['sshpass']))
		{
			return $this->info(
					$this->language('ERROR_TITLE'),
					$this->language("S_SSH_CONNECT_FAIL"),
					'warning',
					true,
					$this->previous_page(),
					'3000'
			);
		}
		# 5 seconds is more then enough..
		$ssh->setTimeout(1);
		
		$sudo = $data['sudo'] ? 'sudo ' : '';
		
		//We retrieve the content of the screen
		$cmd = "cd ".$data['homedir']."; ".$sudo."tail screenlog.0 -n 80";		
		$output = $ssh->exec($cmd."\n");
		
		$ssh->disconnect();
		
		$token = time();
		
		$arr = array(
			'output' => nl2br($this->xss($output)),
			'data' => $data,		
			'token' => $token
		);
		
		$this->render('../admin/webconsole', $this->arrs($arr));
	}
	
	/**
	 * Manage
	 */
	public function manage()
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
		
		$server = @$this->cleanOffset($this->params[0]);
		if (!$server)
		{
			return header("location: " . $this->url . 'servers');
		}
		
		$this->db->bind('server', $server);
		if (!$this->isAllowed(ADMIN))
		{
			$this->db->bind('user', $_SESSION['user_id']);
			$this->db->bind('owner', $_SESSION['user_id']);
		}
		$data = $this->db->row("
			SELECT 
				s.serverid AS id, s.boxid AS boxid,
				s.name AS name,	g.id AS gameid,
				g.name AS game,	g.version AS version,
				s.type AS type,	s.status AS status,
				s.slots AS slots, s.priority AS priority,
				s.cfg1 AS cfg1,	s.cfg2 AS cfg2,
				s.cfg3 AS cfg3, s.cfg4 AS cfg4,
				s.cfg5 AS cfg5,	s.cfg6 AS cfg6,
				s.cfg7 AS cfg7,	s.cfg8 AS cfg8,
				s.cfg9 AS cfg9,	s.cfg10 AS cfg10,
				s.cfg1name AS cfg1name, s.cfg2name AS cfg2name,
				s.cfg3name AS cfg3name,	s.cfg4name AS cfg4name,
				s.cfg5name AS cfg5name,	s.cfg6name AS cfg6name,
				s.cfg7name AS cfg7name,	s.cfg8name AS cfg8name,
				s.cfg9name AS cfg9name,	s.cfg10name AS cfg10name,
				s.cfg1edit AS cfg1edit,	s.cfg2edit AS cfg2edit,
				s.cfg3edit AS cfg3edit,	s.cfg4edit AS cfg4edit,
				s.cfg5edit AS cfg5edit,	s.cfg6edit AS cfg6edit,
				s.cfg7edit AS cfg7edit, s.cfg8edit AS cfg8edit,
				s.cfg9edit AS cfg9edit,	s.cfg10edit AS cfg10edit,
				s.startupline AS startupline,
				s.ftpuser AS ftpuser, s.ftppass AS ftppass,
				s.homedir AS homedir, s.installdir AS installdir,
				i.id AS ipid, g.queryport AS queryport,
				g.querycode AS querycode, s.port AS port,
				s.clientid AS client, u.username AS username,
				u.firstname AS firstname, u.lastname AS lastname
			FROM ".$this->prefix('server')." s
			LEFT OUTER JOIN ".$this->prefix('box')." b
				ON b.id = s.serverid
			LEFT OUTER JOIN ".$this->prefix('ip')." i
				ON i.id = s.ipid 
			LEFT OUTER JOIN ".$this->prefix('game')." g
				ON s.game = g.id	
			LEFT OUTER JOIN ".$this->prefix('users')." u
				ON u.id = s.clientid				
			WHERE s.serverid = :server".
			(!$this->isAllowed(ADMIN) ? ' AND b.user = :user OR s.owner = :owner' : '')
		);
		
		if ($data)
		{
			$this->db->bind('box', $data['boxid']);
			$ip = $this->db->query("
				SELECT
					id AS id,
					ip AS ip
				FROM ".$this->prefix('ip')."  
				WHERE parent = :box
			");
			
			$this->db->bind('client', $data['client']);
			$this->db->bind('user', $_SESSION['user_id']);
			$client = $this->db->query("
				SELECT
					id AS id,
					username AS username,
					firstname AS firstname,
					lastname AS lastname
				FROM ".$this->prefix('users')."
				WHERE id != :client AND suspended = 0 AND parent = :user	
			");
		}

		if (!$data)
		{
			return header("location: " . $this->url . 'servers');
		}
		
		$arr = array(
			'data' => $data,
			'ip' => $ip,
			'clients' => $client
		);
		
		$this->render('../admin/manageserver', $this->arrs($arr));
	}
	
	/**
	 * Deals with packages..
	 *
	 * @return boolean
	 */
	private function canAdd()
	{
		$sql = "SELECT unlimited, servers FROM ".$this->prefix('packages')." WHERE user = :user";
	
		$this->db->bind("user", $_SESSION['user_id']);
		$data = $this->db->row($sql);
		
		if ($data['unlimited'])
		{
			return true;
		}
		else
		{
			$this->db->bind("user", $_SESSION['user_id']);
			$cnt = $this->db->row("SELECT COUNT(serverid) AS cnt FROM ".$this->prefix('server')." WHERE clientid = :user");
						
			if ($cnt['cnt'] < $data['servers'])
				return true;
			else
				return false;
		}
			
		return false;
	}
	
	/**
	 * Adds new server
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
					$this->language("S_LIMITED"),
					'warning',
					true,
					$this->url.'servers', # FIXME : Redirect to packages..
					'3800'
				);
		}
		
		if (!$this->isAllowed(ADMIN))
		{
			$this->db->bind('user', $_SESSION['user_id']);
			$this->db->bind('id', $_SESSION['user_id']);
			$data = $this->db->query("
					SELECT id, username, firstname, lastname FROM ".$this->prefix('users')." WHERE parent=:user OR id=:id ORDER BY username ASC
			");
		}
		else
		{
			$data = $this->db->query("
				SELECT id, username, firstname, lastname FROM ".$this->prefix('users')." ORDER BY username ASC		
			");
		}		
		
		$arr = array(
			'step' => false,
			'data' => $data
		);
		
		$this->render('../admin/addserver', $this->arrs($arr));
	}
	
	/**
	 * Install
	 */
	public function install()
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
	
		$server = @$this->cleanOffset($this->params[0]);
	
		$this->db->bind("server", $server);
		if (!$this->isAllowed(ADMIN))
		{
			$this->db->bind('user', $_SESSION['user_id']);
			$this->db->bind('owner', $_SESSION['user_id']);
		}
		$data = $this->db->row("
			SELECT 
				s.name, 
				g.name AS game, 
				g.version AS version,
				s.slots 
			FROM ".$this->prefix('server')." s
			LEFT OUTER JOIN ".$this->prefix('game')." g
				ON g.id = s.game 
			LEFT OUTER JOIN ".$this->prefix('box')." b
				ON b.id = s.boxid
			WHERE s.serverid = :server " .
			(!$this->isAllowed(ADMIN) ? ' AND b.user = :user OR s.owner = :owner' : '')
		);
	
		if (!$data)
		{
			return header("location: " . $this->url.'servers');
		}
		
		$box = $this->db->query("SELECT id, name, location, ostype FROM ".$this->prefix('box')."");
		
		$arr = array(
			'data' => $data,
			'step' => null,
			'box' => $box,
			'server' => $this->doOffset($server)
		);
	
		$this->render('../admin/install', $this->arrs($arr));
	}
	
	/**
	 * 
	 * Actions
	 * 
	 */
	
	/**
	 * Adds new server
	 */
	public function add_server()
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
		
		# Check if server can be added
		if (!$this->isAllowed(ADMIN))
		{
			if (!$this->canAdd())
				return $this->info(
					'',
					$this->language("S_LIMITED"),
					'warning',
					true,
					$this->url.'servers', # FIXME : Redirect to packages..
					'3800'
				);
		}
		
		$step = @$this->cleanOffset($this->params[0]);
		
		if (!$step)
		{
			return header("Location: " . $this->url . 'box');
		}
		
		# Step 2 
		if ($step == 'step2')
		{
			$user = @explode(',,',$_POST['client']);			
			$client = @$this->cleanOffset($user[0]);
						
			if (!$client OR !$user)
			{
				return header("location: " . $this->url.'servers/add');
			}
			
			$data = $this->db->query("
				SELECT id, name, version FROM ".$this->prefix('game')." WHERE status=1 ORDER BY name ASC		
			");
			
			$arr = array(
				'step' => 2,
				'data' => $data,
				'name' => $client,
				'clientname' => $user[1]
			);
			
			return $this->render('../admin/addserver', $this->arrs($arr));
		}
		
		# Step 3
		if ($step == 'step3')
		{
			$game = @explode(",,", $_POST['game']);
			
			$client = @$this->cleanOffset($_POST['client']);
			$clientName = @$_POST['clientname'];
			$gameName = $game[1];
			$gameID = @$this->cleanOffset($game[0]);
			
			if (!$client OR !$clientName OR !$gameName OR !$gameID )
			{
				return header('location: ' . $this->url . 'servers/add');
			}
			
			$this->db->bind('game', $gameID);
			$data = $this->db->row("SELECT * FROM ".$this->prefix('game')." WHERE id = :game");
			
			if (!$data)
			{
				return header('location: ' . $this->url . 'servers/add');
			}
			
			$arr = array(
				'step' => 3,
				'name' => $clientName,
				'gamename' => $gameName,
				'client' => $client,
				'game'   => $gameID,
				'data'	=> $data
			);
				
			return $this->render('../admin/addserver', $this->arrs($arr));
		}
		
		# Submit 
		if ($step == 'step4')
		{
			# Hack to add owner..
			@$_POST['game']['owner_int'] = @$_SESSION['user_id'];
			
			$do = $this->db->query(
					# Builds SQL syntax
					$this->forms->sqlInsert($this->forms->bindList($_POST['game']), $this->prefix('server')),
					# Builds Bind list
					$this->forms->bindList($_POST['game'])
			); 
			
			if ($do)
			{
					
				$this->log("SERVER_ADDED", 0, $_POST['game']['clientid_int'], 0, $_POST['game']['name_str']);
					
				return $this->info(
						'',
						$this->language("S_SERVER_ADDED_SUCCESS"),
						'info',
						true,
						$this->url . 'servers',
						'1800'
				);
			}
			else
			{
				return $this->info(
						'',
						$this->language("S_SERVER_ADDED_FAIL"),
						'warning',
						true,
						$this->url . 'servers/add',
						'3000'
				);
			}
		}
	}
	
	/**
	 * Deals with SSH on installs
	 */
	private function ssh_install($create, $install, $box, $user=null, $pass=null, $dir=null, $home=null)
	{		
		$this->db->bind('box', $box);
		if (!$this->isAllowed(ADMIN))
			$this->db->bind('user', $_SESSION['user_id']);	
		$data = $this->db->row("
			SELECT 
				ip AS ip,
				sshport AS port,
				sshuser AS user,
				sshpass AS pass,
				sudo AS sudo
			FROM ".$this->prefix('box')."			
			WHERE id = :box" .
			(!$this->isAllowed(ADMIN) ? ' AND user=:user' : '')
		);

		# Do SSH magic now
		if ($data)
		{	
			# Create connection
			$ssh = new SSH($data['ip'], $data['port']);
			if (!$ssh->ssh->login($data['user'], $data['pass']))
			{
				return false;
			}
			
			# 5 seconds is more then enough..
			$ssh->setTimeout(5);
			
			# Sort sudo
			$sudo = $data['sudo'] ? 'sudo ' : '';
			# FIXME Sudo has to be set correctly..
						
			# Create user-pass & dir
			if ($create)
			{
				if (!$pass)
					$pass = substr(sha1(rand()),0,12);
				
				//$ssh->exec($sudo . 'useradd ' . $user . ' -p ' . $pass . ' -m');
				# If directory is created files get copied in folder instead in root of directory..
				//$ssh->exec($sudo . 'useradd ' . $user . ' -p ' . $pass);				
				
				# Nasty but works..
				$ssh->read('username@username:~$');
				$ssh->write("adduser --no-create-home ".$user."\n"); // --shell /bin/false
				$ssh->read('Enter new UNIX password:');
				$ssh->write($pass."\n");
				$ssh->read('Retype new UNIX password:');
				$ssh->write($pass."\n");
				$ssh->read('Full Name []:');
				$ssh->write("\n");
				$ssh->read('Room Number []:');
				$ssh->write("\n");
				$ssh->read('Work Phone []:');
				$ssh->write("\n");
				$ssh->read('Home Phone []:');
				$ssh->write("\n");
				$ssh->read('Other []:');
				$ssh->write("\n");
				$ssh->read('Is the information correct? [Y/n]');
				$ssh->write("y\n");
				$ssh->read('username@username:~#');
				
			}
			
			# Install Game (CP + chown basically so user is jailed..)
			if ($install)
			{
				$ssh->exec('cp -r ' .$dir . ' ' . $home .';'.$sudo . 'chown -R ' . $user . ':' .$user . ' ' . $home);
			}
			
			return ($create ? $pass : true);
		}
		
		return false;
	}
	
	/**
	 * Install Server
	 */
	public function install_server()
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
		
		$step = @$this->cleanOffset($this->params[0]);
		
		if (!$step)
		{
			return header("Location: " . $this->url . 'servers');
		}
		
		# Step 2 
		if ($step == 'step2')
		{
			$query = @explode(',,', $_POST['box']);
			
			$name = @$_POST['name'];
			$game = @$_POST['game'];
			$slots = @$_POST['slots'];
			$box = @$this->cleanOffset($query[0]);
			$server = @$_POST['server'];
			
			if (!$name OR !$game OR !$slots OR !$box OR !$server)
			{
				return header("location: " . $this->url . 'servers/add');
			}
			
			$this->db->bind('box', $box);
			$data = $this->db->query("SELECT id, ip FROM ".$this->prefix('ip')." WHERE parent=:box ");
			
			$arr = array(
				'name' => $name,
				'game' => $game,
				'slots' => $slots,
				'box' => $query[1],
				'boxid' => $query[0],
				'ip' => $data,
				'step' => 2,
				'server' => $server
			);
			
			$this->render('../admin/install', $this->arrs($arr));
		}
		
		# Step 3
		if ($step == 'step3')
		{	
			$query = @explode(",,", $_POST['ip']);
			
			$name = @$_POST['name'];
			$game = @$_POST['game'];
			$slots = @$_POST['slots'];
			$box = @$_POST['box'];
			$boxid = @$this->cleanOffset($_POST['boxid']);
			$ip = @$query[1];
			$ipID = @$query[0]; 
			$server = @$_POST['server'];
			
				
			if (!$name OR !$game OR !$slots OR !$box OR !$ip OR !$ipID OR !$boxid OR !$server)
			{
				return header("location: " . $this->url . 'servers/add');
			}
			
			$this->db->bind('box', $boxid);
			if (!$this->isAllowed(ADMIN))
				$this->db->bind('user', $_SESSION['user_id']);
			$data = $this->db->row("
				SELECT 
					id	
				FROM ".$this->prefix('box')."					
				WHERE id =:box" . 
				(!$this->isAllowed(ADMIN) ? ' AND user = :user' : '')
			);
			
			$this->db->bind('server', $this->cleanOffset($server));
			$clientData = $this->db->row("
				SELECT 
					clientid, 
					game
				FROM ".$this->prefix('server')."
				WHERE serverid = :server		
			"); 
			
			# Sort Server user
			$this->db->bind('client', $clientData['clientid']);			
			$serverData = $this->db->row("
				SELECT 
					COUNT(serverid) AS servers					
				FROM ".$this->prefix('server')."
				WHERE clientid = :client AND boxid != 0
			");	
						
			# We start with 0 
			# If match is > 1 then offset by taking 1 else it's 101..
			# FFS this line.. 
			$ftpuser = 'srv'.( ($clientData['clientid'] * 100) +
				(!$serverData['servers'] ? 0 : $serverData['servers']) 
			);
			
			# Sort game data
			$this->db->bind('gameid', $clientData['game']);
			$this->db->bind('game', $clientData['game']);
			$gameData = $this->db->row("
				SELECT 
					defaultport,					
					installdir,
					(SELECT COUNT(serverid) FROM ".$this->prefix('server')." WHERE game = :gameid AND boxid != 0 ) AS ports
				FROM ".$this->prefix('game')."
				WHERE id = :game							
			");
			
			$defaultPort = $gameData['defaultport'] + $gameData['ports'];
			
			$arr = array(
				'name' => $name,
				'game' => $game,
				'slots' => $slots,
				'box' => $box,
				'boxid' => $this->doOffset($boxid),
				'ip' => $ip,
				'ipID' => $this->doOffset($ipID),
				'data' => $data,
				'step' => 3,
				'server' => $server,
				'ftpuser' => $ftpuser,	
				'defaultport' => $defaultPort,
				'installdir' => $gameData['installdir']				
			);
			
			$this->render('../admin/install', $this->arrs($arr));
		}
		
		# SUBMIT
		if ($step == 'step4')
		{
			$create = @$_POST['create_user'] ? true : false;
			$install = @$_POST['auto_install'] ? true : false;
			$box  = @$this->cleanOffset($_POST['server']['boxid_int']);
			$ip = @$this->cleanOffset($_POST['server']['ipid_int']);
			$server = @$this->cleanOffset($_POST['serverid']);
			$ftpuser = @$this->xss($_POST['server']['ftpuser_str']);
			$ftppass = @$this->xss($_POST['server']['ftppass_str']);
			$dir = @$this->xss($_POST['server']['installdir_str']);	
			$home = @$this->xss($_POST['server']['homedir_str']);	
			
			# Sort some stuff
			$_POST['server']['ipid_int'] = $this->cleanOffset($_POST['server']['ipid_int']);
			$_POST['server']['boxid_int'] = $this->cleanOffset($_POST['server']['boxid_int']);
			
			if (!$box OR !$ip OR !$server)
			{
				return header("location: " . $this->url . 'servers/add');
			}
			
			# SSH
			$ssh = true;
			if ($create OR $install)
			{
				$ssh = $this->ssh_install($create, $install, $box, $ftpuser, $ftppass, $dir, $home);
			}	

			# A hack to hook random generated password
			if ($ssh && $create)
			{
				if (!$ftppass)
					$_POST['server']['ftppass_str'] = $ssh;
			}			
			
			# Add to DB now
			$do = $this->db->query(
				# Builds SQL syntax
				$this->forms->sqlUpdate($this->forms->bindList($_POST['server']), $this->prefix('server'), "WHERE serverid= :server"),
				# Builds Bind list
				$this->forms->bindList($_POST['server'], array("server" => $server))
			);
						
			if ($ssh)
			{
				return $this->info(
					'',
					$this->language("S_INSTALL_SUCCESS"),
					'info',
					true,
					$this->url .'servers/show/'.$this->doOffset($server),
					'5000'
				);
			}
			else
			{
				return $this->info(
					'',
					$this->language("S_INSTALL_FAIL"),
					'warning',
					true,
					$this->url.'servers/show/'.$this->doOffset($server),
					'5000'
				);
			}
		}	
	}
	
	/**
	 * Rebuilds server
	 */
	public function rebuild()
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
		
		$server = @$this->cleanOffset($this->params[0]);
		
		if (!$server)
		{
			return header("location: " . $this->url .'servers');
		}
		
		$this->db->bind('server', $server);
		if (!$this->isAllowed(ADMIN))
			$this->db->bind('user', $_SESSION['user_id']);
		$data = $this->db->row("
			SELECT 		
				b.ip AS sship,
				b.sshuser AS sshuser,
				b.sshpass AS sshpass,
				b.sshport AS sshport,
				b.sudo AS sudo,
				s.installdir AS installdir,
				s.homedir AS homedir,
				s.ftpuser AS ftpuser
			FROM ".$this->prefix('server')." s 
			LEFT OUTER JOIN ".$this->prefix('box')." b
				ON b.id = s.boxid
			WHERE s.serverid = :server "  . 
			(!$this->isAllowed(ADMIN) ? ' AND b.user = :user' : '')
		);
		
		if (!$data)
		{
			return header("location:" . $this->url . 'servers');
		}
		
		# Create connection
		$ssh = new SSH($data['sship'], $data['sshport']);
		if (!$ssh->ssh->login($data['sshuser'], $data['sshpass']))
		{	
			return $this->info(
				$this->language('ERROR_TITLE'),
				$this->language("S_SSH_CONNECT_FAIL"),
				'warning',
				true,
				$this->url . 'servers/manage/'.$this->doOffset($server),
				'3000'
			);
		}
		
		# 5 seconds is more then enough..
		$ssh->setTimeout(5);
		
		# Sudo
		$sudo = $data['sudo'] ? 'sudo ' : '';
				
		# Deletes folder - copies folder - chowns it		
		$ssh->exec('rm -rf '.$data['homedir'].'; cp -r ' .$data['installdir'] . ' ' . $data['homedir'] .';'.$sudo . 'chown -R ' . $data['ftpuser'] . ':' .$data['ftpuser'] . ' ' . $data['homedir']);
		
		return $this->info(
			'',
			$this->language("S_REBUILD_NOTICE"),
			'info',
			true,
			$this->url . 'servers/manage/'.$this->doOffset($server),
			'5000'
		);
	}
	
	/**
	 * Deletes server
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
		
		$server = @$this->cleanOffset($this->params[0]);
		
		if (!$server)
		{
			return header("location: " . $this->url .'servers');
		}
		
		$this->db->bind('server', $server);
		if (!$this->isAllowed(ADMIN))
		{
			$this->db->bind('user', $_SESSION['user_id']);
			$this->db->bind('owner', $_SESSION['user_id']);
		}
		$data = $this->db->row("
			SELECT
				b.ip AS sship,
				b.sshuser AS sshuser,
				b.sshpass AS sshpass,
				b.sshport AS sshport,
				b.sudo AS sudo,
				s.installdir AS installdir,
				s.homedir AS homedir,
				s.ftpuser AS ftpuser,
				s.name AS name
			FROM ".$this->prefix('server')." s
			LEFT OUTER JOIN ".$this->prefix('box')." b
				ON b.id = s.boxid
			WHERE s.serverid = :server" .
			(!$this->isAllowed(ADMIN) ? ' AND b.user = :user OR s.owner = :owner' : '')
		);
		
		if (!$data)
		{
			return header("location:" . $this->url . 'servers');
		}
		
		# Create connection
		@$ssh = new SSH($data['sship'], $data['sshport']);
		
		# Silenced for empty servers..
		if (@$ssh->ssh->login($data['sshuser'], $data['sshpass']))
		{
			# 5 seconds is more then enough..
			$ssh->setTimeout(5);
			
			# Sudo
			$sudo = $data['sudo'] ? 'sudo ' : '';
			
			# Deletes folder & User
			$ssh->exec($sudo . 'rm -rf '.$data['homedir'].'; '.$sudo.' deluser ' . $data['ftpuser']);
		}
		
		# Log it
		$this->log("SERVER_DELETED", 0, 0, 0, $data['name'] );
		
		# Deletes server
		$this->db->bind('server', $server);
		$this->db->query("DELETE FROM ".$this->prefix('server')." WHERE serverid = :server");
		
		# Delets logs
		$this->db->bind('server', $server);
		$this->db->query("DELETE FROM ".$this->prefix('logs_actions')." WHERE serverid = :server");

		return $this->info(
			'',
			$this->language("S_SERVER_DELETED"),
			'info',
			true,
			$this->url . 'servers',
			'5000'
		);
	}
	
	/**
	 * Builds startup line
	 */
	private function startupline($in, $arr)
	{	
		$values = array_values($arr);
		$keys = array_keys($arr);
		
		foreach ($keys as $k=>$v) 
		{
			$keys[$k]='{'.$v.'}';
		}
		return str_replace($keys, $values, $in);
	}
	
	/**
	 * Actions
	 */
	public function actions()
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
		
		$action = @$this->params[0];
		$server = @$this->cleanOffset($this->params[1]);
				
		if (!$action OR !$server)
		{
			return header("location: " . $this->url);
		}
		
		$this->db->bind('server', $server);
		if (!$this->isAllowed(ADMIN))
			$this->db->bind('user', $_SESSION['user_id']);
		$data = $this->db->row("
			SELECT 
				b.ip AS sship,
				b.sshuser AS sshuser,
				b.sshpass AS sshpass,
				b.sshport AS sshport,
				b.sudo AS sudo,
				b.id AS boxid,
				s.serverid AS serverid,
				s.started AS started,
				s.name AS servername,
				s.startupline AS startup,
				s.priority AS priority,
				s.homedir AS homedir,
				s.started AS gamestarted,
				s.port AS port,
				s.ftpuser AS ftpuser,
				i.ip AS ip,				
				s.slots AS slots,
				s.cfg1name AS cfg1,
				s.cfg2name AS cfg2,
				s.cfg3name AS cfg3,
				s.cfg4name AS cfg4,
				s.cfg5name AS cfg5,
				s.cfg6name AS cfg6,
				s.cfg7name AS cfg7,
				s.cfg8name AS cfg8,
				s.cfg9name AS cfg9,
				s.cfg10name AS cfg10				
			FROM ".$this->prefix('server')." s
			LEFT OUTER JOIN ".$this->prefix('box')." b
				ON b.id = s.boxid
			LEFT OUTER JOIN ".$this->prefix('ip')." i
				ON i.id = s.ipid
			WHERE s.serverid = :server" .
			(!$this->isAllowed(ADMIN) ? ' AND b.user = :user' : '')
		);
		
		if (!$data)
		{
			return header("location: " . $this->url);
		}
		
		# Create connection
		$ssh = new SSH($data['sship'], $data['sshport']);
		if (!$ssh->ssh->login($data['sshuser'], $data['sshpass']))
		{	
			return $this->info(
				$this->language('ERROR_TITLE'),
				$this->language("S_SSH_CONNECT_FAIL"),
				'warning',
				true,
				$this->previous_page(),
				'3000'
			);
		}
		# 5 seconds is more then enough..
		$ssh->setTimeout(5);
				
		if ($action == 'start')
		{
			$sudo = $data['sudo'] ? 'sudo ' : '';		
			
			# Stop any instances...
			# CD to dir..
			# Wipe the screen
			# Log as FTP user (due log perms)
			# Start it.. 
			$cmd =
				$sudo . "screen -R ".$data['ftpuser']." -X quit; ".
				"cd ".$data['homedir']."; " . 
				$sudo."rm screenlog.0; " .				
				"su " . $data['ftpuser'] . "; " . 
				$sudo . "screen -AdmSL ".$data['ftpuser']." nice -n ".$data['priority']." ".$this->startupline($data['startup'], $data) . "\n";
			$ssh->exec($cmd."\n");
			
			# Update it
			$this->db->bind('server', $server);
			$this->db->query("UPDATE ".$this->prefix('server')." SET started=1 WHERE serverid=:server");
			
			# Log it
			$client = '<a href="'.$this->url.'servers/show/'.$this->doOffset($server) .'">' . $data['servername'] . '</a>';
			$this->log("SERVER_STARTED", 0, $data['serverid'], $data['boxid'], $client );
			
			return $this->info(
				'',
				($data['started'] ? $this->language("S_SSH_SERVER_RESTARTED") : $this->language("S_SSH_SERVER_STARTED")),
				'info',
				true,
				$this->previous_page(),
				'1800'
			);		
		}
		elseif ($action == 'stop')
		{	
			$sudo = $data['sudo'] ? 'sudo ' : '';	
					
			# Stop any instances...
			# CD to dir..
			# Wipe the screen
			# Log as FTP user (due log perms)
			# Start it.. 
			$cmd =
				$sudo . "screen -R ".$data['ftpuser']." -X quit; ".
				"cd ".$data['homedir']."; " . 
				$sudo."rm screenlog.0; ";
			$ssh->exec($cmd."\n");
			
			# Update and add in log
			$this->db->bind('server', $server);
			$this->db->query("UPDATE ".$this->prefix('server')." SET started=0 WHERE serverid=:server");
			
			# Log it
			$client = '<a href="'.$this->url.'servers/show/'.$this->doOffset($server) .'">' . $data['servername'] . '</a>';
			$this->log("SERVER_STOPPPED", 0, $data['serverid'], $data['boxid'], $client );
			
			return $this->info(
				'',
				$this->language("S_SSH_SERVER_STOPPED"),
				'info',
				true,
				$this->previous_page(),
				'1800'
			);
		}
		elseif ($action == 'restart')
		{
			$sudo = $data['sudo'] ? 'sudo ' : '';
			
			# Stop any instances...
			# CD to dir..
			# Wipe the screen
			# Log as FTP user (due log perms)
			# Start it.. 
			$cmd =
				$sudo . "screen -R ".$data['ftpuser']." -X quit; ".
				"cd ".$data['homedir']."; " . 
				$sudo."rm screenlog.0; " .				
				"su " . $data['ftpuser'] . "; " . 
				$sudo . "screen -AdmSL ".$data['ftpuser']." nice -n ".$data['priority']." ".$this->startupline($data['startup'], $data) . "\n";			
			$ssh->exec($cmd."\n");
			
			# Log it
			$client = '<a href="'.$this->url.'servers/show/'.$this->doOffset($server) .'">' . $data['servername'] . '</a>';
			$this->log("SERVER_RESTARTED", 0, $data['serverid'], $data['boxid'], $client );
				
			return $this->info(
				'',
				$this->language("S_SSH_SERVER_RESTARTED"),
				'info',
				true,
				$this->previous_page(),
				'1800'
			);
		}
		else
		{
			return header("location: " . $this->url);
		}
	}
	
	/**
	 * Console actions
	 */
	public function console_actions()
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
		
		$action = @$this->params[0];
		$target = @$this->cleanOffset($this->params[1]);
		
		if (!$action OR !$target)
		{
			return header("location: " . $this->url . 'servers');
		} 
		
		$this->db->bind('target', $target);
		if (!$this->isAllowed(ADMIN))
			$this->db->bind('user', $_SESSION['user_id']);		
		$data = $this->db->row("
			SELECT
				b.sshport AS sshport,
				b.sshuser AS sshuser,
				b.sshpass AS sshpass,
				b.ip AS sship,
				b.sudo AS sudo,
				s.ftpuser AS ftpuser,
				s.homedir AS homedir,
				s.name AS servername,
				s.serverid AS serverid,
				b.id AS boxid
			FROM
			".$this->prefix('server')." s
			LEFT OUTER JOIN ".$this->prefix('box')." b
				ON b.id = s.boxid
			WHERE s.serverid = :target" .
			(!$this->isAllowed(ADMIN) ? ' AND b.user = :user' : '')
		);
	
		if (!$data)
		{
			return header("location: " . $this->url . 'servers');
		}
		
		# Create connection
		$ssh = new SSH($data['sship'], $data['sshport']);
		if (!$ssh->ssh->login($data['sshuser'], $data['sshpass']))
		{
			return $this->info(
					$this->language('ERROR_TITLE'),
					$this->language("S_SSH_CONNECT_FAIL"),
					'warning',
					true,
					$this->previous_page(),
					'3000'
			);
		}
		# 10 seconds is more then enough..
		$ssh->setTimeout(1);
		$sudo = $data['sudo'] ? 'sudo ' : '';
		
		if ($action == "purge")
		{
			$cmd = "su " . $data['ftpuser'] . "; " . $sudo . "cat /dev/null > screenlog.0";
			$file = $ssh->exec('cd '.$data['homedir'].'; '.$cmd."\n");
			$ssh->disconnect();	
			
			return header("location: " . $this->previous_page());
		}
		elseif ($action == "download")
		{	
			$cmd = "su " . $data['ftpuser'] . "; " . $sudo . "cat screenlog.0";
			$file = $ssh->exec('cd '.$data['homedir'].'; '.$cmd."\n");
			
			@header('Content-type: text/plain');
			@header('Content-Disposition: attachment; filename="'.$data['servername'].'_'.date('Y-m-d').'.log"');
			
			echo $file;
			
			die();
			
			//return @header("location: " . $this->previous_page());
		}
		elseif ($action == "execute")
		{
			$cmd = @$_POST['command'];
			
			if (!$cmd)
			{
				return header("location: " . $this->previous_page());
			}
			
			# Intercept kill server command..
			if (strpos($cmd,'killserver') !== false)
			{
				$sudo = $data['sudo'] ? 'sudo ' : '';
				$cmd = "su " . $data['ftpuser'] . "; " . $sudo . "screen -R ".$data['ftpuser']." -X quit"."\n";
				$ssh->exec($cmd."\n");
					
				# Update and add in log
				$this->db->bind('server', $target);
				$this->db->query("UPDATE ".$this->prefix('server')." SET started=0 WHERE serverid=:server");
							
				# Log it
				$client = '<a href="'.$this->url.'servers/show/'.$this->doOffset($target) .'">' . $data['servername'] . '</a>';
				$this->log("SERVER_STOPPPED", 0, $data['serverid'], $data['boxid'], $client );
				
				return header("location: " . $this->previous_page());
			}
						
			$cmd = "su " . $data['ftpuser'] . "; " . $sudo . "screen -S ".$data['ftpuser']." -p 0 -X stuff \"".$cmd."\"`echo -ne '\015'`";
			$ssh->exec($cmd."\n");
			
			$ssh->disconnect();
						
			return header("location: " . $this->previous_page());
		}
		else
		{
			return header("location: " . $this->url . 'servers');
		}
	}
	
	/**
	 * FTP related actions
	 */
	public function ftp_actions()
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
		
		$server = @$this->cleanOffset($this->params[0]);
		$action = @$this->params[1];
		
		if (!$server OR !$action)
		{
			return header("location: " . $this->url . 'servers');
		}
		
		$this->db->bind('server', $server);
		if (!$this->isAllowed(ADMIN))
			$this->db->bind('user', $_SESSION['user_id']);
		$data = $this->db->row("
			SELECT
				s.serverid AS id,
				s.ftpuser,
				b.ftpport,
				s.ftpuser,
				s.ftppass,
				i.ip AS ftpip,
				b.ftppassive AS passive
			FROM ".$this->prefix('server')." s
			LEFT OUTER JOIN ".$this->prefix('users')." u
				ON u.id = s.clientid
			LEFT OUTER JOIN ".$this->prefix('game')." g
				ON g.id = s.game
			LEFT OUTER JOIN ".$this->prefix('ip')." i
				ON i.id = s.ipid
			LEFT OUTER JOIN ".$this->prefix('box')." b
				ON b.id = s.boxid
			WHERE s.serverid = :server" .
			(!$this->isAllowed(ADMIN) ? ' AND b.user = :user' : '')
			);
		
		if (!$data)
		{
			return header("location: " . $this->url.'servers');
		}
		
		$ftp = new FTP($data['ftpip'], $data['ftpport']);
		
		if (!$ftp->ftp_login($data['ftpuser'], $data['ftppass']))
		{
			return $this->info(
				'',
				$this->language("S_FTP_CONNECTION_FAIL"),
				'warning',
				true,
				$this->previous_page(),
				'3000'
			);
		}
		
		# Sort passive mode
		ftp_pasv($ftp->conn, $data['passive']);
		
		
		#
		# Now do the magic..
		#		
		
		# Edit file
		if ($action == "edit")
		{	
			if (@!$this->params[3])
			{
				$dir = "./";
			} 
			else
			{
				$dir = @$this->params[2];
				
				$dir = explode("_", $dir);
				$dir = implode("/", $dir) . '/';
				
			}
			
			if (@!$this->params[3])
				$file = $this->params[2];
			else
				$file = $this->params[3]; 
		
			$out = $file;
			
			// try to download $server_file and save to $local_file
			if (!ftp_get($ftp->conn, $out, $dir . $file, FTP_ASCII))
			{
				return $this->info(
					'',
					$this->language("S_FTP_DOWNLOAD_FAIL"),
					'warning',
					true,
					$this->previous_page(),
					'3000'
				);
			}
						
			$arr = array(
				'content' => file_get_contents($out),
				'backto' => $this->url . 'servers/webftp/' . $this->doOffset($server),
				'holder' => base64_encode($this->doOffset($server).'/'.$dir.$file),
				'id' => $this->doOffset($server)		
			);
			
			# Delete file..
			unlink($out);
			
			return $this->render('../admin/webftpview', $this->arrs($arr));
		}
		# Save edite file
		elseif($action == "save")
		{
			$content = @strip_tags($_POST['content']);
			$holder = @$_POST['holder'];
			
			if (!$holder)
			{
				return header("location: " . $this->url.'servers');
			}
			
			$holder = explode('/', base64_decode($holder));
			$server = @$this->cleanOffset($holder[0]);
			$holder = array_splice($holder, 1);
			
			# Sort path and file
			if (is_array($holder))
			{
				$file = array_pop($holder);				
				if (count($holder) > 1)
					$path = '/'.implode('/', $holder);
				else
					$path = '/'.$holder[0];
			}
			else 
			{
				$file = $holder[0];	
				$path = "./";
			}
									
			# Get to right directory..
			if ($path)
				ftp_chdir($ftp->conn, $path);
			
			//$temp = file_put_contents($file,$content);
			
			$fh = fopen($file, 'a');
			fwrite($fh, $content);
			fclose($fh);
			
			if (!ftp_put($ftp->conn, $file, $file, FTP_ASCII))
			{
				return $this->info(
					'',
					$this->language("S_FTP_ACTION_FAILED"),
					'warning',
					true,
					$this->url . 'servers/webftp/' . $this->doOffset($server),
					'3000'
				);
			}
		
			unlink($fh);
			
				
			ftp_close($ftp->conn);
			
			return header("location: " . $this->previous_page());
		}
		# Delete file
		elseif($action == "delete")
		{
			if (@!$this->params[3])
			{
				$dir = "./";
			}
			else
			{
				$dir = @$this->params[2];
			
				$dir = explode("_", $dir);
				$dir = implode("/", $dir) . '/';
			
			}
				
			if (@!$this->params[3])
				$file = $this->params[2];
			else
				$file = $this->params[3];
			
			# Delete file
			if (@!ftp_delete($ftp->conn, $dir . $file))
			{	
				# If it fails it may be a directory				
				if (@!ftp_rmdir($ftp->conn, $dir . $file))
					return $this->info(
						'',
						$this->language("S_FTP_ACTION_FAILED"),
						'warning',
						true,
						$this->previous_page(),
						'3000'
					);
			}
			
			ftp_close($ftp->conn);
			
			return header("location: " . $this->previous_page());
		}
		# Download file
		elseif($action == "download")
		{	
			/*
			if (@!$this->params[3])
			{
				$dir = "./";
			} 
			else
			{
				$dir = @$this->params[2];
				
				$dir = explode("_", $dir);
				$dir = implode("/", $dir) . '/';
				
			}
			
			if (@!$this->params[3])
				$file = $this->params[2];
			else
				$file = $this->params[3]; 
		
			$out = $file;
			
			// try to download $server_file and save to $local_file
			if (!ftp_get($ftp->conn, $out, $dir . $file, FTP_BINARY))
			{
				return $this->info(
					'',
					$this->language("S_FTP_DOWNLOAD_FAIL"),
					'warning',
					true,
					$this->previous_page(),
					'3000'
				);
			}
			
			@header('Content-type: application/octet-stream');
			@header('Content-Length: ' . filesize($out));
			@header('Content-Disposition: attachment; filename="'.$file.'"');
			readfile($out);
				
			//echo $file;			
			ftp_close($ftp->conn);
			
			# Delete file..
			unlink($out);
			die();
			*/
			
			# To F annoying.. FIXME :: Finish this bs..
			return header("location: " . $this->previous_page());
		}
		# Upload file
		elseif($action == "upload")
		{
			$file = @$_FILES["file"]["name"];
			$temp = @$_FILES["file"]["tmp_name"]; 
			$path = @$_POST['path'];
			if (!$file)
			{
				return header("location: " . $this->previous_page());
			}
				
			# Sort directory path..
			if (!$path)
			{
				$path = "";
			}
			else
			{
				$path = explode("_", $path);
				$path = implode("/", $path);
			}
			
			# Get to right directory..
			if ($path)
				ftp_chdir($ftp->conn, $path);
			
			if (!ftp_put($ftp->conn, $file, $temp, FTP_BINARY))
			{
				return $this->info(
					'',
					$this->language("S_FTP_ACTION_FAILED"),
					'warning',
					true,
					$this->previous_page(),
					'3000'
				);
			}
			
			ftp_close($ftp->conn);
					
			return header("location: " . $this->previous_page());
		}
		# Mkdir
		elseif($action == "mkdir")
		{
			$dir = @$_POST['mkdir'];
			$path = @$_POST['path'];			
			if (!$dir OR !ctype_alnum($dir))
			{
				return header("location: " . $this->previous_page());
			}
			
			# Sort directory path..
			if (!$path)
			{
				$path = "";
			}
			else
			{
				$path = explode("_", $path);
				$path = implode("/", $path);
			}
			
			if (!ftp_mkdir($ftp->conn, $path . $dir)) 
			{
				return $this->info(
					'',
					$this->language("S_FTP_ACTION_FAILED"),
					'warning',
					true,
					$this->previous_page(),
					'3000'
				);
			}
			
			ftp_close($ftp->conn);
			
			return header("location: " . $this->previous_page());
		}
	}
	
	/**
	 * Edits server
	 */
	public function update()
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
		
		$server = @$this->cleanOffset($this->params[0]);
		$type = @$this->params[1];
		
		if (!$server OR !$type)
		{
			return header("location: " . $this->url . 'servers');
		}
		
		# Do an extra check for resellers..
		if (!$this->isAllowed(ADMIN))
		{
			$this->db->bind("server", $server);
			$this->db->bind("user", $_SESSION['user_id']);
			$this->db->bind("server2", $server);
			$this->db->bind('owner', $_SESSION['user_id']);
			
			$check = $this->db->row("
				SELECT
					b.id 
				FROM ".$this->prefix('server')." s
				LEFT OUTER JOIN ".$this->prefix('box')." b
					ON b.id = s.boxid
				WHERE s.serverid = :server AND b.user = :user
					OR s.serverid = :server2 AND s.owner = :owner 			
			");
			
			# Incorrect owner..
			if (!$check)
			{
				return header("location: " . $this->url . 'servers');
			}
		}
		
		if ($type == 'general')
		{	
			$do = $this->db->query(
				# Builds SQL syntax
				$this->forms->sqlUpdate($this->forms->bindList($_POST['game']), $this->prefix('server'), 'WHERE serverid = :server'),
				# Builds Bind list
				$this->forms->bindList($_POST['game'], array('server' => $server))
			);
			
			//if ($do)
			//{
				return $this->info(
					'',
					$this->language("S_SETTINGS_UPDATED"),
					'info',
					true,
					$this->url .'servers/manage/' .$this->doOffset($server),
					'1400'
				);
			/*}
			else
			{	
				return $this->info(
					'',
					$this->language("S_FTP_ACTION_FAILED"),
					'warning',
					true,
					$this->url .'servers/manage/' .$this->doOffset($server),
					'3000'
				);
			}
			*/
		}
		elseif ($type == 'advanced')
		{
			# Hacks
			$_POST['adv']['ipid_str'] = @$this->cleanOffset($_POST['adv']['ipid_str']);
			$_POST['adv']['clientid_int'] = @$this->cleanOffset($_POST['adv']['clientid_int']);
			
			$do = $this->db->query(
					# Builds SQL syntax
				$this->forms->sqlUpdate($this->forms->bindList($_POST['adv']), $this->prefix('server'), 'WHERE serverid = :server'),
				# Builds Bind list
				$this->forms->bindList($_POST['adv'], array('server' => $server))
			);
		
			return $this->info(
				'',
				$this->language("S_SETTINGS_UPDATED"),
				'info',
				true,
				$this->url .'servers/manage/' .$this->doOffset($server),
				'1400'
			);
		}
		else
		{
			return header("location: " . $this->url . 'servers');
		}
	}
}
