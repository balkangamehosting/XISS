<?php
/**
 * Index file
 * 
 * Main entry point.
 */

/**
 * For Statistics class
 */
$starttime = explode(' ', microtime());
$starttime = $starttime[1] + $starttime[0];
$memoryload = memory_get_usage();

/**
 * Set entry point for router 
 */
define("_BASE_", true);

/**
 * Start Session
 */
if (function_exists('session_start'))
	session_start();

/**
 * Load router
 */
require_once 'core/router.php';
