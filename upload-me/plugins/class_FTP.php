<?php
# Disallow direct access
if (!_ROUTING_)	die("Error (NO ROUTING) :: Direct access not allowed...");

/**
 * FTP handling
 *
 * Deals with FTP
 * 
 * @author: tendrid
 * @link: http://www.php.net/manual/en/book.ftp.php#105868
 *
 */
class FTP
{	
	# FTP connection
	public $conn;
	
	/**
	 * Kick starts FTP
	 * 
	 * @param string $url
	 * @param integer $port
	 */
	public function __construct($url, $port)
	{
		$this->conn = ftp_connect($url, $port);
	}
	 
	/**
	 * Magic methods
	 * 
	 * @param string $func
	 * @param string $a
	 * @return function|boolean
	 */
	public function __call($func,$a)
	{
		if(strstr($func,'ftp_') !== false && function_exists($func))
		{
			array_unshift($a,$this->conn);
			return call_user_func_array($func,$a);
		}
		else
		{
			return false;
		}
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
	 * Sort a 2 dimensional array based on 1 or more indexes.
	 *
	 * msort() can be used to sort a rowset like array on one or more
	 * 'headers' (keys in the 2th array).
	 *
	 * @link http://blog.jachim.be/2009/09/php-msort-multidimensional-array-sort/
	 * @param array        $array      The array to sort.
	 * @param string|array $key        The index(es) to sort the array on.
	 * @param int          $sort_flags The optional parameter to modify the sorting
	 *                                 behavior. This parameter does not work when
	 *                                 supplying an array in the $key parameter.
	 *
	 * @return array The sorted array.
	 */
	function msort($array, $key, $sort_flags = SORT_REGULAR) 
	{
		if (is_array($array) && count($array) > 0) 
		{
			if (!empty($key)) 
			{
				$mapping = array();
				foreach ($array as $k => $v) 
				{
					$sort_key = '';
					if (!is_array($key)) 
					{
						$sort_key = $v[$key];
					}
					else
					 {
						// @TODO This should be fixed, now it will be sorted as string
						foreach ($key as $key_key) 
						{
							$sort_key .= $v[$key_key];
						}
						$sort_flags = SORT_STRING;
					}
					$mapping[$k] = $sort_key;
				}
				
				asort($mapping, $sort_flags);
				$sorted = array();
				
				foreach ($mapping as $k => $v) 
				{
					$sorted[] = $array[$k];
				}
				return $sorted;
			}
		}
		return $array;
	}
	
	/**
	 * Returns file extension so it can be sorted out
	 * 
	 * @param file $file
	 * @return Ambigous <NULL, string>
	 */
	private function get_file_extension($file) 
	{
		$ext = substr(strrchr($file,'.'),1);
		
		return ($ext ? $ext : null);
	}
	
	/**
	 * Sorts icons for various types..
	 * 
	 * @param string $in
	 * @return string
	 */
	private function sortIcon($in)
	{	
		# Edit icon
		if (
			$this->get_file_extension($in) == 'cfg' OR
			$this->get_file_extension($in) == 'txt' OR
			$this->get_file_extension($in) == 'ini'
		)
			return 'edit';
		
		# Sys engine
		elseif (
			$this->get_file_extension($in) == 'so' OR
			$this->get_file_extension($in) == 'x86' OR
			$this->get_file_extension($in) == 'x64' OR
			$this->get_file_extension($in) == 'exe' OR
			$this->get_file_extension($in) == 'bat'
		)
			return 'exec';
	
		# Generic icon
		else
			return 'file';
	}
		
	/**
	 * Raw list parser
	 * 
	 * @link http://forums.phpfreaks.com/topic/209207-ftp-rawlist/
	 * @param array $conn Parses FTP's raw list 
	 * @return array 
	 */
	public function raw_listing($list)
	{
		$i = 0;
		foreach ($list as $current) 
		{
			$split = preg_split("[ ]", $current, 9, PREG_SPLIT_NO_EMPTY);
			if ($split[0] != "total") 
			{	
				# Ugly inline to solve null problems for listing..
				$parsed[$i]['notdir'] = ($split[0] { 0 } === "d" ? 0 : 1);	
				# Sorts Icon
				$parsed[$i]['icontype'] = @$this->sortIcon($split[8]);
				# User friendly size print..
				$parsed[$i]['size'] = $this->sortSize($split[4]);
						
				$parsed[$i]['perms'] = $split[0];
				$parsed[$i]['number'] = $split[1];
				$parsed[$i]['owner'] = $split[2];
				$parsed[$i]['group'] = $split[3];				
				$parsed[$i]['month'] = $split[5];
				$parsed[$i]['day'] = $split[6];
				$parsed[$i]['time/year'] = $split[7];
				$parsed[$i]['name'] = $split[8];
				
				$i++;
			}
		}
		
		# Sort directory listing
		$parsed = @$this->msort($parsed, array("notdir", "name"), SORT_DESC);
		
		return $parsed;
	}
} 
