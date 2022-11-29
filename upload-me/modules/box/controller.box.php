<?php
# Disallow direct access
if (!_ROUTING_)	die("Error (NO ROUTING) :: Direct access not allowed...");

/**
 * Boxes
 * 
 * @desc Box settings & options
 */
class boxController extends API
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
		
			# Add Box
			'ADVANCED' => $this->language('BOX_ADVANCED'),
			'BOX' => $this->language('BOX_BOX'),
			"ADDBOX" => $this->language('BOX_ADDBOX'),
			'NAME' => $this->language('BOX_NAME'),
			'LOCATION' => $this->language('BOX_LOCATION'),
			'IP' => $this->language('BOX_IP'),
			'PROPERTIES' => $this->language('BOX_PROPERTIES'),
			'NETWORK' => $this->language('BOX_NETWORK'),
			'GB' => $this->language('BOX_GB'),
			'MB' => $this->language('BOX_MB'),
			'OS_TYPE' => $this->language('BOX_OS_TYPE'),
			'DISTRO' => $this->language('BOX_DISTRO'),
			'DISTRO_VERSION' => $this->language('BOX_DISTRO_VERSION'),
			'CPU' => $this->language('BOX_CPU'),
			'HDD' => $this->language('BOX_HDD'),
			'RAM' => $this->language('BOX_RAM'),
			'COST' => $this->language('BOX_COST'),
			'SSH_SETTINGS' => $this->language('BOX_SSH_SETTINGS'),
			'SSH_USER' => $this->language('BOX_SSH_USER'),
			'SSH_PASSWORD' => $this->language('BOX_SSH_PASSWORD'),
			'SSH_PORT' => $this->language('BOX_SSH_PORT'),
			'SSH_LOGIN_TYPE' => $this->language('BOX_SSH_LOGIN_TYPE'),
			'SSH_USE_SUDO' => $this->language('BOX_SSH_USE_SUDO'),
			'FTP_SETTINGS' => $this->language('BOX_FTP_SETTINGS'),
			'FTP_PORT' => $this->language('BOX_FTP_PORT'),
			'FTP_PASSIVE' => $this->language('BOX_FTP_PASSIVE'),
			'CHECKS' => $this->language('BOX_CHECKS'),
			'ENABLED' => $this->language('BOX_ENABLED'),
			'VERIFY' => $this->language('BOX_VERIFY'),
			'ADD' => $this->language('ADD'),
			'BACKTO' => $this->language('BOX_BACKTO'),
			# Add IP
			'BOX_NAME' => $this->language('BOX_BOXNAME'),
			'BOX_LOCATION' => $this->language('BOX_BOXLOCATION'),
			'ADDIP' => $this->language('BOX_ADDIP'),
			'IPADDRESS' => $this->language('BOX_IPADDRESS'),
			'CONNECTIVITY' => $this->language('BOX_CONNECTIVITY'),
			'VERIFY_IP' => $this->language('BOX_VERIFY_IP'),
			'ADD_IP' => $this->language('ADD_IP'),
			## Box
			'BOXES_FOUND' => $this->language('BOX_BOXES_FOUND'),
			'ADD_BOX' => $this->language('ADD_BOX'),
			'ID_NAME' => $this->language('BOX_ID_NAME'),
			'IPS' =>	$this->language('BOX_IPS'),			
			'SERVERS' => $this->language('BOX_SERVERS'),
			'SSH'	=> 	$this->language('BOX_SSH'),
			'FTP'	=>	$this->language('BOX_FTP'),
			'STATISTICS' => $this->language('BOX_STATISTICS'),
			'LOAD'	=> $this->language('BOX_LOAD'),
			'MEMORY' => $this->language('BOX_MEMORY'),
			# FIXME - NEEDS TO BE PUT IN METHOD...
			'MEMORY_STATS' => $this->language('BOX_MEMORY_STATS', array("200 mb", "512mb")),			
			'NO_BOXES_FOUND'	=> $this->language('NO_BOXES_FOUND'),
			## Box Games
			'GAMES' => $this->language('BOX_GAMES'),
			'INSTALLED_GAMES' => $this->language('BOX_INSTALLED_GAMES'),
			'LABEL' => $this->language('BOX_LABEL'),
			'GAME' => $this->language('BOX_GAME'),
			'INSTALL_PATH' => $this->language('BOX_INSTALL_PATH'),
			## Box Logs
			'LOGS' => $this->language('BOX_LOGS'),
			'ID'	=> $this->language('BOX_ID'),
			'MESSAGE' => $this->language('BOX_MESSAGE'),
			'CLIENT' => $this->language('BOX_CLIENT'),
			'TIMESTAMP' => $this->language('BOX_TIMESTAMP'),
			'PURGE_LOGS' => $this->language('PURGE_LOGS'),
			## Box Servers
			'SERVERS_FOUND' => $this->language('BOX_SERVERS_FOUND'),
			'STATUS'	=> $this->language('BOX_STATUS'),
			'INFO'	=> $this->language('BOX_INFO'),
			'ACTIONS' => $this->language('BOX_ACTIONS'),
			'PLAYERS' => $this->language('BOX_PLAYERS'),
			'SLOTS'	=> $this->language('BOX_SLOTS'),
			'REFRESH'	=> 	$this->language('REFRESH'),	
			## Manage Box
			# Re-Using mostly ADD-BOX vars..			
			'SAVE'	=> 	$this->language('SAVE'),
			'MANAGE' => $this->language('BOX_MANAGE'),
			'BOX_OWNER' => $this->language('BOX_OWNER'),
			'BOX_USER'	=> $this->language('BOX_USER'),
			'CONFIGURE'	=> $this->language('CONFIGURE'),
			## Box Show (Reusing most of the vars)
			'SHOW' => $this->language('BOX_SHOW'),
			'DETAILS' => $this->language('BOX_DETAILS'),
			'LAST_5_ENTRIES' => $this->language('BOX_LAST_5_ENTRIES'),
			'LAST_5_STATS' => $this->language('BOX_LAST_5_STATS'),
			'IP_ASSIGNED' => $this->language('BOX_IP_ASSIGNED'),
			'USED_PORTS' => $this->language('BOX_USED_PORTS'),
			'DELETE' => $this->language('BOX_DELETE'),
			## Box Stats
			'STATS'	=> $this->language('STATS'),
			'BANDWIDTH'	=>		$this->language('BOX_BANDWIDTH'),
			'BAND_TX'	=>		$this->language('BOX_BAND_TX'),
			'BAND_RX'	=>		$this->language('BOX_BAND_RX'),
			'SWAP'		=>		$this->language('BOX_SWAP'),
			'USED'		=>		$this->language('BOX_USED'),
			'FREE'		=>		$this->language('BOX_FREE'),
			'TOTAL'		=>		$this->language('BOX_TOTAL'),
			'AVG'		=>		$this->language('BOX_AVG'),
			'UPTIME'	=>	$this->language('BOX_UPTIME'),
			'LAST_UPDATED'	=> $this->language('BOX_UPDATED'),
			'DAY'	=> $this->language('BOX_DAY'),
			'WEEK' => $this->language('BOX_WEEK'),
			'MONTH'=> $this->language('BOX_MONTH'),
			'ACTUAL' => $this->language('BOX_ACTUAL'),
			'PEAK'	=>	$this->language('BOX_PEAK'),
			'AVERAGE' => $this->language('BOX_AVERAGE'),
				
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
		
		if (!$this->isAllowed(ADMIN))
			$sql = "
				SELECT  
					b.id AS id,
					b.name AS name,
					b.location AS location,
					b.ip AS ip,
					(SELECT ssh FROM ".$this->prefix('logs_status')." WHERE parent = b.id ORDER BY created DESC LIMIT 1) AS ssh,
					(SELECT ftp FROM ".$this->prefix('logs_status')." WHERE parent = b.id ORDER BY created DESC LIMIT 1) AS ftp,
					(SELECT load_avg FROM ".$this->prefix('logs_status')." WHERE parent = b.id ORDER BY created DESC LIMIT 1) AS load_avg,
					(SELECT mem_used FROM ".$this->prefix('logs_status')." WHERE parent = b.id ORDER BY created DESC LIMIT 1) AS mem_used,	
					(SELECT COUNT(id) FROM ".$this->prefix('ip')." WHERE parent = b.id) AS ips,
					(SELECT COUNT(serverid) FROM ".$this->prefix('server')." WHERE boxid = b.id) AS servers
				FROM ".$this->prefix('box')." b 
				WHERE user= :user	
			";
		else
			$sql = "
				SELECT
					b.id AS id,
					b.name AS name,
					b.location AS location,
					b.ip AS ip,
					(SELECT ssh FROM ".$this->prefix('logs_status')." WHERE parent = b.id ORDER BY created DESC LIMIT 1) AS ssh,
					(SELECT ftp FROM ".$this->prefix('logs_status')." WHERE parent = b.id ORDER BY created DESC LIMIT 1) AS ftp,
					(SELECT load_avg FROM ".$this->prefix('logs_status')." WHERE parent = b.id ORDER BY created DESC LIMIT 1) AS load_avg,
					(SELECT mem_used FROM ".$this->prefix('logs_status')." WHERE parent = b.id ORDER BY created DESC LIMIT 1) AS mem_used,
					(SELECT COUNT(id) FROM ".$this->prefix('ip')." WHERE parent = b.id) AS ips,
					(SELECT COUNT(serverid) FROM ".$this->prefix('server')." WHERE boxid = b.id) AS servers
				FROM ".$this->prefix('box')." b
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
		
		$this->render('../admin/box', $this->arrs($arr));
	}	
	
	/**
	 * Show box
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
		
		$box = @$this->cleanOffset($this->params[0]);
		if (!$box)
		{
			header("location: " . $this->url.'box');
		}
		
		$this->db->bind('box', $box);		
		if (!$this->isAllowed(ADMIN))
			$this->db->bind('user', $_SESSION['user_id']);
		$data = $this->db->row("
			SELECT 
				b.id AS id,
				b.name AS name,
				b.ip AS ip,
				b. location AS location,
				b.ostype AS ostype,
				b.distro AS distro,
				b.distroVersion AS distro_version,
				b.cpu AS cpu,
				b.ram AS ram,
				b.hdd AS hdd,
				b.network AS network,
				b.nettype AS nettype,
				b.cost AS cost, 
				b.valute As valute,
				b.sshport AS sshport,
				b.ftpport AS ftpport,
				b.sshuser AS sshuser,
				b.sshpass AS sshpass,
				(SELECT ssh FROM ".$this->prefix('logs_status')." WHERE parent = b.id ORDER BY created DESC LIMIT 1) AS ssh,
				(SELECT ftp FROM ".$this->prefix('logs_status')." WHERE parent = b.id ORDER BY created DESC LIMIT 1) AS ftp,
				(SELECT load_avg FROM ".$this->prefix('logs_status')." WHERE parent = b.id ORDER BY created DESC LIMIT 1) AS load_avg,
				(SELECT mem_used FROM ".$this->prefix('logs_status')." WHERE parent = b.id ORDER BY created DESC LIMIT 1) AS mem_used,
				u.id AS userid,
				u.username AS username,
				u.firstname AS firstname,
				u.lastname AS lastname
			FROM ".$this->prefix('box')." b
			LEFT OUTER JOIN ".$this->prefix('users')." u
				ON u.id = b.user
			WHERE b.id = :box 
			".(!$this->isAllowed(ADMIN) ? ' AND user =:user ' : ' ')."
			LIMIT 1
		");
		
		# Stats (Bother with it only if there's data..)
		if ($data)
		{
			$this->db->bind("box", $box);
			$stats = $this->db->query("
				SELECT 
					load_avg AS load_avg,
					mem_used AS mem_used,
					date_format(created,'%m/%d %H:%i.%s') AS created
				FROM ".$this->prefix('logs_status')."			
				WHERE parent = :box 
				ORDER BY `created` DESC	
				LIMIT 20						
			");
			
			# Logs
			$this->db->bind('box', $box);
			$logs = $this->db->query("
				SELECT 
					l.id AS id,
					l.type AS type,
					l.holder AS holder,
					u.id AS uid,
					u.username AS user,
					date_format(l.created,'%m/%d %H:%i.%s') AS created
				FROM ".$this->prefix('logs_actions')." l
				LEFT OUTER JOIN ".$this->prefix('users')." u
					ON u.id = l.user
				WHERE l.boxid = :box
				ORDER BY l.created DESC	
				LIMIT 5
			");
			
			# IPs
			$this->db->bind('box', $box);
			$ips = $this->db->query("
				SELECT 
					id, 
					ip,
					(SELECT COUNT(serverid) FROM ".$this->prefix('server')." WHERE ipid = i.id) AS servers,
					(SELECT SUM(slots) FROM ".$this->prefix('server')." WHERE ipid = i.id) AS slots,
					(SELECT GROUP_CONCAT(' ',port) FROM ".$this->prefix('server')." WHERE ipid = i.id) AS ports
				FROM ".$this->prefix('ip')." i
				WHERE i.parent = :box LIMIT 5			
			");
		}
		
		$arr = array(
			'data' => $data,
			'stats' => ($data ? $stats : null),
			'logs' => ($data ? $logs : null),
			'ips' => ($data ? $ips : null)
		);
		
		if (!$data)
		{
			return $this->_error();
		}
		
		$this->render('../admin/showbox', $this->arrs($arr));
	}
	
	/**
	 * Add a new box
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
					$this->language("BOX_LIMITED"),
					'warning',
					true,
					$this->url.'box', # FIXME : Redirect to packages..
					'3800'
				);
		}
		
		$this->render('../admin/addbox', $this->arrs());
	}
	
	/**
	 * Add new IP to the box
	 */
	public function addip()
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

		$box = (int)$this->params[0];
		
		if (!$box)
		{
			return header("Location: " . $this->url.'box');
		}
		
		$this->render('../admin/addip', $this->arrs(array('target' => $box)));
	}	
	
	/**
	 * Lists all servers on the box
	 */
	public function servers()
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
		
		$box = @$this->cleanOffset($this->params[0]);
		if (!$box)
		{
			return header("location: " . $this->url . 'box');
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
		WHERE s.boxid = :box
		".(!$this->isAllowed(ADMIN) ? ' AND b.user = :user' : ' ')."
		ORDER BY s.name ASC
		";
		
		# Pagination
		$paginate = new Pagination();
				
		$this->db->bind('box', $box);
		if (!$this->isAllowed(ADMIN))
			$this->db->bind('user', $_SESSION['user_id']);
		
		$total = $this->db->countRows($sql);
	
		$pages = $paginate->limit(@$this->params[0], @$this->params[1], $total);
		
		# Query
		$this->db->bind('box', $box);
		if (!$this->isAllowed(ADMIN))
			$this->db->bind('user', $_SESSION['user_id']);
		
		$data = $this->db->query($sql . $pages);	
	
		$arr = array(
			'data' => $data,
			'pagination' => $paginate->layout($total),
			'id' => $this->doOffset($box),
		);
		
		$this->render('../admin/boxservers', $this->arrs($arr));
	}
	
	/**
	 * Box settings
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
		
		$box = @$this->cleanOffset($this->params[0]);		
		if (!$box)
		{
			return header("location: " .$this->url.'box');
		}
		
		
		$this->db->bind('box', $box);
		if (!$this->isAllowed(ADMIN))
			$this->db->bind('user', $_SESSION['user_id']);
		
		$data = $this->db->row("
			SELECT 
				b.*, 				
				u.username AS username,
				u.firstname AS firstname,
				u.lastname AS lastname,
				u.id AS userid
			FROM  ".$this->prefix('box')." b	
			LEFT OUTER JOIN ".$this->prefix('users')." u
				ON u.id = b.user		
			WHERE b.id=:box
			".(!$this->isAllowed(ADMIN) ? ' AND user = :user ' : ' ')."		
		");
		
		# Get user list..
		$this->db->bind('user', $data['userid']);
		$users = $this->db->query("
			SELECT 
				username, 
				id, 
				firstname, 
				lastname 
			FROM ".$this->prefix('users')."	
			WHERE id != :user	
		");
		
		if (!$data)
		{
			return header("location: " . $this->url.'box');
		}
		
		$this->render('../admin/managebox', $this->arrs(array('data' => $data, 'users' => $users)));
	}
	
	/**
	 * Games installed on the box
	 */
	public function games()
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
		
		$box = @$this->cleanOffset($this->params[0]);
		if (!$box)
		{
			return header("Location: " . $this->url.'box');
		}
		
		$this->db->bind('box', $box);
		if (!$this->isAllowed(ADMIN))
			$this->db->bind('user', $_SESSION['user_id']);
		$games = $this->db->query("
			SELECT DISTINCT
				g.name,
				g.version,
				g.installdir,
				s.game AS installed
			FROM ".$this->prefix('game')." g
			LEFT OUTER JOIN ".$this->prefix('server')." s
				ON s.game = g.id
			LEFT OUTER JOIN ".$this->prefix('box')." b
				ON b.id = s.boxid
			WHERE s.boxid = :box
			".(!$this->isAllowed(ADMIN) ? ' AND b.user=:user ' : ' ')."
		");
		
		$arr = array(
			'games' => $games,
			'id'	=> $box				
		);
		
		$this->render('../admin/boxgames', $this->arrs($arr));
	}
	
	/**
	 * All the logs from the box
	 */
	public function logs()
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
		
		$box = @$this->cleanOffset($this->params[0]);		
		if (!$box)
		{
			return header("location: " . $this->url . 'box');
		}
				
		$sql = "
			SELECT 
				l.id AS id,
				l.type AS type,
				l.holder AS holder,
				u.id AS uid,
				u.username AS user,
				date_format(l.created,'%m/%d %H:%i.%s') AS created
			FROM ".$this->prefix('logs_actions')." l
			LEFT OUTER JOIN ".$this->prefix('users')." u
				ON u.id = l.user
			LEFT OUTER JOIN ".$this->prefix('box')." b
				ON b.id = l.boxid
			WHERE l.boxid = :box
			".(!$this->isAllowed(ADMIN) ? ' AND b.user = :user ' : ' ')."
			ORDER BY l.created DESC		
		";
		
		# Pagination
		$paginate = new Pagination(20, 8, true);
		
		# Pagination
		$this->db->bind("box", $box);
		if (!$this->isAllowed(ADMIN))
			$this->db->bind('user', $_SESSION['user_id']);
		$total = $this->db->countRows($sql);
		
		$pages = $paginate->limit(@$this->params[1], @$this->params[2], $total);
		
		# Query
		$this->db->bind("box", $box);
		if (!$this->isAllowed(ADMIN))
			$this->db->bind('user', $_SESSION['user_id']);
		$data = $this->db->query($sql . $pages);
		
		$arr = array(
			'data' => $data,
			'pagination' => $paginate->layout($total),
			'box' => $this->doOffset($box),
		);
		
		$this->render('../admin/boxlogs', $this->arrs($arr));
	}
	
	/**
	 * Builds a UPTIME string
	 */
	private function buildUptime($in)
	{
		# Explode on space
		$uptime = explode(' ', $in);
		
		# Loop thru each word to see how many occurances we found..
		$cnt = 0;
		foreach ($uptime AS $time)
		{
			if ( preg_match_all( "/[0-9]/", $time))
				$cnt++;
		}
		
		$out = 'N/a';
		
		# No seconds here..
		if ($cnt == 3)
		{
			$days  = $uptime[0];
			$hours = $uptime[2];
			$mins  = $uptime[4];
			
			$days  = $days . ' ' . (($days > 1) ? $this->language('DAYS') : $this->language('DAY'));
			$hours = $hours . ' ' . (($hours > 1) ? $this->language('HOURS') : $this->language('HOUR'));
			$mins  = $mins . ' ' .  (($mins > 1) ? $this->language('MINS') : $this->language('MIN'));
			
			$out = $days . ' ' . $hours . ' ' . $mins;
		}
		else # We count seconds as well
		{
			$days  = $uptime[0];
			$hours = $uptime[2];
			$mins  = $uptime[4];
			$secs  = $uptime[6];
				
			$days  = $days . ' ' . (($days > 1) ? $this->language('DAYS') : $this->language('DAY'));
			$hours = $hours . ' ' . (($hours > 1) ? $this->language('HOURS') : $this->language('HOUR'));
			$mins  = $mins . ' ' .  (($mins > 1) ? $this->language('MINS') : $this->language('MIN'));
			$secs  = $secs . ' ' .  (($secs > 1) ? $this->language('SECS') : $this->language('SEC'));
			
			$out = $days . ' ' . $hours . ' ' . $mins . ' ' . $secs;
		}
		
		return $out;
	}
	
	/**
	 * Box stats
	 */
	public function charts()
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
		
		$box = @$this->cleanOffset($this->params[0]);
		$period = @$this->params[1];
		if (!$box)
		{
			return header("location: " . $this->url . 'box');
		}
		
		# Sort limit offset..
		if ($period)
		{
			if ($period == 'daily')
			{
				$sql = "
					SELECT 
						l.id,
						date_format(l.created,'%y/%m/%d %H:%i.%s') AS created,
						HOUR(date_format(l.created,'%y/%m/%d %H:%i.%s')) AS time_created,
						HOUR(date_format(l.created,'%y/%m/%d %H:%i.%s')) AS date_created,
						AVG(l.bandwidth_rec) AS band_rec,
						AVG(l.bandwidth_send) AS band_send,
						AVG(l.mem_used) AS mem_used,
						AVG(l.mem_free) AS mem_free,
						AVG(l.mem_total) AS mem_total,
						AVG(l.load_avg) AS load_avg,
						MAX(l.bandwidth_rec) AS band_rec_peak,
						MAX(l.bandwidth_send) AS band_send_peak,
						MAX(l.mem_used) AS mem_used_peak,
						MAX(l.mem_free) AS mem_free_peak,
						MAX(l.mem_total) AS mem_total_peak,
						MAX(l.load_avg) AS load_avg_peak,				
						l.uptime,
						AVG(l.swap_used) AS swap_used,
						AVG(l.swap_free) AS swap_free,
						AVG(l.swap_total) AS swap_total,
						AVG(l.hdd_used) AS hdd_used,
						AVG(l.hdd_free) AS hdd_free,
						AVG(l.hdd_total) AS hdd_total				
					FROM ".$this->prefix('logs_status')." l
					LEFT OUTER JOIN ".$this->prefix('box')." b
						ON b.id = l.parent
					WHERE l.parent = :box
					".(!$this->isAllowed(ADMIN) ? ' AND b.user = :user ' : ' ')."
					GROUP BY HOUR(date_format(l.created,'%y/%m/%d %H:%i.%s'))			
					ORDER BY l.created DESC			
					LIMIT 24		
				";
			}
			elseif ($period == 'weekly')
			{	
				$sql = "
					SELECT
						l.id,
						date_format(l.created,'%y/%m/%d') AS created,
						DAY(date_format(l.created,'%H:%i.%s')) AS time_created,
						DAY(date_format(l.created,'%y/%m/%d')) AS date_created,
						AVG(l.bandwidth_rec) AS band_rec,
						AVG(l.bandwidth_send) AS band_send,
						AVG(l.mem_used) AS mem_used,
						AVG(l.mem_free) AS mem_free,
						AVG(l.mem_total) AS mem_total,
						AVG(l.load_avg) AS load_avg,
						MAX(l.bandwidth_rec) AS band_rec_peak,
						MAX(l.bandwidth_send) AS band_send_peak,
						MAX(l.mem_used) AS mem_used_peak,
						MAX(l.mem_free) AS mem_free_peak,
						MAX(l.mem_total) AS mem_total_peak,
						MAX(l.load_avg) AS load_avg_peak,				
						l.uptime,
						MAX(l.swap_used) AS swap_used,
						MAX(l.swap_free) AS swap_free,
						MAX(l.swap_total) AS swap_total,
						MAX(l.hdd_used) AS hdd_used,
						MAX(l.hdd_free) AS hdd_free,
						MAX(l.hdd_total) AS hdd_total
					FROM ".$this->prefix('logs_status')." l
					LEFT OUTER JOIN ".$this->prefix('box')." b
						ON b.id = l.parent
					WHERE parent = :box
					".(!$this->isAllowed(ADMIN) ? ' AND b.user = :user ' : ' ')."
					GROUP BY DAY(date_format(l.created,'%y/%m/%d'))
					ORDER BY l.created DESC
					LIMIT 7
				";
			}
			elseif ($period == 'monthly')
			{
				$sql = "
					SELECT
						l.id,
						date_format(l.created,'%y/%m/%d') AS created,
						DAY(date_format(l.created,'%H:%i.%s')) AS time_created,
						DAY(date_format(l.created,'%y/%m/%d')) AS date_created,
						AVG(l.bandwidth_rec) AS band_rec,
						AVG(l.bandwidth_send) AS band_send,
						AVG(l.mem_used) AS mem_used,
						AVG(l.mem_free) AS mem_free,
						AVG(l.mem_total) AS mem_total,
						AVG(l.load_avg) AS load_avg,
						MAX(l.bandwidth_rec) AS band_rec_peak,
						MAX(l.bandwidth_send) AS band_send_peak,
						MAX(l.mem_used) AS mem_used_peak,
						MAX(l.mem_free) AS mem_free_peak,
						MAX(l.mem_total) AS mem_total_peak,
						MAX(l.load_avg) AS load_avg_peak,				
						l.uptime,
						MAX(l.swap_used) AS swap_used,
						MAX(l.swap_free) AS swap_free,
						MAX(l.swap_total) AS swap_total,
						MAX(l.hdd_used) AS hdd_used,
						MAX(l.hdd_free) AS hdd_free,
						MAX(l.hdd_total) AS hdd_total
					FROM ".$this->prefix('logs_status')." l
					LEFT OUTER JOIN ".$this->prefix('box')." b
						ON b.id = l.parent
					WHERE l.parent = :box
					".(!$this->isAllowed(ADMIN) ? ' AND b.user = :user ' : ' ')."
					GROUP BY DAY(date_format(l.created,'%y/%m/%d'))
					ORDER BY l.created DESC
					LIMIT 31
				";	
			}
			else 
			{
				$sql = "
					SELECT 
						l.id,
						date_format(l.created,'%y/%m/%d %H:%i.%s') AS created,
						date_format(l.created,'%H:%i.%s') AS time_created,
						date_format(l.created,'%y/%m/%d') AS date_created,
						l.bandwidth_rec AS band_rec,
						l.bandwidth_send AS band_send,
						l.mem_used,
						l.mem_free,
						l.mem_total,
						l.load_avg,	
						l.bandwidth_rec AS band_rec_peak,
						l.bandwidth_send AS band_send_peak,
						l.mem_used AS mem_used_peak,
						l.mem_free AS mem_free_peak,
						l.mem_total AS mem_total_peak,
						l.load_avg AS load_avg_peak,				
						l.uptime,
						l.swap_used,
						l.swap_free,
						l.swap_total,
						l.hdd_used,
						l.hdd_free,
						l.hdd_total				
					FROM ".$this->prefix('logs_status')." l
					LEFT OUTER JOIN ".$this->prefix('box')." b
						ON b.id = l.parent
					WHERE l.parent = :box		
					".(!$this->isAllowed(ADMIN) ? ' AND b.user = :user ' : ' ')."	
					ORDER BY l.created DESC			
					LIMIT 40				
				";				
			}
		}
		else
		{
			$sql = "
				SELECT 
					l.id,
					date_format(l.created,'%y/%m/%d %H:%i.%s') AS created,
					date_format(l.created,'%H:%i.%s') AS time_created,
					date_format(l.created,'%y/%m/%d') AS date_created,
					l.bandwidth_rec AS band_rec,
					l.bandwidth_send AS band_send,
					l.mem_used,
					l.mem_free,
					l.mem_total,
					l.load_avg,	
					l.bandwidth_rec AS band_rec_peak,
					l.bandwidth_send AS band_send_peak,
					l.mem_used AS mem_used_peak,
					l.mem_free AS mem_free_peak,
					l.mem_total AS mem_total_peak,
					l.load_avg AS load_avg_peak,				
					l.uptime,
					l.swap_used,
					l.swap_free,
					l.swap_total,
					l.hdd_used,
					l.hdd_free,
					l.hdd_total				
				FROM ".$this->prefix('logs_status')." l
				LEFT OUTER JOIN ".$this->prefix('box')." b
						ON b.id = l.parent
				WHERE l.parent = :box	
				".(!$this->isAllowed(ADMIN) ? ' AND b.user = :user ' : ' ')."		
				ORDER BY l.created DESC			
				LIMIT 40				
			";				
		}
		
		$this->db->bind('box', $box);	
		if (!$this->isAllowed(ADMIN))
			$this->db->bind('user', $_SESSION['user_id']);
		$data = $this->db->query($sql);
		
		$this->db->bind('box', $box);		
		$uptime = $this->db->single("
			SELECT uptime FROM ".$this->prefix('logs_status')." WHERE parent = :box ORDER BY created DESC 		
		");		
		
		$arr = array(
			'id' => $box,	
			'uptime' => @$this->buildUptime($uptime),
			'data' => array_reverse($data),
			'timeSec' => (!$period ? true : false)
		);
		
		# Nothing was found..
		# TODO : do this better..(some kinda of error msg or smth..)
		if (!$uptime && !$data)
		{
			return header("location: " . $this->url . 'box/show/'. $this->doOffset($box));
		}
		
		$this->render('../admin/boxstats', $this->arrs($arr));
	}
	
	/**
	 * Box configuration
	 */
	public function configure()
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
		
		$box = @$this->cleanOffset($this->params[0]);
		$period = @$this->params[1];
		if (!$box)
		{
			return header("location: " . $this->url . 'box');
		}
		
		$arr = array(
			'data' => null	
		);
		
		$this->render('../admin/boxconfigure', $this->arrs($arr));
	}
	
	/**
	 * 
	 * Executes
	 * 
	 */
	
	/**
	 * Deals with packages..
	 *
	 * @return boolean
	 */
	private function canAdd()
	{
		$sql = "SELECT unlimited, boxes FROM ".$this->prefix('packages')." WHERE user = :user";
	
		$this->db->bind("user", $_SESSION['user_id']);
		$data = $this->db->row($sql);
	
		if ($data['unlimited'])
		{
			return true;
		}
		else
		{
			$this->db->bind("user", $_SESSION['user_id']);
			$cnt = $this->db->row("SELECT COUNT(id) AS cnt FROM ".$this->prefix('box')." WHERE user = :user");
			
			if ($cnt['cnt'] < $data['boxes'])
				return true;
			else
				return false;
		}
			
		return false;
	}
	
	/**
	 * Add a box
	 */
	public function addbox() 
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
		
		$verify = @$_POST['check'];
		
		# Basic checks
		if (@!$_POST['box']['name_str'] OR 
			@!$_POST['box']['location_str'] OR 
			@!$_POST['box']['ip_str'] OR 
			@!$_POST['box']['sshuser_str'] OR
			@!$_POST['box']['sshpass_str'] OR 
			@!$_POST['box']['sshport_int'] OR 
			@!$_POST['box']['ftpport_int']
			)
		{				
			return $this->info(
				'',
				$this->language("BOX_INCOMPLETE"),
				'warning',
				true,
				$this->url.'box/add',
				'2800'
			);
		}	
		
		# Check if box can be added
		if (!$this->isAllowed(ADMIN))
		{
			if (!$this->canAdd())
				return $this->info(
					'',
					$this->language("BOX_LIMITED"),
					'warning',
					true,
					$this->url.'box', # FIXME : Redirect to packages..
					'3800'
				);
		}
		
		# A hack to add user as well
		@$_POST['box']['user_int'] = $_SESSION['user_id'];
		
		$do = $this->db->query(
			# Builds SQL syntax
			$this->forms->sqlInsert($this->forms->bindList($_POST['box']), $this->prefix('box')),
			# Builds Bind list
			$this->forms->bindList($_POST['box'])
		);
		
		# On success
		if ($do)
		{
			$this->db->bind('ip', $_POST['box']['ip_str']);
			$this->db->bind('name', $this->xss($_POST['box']['name_str']));
			$parent = $this->db->single("
				SELECT id FROM ".$this->prefix('box')."
				WHERE ip = :ip AND name = :name
			");
									
			if (!$verify)
			{		
				$this->db->query("
					INSERT INTO ".$this->prefix('logs_status')."
						(parent, ftp, ssh, created)
					VALUES
						(:parent, :ftp, :ssh, NOW())
					", array(
						'parent' => $parent,
						'ftp' => 0,
						'ssh' => 0
				));				
				
				$this->log("BOX_ADDED", 0, 0, $parent, array($parent, $_POST['box']['name_str']));
				
				return $this->info(
					'',
					$this->language("BOX_SUCCESS"),
					'info',
					true,
					$this->url.'box',
					'1000'
				);
			}
			else 
			{	
							
				$ssh_ok = 0;
				$ftp_ok = 0;
			
				# Check SSH
				@$ssh = new SSH($_POST['box']['ip_str'], $_POST['box']['sshport_int']);
				if ($ssh->verify($_POST['box']['sshuser_str'], $_POST['box']['sshpass_str']))
				{
					$ssh_ok = 1;
				}
				
				# Check FTP
				if ($ssh_ok)
				{	
					$ssh->setTimeout(2);
					
					# Check if there's FTP daemon.
					$ftp = @$ssh->exec("netstat -antlp | grep ftp\n");
					
					# Check the port and see if there's anything running (not 100%..)
					if (!$ftp)
					{
						if (@$ssh->exec("netstat -tulpn | grep :".$_POST['box']['ftpport_int']."\n"))						
							$ftp_ok = 1;						
					}
					else
					{
						$ftp_ok = 1;
					}
				}
				
				if ($ftp_ok && $ssh_ok)
				{	
					$this->db->query("
						INSERT INTO ".$this->prefix('logs_status')."
							(parent, ftp, ssh, created)
						VALUES
							(:parent, :ftp, :ssh, NOW())		
					", array(
						'parent' => $parent,
						'ftp' => 1,
						'ssh' => 1		
					));
					
					$this->log("BOX_ADDED", 0, 0, $parent, array($parent, $_POST['box']['name_str']));
					
					return $this->info(
						'',
						$this->language("BOX_CHECKSUCCESS"),
						'info',
						true,
						$this->url.'box',
						'3000'
					);
				}
				else
				{	
					$this->db->query("
						INSERT INTO ".$this->prefix('logs_status')."
							(parent, ftp, ssh, created)
						VALUES
							(:parent, :ftp, :ssh, NOW())
					", array(
						'parent' => $parent,
						'ftp' => $ftp_ok,
						'ssh' => $ssh_ok
					));
					
					$this->log("BOX_ADDED", 0, 0, $parent, array($parent, $_POST['box']['name_str']));
					
					return $this->info(
							'',
							$this->language("BOX_CHECKFAIL"),
							'error',
							true,
							$this->url.'box',
							'3000'
					);
				}
			}
		}
		else
		{
			return $this->info(
				'',
				$this->language("BOX_ERROR"),
				'error',
				true,
				$this->url.'box/add',
				'5000'
			);
		}
	}
	
	/**
	 * Updates box changes
	 */
	public function update_box()
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
		
		$box = @$this->cleanOffset($this->params[0]);
		
		if (!$box)
		{
			return header("location: " . $this->url.'box');
		}
		
		$verify = @$_POST['check'];
		
		# Basic checks
		if (@!$_POST['box']['name_str'] OR 
			@!$_POST['box']['location_str'] OR 
			@!$_POST['box']['ip_str'] OR 
			@!$_POST['box']['sshuser_str'] OR
			@!$_POST['box']['sshpass_str'] OR 
			@!$_POST['box']['sshport_int'] OR 
			@!$_POST['box']['ftpport_int']
			)
		{				
			return $this->info(
				'',
				$this->language("BOX_INCOMPLETE"),
				'warning',
				true,
				$this->url.'box/manage/'.$this->doOffset($box),
				'2800'
			);
		}	
		
		# What a freaking ugly way..
		if (!$this->isAllowed(ADMIN))
		{
			$do = $this->db->query(
				# Builds SQL syntax
				$this->forms->sqlUpdate($this->forms->bindList($_POST['box']), $this->prefix('box'), "WHERE id= :box AND user = :user"),
				# Builds Bind list
				$this->forms->bindList($_POST['box'], array("box" => $box, "user" => $_SESSION['user_id']))
			);
		}
		else
		{
			$do = $this->db->query(
				# Builds SQL syntax
				$this->forms->sqlUpdate($this->forms->bindList($_POST['box']), $this->prefix('box'), "WHERE id= :box"),
				# Builds Bind list
				$this->forms->bindList($_POST['box'], array("box" => $box))
			);
		}
		
		
		/*
		if ($do)
		{
		*/
				
		# On success		
		if (!$verify)
		{	
			$this->db->bind('box', $box);
			$parent = $this->db->single("
				SELECT id FROM ".$this->prefix('box')."
				WHERE id = :box ORDER BY updated DESC
			");
				
			$this->db->query("
				INSERT INTO ".$this->prefix('logs_status')."
					(parent, ftp, ssh, created)
				VALUES
					(:parent, :ftp, :ssh, NOW())
			", array(
				'parent' => $parent,
				'ftp' => 0,
				'ssh' => 0
			));
	
			$this->log("BOX_EDITED", 0, 0, $parent, array($parent, $_POST['box']['name_str']));
	
			return $this->info(
				'',
				$this->language("BOX_UPDATED_SUCCESS"),
				'info',
				true,
				$this->url.'box/show/'.$this->doOffset($box),
				'1400'
			);
		}
		else
		{		
			$ssh_ok = 0;
			$ftp_ok = 0;
				
			# Check SSH
			@$ssh = new SSH($_POST['box']['ip_str'], (int)$_POST['box']['sshport_int']);
			if ($ssh->verify($_POST['box']['sshuser_str'], $_POST['box']['sshpass_str']))
			{
				$ssh_ok = 1;
			}
	
			# Check FTP
			if ($ssh_ok)
			{
				$ssh->setTimeout(2);
					
				# Check if there's FTP daemon.
				$ftp = @$ssh->exec("netstat -antlp | grep ftp\n");
						
				# Check the port and see if there's anything running (not 100%..)
				if (!$ftp)
				{
					if (@$ssh->exec("netstat -tulpn | grep :".$_POST['box']['ftpport_str']."\n"))
						$ftp_ok = 1;
				}
				else
				{
					$ftp_ok = 1;
				}
			}
	
			if ($ftp_ok && $ssh_ok)
			{
				$this->db->bind('box', $box);
				$parent = $this->db->single("
					SELECT id FROM ".$this->prefix('box')."
					WHERE id = :box ORDER BY updated DESC
				");
							
				$this->db->query("
					INSERT INTO ".$this->prefix('logs_status')."
						(parent, ftp, ssh, created)
					VALUES
						(:parent, :ftp, :ssh, NOW())
					", array(
						'parent' => $parent,
						'ftp' => 1,
						'ssh' => 1
				));
									
				$this->log("BOX_EDITED", 0, 0, $parent, array($parent, $_POST['box']['name_str']));
											
				return $this->info(
					'',
					$this->language("BOX_UPDATED_SUCCESS"),
					'info',
					true,
					$this->url.'box/show/'.$this->doOffset($box),
					'1800'
				);
			}
			else
			{
				$this->db->bind('box', $box);
				$parent = $this->db->single("
					SELECT id FROM ".$this->prefix('box')."
					WHERE id = :box ORDER BY updated DESC
				");
											
				$this->db->query("
					INSERT INTO ".$this->prefix('logs_status')."
						(parent, ftp, ssh, created)
					VALUES
						(:parent, :ftp, :ssh, NOW())
					", array(
						'parent' => $parent,
						'ftp' => $ftp_ok,
						'ssh' => $ssh_ok
				));
											
				$this->log("BOX_EDITED", 0, 0, $parent, array($parent, $_POST['box']['name_str']));
											
				return $this->info(
					'',
					$this->language("BOX_UPDATED_SUCCESSFAIL"),
					'warning',
					true,
					$this->url.'box/show/'.$this->doOffset($box),
					'3000'
				);
			}
		}
		/*
		}		
		else
		{			
			return $this->info(
				'',
				$this->language("BOX_UPDATED_FAIL"),
				'warning',
				true,
				$this->url.'box/manage/'.$this->doOffset($box),
				'3000'
			);
		}
		*/
	}
	
	/**
	 * Delete Box
	 * 
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
		
		$box = @$this->cleanOffset($this->params[0]);		
		if (!$box)
		{
			return header("location: " . $this->url . 'box');
		}
		
		# Check first is box has servers..and bounce out of action if so..
		$this->db->bind('box', $box);
		$check = $this->db->query("
			SELECT serverid FROM ".$this->prefix('server')." WHERE boxid = :box LIMIT 1	
		");
		
		# Match was found..
		if ($check)
		{
			return $this->info(
				'',
				$this->language("BOX_DELETED_NOT_EMPTY"),
				'warning',
				true,
				$this->url .'box/show/'.$this->doOffset($box),
				'5000'
			);
		}
		
		$this->db->bind('box', $box);
		$parent = $this->db->row("
			SELECT id, name, distro FROM ".$this->prefix('box')."
			WHERE id = :box 
		");
		
		$this->db->bind("box", $box);
		if (!$this->isAllowed(ADMIN))
			$this->db->bind("user", $_SESSION['user_id']);
		$do = $this->db->query("
			DELETE FROM ".$this->prefix('box')." WHERE id= :box" .						
			(!$this->isAllowed(ADMIN) ? " AND user = :user" : "")
		);
		
		# Delete any IP's tied to it..
		if ($do)
		{
			$this->db->bind("box", $box);
			$this->db->query("
				DELETE FROM ".$this->prefix('ip')." WHERE parent= :box
			");
		}
		
		if ($do)
		{	
			$this->log("BOX_DELETED", 0, 0, 0, $parent['name'] .'( <a href="'.$this->url.'clients/show/'.$this->doOffset($_SESSION['user_id']).'">' . $_SESSION['user_alias'] . ') </a>');
			
			return $this->info(
				'',
				$this->language("BOX_DELETED_SUCCESS"),
				'info',
				true,
				$this->url .'box',
				'3000'
			);
		}
		else
		{
			return $this->info(
				'',
				$this->language("BOX_DELETED_FAIL"),
				'warning',
				true,
				$this->url .'box/show/'.$this->doOffset($box),
				'3000'
			);
		}
	}
	
	/** 
	 * Adds IP
	 */
	public function submit_ip()
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
		
		$box = @$this->cleanOffset($_POST['target']);
		$ip = @trim($this->xss($_POST['ip']));
		//$verify = (@$_POST['verify'] ? true : false);
		
		if (!$box )
		{
			return header("location: " .$this->url.'box');
		}
		elseif ( !$ip )
		{
			return $this->info(
				'', 
				$this->language('IP_MISSING'),
				'warning',
				true,
				$this->previous_page(),
				'2700'
			);
		}
		
		# IPv4 or IPv6 ~Exlcuding private ranges..
		if (!filter_var($ip,FILTER_VALIDATE_IP, FILTER_FLAG_NO_RES_RANGE))
		{
			return $this->info(
				'',
				$this->language('IP_INVALID'),
				'warning',
				true,
				$this->previous_page(),
				'2700'
			);
		}
		
		$this->db->bind('box', $box);
		$this->db->bind('ip', $ip);
		$do = $this->db->query("
			INSERT INTO ".$this->prefix('ip')."
				(parent, ip)
			VALUES
				(:box, :ip)
		");
		
		if ($do)
		{
			return $this->info(
					'',
					$this->language('IP_SUCCESS'),
					'info',
					true,
					$this->url . 'box/show/'.$this->doOffset($box),
					'1400'
			);
		}
		else
		{
			return $this->info(
					'',
					$this->language('IP_FAIL'),
					'warning',
					true,
					$this->previous_page(),
					'2700'
			);
		}
	}
	
	/**
	 * Deletes IP
	 * 
	 * FIXME: Needs some seroius redoing for owner check..
	 */
	public function delete_ip()
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

		$ip = @$this->cleanOffset($this->params[0]);
		
		if (!$ip)
		{
			return header("location: " . $this->url .'box');
		}
		
		# Check before deleting
		$this->db->bind('id', $ip);
		$check = $this->db->query("
			SELECT ipid FROM ".$this->prefix('server')." WHERE ipid = :id LIMIT 1 		
		");
		
		if ($check)
		{	
			return $this->info(
				'',
				$this->language("IP_DELETE_NOT_EMPTY"),
				'warning',
				true,
				$this->previous_page(),
				'3000'
			);
		}
		
		$this->db->bind('id', $ip);
		$do = $this->db->query("DELETE FROM ".$this->prefix('ip')." WHERE id=:id");
		
		if ($do)
		{
			return $this->info(
				'',
				$this->language("IP_DELETED"),
				'info',
				true,
				$this->previous_page(),
				'1000'
			);
		}	
		else
		{
			return $this->info(
				$this->language('ERROR_TITLE'),
				$this->language("IP_DELETED_FAIL"),
				'warning',
				true,
				$this->previous_page(),
				'3000'
			);
		}			
	}
	
	/**
	 * Purge Logs
	 */
	public function purge_logs()
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
		
		$box = @$this->cleanOffset($this->params[0]);
		
		if (!$box)
		{
			return header("location: " . $this->url.'box');
		}
		
		$this->db->bind('box', $box);
		if (!$this->isAllowed(ADMIN))
			$this->db->bind('user', $_SESSION['user_id']);
		$do = $this->db->query("DELETE FROM ".$this->prefix('logs_actions')." WHERE boxid=:box " . (!$this->isAllowed(ADMIN) ? ' AND user=:user' : ''));
		
		if ($do)
		{
			# Log it
			$this->log("LOGS_PURGED", 0, 0, $box, '<a href="'.$this->url.'clients/show/'.$this->doOffset($_SESSION['user_id']).'">' . $_SESSION['user_alias'] .'</a>');
			
			return $this->info(
				'',
				$this->language("BOX_PURGE_SUCCESS"),
				'success',
				true,
				$this->url . 'box/logs/'.$this->doOffset($box),
				'3000'
			);
		}
		else
		{
			return $this->info(
				'',
				$this->language("BOX_PURGE_FAIL"),
				'warning',
				true,
				$this->url . 'box/logs/'.$this->doOffset($box),
				'2000'
			);
		}
	}
}

