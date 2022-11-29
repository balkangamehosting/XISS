<?php
# Disallow direct access
if (!_ROUTING_)	die("Error (NO ROUTING) :: Direct access not allowed...");

/** 
 * Converts language on fly.
 * 
 * @author Nate 'L0
 *
 */
class core_class_Language
{		
	/**
	 * Replace all %s occurances with correct label.
	 * 
	 * @param string $str Initial string
	 * @param string|array $replace Replacers for tags
	 * @return string
	 */
	private function replace($str, $replacer=array()) 
	{		
		# If single line just return it 
		if (!is_array($replacer))
			return str_replace('%s', $replacer, $str);
		
		# Set string
		$search = $str;
			$replacements = $replacer;
				$matchCount = 0;
					$replace = '%s';
					
		# Loop thru string
		while(false !== strpos($search, $replace))
		{
		  $replacement = $replacements[$matchCount % count($replacements)];
		  $search = preg_replace('/('.$replace.')/', $replacement, $search, 1);
		  $matchCount++;
		}	
		
	return $search;	
	}
	
	/**
	 * Build a string by replacing tags. 
	 * 
	 * @param string $str
	 * @param string|array $replacer
	 * @return string
	 */
	public function languageMarkup($str, $replacer='') 
	{		
		include 'lang/' .$_SESSION['lang']. '/language.php';
			
		if (!empty($replacer)) 
		{
			$language[$str] = $this->replace($language[$str], $replacer);
		}
		
		return $language[$str];
	}
}
