<?php
# Disallow direct access
if (!_ROUTING_)	die("Error (NO ROUTING) :: Direct access not allowed...");

/**
 * Client server handling
 * 
 * Deals with clients only
 */
class serverController extends API
{	
	/**
	 * Static errors (if empty)
	 */
	private function arrs($arr=false)
	{
		$static = array(		
			'PRINT_TITLE' => $this->language('ERROR_TITLE'),
			'PRINT_CSS' => 'error',
			'PRINT_MSG' => $this->language('ERROR_NOTFOUND'),
				
			# Language
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
			# Manage			
			'WEBFTP'	=> $this->language('S_WEBFTP'),
			'CONSOLE' => $this->language('S_CONSOLE'),
			'SERVER_SETTINGS' => $this->language('S_SERVER_SETTINGS'),
			'SLOTS' => $this->language('S_SLOTS'),
			'TYPE' => $this->language('S_TYPE'),
			'SAVE' => $this->language('SAVE'),
			'GAME' => $this->language('S_GAME'),
			'SERVER_PROPERTIES' => $this->language('S_SERVER_PROPERTIES'),
			'NAME' => $this->language('S_NAME'),
			'EXPIRES' => $this->language('S_EXPIRES'),
			'IP' => $this->language('S_IP'),
			'PORT' => $this->language('S_PORT'),
			'LOCATION' => $this->language('S_LOCATION'),
			'FTP_IP'	=> $this->language('S_FTP_IP'),
			'FTP_PORT' => $this->language('S_FTP_PORT'),
			'FTP_USER' => $this->language('S_FTP_USER'),
			'FTP_PASSWORD' => $this->language('S_FTP_PASSWORD'),
			'STATUS' => $this->language('S_STATUS'),
			'REFRESH' => $this->language('REFRESH'),
			'PUBLIC' => $this->language('G_PUBLIC'),
			'PRIVATE' => $this->language('G_PRIVATE'),
			'PENDING' => $this->language('S_PENDING'),
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
	 * Show's server
	 */
	public function show()
	{
		if ($this->isAllowed(RESELLER))
			return header("location: " . $this->url.'servers' );
		
		# Server
		$server = @$this->cleanOffset($this->params[0]);		
		if (!$server)
		{
			return header("location: " . $this->url . 'server');
		}
		
		$this->db->bind('id', $server);
		$this->db->bind('client', $_SESSION['user_id']);
		$data = $this->db->row("
			SELECT 
				s.serverid AS id,
				s.boxid AS boxid,
				s.slots AS slots,
				s.type AS type,
				s.name AS name,
				b.location AS location,
				i.ip AS ip,
				s.ftpuser AS ftpuser,
				s.ftppass AS ftppass,
				b.ftpport AS ftpport,
				s.started AS started,
				s.port AS port,
				g.name AS game,
				g.version AS version,
				g.querycode AS querycode,
				s.cfg1,	s.cfg1name, s.cfg1edit,
				s.cfg2,	s.cfg2name, s.cfg2edit,
				s.cfg3,	s.cfg3name, s.cfg3edit,
				s.cfg4,	s.cfg4name, s.cfg4edit,
				s.cfg5,	s.cfg5name, s.cfg5edit,
				s.cfg6,	s.cfg6name, s.cfg6edit,
				s.cfg7,	s.cfg7name, s.cfg7edit,
				s.cfg8,	s.cfg8name, s.cfg8edit,
				s.cfg9,	s.cfg9name, s.cfg9edit,
				s.cfg10, s.cfg10name, s.cfg10edit				
			FROM ".$this->prefix('server')." s
			LEFT OUTER JOIN ".$this->prefix('box')." b
				ON b.id = s.boxid
			LEFT OUTER JOIN ".$this->prefix('ip')." i
				ON i.id = s.ipid
			LEFT OUTER JOIN ".$this->prefix('game')." g
				ON g.id = s.game
			WHERE s.serverid = :id AND s.clientid = :client		
		");
				
		if (!$data)
		{
			return header("location: " . $this->url);
		}
		
		# Server Query
		$q = new Query($data['name'], $data['querycode'], $data['ip'], $data['port']);
		$serverData = $q->data();
		
		$arr = array(
			'data' => $data,	
			'serverData' => $serverData
		);
		
		$this->render('server', $this->arrs($arr));
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
		if ($this->isAllowed(RESELLER))
			return header("location:" . $this->url.'admin' );
		
		$server = @$this->cleanOffset($this->params[0]);
		
		if (!$server)
		{
			return header('location: ' . $this->url . 'servers');
		}
		
		$this->db->bind('server', $server);
		$this->db->bind('client', $_SESSION['user_id']);
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
			WHERE s.serverid = :server AND s.clientid = :client
		");
		
		if (!$data)
		{
			return header("location: " . $this->url.'server');
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
		
		$this->render('webftp', $this->arrs($arr));
	}
	
	/**
	 * Game console
	 */
	public function console()
	{
		if ($this->isAllowed(RESELLER))
			return header("location:" . $this->url.'admin' );
		
		$server = @$this->cleanOffset($this->params[0]);
		if (!$server)
		{
			return header('Location: ' . $this->url .'server');
		}
		
		$this->db->bind('server', $server);
		$this->db->bind('client', $_SESSION['user_id']);
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
			WHERE s.serverid = :server AND s.clientid =:client 
		");
		
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
				$this->url . 'server/show/' . $this->doOffset($server),
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
		
		$this->render('webconsole', $this->arrs($arr));
	}	
	
	/**
	 * 
	 * Actions
	 * 
	 */
	
	/**
	 * Save settings
	 */
	public function edit_config()
	{
		if ($this->isAllowed(RESELLER))
			return header("location:" . $this->url );
		
		# Array
		$game = @$_POST['game'];
		$server = @$this->cleanOffset($this->params[0]);
		
		if (!$game OR !$server)
		{
			return header("location: " . $this->url);
		}
		
		# Construct fields..
		$fields = '';			
		foreach ($game AS $out => $key)
		{	
			$colon = ( (next($game) === false) ? '' : ', ');
			
			$fields .= "cfg".(int)$out."name= CASE WHEN cfg".(int)$out."edit=1 
					   THEN :field".(int)$out." ELSE cfg".(int)$out."name END" .$colon;
			
			# Get rid or any SQL crap..
			$this->db->bind('field' . (int)$out, $this->xss($key)); 
		}
		
		# Now give it a shot..
		$this->db->bind('server', $server);
		$this->db->bind('client', $_SESSION['user_id']);
		$do = $this->db->query("
			UPDATE ".$this->prefix('server')." SET ".$fields." WHERE serverid = :server AND clientid =:client 		
		");
		
		if ($do)
		{
			return $this->info(
				'',
				$this->language("CHANGES_SAVED_OK"),
				'info',
				true,
				$this->previous_page(),
				'1400'
			);
		}
		
		# Otherwise just go back to page..
		return header("location: " . $this->previous_page());
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
	 * Server Actions (Stop/Restart/Start)
	 */
	public function actions()
	{
		if ($this->isAllowed(RESELLER))
			return header("location:" . $this->url );
	
		$action = @$this->params[0];
		$server = @$this->cleanOffset($this->params[1]);
	
		if (!$action OR !$server)
		{
			return header("location: " . $this->url);
		}
	
		$this->db->bind('server', $server);
		$this->db->bind('client', $_SESSION['user_id']);
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
			WHERE s.serverid = :server AND s.clientid = :client
		");
	
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
			$this->db->bind('client', $_SESSION['user_id']);
			$this->db->query("UPDATE ".$this->prefix('server')." SET started=1 WHERE serverid=:server AND clientid = :client");
			
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
			$cmd =
				$sudo . "screen -R ".$data['ftpuser']." -X quit; ".
				"cd ".$data['homedir']."; " . 
				$sudo."rm screenlog.0; ";
			$ssh->exec($cmd."\n");
						
			# Update and add in log
			$this->db->bind('server', $server);
			$this->db->bind('client', $_SESSION['user_id']);
			$this->db->query("UPDATE ".$this->prefix('server')." SET started=0 WHERE serverid=:server AND clientid = :client");
				
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
	 * FTP related actions
	 */
	public function ftp_actions()
	{
		if ($this->isAllowed(RESELLER))
			return header("location:" . $this->url );
	
		$server = @$this->cleanOffset($this->params[0]);
		$action = @$this->params[1];
	
		if (!$server OR !$action)
		{
			return header("location: " . $this->url . 'servers');
		}
	
		$this->db->bind('server', $server);
		$this->db->bind('client', $_SESSION['user_id']);
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
			WHERE s.serverid = :server AND s.clientid = :client
		");
	
		if (!$data)
		{
			return header("location: " . $this->url.'server');
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
				'backto' => $this->url . 'server/webftp/' . $this->doOffset($server),
				'holder' => base64_encode($this->doOffset($server).'/'.$dir.$file),
				'id' => $this->doOffset($server)
			);
							
			# Delete file..
			unlink($out);
							
			return $this->render('webftpview', $this->arrs($arr));
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
					$this->url . 'server/webftp/' . $this->doOffset($server),
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
	 * Console actions
	 */
	public function console_actions()
	{
		if ($this->isAllowed(RESELLER))
			return header("location:" . $this->url );
	
		$action = @$this->params[0];
		$target = @$this->cleanOffset($this->params[1]);
	
		if (!$action OR !$target)
		{
			return header("location: " . $this->url . 'server');
		}
	
		$this->db->bind('target', $target);
		$this->db->bind('client', $_SESSION['user_id']);
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
			FROM ".$this->prefix('server')." s
			LEFT OUTER JOIN ".$this->prefix('box')." b
				ON b.id = s.boxid
			WHERE s.serverid = :target AND s.clientid = :client
		");
	
		if (!$data)
		{
			return header("location: " . $this->url . 'server');
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
				
			echo readfile($file);
				
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
}
