<?php
# Disallow direct access
if (!_ROUTING_)	die("Error (NO ROUTING) :: Direct access not allowed...");

/**
 * Accounts
 *
 * Handles registrations, logins and password resets.
 *
 */
class Accounts extends API 
{
	/**
	 * Login
	 * Checks if user can login
	 *
	 * @param string $user
	 * @param string $pass
	 * return boolean
	 */
	public function login($user, $pass) 
	{	
		# Looks for username AND ( password OR temporary password ) match
		$do = $this->db->row(
			"SELECT
				id, username, `group`, suspended, lang
			FROM
				".$this->prefix('users')."
			WHERE
				MD5(username) = MD5(:user)
			AND
				( SHA1(CONCAT(salt, :pass))=password OR SHA1(CONCAT(salt, :temp))=password_temp )			
			LIMIT 1",
			
			array("user" => $user, "pass" => $pass.PEPPER, "temp" => $pass.PEPPER )
		);
	
		# Create session
		if ($do) 
		{	
			# Expired accounts
			if ($do['suspended'])
			{
				return 2;	
			}	
			
			# Create session
			$this->user_session($do['id'], $do['username'], $do['group']);
			
			# Sort Language
			if ($do['lang'])
				$_SESSION['lang'] = $do['lang'];
		
			# Updates entry			
			$this->db->bind("ip", $this->getIP());
			$this->db->bind("id", $do['id']);
			$this->db->query(
				"UPDATE ". $this->prefix('users') . " SET last_visit=NOW(), ip = :ip  WHERE id= :id "
			);
		}
		
		# Insert into logs
		$this->db->bind("id", $do['id']);
		$this->db->bind("ip", $this->getIP());			
		$this->db->query("
			INSERT INTO ".$this->prefix('logs_users')."
				(user_id, user_ip, created)
			VALUES
				(:id, :ip, NOW())
		");	
	
		return ( $do ? true : false );
	}
	
	/**
	 * user_session
	 * Creates all the user sessions once client logs in.
	 *
	 * @param integer $id
	 * return boolean
	 */
	private function user_session($id, $user, $group) 
	{	
		$_SESSION['user_id'] = $id;				# ID
		$_SESSION['user_alias'] = $user;		# To prevent querying database all the time
		$_SESSION['user_name'] = $user;			# To prevent querying database all the time
		$_SESSION['user_group'] = $group;		# User level
		$_SESSION['user_logged'] = true;		# So basic checks can be done
		$_SESSION['user_lastactive'] = time();	# Session timeout
	}
	
	/**
	 * Random string generator
	 *
	 * @note  It wont go over 40 chars!
	 * @param string $out
	 * @return string
	 */
	private function generate_string($out) 
	{
		return $random = substr(sha1(rand()),0,$out);
	}
	
	/**
	 * Creates new user
	 *
	 * @param string  $user
	 * @param string $email
	 * @return boolean
	 */
	public function register($username, $password, $email, $firstname, $lastname, $group, $suspended) 
	{	
		# NOTE! When creating password it should be SALT . PASSWORD . PEPPER!
		if (!$password)
		{
			$password = $this->generate_string(12);
			$salt = $this->generate_string(10);
			$pass = sha1($salt.$password.PEPPER);
		}
		else
		{
			$salt = $this->generate_string(10);
			$pass = sha1($salt.$password.PEPPER);
		}	
		
	
		# Prepare
		$this->db->bindMore(
			array(
				"username" => $username,
				# Hash here so clear case can be sent to client via email.
				"password" => $pass,
				"password_temp" => $pass,
				"salt" => $salt,
				"firstname" => $firstname,
				"lastname" => $lastname,
				"email" => $email,
				"group" => (int)$group,
				"suspended" => $suspended
			)
		);
	
		# Insert in db
		$do = $this->db->query("
			INSERT INTO " . $this->prefix('users') . "
			 (
				username,
				password,
				password_temp,
				salt,
				firstname,
				lastname,
				email,
				`group`,
				suspended,
				last_visit,
				created	
			)
			VALUES 
			(
				:username,
				:password,
				:password_temp,
				:salt,
				:firstname,
				:lastname,
				:email,
				:group,
				:suspended,
				NOW(),
				NOW()
			)
		");
	
		return ( $do ? $password : null );
	}
	
	/**
	 * Resets user password
	 *
	 * @param string $in
	 * @return string
	 */
	public function reset_password($in) 
	{	
		$password = $this->generate_string(12);
		
		$this->db->bindMore(array(
			"pass" => $password.PEPPER,
			"name" => $in,
			"email" => $in
		));
	
		$do = $this->db->query("
			UPDATE 
				".$this->prefix('users')." 
			SET
				password_temp = SHA1(CONCAT(salt, :pass))
			WHERE
				username = :name OR email = :email				 
			LIMIT 1
		");
	
		return( $do ? $password : null );
	}
	
	/**
	 * Logout
	 *
	 * Destroys sessions and redirects user to main page.
	 */
	public function logout() 
	{	
		 # Destroy all sessions
		foreach($_SESSION as $k => $v)
		 	unset( $_SESSION[$k]);
	
		session_destroy();
		session_regenerate_id(true);
	
		# Go to main page now
		return header("location: ".$this->url);
	}
}
