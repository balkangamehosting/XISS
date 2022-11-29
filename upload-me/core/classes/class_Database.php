<?php
# Disallow direct access
if (!_ROUTING_)	die("Error (NO ROUTING) :: Direct access not allowed...");

/**
 *  DB - A simple database class 
 *
 * @author		Author: Vivek Wicky Aswal. (https://twitter.com/#!/VivekWickyAswal)
 * @git 		https://github.com/indieteq/PHP-MySQL-PDO-Database-Class
 * @version      0.2ab
 *
 */
class core_class_Database {
	
	# @object, The PDO object
	private $pdo;
	
	# @object, PDO statement object
	private $sQuery;
	
	# @array,  The database settings
	private $settings;
	
	# @bool,  Connected to the database
	private $bConnected = false;
	
	# @array, The parameters of the SQL query
	private $parameters;

	# Queries executed
	public static $queries;
	
	/**
	 *   Default Constructor
	 *
	 *	1. Instantiate Log class.
	 *	2. Connect to database.
	 *	3. Creates the parameter array.
	 */
	public function __construct()
	{
		$this->Connect();
		$this->parameters = array();
	}
	
	/**
	 *	This method makes connection to the database.
	 *
	 *	1. Reads the database settings from a ini file.
	 *	2. Puts  the ini content into the settings array.
	 *	3. Tries to connect to the database.
	 *	4. If connection failed, exception is displayed and a log file gets created.
	 */
	private function Connect()
	{				
		$dsn = 'mysql:dbname='.DB_NAME.';host='.DB_HOST.';port='.DB_PORT.'';
		
		try
		{			
			# Read settings from INI file
			$this->pdo = new PDO($dsn, DB_USER, DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
		
			# We can now log any exceptions on Fatal error.
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
			# Disable emulation of prepared statements, use REAL prepared statements instead.
			$this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		
			# Connection succeeded, set the boolean to true.
			$this->bConnected = true;
		}
		catch (PDOException $e)
		{
			# Write into log and display Exception
			if (DEBUG)
				die($e->getMessage() . " \n". $this->sQuery->queryString);
			else
				die("Could not connect to database server!");
				
		}
	}
	
	/**
	 *	Every method which needs to execute a SQL query uses this method.
	 *
	 *	1. If not connected, connect to the database.
	 *	2. Prepare Query.
 	 * 	3. Parameterize Query.
	 *	4. Execute Query.
	 *	5. On exception : Write Exception into the log + SQL query.
	 *	6. Reset the Parameters.
	 */
	private function Init($query,$parameters = "")
	{
		# Connect to database
		if(!$this->bConnected) {
			$this->Connect();
		}
				
		try {			
				
			# Prepare query
			$this->sQuery = $this->pdo->prepare($query);
	
			# Add parameters to the parameter array
			$this->bindMore($parameters);
	
			# Bind parameters
			if(!empty($this->parameters)) 
			{
				foreach($this->parameters as $param)
				{
					$parameters = explode("\x7F",$param);
					$this->sQuery->bindParam($parameters[0],$parameters[1]);
				}
			}
	
			# Execute SQL
			$this->succes = $this->sQuery->execute();
						
			self::$queries++;
		}
		catch(PDOException $e)
		{	
			# Debug prints stuff
			if (DEBUG)
				return "Query :: ". @$this->sQuery->queryString . "<br />Message :: " .$e->getMessage();
			else
				# Silenced so there's no strict error			
				@$this->catchError("Init()", $e->getMessage(), $this->sQuery->queryString);
		}		
		
		# Reset the parameters
		$this->parameters = array();
	}
	
	/**
	 *	@void
	 *
	 *	Add the parameter to the parameter array
	 *	@param string $para
	 *	@param string $value
	 */
	public function bind($para, $value)
	{
		$this->parameters[sizeof($this->parameters)] = ":" . $para . "\x7F" . $value;
		
		//if (DEBUG == 2)
		//	echo $para . ' - ' . $value . "<br />";
	}
	
	/**
	 *	@void
	 *
	 *	Add more parameters to the parameter array
	 *	@param array $parray
	 */
	public function bindMore($parray)
	{
		if(empty($this->parameters) && is_array($parray))
		{
			$columns = array_keys($parray);
			
			foreach($columns as $i => &$column)	{
				$this->bind($column, $parray[$column]);
			}
		}
	}
	 
	/**
	 *  If the SQL query  contains a SELECT statement it returns an array containing all of the result set row
	 *	If the SQL statement is a DELETE, INSERT, or UPDATE statement it returns the number of affected rows
	 *
	 *  @param  string $query
	 *	@param  array  $params
	 *	@param  int    $fetchmode
	 *	@return mixed
	 */
	public function query($query,$params = null,$fetchmode = PDO::FETCH_ASSOC)
	{	
		$query = trim($query);		
		$this->Init($query,$params);
		
		# DEBUG
		//print_r($this->sQuery->errorInfo());
		//die("DOH !");
		
		if (stripos($query, 'select') === 0){
			return $this->sQuery->fetchAll($fetchmode);
		}		
		elseif (stripos($query, 'insert') === 0 ||  stripos($query, 'update') === 0 || stripos($query, 'delete') === 0) 
		{			
			return $this->sQuery->rowCount();
		}
		else 
		{
			return NULL;
		}
	}
	
	/**
	 *	Returns an array which represents a column from the result set
	 *
	 *	@param  string $query
	 *	@param  array  $params
	 *	@return array
	 */
	public function column($query,$params = null)
	{
		$this->Init($query,$params);
		$Columns = $this->sQuery->fetchAll(PDO::FETCH_NUM);
			
		$column = null;
		
		foreach($Columns as $cells) {
			$column[] = $cells[0];
		}
		
		return $column;		
	}
	
	/**
	 *	Returns an array which represents a row from the result set
	 *
	 *	@param  string $query
	 *	@param  array  $params
	 *  @param  int    $fetchmode
	 *	@return array
	 */
	public function row($query,$params = null,$fetchmode = PDO::FETCH_ASSOC)
	{
		$this->Init($query,$params);
		return $this->sQuery->fetch($fetchmode);
	}
	
	/**
	 *	Returns the value of one single field/column
	 *
	 *	@param  string $query
	 *	@param  array  $params
 	 *	@return string
	 */
	public function single($query,$params = null)
	{
		$this->Init($query,$params);
		return $this->sQuery->fetchColumn();
	}
	
	/**
	 * Returns rows found
	 * 
	 * @param string $query
	 * @param array $params
	 */
	public function countRows($query,$params = null)
	{
		$this->Init($query,$params);
		$rows = $this->sQuery->rowCount();
			
		return $rows;
	}
	
    /**
     * Error cacther
     * 
     * @desc Catches SQL error and saves in DB
     */
    private function catchError($type="( SQL )", $error, $query="") 
    {   	
    	if ($query) 
    	{
    		$error = "Query: " . $query . "\n 
    				  Error: " . $error;
    	}
    	else 
    	{
    		$error = "Error: " . $error;
    	}
    	
    	$this->query("INSERT INTO ".$this->prefix("sys_error")." (etype, edata, edate)
    			VALUES ( :t, :e, NOW())", array("t"=>$type, "e"=>$error));
    	
    }
    
    /**
     * Adds table prefix
     * 
     * @return string
     */
    public function prefix($str) 
    {
    	return DB_PREFIX.$str;
    }
}
