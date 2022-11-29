<?php
# Disallow direct access
if (!_ROUTING_)	die("Error (NO ROUTING) :: Direct access not allowed...");

/**
 * Game Query
 *
 * Deals with Game Queries
 * 
 * @link: http://gameq.sourceforge.net/
 *
 */
class Query
{
	# Stores servers
	var $servers = array();

	# Stores class
	var $instance = null;

	# Store name so color parsing can be sorted..
	private $name;
	
	/**
	 * Sets a game query
	 * 
	 * @param string $name
	 * @param string $query
	 * @param string $ip
	 * @param value $port
	 */
	public function __construct($name, $query, $ip, $port)
	{	
		# Sort servers
		$servers = array(				
			$name => array($query, $ip, $port)
		);
	
		set_include_path('core/vendors/gameq' . PATH_SEPARATOR . 'GameQ');		
		require_once 'GameQ.php';
		
		# Save instance
		$this->instance = new GameQ();
		
		# Save servers
		$this->servers = $servers;
		
		# Save name
		$this->name = $name;
	}
	
	public function data()
	{	
		# Add servers
		$this->instance->addServers($this->servers);
		
		# Set Time out
		$this->instance->setOption('timeout', 200);
		
		# Filters
		//$this->instance->setFilter('normalise');
		//$this->instance->setFilter('sortplayers', 'gq_ping');
		
		// Sents request
		$data = $this->instance->requestData();
		
		# A hack to fix some stuff..
 		@$data[$this->name]['gamename'] = $this->parse_colors($data[$this->name]['gamename']);
		@$data[$this->name]['sv_hostname'] = $this->parse_colors($data[$this->name]['sv_hostname']);
		@$data[$this->name]['hostname'] = $this->parse_colors($data[$this->name]['hostname']);
		
		return $data;
	}
	
	/**
	 * Fix the colors in names
	 */
	public function parse_colors($text) {
	
		# Clear garbage
		$text = preg_replace('/[^\r\n\t\x20-\x7E\xA0-\xFF]/', '', trim($text));
	
		# load first set..
		$switch = 1;
	
		# Check if there's a color..
		if (substr_count($text, '^')>0) {
	
		$clr = array ( // colors
			"\"#000000\"", "\"#DA0120\"", "\"#00B906\"", "\"#E8FF19\"", //  1
			"\"#170BDB\"", "\"#23C2C6\"", "\"#E201DB\"", "\"#FFFFFF\"", //  2
			"\"#CA7C27\"", "\"#757575\"", "\"#EB9F53\"", "\"#106F59\"", //  3
			"\"#5A134F\"", "\"#035AFF\"", "\"#681EA7\"", "\"#5097C1\"", //  4
			"\"#BEDAC4\"", "\"#024D2C\"", "\"#7D081B\"", "\"#90243E\"", //  5
			"\"#743313\"", "\"#A7905E\"", "\"#555C26\"", "\"#AEAC97\"", //  6
			"\"#C0BF7F\"", "\"#000000\"", "\"#DA0120\"", "\"#00B906\"", //  7
			"\"#E8FF19\"", "\"#170BDB\"", "\"#23C2C6\"", "\"#E201DB\"", //  8
			"\"#FFFFFF\"", "\"#CA7C27\"", "\"#757575\"", "\"#CC8034\"", //  9
			"\"#DBDF70\"", "\"#BBBBBB\"", "\"#747228\"", "\"#993400\"", // 10
			"\"#670504\"", "\"#623307\""                                // 11
		);
	
		if ($switch == 1)
		{ 
			// colored string
			$search  = array (
				"/\^0/", "/\^1/", "/\^2/", "/\^3/",        //  1
				"/\^4/", "/\^5/", "/\^6/", "/\^7/",        //  2
				"/\^8/", "/\^9/", "/\^a/", "/\^b/",        //  3
				"/\^c/", "/\^d/", "/\^e/", "/\^f/",        //  4
				"/\^g/", "/\^h/", "/\^i/", "/\^j/",        //  5
				"/\^k/", "/\^l/", "/\^m/", "/\^n/",        //  6
				"/\^o/", "/\^p/", "/\^q/", "/\^r/",        //  7
				"/\^s/", "/\^t/", "/\^u/", "/\^v/",        //  8
				"/\^w/", "/\^x/", "/\^y/", "/\^z/",        //  9
				"/\^\//", "/\^\*/", "/\^\-/", "/\^\+/",    // 10
				"/\^\?/", "/\^\@/", "/\^</", "/\^>/",      // 11
				"/\^\&/", "/\^\)/", "/\^\(/", "/\^[A-Z]/", // 12
				"/\^\_/",                                  // 14
				"/&</", "/^(.*?)<\/font>/"                 // 15
			);
	
			$replace = array (
				"&<font color=$clr[0]>", "&<font color=$clr[1]>",   //  1
				"&<font color=$clr[2]>", "&<font color=$clr[3]>",   //  2
				"&<font color=$clr[4]>", "&<font color=$clr[5]>",   //  3
				"&<font color=$clr[6]>", "&<font color=$clr[7]>",   //  4
				"&<font color=$clr[8]>", "&<font color=$clr[9]>",   //  5
				"&<font color=$clr[10]>", "&<font color=$clr[11]>", //  6
				"&<font color=$clr[12]>", "&<font color=$clr[13]>", //  7
				"&<font color=$clr[14]>", "&<font color=$clr[15]>", //  8
				"&<font color=$clr[16]>", "&<font color=$clr[17]>", //  9
				"&<font color=$clr[18]>", "&<font color=$clr[19]>", // 10
				"&<font color=$clr[20]>", "&<font color=$clr[21]>", // 11
				"&<font color=$clr[22]>", "&<font color=$clr[23]>", // 12
				"&<font color=$clr[24]>", "&<font color=$clr[25]>", // 13
				"&<font color=$clr[26]>", "&<font color=$clr[27]>", // 14
				"&<font color=$clr[28]>", "&<font color=$clr[29]>", // 15
				"&<font color=$clr[30]>", "&<font color=$clr[31]>", // 16
				"&<font color=$clr[32]>", "&<font color=$clr[33]>", // 17
				"&<font color=$clr[34]>", "&<font color=$clr[35]>", // 18
				"&<font color=$clr[36]>", "&<font color=$clr[37]>", // 19
				"&<font color=$clr[38]>", "&<font color=$clr[39]>", // 20
				"&<font color=$clr[40]>", "&<font color=$clr[41]>", // 21
				"", "", "", "", "", "",                             // 22
				"", "</font><", "\$1"                               // 23
			);
	
			$ctext = preg_replace($search, $replace, $text);
		
			if ($ctext != $text)
			{
				$ctext = preg_replace("/$/", "</font>", $ctext);
			}
	
			return trim($ctext);
		}
		elseif ($switch == 2)
		{ 
			// colored numbers
			if ($text <= 39)
			{
				$ctext = "<font color=$clr[7]>$text</font>";
			}
			elseif ($text <= 69)
			{
				$ctext = "<font color=$clr[5]>$text</font>";
			}
			elseif ($text <= 129)
			{
				$ctext = "<font color=$clr[8]>$text</font>";
			}
			elseif ($text <= 399)
			{
				$ctext = "<font color=$clr[9]>$text</font>";
			}
			else
			{
				$ctext = "<font color=$clr[1]>$text</font>";
			}
	
			return trim($ctext);
		}
		}		
		else # no color so just return ..
		{
			return trim($text);
		}
	}
}