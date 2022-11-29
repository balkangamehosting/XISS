<?php
# Disallow direct access
if (!_ROUTING_)	die("Error (NO ROUTING) :: Direct access not allowed...");

/**
 * Basic Levels..
 */
define('MEMBER', 1);
define('RESELLER', 5);
define('ADMIN', 10);

/**
 * A wrapper for all the core classes functionality.
 * 
 * @author Nate 'L0
 *
 */
class API 
{	
	# Controller
	var $controller;
	
	# Function loaded
	var $function;

	# URL bits loaded (after controller->function
	var $params;

	# Template path
	var $template;

	# Admin template path
	var $adminTemplate;

	# Script Url
	var $url;

	# (PDO) Database connection and CRUD functions
	var $db;

	# Forms handling
	var $forms;
	
	/**
	 * Hook params so they can be used acrossed the script.
	 */
	public function __construct()
	{	
		if (class_exists('core_Dispatch'))
		{
			$dispatch = new core_Dispatch();
		}
		if (class_exists('core_class_Exporter'))
		{
			$export = new core_class_Exporter();
		}
		if (class_exists('core_class_Database'))
		{
			$db = new core_class_Database();
		}
		if (class_exists('core_class_Forms'))
		{
			$forms = new core_class_Forms();
		}
		
		$this->controller = $dispatch->args('controller');
		$this->function = $dispatch->args('function');
		$this->params = $dispatch->args('params');
		$this->template = $export->getTemplate();	
		$this->adminTemplate = $export->getAdminTemplate();	
		$this->url = $export->getScriptUrl();
		$this->db = $db;
		$this->forms = $forms;			
	}
	
	/**
	 * Calls page so it can render it. 
	 * 
	 * @param string $page
	 * @param array $arr
	 * @return function
	 */
	public function render($page, $arr=array())
	{		
		if (class_exists('core_class_Template'))
		{
			$template = new core_class_Template();
		}
		if (class_exists('Tags'))
		{
			$tags = new Tags();
		}
		
		# See if we need to merge arrays (called from module)
		if (!empty($arr))
		{	
			# Arr overwrites static (tags) array
			$out = array_merge($tags->inject(), $arr);
		} 
		else # Nothing was added, just "inject" global stuff
		{
			$out = $tags->inject();
		}
		
		return $template->render($page, $out);
	}
	
	/**
	 * Shows Info box message
	 * 
	 * @param string $title
	 * @param string $message
	 * @param string $css
	 * @param boolean $redirect
	 * @param string $goto
	 * @return redirect to page with message set
	 */
	public function info($title, $message, $css='error', $redirect=false, $goto='', $time='2800', $arr=false, $page='_error') 
	{	
		if ($arr)
			$parse = array_merge($arr, array(				
				'notify' => true,
				'redirect' => $redirect,
				'goto' => $goto,
				'time' => $time,
				'PRINT_CSS' => $css,
				'PRINT_TITLE' => $title,
				'PRINT_MSG' => $message
			));
		else
			$parse = array(				
				'notify' => true,
				'redirect' => $redirect,
				'goto' => $goto,
				'time' => $time,
				'PRINT_CSS' => $css,
				'PRINT_TITLE' => $title,
				'PRINT_MSG' => $message
			);
		
		# So it loads corret template..
		if ($page == '_error')
		{
			if ($this->isAllowed(RESELLER))
				$page = '../admin/_error';
				
		}
		
		return $this->render($page, $parse);
	}
	
	/**
	 * Creates container (Pimple) class
	 * 
	 * @return Instance of the class
	 */
	public function container()
	{
		return new core_class_Pimple();
	}
	
	/**
	 * Language loading 
	 * 
	 * @param string $str
	 * @param string|array $replacer
	 * @return string
	 */
	public function language($str, $replacer='')
	{	
		if (class_exists('core_class_Language'))
		{
			$lang = new core_class_Language($_SESSION['lang']);
		}
		
		return $lang->languageMarkup($str, $replacer);
	}	
	
	/**
	 * Shows memory used, page load time and queries executed
	 * 
	 * @return string
	 */
	public function site_stats() 
	{	
		if (!LOAD_STATISTICS)
			return;
				
		if (class_exists('core_class_Statistics'))
		{
			$stats = new core_class_Statistics();
		}		
		
		$obj = $stats->get_statistics();
		$db = $this->db;
		
		return $this->language('SITESTATS', 
			array($obj[1],
			   	  $obj[0], 
				  ((int)$db::$queries < 1 ? 0 : (int)($db::$queries))
			));
	}
	
	/**
	 * Builds Database Prefix
	 * 
	 * @param string $str
	 * @return string
	 */
	public function prefix($str) 
	{
		return DB_PREFIX.$str;
	}
	
	/**
	 * Checks if word exists in a string
	 * 
	 * @param string $string
	 * @param string $token
	 * @return boolean
	 */
	public function find_token($string, $token)
	{
		return ( (strpos($string,$token) !== false) ? true : false );
	}
	
	/**
	 * Get previous page
	 * 
	 * @return string
	 */
	public function previous_page() 
	{
		# Sometimes page rediction is stored to session so try this first.
		if (isset($_SESSION['previous']) && !empty($_SESSION['previous'])) 
		{
			$url = $_SESSION['previous'];
			unset($_SESSION['previous']);
			
			return $url ;
		}
		
		$previous = @$_SERVER['HTTP_REFERER'];
		
		# If url contains /Action/ then redirect to index page
		if ($this->find_token($previous, "/action/"))
			$url = $this->url;
		else # Otherwise, redirect to previus page
			$url = $previous;

		return $url;
	}
	
	/**
	 * Tries to get user's real IP
	 * 
	 * @return string $ip
	 */
	public function getIP()
	{	
		if (class_exists('core_class_Exporter'))
		{
			$exporter = new core_class_Exporter();
		}
		
		return $exporter->ip();
	}
	
	/**
	 * Cleans offset from Integer
	 * 
	 * @param integer $in
	 * @return integer
	 */
	public function cleanOffset($in)
	{
		return str_replace(OFFSET, "", $in);
	}
	
	/**
	 * Creates offset for id's
	 *
	 * @param integer $in
	 * @return integer
	 */
	public function doOffset($in)
	{
		return OFFSET.$in;
	}
	
	/**
	 * Breadcrumbs
	 */
	public function breadcrumbs( $home = false)
	{
		if (!$home)
			$home = $this->language('HOME');
		
		$path = array_filter(explode('/', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)));
		$base_url = substr($_SERVER['SERVER_PROTOCOL'], 0, strpos($_SERVER['SERVER_PROTOCOL'], '/')) . '://' . $_SERVER['HTTP_HOST'] . '/';
		$breadcrumbs = array("<a href=\"$base_url\">$home</a>");
		$tmp = @array_keys($path);
		$last = @end($tmp);
		unset($tmp);
	
		foreach ($path AS $x => $crumb)
		{
			$title = ucwords(str_replace(array('.php', '_'), Array('', ' '), $crumb));
			
			# A hack to fix breadcrumbs in subdirectory
			if ($crumb == WS_FOLDER)
				$breadcrumbs = array_slice($breadcrumbs, 1);
	
			if ($x == 1)
			{
				$breadcrumbs[]  = "<a href=\"$base_url$crumb\">$title</a>";
			}
			elseif ($x > 1 && $x < $last)
			{
				$tmp = "<li><a href=\"$base_url";
				for($i = 1; $i <= $x; $i++)
				{
				# HACK :: Pagination invokes notice (double //) but only way to work so silence it and carrie on.
				$tmp .= @$path[$i] . '/';
				}
	
				$tmp .= "\">$title</a></li>";
				$breadcrumbs[] = $tmp;
				unset($tmp);
			}
			else
			{
				$breadcrumbs[] = '<li><a href="" class="current">'.$title.'</a></li>';
			}
		}
		
		return implode($breadcrumbs);
	}
	
	/** 
	 * Cleans the input
	 *
	 * @param string $s
	 * @return string
	 */
	public function xss($s)
	{
		return htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
	}
		
	/**
	 * ACL Tags
	 */
	public function ACLtag($in)
	{	
		if ($in == MEMBER)
			return $this->language('USER');
		elseif ($in == RESELLER)
			return $this->language('RESELLER'); 
		elseif ($in == ADMIN)
			return $this->language('ADMIN');
		else
			return $this->language('GUEST');
	}
	
	/**
	 * ACL levels (Flat & Basic)
	 * 
	 * @param $in Leven in (Constant)
	 * @param $opt Custom operator
	 * @return boolean
	 */
	public function isAllowed($in, $opt = false)
	{
		$userlevel = @$_SESSION['user_group'];
		
		if (!$opt)
		{
			return ( ( $userlevel >= $in ) ? true : false );
		}
		else
		{
			if ($opt == '>')
			{
				return ( ($userlevel > $in) ? true : false );
			}
			elseif ($opt == '<')
			{
				return ( ($userlevel < $in) ? true : false );
			}
			elseif ($opt == '>=')
			{
				return ( ($userlevel >= $in) ? true : false );
			}
			elseif ($opt == '<=')
			{
				return ( ($userlevel <= $in) ? true : false );
			}
			elseif ($opt == '==')
			{
				return ( ($userlevel == $in) ? true : false );
			}
			elseif ($opt == '!=')
			{
				return ( ($userlevel != $in) ? true : false );
			}
			else
				return false;
		}	
	}
	
	/**
	 * Logs action
	 * 
	 * @param string $type What type is it
	 * @param string $holder Any other arguments
	 */
	public function log($type, $client, $server, $box, $holder=null)
	{
		$user = $_SESSION['user_id'];
		$holder = (!$holder ? 'null' : 
				( is_array($holder) ? implode("\x01", $holder) : $holder ) 
		);		
		
		$this->db->query("
			INSERT INTO ".$this->prefix('logs_actions')."		
				(clientid, serverid, boxid, type, holder, user )	
			VALUES
				(:clientid, :serverid, :boxid, :type, :holder, :user)
		", array(
			'clientid' => $client,
			'serverid' => $server,
			'boxid' => $box,	
			'type' => $type,
			'holder' => $holder,
			'user' => $user
		));
	}
}
