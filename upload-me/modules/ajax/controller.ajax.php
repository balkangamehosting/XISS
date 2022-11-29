<?php
/**
 * Ajax
 *
 * @desc Handles all ajax requests
 *
 */

# Disallow direct access
if (!_ROUTING_)	die("Error (NO ROUTING) :: Direct access not allowed...");

class ajaxController extends API
{
	/**
	 * Generic error page
	 */
	function _default()
	{
       	die("Uhm?");
	}
        
	/**
     * Generic Critical Error page
	 */
	function _error()
	{
		die("Huh?");
	}
	
	/**
	 * Flood protection
	 *
	 * Basically it just delays using session..if user kills the browser it's cleared but non the less
	 * using database is useless as ip's can get easily spoofed so it's extra query for nothing..
	 *
	 * @param string $type
	 * @return boolean Basically returns time (if flooding) or nothing..
	 */
	private function failed($type)
	{
		# Scrambled (cheap)
		if (@$_SESSION['fld'.$type] > time())
		{
			return true;
		}
	}
	
	/**
	 * Marks attempt (really cheap..)
	 *
	 * @param string $type
	 * @param boolean $destroy
	 */
	private function markThem($type, $id=false, $marker=null)
	{
		# Now + 5 seconds 
		$_SESSION['fld'.$type] = time() + 5;

		if ($id)
			$_SESSION['fld'.$type] = $marker;
	}	
        
	/**
	 * Console update
	 */        
	public function console_()
	{		
		$server = @$this->cleanOffset($this->params[0]);
		$token	= @$this->params[1];
		if (!$server OR !$token)
		{
			die();
		}
		
		# Disable direct access
		if(@$_SERVER['HTTP_X_REQUESTED_WITH'] != 'XMLHttpRequest') {
			die();
		}	
		
		# Basic token check (auto refreshes page each 2 minutes..)
		if ($token > (time() + 62))
		{
			die("N/a");
		}
		
		# Basic flood check
		if (@$_SESSION['fld_cnsl_mrk'] && $this->failed('cnsl'))
		{
			die('flood');
		}
		else
		{
			# Mark attempts
			@$this->markThem('cnsl');
			@$this->markThem('cnsl_mrk', true, $server);
		}
		
		$this->db->bind('server', $server);
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
			WHERE serverid = :server
		");
		
		if (!$data)
		{
			die();
		}
		
		if (!$data['started'])
		{
			die();
		}
		
		# Create connection
		$ssh = new SSH($data['sship'], $data['sshport']);
		if (!$ssh->ssh->login($data['sshuser'], $data['sshpass']))
		{
			die();
		}
		# 1 seconds is more then enough..
		$ssh->setTimeout(1);

		$sudo = $data['sudo'] ? 'sudo ' : '';

		//We retrieve the last 100 lines of screenlog.0
		$cmd = "cd ".$data['homedir']."; ".$sudo."tail screenlog.0 -n 50";
		$output = $ssh->exec($cmd."\n");

		$ssh->disconnect();

		echo nl2br($this->xss($output));
	}
}
