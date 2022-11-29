<?php
# Disallow direct access
if (!_ROUTING_)	die("Error (NO ROUTING) :: Direct access not allowed...");

/**
 * Action logs
 *
 * Due language support this has to be done as plugin.
 * Note that it's hooked under api so it's more accessible.
 *
 */
class Logs extends API
{
	
	/**
	 * A mass chunk of log translations..
	 * 
	 * @param string $in Log type
	 * @param string $holder A language marker to be replaced..
	 * @return string Returns language translated string
	 */
	public function sortTypes($in, $holder=null)
	{	
		if ($holder)
			$holder = explode("\x01", $holder);		
		
		# Servers
		if ($in == 'SERVER_STARTED')
			return $this->language('LOG_SERVER_STARTED', $holder);
		elseif ($in == 'SERVER_RESTARTED')
			return $this->language('LOG_SERVER_RESTARTED', $holder);
		elseif ($in == 'SERVER_STOPPPED')
			return $this->language('LOG_SERVER_STOPPED', $holder);
		elseif ($in == 'SERVER_EDITED')
			return $this->language('LOG_SERVER_EDITED', $holder);
		elseif ($in == 'SERVER_INSTALLED')
			return $this->language('LOG_SERVER_INSTALLED', $holder);
		elseif ($in == 'SERVER_REBUILD')
			return $this->language('LOG_SERVER_REBUILD', $holder);
		elseif ($in == 'SERVER_ADDED')
			return $this->language('LOG_SERVER_ADDED', $holder);
		elseif($in == 'SERVER_DELETED')
			return $this->language('LOG_SERVER_DELETED', $holder);
		
		# Boxes
		elseif ($in == 'BOX_ADDED')
			return $this->language('LOG_BOX_ADDED', '<a href="'.$this->url.'box/show/'.$this->doOffset($holder[0]).'">'.$holder[1].'</a>');
		elseif ($in == 'BOX_DELETED')
			return $this->language('LOG_BOX_DELETED', $holder);
		elseif ($in == 'BOX_EDITED')
			return $this->language('LOG_BOX_EDITED', '<a href="'.$this->url.'box/show/'.$this->doOffset($holder[0]).'">'.$holder[1].'</a>');
		
		# Clients
		elseif ($in == 'CLIENT_ADDED')
			return $this->language('LOG_CLIENT_ADDED', $holder);
		elseif ($in == 'CLIENT_EDITED')
			return $this->language('LOG_CLIENT_EDITED', $holder);
		elseif ($in == 'CLIENT_DELETED')
			return $this->language('LOG_CLIENT_DELETED', $holder);
		
		# IPs
		elseif ($in == 'IP_ADDED')
			return $this->language('LOG_IP_ADDED', $holder);
		elseif ($in == 'IP_EDITED')
			return $this->language('LOG_IP_EDITED', $holder);
		elseif ($in == 'IP_DELETED')
			return $this->language('LOG_IP_DELETED', $holder);
		
		# Games
		elseif ($in == 'GAME_ADDED')
			return $this->language('LOG_GAME_ADDED', $holder);
		elseif ($in == 'GAME_EDITED')
			return $this->language('LOG_GAME_EDITED', $holder);
		elseif ($in == 'GAME_DELETED')
			return $this->language('LOG_GAME_DELETED', $holder);
		
		# Settings & Various..
		elseif ($in == 'LOGS_PURGED')
			return $this->language('LOG_LOGS_PURGED');
		elseif ($in == 'LICENSE_UPDATED')
			return $this->language('LOG_LICENSE_UPDATED');
		elseif ($in == 'SETTINGS_UPDATED')
			return $this->language('LOG_SETTINGS_UPDATED');
		elseif ($in == 'EMAIL_UPDATED')
			return $this->language('LOG_EMAIL_TEMPLATE_UPDATED');
		
		# News
		elseif ($in == 'NEWS_NEW')
			return $this->language('LOG_NEWS_PUBLISHED', $holder);
		elseif ($in == 'NEWS_DELETED')
			return $this->language('LOG_NEWS_DELETED', $holder);
		elseif ($in == 'NEWS_UPDATED')
			return $this->language('LOG_NEWS_UPDATED', $holder);
			
		
	}
}