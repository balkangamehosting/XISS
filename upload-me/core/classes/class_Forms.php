<?php
# Disallow direct access
if (!_ROUTING_)	die("Error (NO ROUTING) :: Direct access not allowed...");

/**
 * Deals with forms
 * 
 * Basically a simple class that aids with large forms. 
 * Generally it takes an array of data, casts it and escapes 
 * xss, then builds an array which can be directly used to bind 
 * (prepared statments) data to database and prevent SQL injects.
 * 
 * @author Nate 'L0
 */
class core_class_Forms
{	
	/**
	 * Cleans the input
	 * 
	 * Ideally this would be done outside of the class but well.. ok.	 * 
	 * FIXME: Put it outside of the class.
	 *
	 * @param string $s
	 * @return string
	 */
	private function xss($s)
	{
		return htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
	}
	
	/**
	 * Cast types & Cleans output (XSS)
	 * 
	 * @param string $in
	 * @return string
	 */
	
	private function casting($key, $value)
	{
		$in = explode("_", $key);
		
		# Sort correct casting
		switch ($in[1])
		{
			case 'int':
				return $this->xss((int)$value);
			break;
			case 'float':
				return $this->xss((float)$value);
			break;
			case 'bool':
				return $this->xss((bool)$value);
			break;
			case 'str':
				return $this->xss((string)$value);
			break;
			# Basically fixes checkboxes to be DB friendly
			case 'inline':
				return ($value ? 1 : 0);
			break;
		}
	}
	
	/**
	 * Basically takes a string, clips out nonsense and returns 
	 * clean string which is actually a DB field name.
	 * 
	 * @param string $key
	 * @return string 
	 */
	private function buildFields($key)
	{
		# First argument is DB name so set it..
		$in = explode("_", $key);
	
		# Basically strips all out but alphanumeric and underscore
		return preg_replace('/[^\w-]/', '', $in[0]);
	}
	

	private function syntaxReplacer($in)
	{
		$value = implode($in);
		
		return str_replace('%s', $value, $this->syntax);
	}
	
	/**
	 * Prepares array
	 * 
	 * Basically takes array, casts it, cleans it (xss) and returns array
	 * that can be binded to database.
	 * 
	 * @param array $in Takes input post array.
	 * @param array $args Adds any additional conditions to bind list.
	 * @return array Constructed array which is used as prepared statements.
	 */
	public function bindList($in, $args=array())
	{	
		# Sort casting and clean input
		foreach ($in AS $out => $key)
			$casted[$this->buildFields($out)] = $this->casting($out, $key);	
	
		# Parses any additional binds (WHERE clause etc).
		if ($args)
			$casted = array_merge($casted, $args);	
	
		return (array)$casted;
	}
	
	/**
	 * Builds the Update query
	 * 
	 * @param $array $in A constructed query.
	 * @param $string $table A table name.
	 * @param $string $condition Fills the WHERE clause field.
	 * @return string - SQL formated Update string.
	 */
	public function sqlUpdate($in, $table, $condition)
	{			
		# Fields
		$fields = null;		
	
		foreach ($in AS $out => $key)	
		{			
			# Don't add colon at last field
			//$colon = ( (end($in) !== $key) ? ', ' : '');
			$colon = ( (next($in) === false) ? '' : ', ');
			
			$fields .=  '`' .$out . '` = :'.$out . $colon;
		}
		
		# Builds SQL syntax
		return "UPDATE " . $table . " SET " . $fields . " " . $condition;		
	}
	
	/**
	 * Builds the Insert query
	 * 
	 * @param array $in A constructed query.
	 * @param string $table Table name.
	 * @return string - SQL formated Insert string.
	 */
	public function sqlInsert($in, $table)
	{
		# Fields
		$fields = null;
		# Statements
		$params = null;
		
		foreach ($in AS $out => $key)
		{
			# Don't add colon at last field
			$colon = ( (next($in) === false) ? '' : ', ');
				
			$fields .= '`' . $out . '`' . $colon;
			$params .= ':'. $out . $colon;			
		}
			
		# Builds SQL syntax
		return  "INSERT INTO " . $table . ' (' . $fields . ') VALUES ('. $params . ')';
	}
}