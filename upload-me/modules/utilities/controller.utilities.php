<?php
# Disallow direct access
if (!_ROUTING_)	die("Error (NO ROUTING) :: Direct access not allowed...");

/**
 * Utilities
 * 
 * @desc Main landing page.
 */
class utilitiesController extends API
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
			'PAC_PACKAGE'	=>		$this->language('CL_PACKAGE'),
			'PAC_TYPE' =>		$this->language('CL_PACKAGE_TYPE'),			
			'PAC_SERVERS'=>		$this->language('CL_PACKAGE_SERVERS'),
			'PAC_CLIENTS' =>		$this->language('CL_PACKAGE_CLIENTS'),
			'PAC_UNLIMITED' =>	$this->language('CL_PACKAGE_UNLIMITED'),
			'PAC_EXPIRES' =>		$this->language('CL_PACKAGE_EXPIRES'),
			## Sys Logs
			'LOGS' => $this->language('SYS_LOGS'),
			'ID' => $this->language('SYS_ID'),
			'MESSAGE' => $this->language('SYS_MESSAGE'),
			'CLIENT' => $this->language('SYS_CLIENT'),
			'IP' => $this->language('SYS_IP'),
			'TIMESTAMP' => $this->language('SYS_TIMESTAMP'),
			'PURGE_LOGS' => $this->language('PURGE_LOGS'),
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
		
		header("location: " .$this->url.'utilities/license');		
	}	
	
	/**
	 * License info
	 */
	public function license()
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
		
		# Reseller gets different license..
		if (!$this->isAllowed(ADMIN))
		{
			$this->db->bind('owner', $_SESSION['user_id']);
			$this->db->bind('server_owner', $_SESSION['user_id']);
			$this->db->bind('client_owner', $_SESSION['user_id']);
			$this->db->bind('user', $_SESSION['user_id']);
			$data = $this->db->row("
				SELECT 
					p.type AS package_type,
					p.boxes AS package_boxes,
					p.servers AS package_servers,
					p.clients AS package_clients,
					p.unlimited AS package_unlimited,
					date_format(p.expires,'%d/%m/%Y') AS package_expires,					
					u.username AS username,
					u.id AS userid,
					u.firstname AS firstname,
					u.lastname AS lastname,
					(SELECT COUNT(id) FROM ".$this->prefix('box')." WHERE user =:owner) AS used_boxes,
					(SELECT COUNT(serverid) FROM ".$this->prefix('server')." WHERE owner =:server_owner) AS used_servers,
					(SELECT COUNT(id) FROM ".$this->prefix('users')." WHERE parent =:client_owner) AS used_clients
				FROM ".$this->prefix('packages')." p
				LEFT OUTER JOIN ".$this->prefix('users')." u
					ON p.user = u.id 
				WHERE p.user = :user		
			");
		}
		else 
		{	
			# FIXME :: Need to figoure out what kind of scheme..
			$data = null;
		}		
		
		$arr = array(
			'data' => $data
		);
		
		$this->render('../admin/license', $this->arrs($arr));
	}
	
	/**
	 * System logs (All logs basically)
	 */
	public function logs()
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
			l.id AS id,
			l.type AS type,
			l.holder AS holder,
			u.id AS uid,
			u.username AS user,
			date_format(l.created,'%m/%d %H:%i.%s') AS created
		FROM ".$this->prefix('logs_actions')." l
		LEFT OUTER JOIN ".$this->prefix('users')." u
			ON u.id = l.user		
		ORDER BY l.created DESC
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
			'pagination' => $paginate->layout($total),
		);	
		
		$this->render('../admin/syslogs', $this->arrs($arr));
	}
	
	/**
	 * Purge logs
	 */
	public function purge()
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
		
		$do = $this->db->query("
			TRUNCATE TABLE ".$this->prefix('logs_actions')." 		
		");
		
		# Log it
		$this->log("LOGS_PURGED", 0, 0, 0, '<a href="'.$this->url.'clients/show/'.$this->doOffset($_SESSION['user_id']).'">' . $_SESSION['user_alias'] .'</a>');
			
		return $this->info(
			'',
			$this->language("SYS_LOGS_DELETED"),
			'info',
			true,
			$this->url,
			'1400'
		);
	}
}
