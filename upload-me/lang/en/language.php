<?php
# Disallow direct access
if (!_ROUTING_)	die("Error (NO ROUTING) :: Direct access not allowed...");

/**
 * English translation for XISS Game Panel.
 *
 * @author Nate 'L0
 *
 */
$language = array(
		
	# Global Errors
	'ERROR_PARAMS' => 				'ERROR: To many parameters..',
	'ERROR_GENERAL' => 				'Error has occured',
	'ERROR_CRITICAL' => 			'Critical error ...' ,
	'ERROR_GENERIC' => 				'Page not found',
	'ERROR_TITLE' => 				'Error!',
	'ERROR_NOTFOUND' => 			'404 - Page not found..',	
	'ERROR_INSUFFICENT' => 			'Insufficient rights to view this page!',
	'ERROR_INSUFFICENT_LEVEL' =>	'Insufficient rights to execute this action!',
		
	# ACL Levels
	'GUEST' => 		'Guest',
	'USER' => 		'Member',
	'RESELLER' => 	'Reseller',
	'ADMIN' => 		'Admin',
		
	# Globals (set in class_Tags (mostly))
	'COPYRIGHT'	=> 			'Copyright',
	'RIGHTSRESERVED' => 	'All rights reserved',
	'SITESTATS' => 			'| Memory used: %s | Script executed in %s seconds | With %s Queries executed',
	'LOGOUT' => 			'Logout',
	'LOGGED_AS' => 			'Logged in as <b>%s</b>',
	'HIJACKED_RESTORE' => 	'Restore account rights',
	'SELECT' => 			'Select',
	'OTHER'	=>				'Other',
	'REFRESH' =>			'Refresh',
	'CHANGES_SAVED_OK'	=>	'Changes have been saved',
	'CHANGES_SAVED_FAIL' =>	'Error occured while trying to save changes!',
	## Months
	'JANUARY' => 	'January',
	'FEBRURARY' => 	'Februar',
	'MARCH' =>		'March',
	'APRIL' =>		'April',
	'MAY'	=>		'May',
	'JUNE' =>		'June',
	'JULY'	=>		'July',
	'AUGUST' =>		'August',
	'SEPTEMBER' => 	'September',
	'OCTOBER' =>	'October',
	'NOVEMBER' =>	'November',
	'DECEMBER'	=>	'December',
	## Days
	'SUNDAY' => 	'Sunday',
	'MONDAY' =>		'Monday',
	'TUESDAY' =>	'Tuesday',
	'WEDNESDAY' =>	'Wednesday',
	'THURSDAY' =>	'Thursday',
	'FRIDAY' =>		'Friday',
	'SATURDAY'	=>	'Saturday',
	## Time Labels
	'SEC'			=>	'sec.',
	'MIN'			=>	'min',
	'MINS'			=>	'mins',
	'HOUR'			=>	'h',
	'HOURS'			=>	'hrs',
	'DAY'			=>	'day',
	'DAYS'			=>	'days',
	'WEEK'			=>	'week',
	'WEEKS'			=>	'weeks',
	'MONTH'			=>	'month',
	'MONTHS'		=>	'months',
	'YEAR'			=>	'year',
	'YEARS'			=>	'years',
	'DECADE'		=>	'decade',
	'DECADES'		=>	'decades',
	## Top Nav
	'HOME' => 				'Home',
	'CLIENTS' => 			'Clients',
	'SERVERS' => 			'Servers',
	'BOXES' => 				'Boxes',
	'UTILITIES' =>			'Utilities',
	'LICENSEINFO' =>		'License',
	'SYSLOGS' =>			'System Logs',
	'SETTINGS' =>			'Settings',
	'GENERAL_SETTINGS'=>	'General Settings',
	'MANAGE_GAMES'	=> 		'Manage Games',
	'EMAIL_TEMPLATE' => 	'Email Template',
	'LICENSE_SETTINGS' =>	'License Settings',
	'CRON_JOBS' =>			'Cron Jobs',
	'ACCOUNT'	=>			'Account',
	'ORDERS'	=>			'Orders',
	'INVOICES' =>			'Invoices',
	## Pagination
	'FIRST'	=>				'First',
	'LAST'		=>			'Last',
	'SHOWING_PAGES'	=>		'Page %s of %s',
	'PAGE'	=>				'page',
		
	# Login
	'L_USERNAME' =>		 		'Username',
	'L_PASSWORD' => 			'Password',
	'L_LOGIN' => 				'Login',
	'L_FORGOTPASS' => 			'Forgotten password?',
	'L_NOTFILLED' => 			'Please enter username and password..',
	'L_LOGFAIL' => 				'Username or password is incorrect!',
	'L_LOGSUSPENDED' => 		'%s, your account has been suspended.',
	'L_RESETPASS' => 			'Reset password',
	'L_USERORMAIL' => 			'Enter username or E-mail',
	'L_BACKTOLOGIN' => 			'Return to login',
	'L_ENTERMAIL' => 			'Please enter Username or E-mail..',
	'L_RESETSUCCESS' => 		'New password has been sent to your E-mail',
	'L_RESETFAIL' => 			'User or E-mail does not exists in our database.',
	'L_FLOODWAIT' => 			'You need to wait for %s seconds before you can attempt this action again.',
	'L_RESETSUCCESSMAILFAIL' => 	
		'New password was generated but system could not sent E-mail. 
		Please contact <a href="mailto:'.MAIL_SUPPORT.'?subject=Failed Password reset">support</a> so Admin can reset it for you.',
			
	# Mail (Avoid tabs so mail aligns right..)
	'MAIL_RESETPASS' => 	'Password reset',
	'MAIL_RESETPASSMSG' => 
'Heya!
 
You have requested password reset. 
Your new password is: %s
			
If you did not request password ignore this E-mail and login with your old password.',

	'MAIL_EDITED_ACCOUNT_TITLE' => 'Account Details',
	'MAIL_EDITED_ACCOUNT' =>
'Heya %s!

Your account was edited by Admin. 

Login details;
Your username is: %s
Your new password is: %s
		
To login please use provided username and password.',

	'MAIL_NEW_ACCOUNT_TITLE' => 'New account Details',
	'MAIL_NEW_ACCOUNT' => 
'Heya %s!
		
New account has been created for you. 
To login go to: %s 
		
Your login details are;
Username: %s
Password: %s
		
You can change your settings here: %s ',

	'MAIL_EXPIRE_NOTICE_TITLE' => 'Notice :: Your account will soon expire!',
	'MAIL_EXPIRE_NOTICE'	=>
'Heya %s!

This is your notice - Your account will expire after %s!
If you do not extend your package, your account will be suspended 
along with any/all servers you are renting.

To avoid any downtime or problems please extend your package. 
If you no longer wish to use our services then ignore this message and
account will be auto suspended.

If you have any problems and/or questions do not hesitate to contact us by
opening a ticket.

Kind regards!
',	
		
	# Admin
	## Index
	'IND_HOME' => 			'Home',
	'IND_WELCOME' => 		'Welcome to your Admin Control Panel!',
	'IND_CLIENTS' => 		'Clients',
	'IND_ACTIVE' => 		'Active',
	'IND_EXPIRED' => 		'Expired',
	'IND_INACTIVE' => 		'Inactive',
	'IND_SUSPENDED' => 		'Suspended',
	'IND_SERVERS' => 		'Servers',
	'IND_PENDING' => 		'Pending',
	'IND_BOXES' => 			'Boxes',
	'IND_ONLINE' => 		'Available',
	'IND_OFFLINE' => 		'Unavailable',
	'IND_UNREACHABLE' => 	'Unreachable',
	'IND_ANNOUNCEMENT' => 	'Announce',
	'IND_LAST_15_EVENTS' => 'Last 15 events',	
	'IND_ID'	=> 			'ID',
	'IND_MESSAGE' => 		'Message',
	'IND_CLIENT' => 		'Client',
	'IND_IP' => 			'IP',
	'IND_TIMESTAMP' => 		'Timestamp',
	## Account
	'ACC_GROUP' => 			'Group',
	'ACC_LASTVISIT' => 		'Last Visit',
	'ACC_LASTIP' => 		'Last IP used',
	'ACC_FIRSTNAME' => 		'Name',
	'ACC_LASTNAME' => 		'Lastname',
	'ACC_LANGUAGE' => 		'Language',
	'ACC_USERNAME' => 		'Username',
	'ACC_EMAIL'	=> 			'E-mail',
	'ACC_PASS'	=> 			'Password',
	'ACC_PASSCONFIRM' =>	'Confirm Password',
	## Announcement
	'ANN_ANNOUNCEMENT' =>	'Announcement',
	### Actions
	'IND_NEWS_ADDED'	=>		'Announcement has been published. It will auto expire in a week..',
	'IND_NEWS_FAILED'	=>		'Error occured while trying to publish announcement!',
	'IND_NEWS_DELETED'	=>		'Announcement has been deleted',
	'IND_NEWS_DELETE_FAIL' =>	'Error occured while trying to delete an Announcement!',
	'IND_NEWS_NOT_FOUND' =>		'Error! Announcement you are looking for cannot be found - was probably deleted.',	
	'ACC_PASS_MISMATCH' =>		'Passwords do not match!',
	'ACC_PASS_TOO_SHORT' =>		'Password is too short! Password has to be at least 6 chars long!',
	
	# Box
	## Add-box
	'BOX_ADVANCED' => 		'Advanced',
	'BOX_BOX' => 			'Box',
	"BOX_ADDBOX" => 		'Add a Box',
	'BOX_NAME' => 			'Name',
	'BOX_LOCATION' => 		'Server Location',
	'BOX_IP' => 			'IP',
	'BOX_PROPERTIES' => 	'Properties (optional)',
	'BOX_NETWORK' => 		'Network',
	'BOX_GB' => 			'GB',
	'BOX_MB' =>				 'MB',
	'BOX_OS_TYPE' => 		'OS type',
	'BOX_DISTRO' => 		'Distro',
	'BOX_DISTRO_VERSION' => 'Version',
	'BOX_CPU' => 			'CPU',
	'BOX_HDD' => 			'HDD',
	'BOX_RAM' => 			'RAM',
	'BOX_COST' => 			'Price',
	'BOX_SSH_SETTINGS' => 	'SSH Settings',
	'BOX_SSH_USER' => 		'User',
	'BOX_SSH_PASSWORD' => 	'Password',
	'BOX_SSH_PORT' => 		'SSH Port',
	'BOX_SSH_LOGIN_TYPE' => 'Login type',
	'BOX_SSH_USE_SUDO' => 	'Use Sudo command?',
	'BOX_FTP_SETTINGS' => 	'FTP Settings',
	'BOX_FTP_PORT' => 		'FTP Port',
	'BOX_FTP_PASSIVE' => 	'Passive mode',
	'BOX_CHECKS' => 		'Check connection',
	'BOX_ENABLED' => 		'Enabled',
	'BOX_VERIFY' => 		'Verify connection',
	## Add IP
	'BOX_BOXNAME' => 		'Box Name',
	'BOX_BOXLOCATION' => 	'Box Location',
	'BOX_ADDIP' => 			'Add IP',
	'BOX_IPADDRESS' => 		'IP Address',
	'BOX_CONNECTIVITY' => 	'Connectivity',
	'BOX_VERIFY_IP' => 		'Verify IP',
	## Box
	'BOX_BOXES_FOUND' => 	'Boxes found',
	'BOX_ID_NAME' => 		'ID/Name',
	'BOX_IPS' =>			'IPs',
	'BOX_SERVERS' => 		'Servers',
	'BOX_SSH'	=> 			'SSH',
	'BOX_FTP'	=>			'FTP',
	'BOX_STATISTICS' => 	'Statistics',
	'BOX_LOAD'	=> 			'Load',
	'BOX_MEMORY' => 		'Memory',
	'BOX_MEMORY_STATS' => 	'%s used of %s',	
	## Box Games
	'BOX_GAMES' => 				'Games',
	'BOX_INSTALLED_GAMES' => 	'Installed Games',
	'BOX_LABEL' => 				'Label',
	'BOX_GAME' => 				'Game',
	'BOX_INSTALL_PATH' => 		'Install Path',
	## Box Logs
	'BOX_LOGS' => 		'Logs',
	'BOX_ID'	=> 		'ID',
	'BOX_MESSAGE' => 	'Message',
	'BOX_CLIENT' => 	'Client',
	'BOX_TIMESTAMP' => 'Timestamp',
	## Box Servers
	'BOX_SERVERS_FOUND' => 	'Servers Found',
	'BOX_STATUS'	=> 		'Status',
	'BOX_INFO'	=> 			'Info',
	'BOX_ACTIONS' => 		'Actions',
	'BOX_PLAYERS' => 		'Players',
	'BOX_SLOTS'	=> 			'Slots',
	## Manage Box (Re-using Add-Box mostly)
	'BOX_MANAGE' => 		'Manage Box',
	'BOX_OWNER'	=>			'Owner',
	'BOX_USER'	=>			'User',
	## Show Box
	'BOX_SHOW' => 			'Show Box',
	'BOX_DETAILS' => 		'Box Details',
	'BOX_LAST_5_ENTRIES' => 'Logs (last 5 entries)',
	'BOX_LAST_5_STATS' => 	'Statistics (last 20 entries)',
	'BOX_IP_ASSIGNED' => 	'IPs assigned',
	'BOX_USED_PORTS' => 	'Ports used',
	'BOX_DELETE'	=>		'Delete Box',
	## Box Stats
	'BOX_BANDWIDTH'	=>		'Bandwidth',
	'BOX_BAND_TX'	=>		'TX (sent)',
	'BOX_BAND_RX'	=>		'RX (received)',
	'BOX_SWAP'		=>		'Swap',
	'BOX_USED'		=>		'Used',
	'BOX_FREE'		=>		'Free',
	'BOX_TOTAL'		=>		'Total',
	'BOX_AVG'		=>		'Average',
	'BOX_UPTIME'	=>		'Uptime',
	'BOX_UPDATED'	=>		'Last updated',
	'BOX_DAY'		=>		'Daily Stats',
	'BOX_WEEK'		=>		'Weekly Stats',
	'BOX_MONTH'		=>		'Monthly Stats',
	'BOX_ACTUAL'	=>		'Actual',
	'BOX_PEAK'		=>		'Peak',
	'BOX_AVERAGE'	=>		'Average',
	## Box configuration
	
	## Box Responses
	### Add box
	'BOX_INCOMPLETE'	=> 'Please fill out all the required fields correctly!',
	'BOX_ERROR'			=> 'Error has occured when trying to add the box!',
	'BOX_SUCCESS'		=> 'Box has been added.',
	'BOX_CHECKSUCCESS'	=> 'Box was added and connection successfully established.',
	'BOX_CHECKFAIL'		=> 'Box was added but connection with FTP/SSH could not be established. Please verify details.',
	'BOX_LIMITED'		=> 'You have reached your package limit! If you wish to add a new Box you need to upgrade your package.',
	### Update Box
	'BOX_UPDATED_SUCCESS'	=>	'Box was updated!',
	'BOX_UPDATED_FAIL' 		=>	'Updating Box details has failed.',
	'BOX_UPDATED_SUCCESSFAIL' =>'Box was successfully updated but connection could not be established.',
	### Box (Query)
	'NO_BOXES_FOUND'	=> 'No Boxes found.', 
	### IPs			
	'IP_MISSING'			=> 'Please enter IP address!',
	'IP_INVALID'			=> 'Please enter a valid IP address!',
	'IP_FAIL'				=> 'Error has occured while trying to add IP.',
	'IP_SUCCESS'			=> 'IP has been added.',
	'IP_DELETED'			=> 'IP has been deleted.',
	'IP_DELETED_FAIL'   	=> 'Error has occured while trying to delete IP!',
	'IP_DELETE_NOT_EMPTY' 	=> 'IP address can only be deleted when it is not in use - tied to Game Servers.',
	### Actions
	'BOX_DELETED_NOT_EMPTY' => 	'There are servers installed on this Box - Please delete servers first before you delete the box.',
	'BOX_DELETED_SUCCESS' => 	'Box was succesfully deleted.',
	'BOX_DELETED_FAIL' =>		'Error occured while trying to delete a box.',
	'BOX_PURGE_SUCCESS' =>		'Box logs were successfully purged.',
	'BOX_PURGE_FAIL'	=>		'Error occured while trying to purge the logs',
	
	# Clients
	## Add a Client
	'CL_ADDACCOUNT' => 		'Add Account',
	'CL_USER_DETAILS' => 	'New User - Details',
	'CL_GROUP' => 			'Group',
	'CL_FIRSTNAME' => 		'Firstname',
	'CL_LASTNAME' => 		'Lastname',
	'CL_USERNAME' =>		'Username',
	'CL_EMAIL' => 			'E-mail',
	'CL_PASSWORD' => 		'Password',
	'CL_EMAILUSER' => 		'Sent E-mail',
	'CL_SUSPEND_ACCOUNT' => 'Suspend Account',
	'CL_EMAIL_LANG'	=>		'E-mail Language',
	## Clients
	'CL_CLIENTS' => 	'Clients',
	'CL_ID' =>			'ID',
	'CL_SERVERS' => 	'Servers',
	'CL_LAST_LOGIN' => 	'Last Login',
	'CL_ACCOUNT'	=> 	'Account',	
	'CL_SUSPENDED' =>	'Suspended',
	## View Client
	'CL_VIEW_CLIENT' => 		'View Client',
	'CL_DETAILS' => 			'Details',
	'CL_EDIT_CLIENT' => 		'Edit Client',
	'CL_LASTVISIT' => 			'Last Visit',
	'CL_LAST_IP' => 			'Last IP used',
	'CL_PACKAGE'	=>			'Package',
	'CL_PACKAGE_TYPE' =>		'Type',
	'CL_PACKAGE_BOXES' =>		'Boxes',
	'CL_PACKAGE_SERVERS'=>		'Servers',
	'CL_PACKAGE_CLIENTS' =>		'Clients',
	'CL_PACKAGE_UNLIMITED' =>	'Unlimited Package',
	'CL_PACKAGE_EXPIRES' =>		'Package Expires',
	## Actions
	'CL_USER_UPDATED' => 		'Client profile was updated.',
	'CL_REQ_FIELDS' =>			'Please fill out all the required fields!',
	'CL_INVALID_EMAIL' =>		'Please enter a valid E-mail address!',
	'CL_NEW_SUCCESS' =>			'New account has been created.',
	'CL_MISSING_PASS' =>		'E-mail to a Client about account changes can only be sent when you provide new password as well!',
	'CL_NEW_FAIL' =>			'Error occured while trying to create new account',
	'CL_DELETE_INSUFFICIENT' => 'Action denied! You can only delete users from group Members!',
	'CL_DELETE_SELF_FAIL' =>	'Action denied! You cannot delete your own account!',
	'CL_DELETE_SUCCESS'	=>		'User has been deleted.',
	'CL_DELETE_FAIL'	=>		'Error occured while trying to delete a user!',
	'CL_HIJACK_SELF_ERROR' =>	'You are already logged in as your self..',
	'CL_HIJACKED'	=>			'You are now browsing as client <b>%s</b>',
	'CL_HIJACKED_FAIL' =>		'Error occured while trying to login as selected client!',
	'CL_HIJACK_RESTORED' =>		'Views restored - Your are now browsing with your account.',
	'CL_LIMITED'			=>	'You have reached your package limit! If you wish to add a new Client you need to upgrade your package.',
	
	# Configuration
	## Add Game
	'G_ADDGAME' => 			'Add a Game',
	'G_GAME_DETAILS' => 	'Game Details',
	'G_NAME' => 			'Name',
	'G_GAME' => 			'Game',
	'G_VERSION' => 			'Version',
	'G_STATUS' => 			'Status',
	'G_ACTIVE' => 			'Active',
	'G_INACTIVE' => 		'Inactive',
	'G_GAME_SETTINGS' => 	'Game Settings',
	'G_PRIORITY' => 		'Priority',
	'G_MAXSLOTS' => 		'Max Slots',
	'G_TYPE' => 			'Type',
	'G_PUBLIC' => 			'Public',
	'G_PRIVATE' => 			'Private',
	'G_ALLOW_CLIENT' => 	'Allow client to edit?',
	'G_STARTUP_LINE' => 	'Startup Line',
	'G_GAME_QUERY' => 		'Game Query',
	'G_QUERY_CODE' => 		'Query Code',
	'G_QUERY_PORT' => 		'Query Port',
	'G_GAME_PROPERTIES' =>  'Game Properties',
	'G_DEFAULT_PORT' => 	'Default Port',
	'G_INSTALL_PATH' => 	'Install Path',
	'G_PRIORITY_MAX' =>		'Highest',
	'G_PRIORITY_NORMAL' => 	'Normal',
	'G_PRIORITY_MIN'	=>	'Lowest',
	## Games
	'G_GAMES' => 			'Games',
	'G_RECORDS_FOUND' => 	'records found',
	'G_SLOTS_AVAILABLE' => 	'Slots Available',
	'G_QUERY' => 			'Query',
	'G_DIRECTORY' =>		'Directory',
	'G_SLOTS_FREE' =>  		'slots available',
	## Manage Game (Re-using Add-Game)
	'G_MANAGE' => 			'Manage Game',
	## Cron
	'CRON_SETTINGS' => 	'Cron Settings',
	'CRON_INFO' => 		'To enable server monitoring, set up the cron job to run every 10 minutes.',
	'CRON_TITLE' => 	'Create the following Cron Job using PHP:',
	'CRON_PACKAGES'	=>	'To enable Package and Account management, set up the cron job to run every 24 hours.',
	## Email
	'EMAIL_TEMPLATE' => 	'E-mail Template',	
	'EMAIL_SETTINGS' => 	'E-mail Settings',
	'EMAIL_TITLE' =>		'Title',
	'EMAIL_SUBJECT' =>		'Subject',
	'EMAIL_MESSAGE'	=>		'Message',
	'EMAIL_SHORTCODES' => 	'Short codes',	
	## General
	'SET_SETTINGS' => 			'General Settings',
	'SET_PANEL_SETTINGS' => 	'Panel Settings',
	'SET_PANEL'	=>				'Panel',
	'SET_PANEL_NAME' => 		'Panel Name',
	'SET_PANEL_URL' => 			'Panel Url',
	'SET_TEMPLATE'	=> 			'Template',
	'SET_LANGUAGE' => 			'Default Language',
	'SET_PUBLIC_REPOSITORY' => 	'Public Repository',
	'SET_CHECK_FOR_UPDATES' => 	'Check for Updates',
	'SET_EMAIL' =>				'E-mail',
	'SET_EMAIL_SUPPORT' => 		'Support',
	'SET_EMAIL_NOREPLY' => 		'Noreply',
	'SET_GENERAL'	=> 			'General',
	'SET_GEOIP_LANGUAGE'	=> 	'GEOIP Language',
	'SET_GEOIP_LANGUAGE_DESC' =>'Enabled (Tries to load Language based upon IP location)',
	'SET_GEOIP_IPV6'		=> 	'GEOIP IPv6',
	'SET_GEOIP_IPV6_DESC'	=> 	'Enabled (Support for IPv6 GEOIP Language targeting)',
	'SET_SMARTY_CACHING'	=> 	'Smarty Caching',
	'SET_SHOW_STATS'		=> 	'Show Statistics',
	'SET_ENABLED'			=> 	'Enabled',	
	## License Settings
	'LIC_LICENSE_SETTINGS' => 	'License Settings',
	'LIC_COPY_LICENSE' => 		'Copy your License',
	### Actions
	#### Games
	'MISSING_FIELDS'	=>		'Please fill all the required fields!',
	'G_GAME_ADDED_SUCCESS' =>	'New Game Template was successfully added.',
	'G_GAME_ADDED_FAIL'  =>		'Error occured while trying to add new Game Template!',
	'G_GAME_EDITED_SUCCESS' =>	'Game Template was successfully edited.',
	'G_GAME_EDITED_FAIL' =>		'Error occured while trying to edit Game Template',
	
	# Servers
	## Add Server
	'S_ADDSERVER' => 			'Add A server',
	'S_CLIENT' => 				'Client',
	'S_CLIENTNAME' => 			'Client Name',
	'S_GAME' => 				'Game',
	'S_SERVER_PROPERTIES' => 	'Server Properties',
	'S_NAME' => 				'Name',
	'S_EXPIRES' => 				'Expires',
	'S_NEVER'	=> 				'Never',
	'S_SERVER_SETTINGS' => 		'Server Settings',
	'S_PRIORITY' => 			'Priority',
	'S_MAXSLOTS' => 			'Max Slots',
	'S_TYPE' => 				'Type',
	'S_PUBLIC' => 				'Public',
	'S_PRIVATE' => 				'Private',
	'S_ALLOW_CLIENT' => 		'Allow client to edit?',
	'S_STARTUP_LINE' => 		'Startup Line',
	# Manage Server
	'S_MANAGE'	=> 			'Manage',
	'S_REBUILD_SERVER'	=> 	'Rebuild Server',
	'S_DELETE_SERVER' => 	'Delete Server',
	'S_INSTALL_SERVER' => 	'Install Server',
	'S_ADVANCED'	=> 		'Advanced',
	'S_SERVER_BOX' => 		'Box',
	'S_STATUS' => 			'Status',
	'S_PENDING' => 			'Pending',
	'S_ACTIVE'	=> 			'Active',
	'S_SUSPENDED' => 		'Suspended',
	'S_IP' => 				'IP',
	'S_PORT' => 			'Port',
	'S_GAME_QUERY' => 		'Game Quey',
	'S_QUERY_CODE' => 		'Query Code',
	'S_QUERY_PORT'	=> 		'Query Port',
	'S_SSH_SETTINGS' => 	'SSH Settings',
	'S_SSH_USER'	=> 		'User',
	'S_SSH_PASSWORD' => 	'Password',
	'S_SSH_HOMEDIR'	=> 		'Home dir',
	'S_SSH_INSTALLDIR' =>  	'Install dir',
	'S_SSH_UPDATEUSER' => 	'Update user',
	'S_SERVER_OWNER'  => 	'Server Owner',
	## Servers
	'S_SERVERS_FOUND' => 	'Servers found',
	'S_INFO'	=> 			'Info',
	'S_ACTIONS' => 			'Actions',
	'S_SLOTS' => 			'Slots',
	'S_PLAYERS' => 			'Players',
	'S_INACTIVE' =>			'Server Is pending install..',
	## Show
	'S_SHOW'	=> 			'Show',
	'S_WEBFTP'	=> 			'WebFTP',
	'S_CONSOLE' => 			'Console',
	'S_CLIENT_DETAILS' => 	'Client Details',
	'S_GROUP'	=> 			'Group',
	'S_LAST_VISIT' => 		'Last visit',
	'S_LAST_IP' => 			'Last IP used',
	'S_FIRSTNAME' => 		'Firstname',
	'S_LASTNAME' => 		'Lastname',
	'S_USERNAME' => 		'Username',
	'S_EMAIL' => 			'E-mail',
	'S_SERVERS'	=> 			'Servers',
	'S_LOCATION' => 		'Location',
	'S_FTP_IP'	=> 			'FTP IP',
	'S_FTP_PORT' => 		'FTP Port',
	'S_FTP_USER' => 		'FTP User',
	'S_FTP_PASSWORD' => 	'FTP Password',
	## Console
	'S_ENTER_COMMAND' => 		'Enter Command',
	'S_ENTER' => 				'Execute',
	'S_SERVER_NOT_RUNNING' =>	'Server is not running!',
	## WebFTP
	'S_FTP_DETAILS' => 		'FTP Details',
	'S_FTP_DETAILS_FULL' => 'IP: <b>%s</b> | Port: <b>%s</b> | User: <b>%s</b> | Password: <b>%s</b>',
	'S_FTP_FILE' =>		 	'File',
	'S_FTP_SIZE' => 		'Size',
	'S_FTP_OWNER' =>		'User',
	'S_FTP_GROUP' => 		'Group',
	'S_FTP_PERMS' => 		'Perms',
	'S_FTP_UPLOAD' => 		'Upload File',
	'S_FTP_NEWDIR' => 		'Create new directory',
	'S_FTP_NEWFILE'	=>		'Create new file',	
	## Install
	'S_INSTALLSERVER' => 	'Install Server',
	'S_INSTALL_BOX'	 =>		'Box',
	'S_INSTALL_IP'	=>		'IP',
	'S_USER_NOTE'	=>		'Default: Client ID multiplied by 100',
	'S_PASSWORD_NOTE' => 	'Leave blank for random password',
	'S_CREATE_USER' =>		'Create user',
	'S_AUTOINSTALL' =>		'Auto Install files',
	'S_USER'		=>		'User',
	'S_PASSWORD'	=>		'Password',
	'S_HOMEDIR'		=>		'Home Directory',
	'S_INSTALLDIR'	=>		'Install Directory',
	'S_ENABLED'		=>		'Enabled',
	## Actions
	'S_SERVER_ADDED_SUCCESS'=>	'New server was created, now you need to install it.',
	'S_SERVER_ADDED_FAIL'	=> 	'Error occured while trying to create new server.',
	'S_INSTALL_SUCCESS'		=>	'Server is installed - wait a couple of minutes for process to complete before you start the server!',
	'S_INSTALL_FAIL'		=>	'Server has been installed but error occured while trying to create a new FTP user/install a game..',
	'S_SSH_CONNECT_FAIL'	=>	'Could not connect to SSH server!?',
	'S_SSH_SERVER_STARTED'	=>	'Server started',
	'S_SSH_SERVER_FAILED'	=>	'Server could not be started!',
	'S_SSH_SERVER_RESTARTED'=>  'Server has been restarted',
	'S_SSH_SERVER_STOPPED'	=>	'Server has been stopped',
	'S_FTP_CONNECTION_FAIL'	=> 	'Could not connect to FTP server!',
	'S_FTP_DOWNLOAD_FAIL'	=>	'Downloading has failed. Insufficient permission maybe?',
	'S_FTP_ACTION_FAILED'	=>	'Error occured while trying to execute the action..',
	'S_SETTINGS_UPDATED'	=>  'Server settings were updated',	
	'S_REBUILD_NOTICE'		=> 	'Server is being rebuilded - it may take few minutes.',
	'S_SERVER_DELETED'		=>	'Server has been deleted!',
	'S_LIMITED'				=>	'You have reached your package limit! If you wish to add a new Server you need to upgrade your package.',
	
	# Utilites
	## License
	'LIC_LICENSE' => 		'License',
	'LIC_INFORMATION' => 	'License Information',
	'LIC_REGISTERED_TO' => 	'Registered to',
	'LIC_TYPE' => 			'License type',
	'LIC_ALLOWED_BOXES' => 	'Allowed Boxes',
	'LIC_USED' => 			'used',
	'LIC_BRANDING' => 		'Branding',
	'LIC_VALID_DOMAIN' => 	'Valid Domain',
	'LIC_VALID_IP' => 		'Valid IP',
	'LIC_CREATED' => 		'Created',
	'LIC_EXPIRES' => 		'Expires',
	'LIC_VERSION' => 		'Version',
	'LIC_LAST_UPDATE' => 	'Last Update',
	## Logs
	'SYS_LOGS' => 		'System Logs',
	'SYS_ID' => 		'ID',
	'SYS_MESSAGE' => 	'Message',
	'SYS_CLIENT' => 	'Client',
	'SYS_IP' => 		'IP',
	'SYS_TIMESTAMP' => 	'Timestamp',
	### Actions
	'SYS_LOGS_DELETED'		=> 'System Logs were Purged',
	'SYS_LOGS_DELETE_FAIL'	=> 'Error occured while trying to purge the System logs!',
		
	# Buttons (Forms)	
	'SAVE' => 			'Save',
	'ADD' => 			'Add',
	'ADD_ACCOUNT' => 	'Add Account',
	'ADD_IP' => 		'Add IP Address',
	'ADD_BOX' => 		'Add Box',
	'ADD_SERVER' => 	'Add Server',
	'NEXT' => 			'Next',
	'PURGE_LOGS' => 	'Purge Logs',
	'UPLOAD' => 		'Upload',
	'CREATE' => 		'Create',
	'FINISH' => 		'Finish',
	'PUBLISH' =>		'Publish',
	'DELETE' =>			'Delete',
		
	# Buttons (A links)
	'VIEW_ALL' => 			'View All',
	'BOX_BACKTO' => 		'Back to Box',
	'GAMES_BACKTO' => 		'Back to Games',
	'SERVERS_BACKTO' => 	'Back to Servers',
	'SERVER_BACKTO' => 		'Back to Server',
	'CANCEL' => 			'Cancel',
	'PREVIOUS' => 			'Previous',
	'ADD_A_CLIENT' => 		'Add new Client',
	'ADD_A_GAME' => 		'Add new Game',
	'DELETE_CLIENT' => 		'Delete Client',
	'LOGIN_AS' => 			'Login as Client',
	'PURGE_CONSOLE' =>		'Purge Console log',
	'DOWNLOAD_CONSOLE' =>	'Download Console log',
	'BACK_TO_FTP'	=>		'Back to webFTP',
	'GO_BACK'	=>			'Go back',
	'STATS'		=>			'Statistics',
	'CONFIGURE'	 		=>	'Configure',
	
	# Logs
	'LOG_SERVER_STARTED'  => 		'Server Started: %s',
	'LOG_SERVER_RESTARTED' =>		'Server Restarted: %s',
	'LOG_SERVER_STOPPED' => 		'Server Stopped: %s',
	'LOG_SERVER_EDITED'	=> 			'Server Edited: %s',
	'LOG_SERVER_INSTALLED' => 		'Server Installed: %s',
	'LOG_SERVER_REBUILD' =>			'Server Rebuild: %s',
	'LOG_SERVER_ADDED' =>			'Server Added: %s',
	'LOG_SERVER_DELETED' =>			'Server Deleted: %s',
	'LOG_BOX_ADDED'	=> 				'Box Added: %s',
	'LOG_BOX_DELETED' => 			'Box Deleted %s',
	'LOG_BOX_EDITED' => 			'Box Edited: %s',					
	'LOG_CLIENT_ADDED' => 			'Client Added: %s',
	'LOG_CLIENT_EDITED'	=> 			'Client Edited: %s',
	'LOG_CLIENT_DELETED' => 		'Client Deleted: %s',
	'LOG_IP_ADDED' => 				'IP Added: %s',
	'LOG_IP_EDITED'	=> 				'IP Edited: %s',
	'LOG_IP_DELETED'=> 				'IP Removed: %s',					
	'LOG_GAME_ADDED' => 			'Game Added: %s',
	'LOG_GAME_EDITED' => 			'Game Edited: %s',
	'LOG_GAME_DELETED' => 			'Game Deleted: %s',					
	'LOG_LOGS_PURGED' => 			'Logs Purged',
	'LOG_LICENSE_UPDATED' => 		'License Updated',
	'LOG_SETTINGS_UPDATED' => 		'General Settings Updated',
	'LOG_EMAIL_TEMPLATE_UPDATED' => 'E-mail Template Changed',
	'LOG_NEWS_PUBLISHED'	=>		'Announcement added: %s',	
	'LOG_NEWS_DELETED'		=>		'Announcement deleted: %s',
	'LOG_NEWS_UPDATED'		=>		'Announcement updated: %s',
	
	# jQuery
	'JQ_ARE_YOU_SURE'	=>	'Are you sure?',
	'JQ_YES'			=>	'Yes',
	'JQ_CANCEL'			=> 	'Cancel',

/**
 * Client vars 
 */
	# Global
	'SERVER' => 	'Server',
	'ORDER' => 		'Order',
	'SUPPORT' => 	'Support', 
	
	# Index
	'CL_IND_WELCOME' => 	'Welcome to your control panel!',
	'CL_IND_DETAILS' => 	'Details',
	'CL_IND_FIRSTNAME' => 	'Firstname',
	'CL_IND_LASTNAME' => 	'Lastname',
	'CL_IND_EMAIL' => 		'Email',
	'CL_IND_SERVERS' => 	'Servers',
	'CL_IND_PENDING' =>		'Pending',
	'CL_IND_GAMESERVERS' => 'Game Servers',
	'CL_IND_TS_SERVERS' => 	'TeamSpeak Servers',
	'CL_IND_MESSAGES' => 	'Messages',
	'CL_IND_STATUS' => 		'Status',
	'CL_IND_NAME' => 		'Name',
	'CL_IND_GAME' => 		'Game',
	'CL_IND_INFO' => 		'Info',
	'CL_IND_ACTIONS' => 	'Actions',
	'CL_IND_IP' => 			'IP',
	'CL_IND_PLAYERS' => 	'Players',
	'CL_IND_SLOTS' => 		'Slots',
	'CL_IND_EXPIRES' => 	'Expires',
	'CL_ANNOUNCEMENT' =>	'Announcement',
	## Outputs
	'CL_NO_SERVERS'	=>		'Your Server has expired..',
	'CL_PENDING_SERVER'	=>	'Your Server is currently pending install..',
);
