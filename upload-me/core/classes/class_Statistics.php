<?php
# Disallow direct access
if (!_ROUTING_)	die("Error (NO ROUTING) :: Direct access not allowed...");

/**
 * Statistics
 * 
 * Simple page statistics for execution times etc.
 * 
 */
class core_class_Statistics {	

	/**
	 * get_statistics
	 * 
	 * @return array
	 */
	public function get_statistics() {
		global $starttime;
		global $memoryload;
			
		$units = array('B' => 0, 'KB' => 1, 'MB' => 2, 'GB' => 3, 'TB' => 4,
				'PB' => 5, 'EB' => 6, 'ZB' => 7, 'YB' => 8);
		
		# Get execution
		$mtime = explode(' ', microtime());
			$totaltime = $mtime[0] + $mtime[1] - $starttime;		
				$total = round($totaltime, 3);
				
		# Get memory
		$mem_usage = memory_get_usage();
				
		if ($mem_usage < 1024)
			$memory = $mem_usage." Bytes";
		elseif ($mem_usage < 1048576)
			$memory =  round($mem_usage/1024,2)." Kb";
		else
			$memory =  round($mem_usage/1048576,2)." Mb";
		
		return array($total, $memory);
	}	
}
