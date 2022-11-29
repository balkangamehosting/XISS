<?php
/**
 * Config
 * 
 * Core settings of XISS GamePanel.
 * 
 * NOTE: You can easily move this file outside of your root folder.
 * 		4 levels above root are supported but it will only check above
 * 		it's path and not inside any folder (eg: ../../someRandomFolder/..)
 */

/**
 * Disallow access from outside world...
 */
if (!_ROUTING_)	die("Error (NO ROUTING) :: Direct access not allowed...");

/**
 * Database Vars 
 */
$db_type = "mysql";			// Database backend type (default MySQL)
$db_host = "localhost";		// Database Hostname
$db_port = "3306";			// Database Port 
$db_name = "ltarxpkq_panel";				// Database Name
$db_user = "ltarxpkq_panel";				// Database User
$db_pass = "nikola99@";				// Database Password	
$db_prefix = "";			// Database table prefix

/**
 * Error Handling
 * 
 * @note This has to be disabled for production..
 */
ini_set("display_errors","0");
ERROR_REPORTING(0);	
$debug = false;

/**
 * Overwritables 
 * 
 * Variables bellow are overwritten by General Settings (once they're set).
 */
# Email
$mail_support = "admin@hosting.com";		// Contact mail
$mail_system = "noreply@hosting.com";		// Noreply Mail
$ws_sitename = 'Hosting';					// Website name
$ws_url = "http://localhost/hosting";		// Full url without leading slash (for downloads)
$ws_template = 'default';					// Site template
$ws_lang = "en";							// Default language to resort to, 
											// if language geoip located doesn't exists
$ws_lang_autoload = false;					// Enable Language targeting (autoloading if exists)
$ws_lang_IPv6 = false;						// Support IPv6 targeting if autoload is enabled
$smarty_caching = false;					// Enables smarty caching
$load_statistics = true;					// Loads statistics

/**
 * General settings
 */
date_default_timezone_set('Europe/Ljubljana');	// Default TimeZone (in case if you don't have it set in php.ini..)
$ws_folder = "";								// Path (blank for root) that script resides 
												// (used by framework for uploads - not part of this script)

/**
 * Security related Vars 
 */
$offset = "9845";						// ID obscuring (only numbers!)
$pepper = "fewdf5tgfdsr";				// Salt & Pepper method
$cron   = "gfdg90gfdgnjgkl54";			// Cron password

