<?php
# Disallow direct access
if (!_ROUTING_)	die("Error (NO ROUTING) :: Direct access not allowed...");

/**
 * Index page
 * 
 * @desc Main landing page.
 */
class indexController extends API
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
			## Index page
			'WELCOME' => $this->language('CL_IND_WELCOME'),
			'DETAILS' => $this->language('CL_IND_DETAILS'),
			'FIRSTNAME' => $this->language('CL_IND_FIRSTNAME'),
			'LASTNAME' => $this->language('CL_IND_LASTNAME'),
			'EMAIL' => $this->language('CL_IND_EMAIL'),
			'SERVERS' => $this->language('CL_IND_SERVERS'),
			'GAMESERVERS' => $this->language('CL_IND_GAMESERVERS'),
			'TS_SERVERS' => $this->language('CL_IND_TS_SERVERS'),
			'MESSAGES' => $this->language('CL_IND_MESSAGES'),
			'STATUS' => $this->language('CL_IND_STATUS'),
			'NAME' => $this->language('CL_IND_NAME'),
			'GAME' => $this->language('CL_IND_GAME'),
			'INFO' => $this->language('CL_IND_INFO'),
			'ACTIONS' => $this->language('CL_IND_ACTIONS'),
			'IP' => $this->language('CL_IND_IP'),
			'PLAYERS' => $this->language('CL_IND_PLAYERS'),
			'SLOTS' => $this->language('CL_IND_SLOTS'),
			'EXPIRES' => $this->language('CL_IND_EXPIRES'),
			'REFRESH' => $this->language('REFRESH'),
			'ANNOUNCEMENT' => $this->language('CL_ANNOUNCEMENT'),
			'PENDING'	=> $this->language('CL_IND_PENDING'),
			'NO_SERVERS' => $this->language('CL_NO_SERVERS'),
			'PENDING_SERVER' => $this->language('CL_PENDING_SERVER'),
			'GO_BACK'	=> $this->language('GO_BACK'),
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
			return header("location:" . $this->url.'admin' );	
		
		$this->db->bind('client', $_SESSION['user_id']);
		$this->db->bind('id', $_SESSION['user_id']);
		$this->db->bind('target', $_SESSION['user_id']);
		$data = $this->db->row("
			SELECT
				firstname,
				lastname,
				username,
				email, 
				(SELECT COUNT(serverid) FROM ".$this->prefix('server')." WHERE boxid != 0 AND clientid = :client) AS servers,
				(SELECT COUNT(serverid) FROM ".$this->prefix('server')." WHERE boxid = 0 AND clientid = :id) AS servers_pending
			FROM ".$this->prefix('users')." 
			WHERE id = :target
		");
		
		# Announcement
		$news = $this->db->single("
			SELECT news FROM ".$this->prefix('news')." WHERE created > NOW() - INTERVAL 1 WEEK ORDER BY created DESC
		");
		
		$latest = $this->db->query("
			SELECT id, news FROM ".$this->prefix('news')." ORDER BY created DESC LIMIT 3		
		");
		
		# Servers
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
			WHERE s.clientid = :id
			ORDER BY s.name ASC
		";
		
		# Pagination
		$paginate = new Pagination();
		
		# Pagination
		$this->db->bind('id', $_SESSION['user_id']);
		$total = $this->db->countRows($sql);
		
		$pages = $paginate->limit(@$this->params[0], @$this->params[1], $total);
		
		# Query
		$this->db->bind('id', $_SESSION['user_id']);
		$servers = $this->db->query($sql . $pages);
		
		$arr = array(
			'data' => $data,
			'news' => $news,
			'latest' => $latest,
			'pagination' => $paginate->layout($total),
			'servers'	=> $servers
		);
		
		$this->render('index', $this->arrs($arr));
	}

	/**
	 * Shows announcement
	 */
	public function show()
	{
		if ($this->isAllowed(RESELLER))
			return header("location:" . $this->url.'admin' );	
		
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
		
		$this->render('announcement', $this->arrs(array('data' => $data, 'news' => nl2br($data['news']))));
	}
}
