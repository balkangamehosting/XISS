<?php
# Disallow direct access
if (!_ROUTING_)	die("Error (NO ROUTING) :: Direct access not allowed...");

/**
 * Configuration
 * 
 * @desc Script Settings
 */
class configurationController extends API
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
			## Add a Game
			'ADDGAME' => $this->language('G_ADDGAME'),
			'GAME_DETAILS' => $this->language('G_GAME_DETAILS'),
			'NAME' => $this->language('G_NAME'),
			'GAME' => $this->language('G_GAME'),
			'VERSION' => $this->language('G_VERSION'),
			'STATUS' => $this->language('G_STATUS'),
			'ACTIVE' => $this->language('G_ACTIVE'),
			'INACTIVE' => $this->language('G_INACTIVE'),
			'GAME_SETTINGS' => $this->language('G_GAME_SETTINGS'),
			'PRIORITY' => $this->language('G_PRIORITY'),
			'MAXSLOTS' => $this->language('G_MAXSLOTS'),
			'TYPE' => $this->language('G_TYPE'),
			'PUBLIC' => $this->language('G_PUBLIC'),
			'PRIVATE' => $this->language('G_PRIVATE'),
			'ALLOW_CLIENT' => $this->language('G_ALLOW_CLIENT'),
			'STARTUP_LINE' => $this->language('G_STARTUP_LINE'),
			'GAME_QUERY' => $this->language('G_GAME_QUERY'),
			'QUERY_CODE' => $this->language('G_QUERY_CODE'),
			'QUERY_PORT' => $this->language('G_QUERY_PORT'),
			'GAME_PROPERTIES' => $this->language('G_GAME_PROPERTIES'),
			'DEFAULT_PORT' => $this->language('G_DEFAULT_PORT'),
			'INSTALL_PATH' => $this->language('G_INSTALL_PATH'),
			'ADD' => $this->language('ADD'),
			'BACK_TO_GAMES' => $this->language('GAMES_BACKTO'),
			'PRIORITY_MAX' =>		$this->language('G_PRIORITY_MAX'),
			'PRIORITY_NORMAL' => 	$this->language('G_PRIORITY_NORMAL'),
			'PRIORITY_MIN'	=>	$this->language('G_PRIORITY_MIN'),
			'G_TYPE'	=> $this->language('G_TYPE'),
			## Games
			'ADD_A_GAME' => $this->language('ADD_A_GAME'),
			'GAMES' => $this->language('G_GAMES'),
			'RECORDS_FOUND' => $this->language('G_RECORDS_FOUND'),
			'SLOTS_AVAILABLE' => $this->language('G_SLOTS_AVAILABLE'),
			'QUERY' => $this->language('G_QUERY'),
			'DIRECTORY' =>	$this->language('G_DIRECTORY'),
			'SLOTS_FREE' =>  	$this->language('G_SLOTS_FREE'),
			## Manage Game
			# Re-Using mostly ADD-BOX vars..
			'SAVE'	=> 	$this->language('SAVE'),
			'MANAGE' => $this->language('G_MANAGE'),
			## Cron jobs
			'CRON_SETTINGS' => $this->language('CRON_SETTINGS'),
			'CRON_INFO' => $this->language('CRON_INFO'),
			'CRON_TITLE' => $this->language('CRON_TITLE'),
			'CRON_PACKAGES' => $this->language('CRON_PACKAGES'),
			## Email
			'EMAIL_TEMPLATE' => $this->language('EMAIL_TEMPLATE'),
			'EMAIL_SETTINGS' => $this->language('EMAIL_SETTINGS'),
			'EMAIL_TITLE' =>	$this->language('EMAIL_TITLE'),
			'EMAIL_SUBJECT' =>	$this->language('EMAIL_SUBJECT'),
			'EMAIL_MESSAGE'	=>	$this->language('EMAIL_MESSAGE'),
			'EMAIL_SHORTCODES' => $this->language('EMAIL_SHORTCODES'),
			'SAVE' => $this->language('SAVE'),
			## General
			'SET_GENERAL' => $this->language('SET_SETTINGS'),
			'SET_PANEL_SETTINGS' => $this->language('SET_PANEL_SETTINGS'),
			'SET_PANEL'	=> $this->language('SET_PANEL'),
			'SET_PANEL_NAME' => $this->language('SET_PANEL_NAME'),
			'SET_PANEL_URL' => $this->language('SET_PANEL_URL'),
			'SET_TEMPLATE'	=> $this->language('SET_TEMPLATE'),
			'SET_LANGUAGE' => $this->language('SET_LANGUAGE'),
			'SET_PUBLIC_REPOSITORY' => $this->language('SET_PUBLIC_REPOSITORY'),
			'SET_CHECK_FOR_UPDATES' => $this->language('SET_CHECK_FOR_UPDATES'),
			'SET_EMAIL' =>	$this->language('SET_EMAIL'),
			'SET_EMAIL_SUPPORT' => $this->language('SET_EMAIL_SUPPORT'),
			'SET_EMAIL_NOREPLY' => $this->language('SET_EMAIL_NOREPLY'),
			'SET_GENERAL'	=> $this->language('SET_GENERAL'),
			'SET_GEOIP_LANGUAGE'	=> $this->language('SET_GEOIP_LANGUAGE'),
			'SET_GEOIP_LANGUAGE_DESC' => $this->language('SET_GEOIP_LANGUAGE_DESC'),
			'SET_GEOIP_IPV6'		=> $this->language('SET_GEOIP_IPV6'),
			'SET_GEOIP_IPV6_DESC'	=> $this->language('SET_GEOIP_IPV6_DESC'),
			'SET_SMARTY_CACHING'	=> $this->language('SET_SMARTY_CACHING'),
			'SET_SHOW_STATS'		=> $this->language('SET_SHOW_STATS'),
			'ENABLED'			=> $this->language('SET_ENABLED'),
			## License
			'LICENSE' => $this->language('LIC_LICENSE'),
			'INFORMATION' => $this->language('LIC_INFORMATION'),
			'REGISTERED_TO' => $this->language('LIC_REGISTERED_TO'),
			'TYPE' => $this->language('LIC_TYPE'),
			'ALLOWED_BOXES' => $this->language('LIC_ALLOWED_BOXES'),
			'USED' => $this->language('LIC_USED'),
			'BRANDING' => $this->language('LIC_BRANDING'),
			'VALID_DOMAIN' => $this->language('LIC_VALID_DOMAIN'),
			'VALID_IP' => $this->language('LIC_VALID_IP'),
			'CREATED' => $this->language('LIC_CREATED'),
			'EXPIRES' => $this->language('LIC_EXPIRES'),
			'VERSION' => $this->language('LIC_VERSION'),
			'LAST_UPDATE' => $this->language('LIC_LAST_UPDATE'),
			'LICENSE_SETTINGS' => $this->language('LIC_LICENSE_SETTINGS'),
			'COPY_LICENSE' => $this->language('LIC_COPY_LICENSE'),
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
		return header("location: " . $this->url.'configuration/general');
	}
	
	/**
	 * Flattens array
	 * @param array $array
	 * @return array
	 * @link http://stackoverflow.com/questions/526556/how-to-flatten-a-multi-dimensional-array-to-simple-one-in-php
	 */
	private function array_flatten_recursive($array) 
	{
		if (!$array) return false;
		$flat = array();
		$RII = new RecursiveIteratorIterator(new RecursiveArrayIterator($array));
		foreach ($RII as $value) $flat[] = $value;
		return $flat;
	}
	
	/**
	 * Builds templates
	 */
	private function buildTemplates()
	{
		$dirs = glob('templates/*' , GLOB_ONLYDIR);
		
		# Sort templates..
		# Admin
		if (in_array('templates/admin', $dirs))
		{
			$match = array_search('templates/admin', $dirs);
			unset($dirs[$match]);
		}
		
		# Blog (For later on)
		if (in_array('templates/blog', $dirs))
		{
			$match = array_search('templates/blog', $dirs);
			unset($dirs[$match]);
		}

		# Needs to get rid of main directory..
		$data = array();
		foreach ($dirs AS $k => $v)
			$data[] = explode("/", $v); 
		
		# Flatten array
		$data = $this->array_flatten_recursive($data);
		
		# Gets rid or main directory..
		$data = array_unique($data);
		
		# Remove last "templates" match..
		if (in_array('templates', $data))
		{
			$match = array_search('templates', $data);
			unset($data[$match]);
		}
		
		# Returns cleaned list so selects can be fixed..
		return $data;
	}

	/**
	 * General settings
	 */
	public function general()
	{	
		if (!$this->isAllowed(ADMIN))
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
		
		$data = $this->db->row(" SELECT * FROM ".$this->prefix('general')." ");
		
		$arr = array(
			'data' => $data,
			'templateList' => $this->buildTemplates()
		);
		
		$this->render('../admin/general', $this->arrs($arr));
	}
	
	/**
	 * Games
	 */
	public function games()
	{
		if (!$this->isAllowed(ADMIN))
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
				id,
				name,
				version,
				slots,
				querycode,
				installdir
			FROM ".$this->prefix('game')."
			ORDER BY name ASC
		";
		
		# Pagination
		$paginate = new Pagination();
		
		# Pagination
		$total = $this->db->countRows($sql);
		
		$pages = $paginate->limit(@$this->params[0], @$this->params[1], $total);
		
		# Query
		$data = $this->db->query($sql . $pages);
		
		$arr = array(
			'data' => $data,
			'pagination' => $paginate->layout($total)
		);
		
		$this->render('../admin/games', $this->arrs($arr));
	}
	
	/**
	 * Email
	 */
	public function email()
	{
		if (!$this->isAllowed(ADMIN))
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
		
		$this->render('../admin/email', $this->arrs());
	}
	
	/**
	 * License
	 */
	public function license()
	{
		if (!$this->isAllowed(ADMIN))
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
		
		$this->render('../admin/syslicense', $this->arrs());
	}
	
	/**
	 * Cron
	 */
	public function cron()
	{
		if (!$this->isAllowed(ADMIN))
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
		
		//$path = getcwd();		
		$path = 'curl ' . $this->url . 'configuration/cronjob_stats'.(CRON ? '/'.CRON : '') . ' >/dev/null 2>&1';
		
		$package = 'curl ' . $this->url . 'configuration/cronjob_accounts'.(CRON ? '/'.CRON : '') . ' >/dev/null 2>&1';
		
				
		$arr = array(
			'path' => $path,
			'packages' => $package
		);
		
		$this->render('../admin/cron', $this->arrs($arr));
	}
	
	/**
	 * Add a game
	 */
	public function add_game()
	{
		if (!$this->isAllowed(ADMIN))
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
		
		$this->render('../admin/addgame', $this->arrs());
	}
	
	/**
	 * Manage game
	 */
	public function manage_game()
	{
		if (!$this->isAllowed(ADMIN))
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
		
		$game = @$this->cleanOffset($this->params[0]);
		if (!$game)
		{
			return header('location: ' . $this->url . 'configuration/games');
		}
		
		$this->db->bind("game", $game);
		$data = $this->db->row("SELECT * FROM ".$this->prefix('game')." WHERE id=:game ");
		
		if (!$data)
		{
			return header("location: " . $this->url . 'configuration/games');
		}
		
		$arr = array(
			'data' => $data		
		);
		
		$this->render('../admin/manageGame', $this->arrs($arr));
	}
	
	/**
	 * 
	 * Actions
	 * 
	 */
	
	/**
	 * Submit game
	 */
	public function submit_game()
	{
		if (!$this->isAllowed(ADMIN))
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
		
		if (
			@!$_POST['game']['name_str'] OR
			@!$_POST['game']['version_str'] OR
			@!$_POST['game']['slots_int'] OR
			@!$_POST['game']['startupline_str'] OR
			@!$_POST['game']['querycode_str'] OR
			@!$_POST['game']['queryport_int'] OR 
			@!$_POST['game']['defaultport_int'] OR
			@!$_POST['game']['installdir_str'] 
		)
		{				
			return $this->info(
				'',
				$this->language("MISSING_FIELDS"),
				'warning',
				true,
				$this->url . 'configuration/add_game',
				'3000'
			);
		}
		
		# A hack..
		if (@!$_POST['game']['priority_int'])
			$_POST['game']['priority_int'] = 0;
		
		$do = $this->db->query(
			# Builds SQL syntax
			$this->forms->sqlInsert($this->forms->bindList($_POST['game']), $this->prefix('game')),
			# Builds Bind list
			$this->forms->bindList($_POST['game'])
		);
		
		if ($do)
		{
			
			$this->log("GAME_ADDED", 0, 0, 0, $_POST['game']['name_str']);
			
			return $this->info(
				'',
				$this->language("G_GAME_ADDED_SUCCESS"),
				'info',
				true,
				$this->url . 'configuration/games',
				'1800'
			);
		}
		else
		{
			return $this->info(
				'',
				$this->language("G_GAME_ADDED_FAIL"),
				'warning',
				true,
				$this->url . 'configuration/add_game',
				'3000'
			);
		}
	}
	
	/**
	 * Edit game
	 */
	public function edit_game()
	{
		if (!$this->isAllowed(ADMIN))
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
		
		$id = @$this->cleanOffset($_POST['gameid']);
		if (!$id)
		{
			return header("location: " .$this->url.'configuration/games');
		}
	
		if (
				@!$_POST['game']['name_str'] OR
				@!$_POST['game']['version_str'] OR
				@!$_POST['game']['slots_int'] OR
				@!$_POST['game']['startupline_str'] OR
				@!$_POST['game']['querycode_str'] OR
				@!$_POST['game']['queryport_int'] OR
				@!$_POST['game']['defaultport_int'] OR
				@!$_POST['game']['installdir_str']
			)
		{	
			return $this->info(
				'',
				$this->language("MISSING_FIELDS"),
				'warning',
				true,
				$this->url . 'configuration/manage_game/'.$this->doOffset($id),
				'3000'
			);
		}
		
		# A hack..
		if (@!$_POST['game']['priority_int'])
			$_POST['game']['priority_int'] = 0;
	
		$do = $this->db->query(
			# Builds SQL syntax
			$this->forms->sqlUpdate($this->forms->bindList($_POST['game']), $this->prefix('game'), "WHERE id=:id"),
			# Builds Bind list
			$this->forms->bindList($_POST['game'], array("id" => $id ))
		);
	
		/*if ($do)
		{
		*/	$this->log("GAME_EDITED", 0, 0, 0, $_POST['game']['name_str']);
			
			return $this->info(
				'',
				$this->language("G_GAME_EDITED_SUCCESS"),
				'info',
				true,
				$this->url . 'configuration/manage_game/'.$this->doOffset($id),
				'1800'
			);
		/*}
		else
		{
			return $this->info(
				'',
				$this->language("G_GAME_EDITED_FAIL"),
				'warning',
				true,
				$this->url . 'configuration/manage_game/'.$this->doOffset($id),
				'3000'
			);
		}*/
	}
	
	/**
	 * Save general settings
	 */
	public function edit_general()
	{
		if (!$this->isAllowed(ADMIN))
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
		
		# Empty table first.. since general is 1 row only..
		$clear = $this->db->query("TRUNCATE TABLE ".$this->prefix('general')."");		
		
		$do = $this->db->query(
			# Builds SQL syntax
			$this->forms->sqlInsert($this->forms->bindList($_POST['script']), $this->prefix('general')),
			# Builds Bind list
			$this->forms->bindList($_POST['script'])
		);
		
		# If it came so far it worked..
		if ($do)
			return $this->info(
				'',
				$this->language("CHANGES_SAVED_OK"),
				'success',
				true,
				$this->previous_page(),
				'1200'
			);
		else # If there's nothing to update, it will always return 0..
			return header("Location: " . $this->previous_page());
	}
	
	/**
	 * User friendly file size output
	 *
	 * @param integer $in
	 * @return string
	 */
	private function sortSize($in)
	{
		$units = array('B' => 0, 'KB' => 1, 'MB' => 2, 'GB' => 3, 'TB' => 4,
				'PB' => 5, 'EB' => 6, 'ZB' => 7, 'YB' => 8);
	
		if ($in < 1024)
			return $in." Bytes";
		elseif ($in < 1048576)
			return round($in/1024,2)." Kb";
		else
			return round($in/1048576,2)." Mb";
	}
	
	/**
	 * A cronjob to sort accounts
	 * 
	 * FIXME: Add members if there's a package for them (later on)
	 */
	public function cronjob_accounts()
	{
		$pass = @$this->params[0];
		
		# See if request is legit..
		if ($pass != CRON)
		{
			return;
		}
		
		$this->db->bind('group', RESELLER);
		$data = $this->db->query("
			SELECT
				u.*,
				p.expires,
				(p.expires - INTERVAL 5 DAY) AS will_expire
			FROM ".$this->prefix('users')." u
			LEFT OUTER JOIN ".$this->prefix('packages')." p
				ON u.id = p.user
			WHERE u.group = :group		
		");
		
		# Bail out..
		if (!$data)
		{
			return;
		}
		
		foreach($data AS $out => $key)
		{	
			if (DEBUG)
				echo "Doing check for :: " . $out . "\n";
			
			# Account has expired so suspend it along with all clients..
			$i = 0;
			if ($data[$out]['expires'] < date("Y-m-d") && !$data[$out]['suspended'])
			{
				$this->db->bind("client", $data[$out]['id']);
				$this->db->bind("owner", $data[$out]['id']);
				$this->db->query("UPDATE ".$this->prefix('users')." SET suspended=1 WHERE id=:client OR parent=:owner");
				
				$i++;
			}
			
			if (DEBUG)
				echo "Suspended Accounts  :: " . $i . "\n";
			
			# Send mail 1 week before expiring
			$e = 0;			
			if ($data[$out]['will_expire'] > date("Y-m-d") && !$data[$out]['suspended'])
			{
				$mail = new Mail();				
				$mail->system_mail($data[$out]['email'], $this->language('MAIL_EXPIRE_NOTICE_TITLE',$data[$out]['username'], $data[$out]['expires']), $this->language('MAIL_EXPIRE_NOTICE'));
				
				$e++;
			}			

			if (DEBUG)
				echo "Sent mails (5 days & lower notice)  :: " . $e . "\n";
		}
		
		if (DEBUG)
			echo "Done..";
	}
	
	/**
	 * Cronjob
	 * 
	 * It looks scary but it's really simple just long..
	 */
	public function cronjob_stats()
	{
		$pass = @$this->params[0];
		
		# See if request is legit..
		if ($pass != CRON)
		{
			return;
		}
		
		$data = $this->db->query("
			SELECT 
				id AS id,
				ip AS ip,
				sshport AS sshport,
				sshuser AS sshuser,
				sshpass AS sshpass,
				ftpport AS ftpport 
			FROM ".DB_PREFIX."box" ." 
		");
		
		# No boxes..bail out.
		if (!$data)
		{
			return;
		}
		
		# Loop thru results..
		foreach ($data AS $out => $key)
		{
			$ssh_link = 0;
			$ftp_link = 0;
		
			if (DEBUG)
				echo "Doing check for :: " . $out . "\n";
		
			# Check SSH
			@$ssh = new SSH($data[$out]['ip'], $data[$out]['sshport']);
			if ($ssh->verify($data[$out]['sshuser'], $data[$out]['sshpass']))
			{
				$ssh_link = 1;
			}
		
			if (DEBUG == 2)
				echo "Box " . $out /*. " SSH status: " . print_r($ssh)*/ . "\n";
		
			# Check FTP
			if ($ssh_link)
			{
				$ssh->setTimeout(2);
		
				# Check if there's FTP daemon.
				$ftp = @$ssh->exec("netstat -antlp | grep ftp\n");
		
				# Check the port and see if there's anything running (not 100%..)
				if (!$ftp)
				{
					if (@$ssh->exec("netstat -tulpn | grep :".$data[$out]['ftpport']."\n"))
						$ftp_link = 1;
				}
				else
				{
					$ftp_link = 1;
				}
			}
		
			# Perform checks if there's a link
			# NOTE :: Most of this is deriven from BG (BrightGame) Panel
			if ($ssh_link)
			{
				# Bandwidth
				$iface = 'eth0'; //Default value
				$bandwidth_rx = $this->sortSize(intval(trim($ssh->exec('cat /sys/class/net/'.$iface.'/statistics/rx_bytes'))));
				$bandwidth_tx = $this->sortSize(intval(trim($ssh->exec('cat /sys/class/net/'.$iface.'/statistics/tx_bytes'))));
				
				# Memory
				$ram_used = intval(trim($ssh->exec("free -b | grep 'buffers/cache' | awk -F \":\" '{print $2}' | awk '{print $1}'")));
				$ram_free = intval(trim($ssh->exec("free -b | grep 'buffers/cache' | awk -F \":\" '{print $2}' | awk '{print $2}'")));
				$ram_total = $ram_used + $ram_free;
				
				## Sort memory now
				$ram_used = $this->sortSize($ram_used);
				$ram_free = $this->sortSize($ram_free);
				$ram_total = $this->sortSize($ram_total);
				
				# Load (Average)
				$load = trim($ssh->exec("top -b -n 1 | grep 'load average' | awk -F \",\" '{print $5}'")) . " (Avg)";
											
				# Uptime
				$uptime = intval(trim($ssh->exec("cat /proc/uptime | awk '{print $1}'")));				
				$uptimeMin = $uptime / 60;
				if ($uptimeMin > 59) 
				{
					$uptimeH = $uptimeMin / 60;
					if ($uptimeH > 23) 
					{
						$uptimeD = $uptimeH / 24;
					}
					else 
					{
						$uptimeD = 0;
					}
				}
				else 
				{
					$uptimeH = 0;
					$uptimeD = 0;
				}
				$uptime = floor($uptimeD).' days '.($uptimeH % 24).' hours '.($uptimeMin % 60).' minutes ';
				
				# Swap
				$swap_used = intval(trim($ssh->exec("free -b | grep 'Swap' | awk -F \":\" '{print $2}' | awk '{print $2}'")));
				$swap_free = intval(trim($ssh->exec("free -b | grep 'Swap' | awk -F \":\" '{print $2}' | awk '{print $3}'")));
				$swap_total =$swap_used + $swap_free;
				
				## Sort Swap
				$swap_used = $this->sortSize($swap_used);
				$swap_free = $this->sortSize($swap_free);
				$swap_total = $this->sortSize($swap_total);
				
				# HDD
				$hdd_total = (intval(trim($ssh->exec("df -P / | tail -n +2 | head -n 1 | awk '{print $2}'"))) * 1024);
				$hdd_used = (intval(trim($ssh->exec("df -P / | tail -n +2 | head -n 1 | awk '{print $3}'"))) * 1024);
				$hdd_free = (intval(trim($ssh->exec("df -P / | tail -n +2 | head -n 1 | awk '{print $4}'"))) * 1024);
				
				## Sort HDD
				$hdd_total = $this->sortSize($hdd_total);
				$hdd_used = $this->sortSize($hdd_used);
				$hdd_free = $this->sortSize($hdd_free);
			}
			else # SSH Connection failed..so sort defaults..
			{
				$bandwidth_rx = '???';
				$bandwidth_tx = '???';
				
				# Memory
				$ram_used = '???';
				$ram_free = '???';
				$ram_total = '???';
				
				# Load (Average)
				$load = '???';				
				
				# Uptime (String gets converted so only N/a will be shown ..)
				$uptime = 'xxx N/a xxx N/a xxx N/a xxx N/a';				

				# Swap
				$swap_used = '???';
				$swap_free = '???';
				$swap_total = '???';				
				
				# HDD
				$hdd_total = '???';
				$hdd_used = '???';
				$hdd_free = '???';			
			}
		
			# Log it now..
			$this->db->query("
				INSERT INTO ".DB_PREFIX."logs_status
					(
						parent, ftp, ssh, 
						bandwidth_rec, bandwidth_send,
						mem_used, mem_free, mem_total,
						load_avg, uptime, 
						swap_used, swap_free, swap_total,
						hdd_used, hdd_free, hdd_total, 				
						created
					)
				VALUES
					(
						:parent, :ftp, :ssh, 
						:net_rec, :net_send,
						:ram_used, :ram_free, :ram_tot,
						:load_avg, :uptime,
						:swap_used, :swap_free, :swap_tot,
						:hdd_used, :hdd_free, :hdd_tot,					
						NOW()
					)
			", array(
				'parent' => $data[$out]['id'],
				'ftp' => $ftp_link,
				'ssh' => $ssh_link,
				'net_rec' => $bandwidth_rx, 
				'net_send' => $bandwidth_tx,
				'ram_used' => $ram_used,
				'ram_free' => $ram_free,
				'ram_tot' => $ram_total,					
				'load_avg' => $load,
				'uptime' => $uptime,
				'swap_used' => $swap_used, 
				'swap_free' => $swap_free, 
				'swap_tot' => $swap_total,				
				'hdd_used' => $hdd_used,
				'hdd_free' => $hdd_free,
				'hdd_tot' => $hdd_total
			));
		
			if (DEBUG)
				echo "Finished box :: " . $out . "\n";
		}
		
		echo "Done" . "\n";
	}
}
