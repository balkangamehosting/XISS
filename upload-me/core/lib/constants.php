<?php
# Disallow direct access
if (!_ROUTING_)	die("Error (NO ROUTING) :: Direct access not allowed...");

/**
 * Include config file
 * 
 * @desc Config can be optionally placed more levels above root.
 */
# Script root
if (file_exists('config.php'))
	include 'config.php';
elseif (file_exists('../config.php'))
	include '../config.php';
elseif (file_exists('../../config.php'))
	include '../../config.php';
elseif (file_exists('../../../config.php'))
	include '../../../config.php';
elseif (file_exists('../../../../config.php')) 
	include '../../../../config.php';
else
	die("Could not find config file!?");

/**
 * Constans are accessible thru out whole script
 * but set from config.cfg
 */
# Database
define("DB_TYPE", $db_type);	
define("DB_HOST", $db_host);	
define("DB_PORT", $db_port);	
define("DB_NAME", $db_name);	
define("DB_USER", $db_user);	
define("DB_PASS", $db_pass);	
define("DB_PREFIX", $db_prefix);

/**
 * Somewhat a hack..to load different settings (DB based)
 */
include_once('core/classes/class_Database.php');
$db = new core_class_Database();
$data = $db->row("SELECT * FROM ".$db->prefix('general')." ");
/******************* End a hack *******************/

# Mail
define("MAIL_SUPPORT", (($data && $data['supportmail']) ? $data['supportmail'] : $mail_support));
define("MAIL_SYSTEM", (($data && $data['noreplymail']) ? $data['noreplymail'] : $mail_system));

# General
define("DEBUG", $debug);																		
define("WS_SITENAME", (($data && $data['panelname']) ? $data['panelname'] : $ws_sitename) );	
define("WS_URL", (($data && $data['panelurl']) ? $data['panelurl'] : $ws_url));					
define("WS_FOLDER", $ws_folder);																
define("WS_TEMPLATE", (($data && $data['template']) ? $data['template'] : $ws_template ));		
define("WS_LANG", (($data && $data['lang']) ? $data['lang'] : $ws_lang));						
define("WS_LANG_AUTOLOAD", ($data ? $data['geoip'] : $ws_lang_autoload));	
define("WS_LANG_IPV6", ($data ? $data['geoipipv6'] : $ws_lang_IPv6));		
define("SMARTY_CACHING", ($data ? $data['caching'] : $smarty_caching));		
define("LOAD_STATISTICS", ($data ? $data['statistics'] : $load_statistics));

# Security
define("OFFSET", $offset);	
define("PEPPER", $pepper);	
define("CRON", $cron);		
