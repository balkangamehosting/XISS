<?php
# Disallow direct access
if (!_ROUTING_)	die("Error (NO ROUTING) :: Direct access not allowed...");

/**
 * Deutsche Ăśbersetzung für das XISS Spielpanel.
 *
 * @Autor Nabil -Reflex- Harb
 *
 */
$language = array(

		# Global Errors
		'ERROR_PARAMS' => 		'FEHLER: Zu viele Parameter..',
		'ERROR_GENERAL' => 		'Es ist ein Fehler aufgetreten',
		'ERROR_CRITICAL' => 	'Schwerer Fehler...' ,
		'ERROR_GENERIC' => 		'Seite nicht gefunden',
		'ERROR_TITLE' => 		'Fehler!',
		'ERROR_NOTFOUND' => 	'404 - Seite nicht gefunden..',
		'ERROR_INSUFFICENT' => 	'Sie verfügen über ungenügend Rechte um diese Seite aufzurufen!',
		'ERROR_INSUFFICENT_LEVEL' =>	'Ungenügende Rechte um diese Aktion auszuführen!',
		 
		# ACL Levels
		'GUEST' => 		'Gast',
		'USER' => 		'Mitglied',
		'RESELLER' => 	'Wiederverkäufer',
		'ADMIN' => 		'Administrator',

		# Globals (set in class_Tags (mostly))
		'COPYRIGHT'	=> 			'Copyright',
		'RIGHTSRESERVED' => 	'Alle Rechte vorbehalten',
		'SITESTATS' =>			'| Speicher benutzt: %s | Script ausgeführt in %s Sekunden | Mit %s Anfragen ausgeführt',
		'LOGOUT' => 			'Ausloggen',
		'LOGGED_AS' => 			'Eingeloggt als <b>%s</b>',
		'HIJACKED_RESTORE' => 	'Kontorechte wiederherstellen',
		'SELECT' => 			'Auswählen',
		'OTHER'	=>				'Andere',
		'REFRESH' =>			'Neu laden',
		'CHANGES_SAVED_OK'	=>	'Änderungen wurden gespeichert.',
		'CHANGES_SAVED_FAIL' =>	'Beim Versuch die Änderungen abzuspeichern ist ein Fehler aufgetreten!',
		## Months
		'JANUARY' => 	'Januar',
		'FEBRURARY' => 	'Februar',
		'MARCH' =>		'März',
		'APRIL' =>		'April',
		'MAY'	=>		'Mai',
		'JUNE' =>		'Juni',
		'JULY'	=>		'Juli',
		'AUGUST' =>		'August',
		'SEPTEMBER' => 	'September',
		'OCTOBER' =>	'Oktober',
		'NOVEMBER' =>	'November',
		'DECEMBER'	=>	'Dezember',
		## Days
		'SUNDAY' => 	'Sonntag',
		'MONDAY' =>		'Montag',
		'TUESDAY' =>	'Dienstag',
		'WEDNESDAY' =>	'Mittwoch',
		'THURSDAY' =>	'Donnerstag',
		'FRIDAY' =>		'Freitag',
		'SATURDAY'	=>	'Samstag',
		## Time Labels
		'SEC' 	=> 		'Sek.',
		'MIN' => 		'Min.',
		'MINS' => 		'Min',
		'HOUR' => 		'Std.',
		'HOURS' => 		'Std.',
		'DAY' =>  		'Tag',
		'DAYS' => 		'Tage',
		'WEEK'		=>	'Woche',
		'WEEKS'		=>	'Wochen',
		'MONTH' => 		'Monat',
		'MONTHS' => 	'Monate',
		'YEAR' => 		'Jahr',
		'YEARS' => 		'Jahre',
		'DECADE' => 	'Jahrzehnt',
		'DECADES' => 	'Jahrzehnte',
		## Top Nav
		'HOME' => 				'Home',
		'CLIENTS' => 			'Kunden',
		'SERVERS' => 			'Server',
		'BOXES' => 				'Boxen',
		'UTILITIES' =>			'Dienstprogramme',
		'LICENSEINFO' =>		'Lizenz',
		'SYSLOGS' =>			'System Logs',
		'SETTINGS' =>			'Einstellungen',
		'GENERAL_SETTINGS'=>	'Allgemeine Einstellungen',
		'MANAGE_GAMES'	=> 		'Spiele verwalten',
		'EMAIL_TEMPLATE' => 	'Email Template',
		'LICENSE_SETTINGS' =>	'Lizenz Einstellungen',
		'CRON_JOBS' =>			'Cron Jobs',
		'ACCOUNT'	=>			'Konto',
		'ORDERS'	=>			'Bestellungen',
		'INVOICES' =>			'Rechnungen',
		## Pagination
		'FIRST'	=>				'Erste',
		'LAST'		=>			'Letzte',
		'SHOWING_PAGES'	=>		'Seite %s von %s',
		'PAGE'	=>				'Seite',

		# Login
		'L_USERNAME' =>		 		'Benutzername',
		'L_PASSWORD' => 			'Passwort',
		'L_LOGIN' => 				'Einloggen',
		'L_FORGOTPASS' => 			'Passwort vergessen?',
		'L_NOTFILLED' => 			'Bitte Benutzernamen und Passwort eingeben..',
		'L_LOGFAIL' => 				'Benutzername oder Passwort falsch!',
		'L_LOGSUSPENDED' => 		'%s, Ihr Benuterkonto wurde gesperrt oder ist abgelaufen.',
		'L_RESETPASS' => 			'Passwort wiederherstellen',
		'L_USERORMAIL' => 			'Benutzernamen oder E-mail eingeben',
		'L_BACKTOLOGIN' => 			'Zurück zum Login',
		'L_ENTERMAIL' => 			'Bitte Benutzernamen oder E-mail eingeben..',
		'L_RESETSUCCESS' => 		'Ein neues Passwort wurde soeben an Ihre E-mail geschickt',
		'L_RESETFAIL' => 			'Benutzername oder E-mail existiert nicht.',
		'L_FLOODWAIT' => 			'Sie müssen %s Sekunden warten, bevor Sie die Anfrage wiederholen können.',
		'L_RESETSUCCESSMAILFAIL' =>
		'Neues Password wurde erfolgreich erstellt, doch leider konnte das System keine E-mail an Sie verschicken.
		Bitte kontaktieren Sie <a href="mailto:'.MAIL_SUPPORT.'?subject=Failed Password reset">support</a> , damit der Administrator das Passwort für Sie zurücksetzen kann.',
			
		# Mail (Avoid tabs so mail aligns right..)
		'MAIL_RESETPASS' => 	'Passwort zurücksetzen',
		'MAIL_RESETPASSMSG' =>
'Hallo!

Sie haben das Zurücksetzen Ihres Passworts beantragt.
Ihr neues Passwort ist: %s
			
Wenn Sie die Zurücksetzung des Passworts nicht beantragt haben, dann ignorieren Sie diese E-mail und melden Sie sich mit Ihrem alten Passwort an.',

		'MAIL_EDITED_ACCOUNT_TITLE' => 'Kontodetails',
		'MAIL_EDITED_ACCOUNT' =>
'Hallo %s!

Ihr Konto wurde vom Admin überarbeitet.

Logindetails;
Ihr Benutzername ist: %s
Ihr neues Passwort ist: %s

Zum Anmelden bitte die in der E-mail enthaltenden Anmeldedaten verwenden.',
		'MAIL_NEW_ACCOUNT_TITLE' => 'Neue Kontodetails',
		'MAIL_NEW_ACCOUNT' =>
'Hallo %s!

Ein Konto wurde für Sie eingerichtet.
Um sich anzumelden, folgen Sie bitte diesen Link: %s

Ihre Anmeldedetails sind;
Benutzername: %s
Passwort: %s

Sie können Ihre Einstellungen hier ändern: %s ',

'MAIL_EXPIRE_NOTICE_TITLE' => 'Notice :: Your account will soon expire!', /*TRANSLATE*/
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
', /*TRANSLATE*/
		 
		# Admin
		## Index
		'IND_HOME' => 			'Heimatverzeichnis',
		'IND_WELCOME' => 		'Willkommen im Admin-Kontrollpanel!',
		'IND_CLIENTS' => 		'Benutzer',
		'IND_ACTIVE' => 		'Aktiv',
		'IND_EXPIRED' => 		'Abgelaufen',
		'IND_INACTIVE' => 		'Inaktiv',
		'IND_SUSPENDED' => 		'Gesperrt',
		'IND_SERVERS' => 		'Server',
		'IND_PENDING' => 		'Ausstehend',
		'IND_BOXES' => 			'Boxen',
		'IND_ONLINE' => 		'An',
		'IND_OFFLINE' => 		'Aus',
		'IND_UNREACHABLE' => 	'unerreichbar',
		'IND_ANNOUNCEMENT' => 	'ankündigen',
		'IND_LAST_15_EVENTS' => 'Die letzten 15 Ereignisse',
		'IND_ID'	=> 			'ID#',
		'IND_MESSAGE' => 		'Nachricht',
		'IND_CLIENT' => 		'Benutzer',
		'IND_IP' => 			'IP',
		'IND_TIMESTAMP' => 		'Zeitstempel',
		## Account
		'ACC_GROUP' => 			'Gruppe',
		'ACC_LASTVISIT' => 		'Zuletzt besucht',
		'ACC_LASTIP' => 		'Letzte bekannte IP',
		'ACC_FIRSTNAME' => 		'Name',
		'ACC_LASTNAME' => 		'Nachname',
		'ACC_LANGUAGE' => 		'Sprache',
		'ACC_USERNAME' => 		'Benutzername',
		'ACC_EMAIL'	=> 			'E-mail',
		'ACC_PASS'	=> 			'Passwort',
		'ACC_PASSCONFIRM' =>	'Passwort bestätigen',
		## Announcement
		'ANN_ANNOUNCEMENT' =>	'Ankündigung',
		### Actions
		'IND_NEWS_ADDED'	=>		'Die Ankündigung wurde erfolgreich veröffentlich. Nach einer Woche wird sie automatisch gelöscht.',
		'IND_NEWS_FAILED'	=>		'Beim Versuch die Ankündigung zu veröffentlichen ist ein Fehler aufgetreten!',
		'IND_NEWS_DELETED'	=>		'Ankündigung würde gelöscht.',
		'IND_NEWS_DELETE_FAIL' =>	'Beim Versuch die Ankündigung zu löschen ist ein Fehler aufgetreten!',
		'IND_NEWS_NOT_FOUND' =>		'Fehler! Die von Ihnen gesuchte Ankündigung konnte nicht gefunden werden.Möglicherweise wurde sie gelöscht',
		'ACC_PASS_MISMATCH' =>		'Passwörter stimmen nicht überein!',
		'ACC_PASS_TOO_SHORT' =>		'Passwort zu kurz! Das Passwort muss mindestens 6 Zeichen lang sein!',

		# Box
		## Add-box
		'BOX_ADVANCED' => 		'Erweitert',
		'BOX_BOX' => 			'Box',
		"BOX_ADDBOX" => 		'Box hinzufügen',
		'BOX_NAME' => 			'Name',
		'BOX_LOCATION' => 		'Serverstandort',
		'BOX_IP' => 			'IP',
		'BOX_PROPERTIES' => 	'Eigenschaften (optional)',
		'BOX_NETWORK' => 		'Netzwerk',
		'BOX_GB' => 			'GB',
		'BOX_MB' =>				'MB',
		'BOX_OS_TYPE' => 		'OS typ',
		'BOX_DISTRO' => 		'Distro',
		'BOX_DISTRO_VERSION' => 'Version',
		'BOX_CPU' => 			'CPU',
		'BOX_HDD' => 			'HDD',
		'BOX_RAM' => 			'RAM',
		'BOX_COST' => 			'Preis',
		'BOX_SSH_SETTINGS' => 	'SSH Einstellungen',
		'BOX_SSH_USER' => 		'Benutzer',
		'BOX_SSH_PASSWORD' => 	'Passwort',
		'BOX_SSH_PORT' => 		'SSH Port',
		'BOX_SSH_LOGIN_TYPE' => 'Loginart',
		'BOX_SSH_USE_SUDO' => 	'Sudo command benutzen?',
		'BOX_FTP_SETTINGS' => 	'FTP Einstellungen',
		'BOX_FTP_PORT' => 		'FTP Port',
		'BOX_FTP_PASSIVE' => 	'Passiver Modus',
		'BOX_CHECKS' => 		'Verbindung überprüfen',
		'BOX_ENABLED' => 		'Aktiviert',
		'BOX_VERIFY' => 		'Verbindung bestätigen',
		## Add IP
		'BOX_BOXNAME' => 		'Box Name',
		'BOX_BOXLOCATION' => 	'Box Standort',
		'BOX_ADDIP' => 			'IP hinzufügen',
		'BOX_IPADDRESS' => 		'IP Addresse',
		'BOX_CONNECTIVITY' => 	'Konnektivität',
		'BOX_VERIFY_IP' => 		'IP bestätigen',
		## Box
		'BOX_BOXES_FOUND' => 	'Gefundene Boxen',
		'BOX_ID_NAME' => 		'ID/Name',
		'BOX_IPS' =>			'IPs',
		'BOX_SERVERS' => 		'Server',
		'BOX_SSH'	=> 			'SSH',
		'BOX_FTP'	=>			'FTP',
		'BOX_STATISTICS' => 	'Statistiken',
		'BOX_LOAD'	=> 			'Belastung',
		'BOX_MEMORY' => 		'Speicher',
		'BOX_MEMORY_STATS' => 	'%s benutzt von %s',
		## Box Games
		'BOX_GAMES' => 				'Spiele',
		'BOX_INSTALLED_GAMES' => 	'Installierte Spiele',
		'BOX_LABEL' => 				'Bezeichnung',
		'BOX_GAME' => 				'Spiel',
		'BOX_INSTALL_PATH' => 		'Installationspfad',
		## Box Logs
		'BOX_LOGS' => 		'Logs',
		'BOX_ID'	=> 		'ID',
		'BOX_MESSAGE' => 	'Nachricht',
		'BOX_CLIENT' => 	'Benutzer',
		'BOX_TIMESTAMP' => 'Zeitstempel',
		## Box Servers
		'BOX_SERVERS_FOUND' => 	'Servers gefunden',
		'BOX_STATUS'	=> 		'Status',
		'BOX_INFO'	=> 			'Info',
		'BOX_ACTIONS' => 		'Aktionen',
		'BOX_PLAYERS' => 		'Spieler',
		'BOX_SLOTS'	=> 			'Plätze',
		## Manage Box (Re-using Add-Box mostly)
		'BOX_MANAGE' => 		'Box verwalten',
		'BOX_OWNER'	=>			'Besitzer',
		'BOX_USER'	=>			'Benutzer',
		## Show Box
		'BOX_SHOW' => 			'Box anzeigen',
		'BOX_DETAILS' => 		'Box Details',
		'BOX_LAST_5_ENTRIES' => 'Logs (Letze 5 Einträge)',
		'BOX_LAST_5_STATS' => 	'Statistiken (Letzte 20 Einträge)',
		'BOX_IP_ASSIGNED' => 	'Zugeteilte IPs',
		'BOX_USED_PORTS' => 	'Benutzte Ports',
		'BOX_DELETE'	=>		'Box löschen',
		## Box Stats
		'BOX_BANDWIDTH'	=>		'Bandbreite',
		'BOX_BAND_TX'	=>		'TX (übertragen)', 
		'BOX_BAND_RX'	=>		'RX (empfangen)', 
		'BOX_SWAP'		=>		'Swap',
		'BOX_USED' 		=> 		'Benutzt',
		'BOX_FREE' 		=> 		'Frei',
		'BOX_TOTAL' 	=> 		'Insgesamt',
		'BOX_AVG' 		=> 		'Durchschnitt',
		'BOX_UPTIME' 	=> 		'Betriebszeit',
		'BOX_UPDATED'	=>		'Zuletzt aktualisiert',
		'BOX_DAY'		=>		'Tagesstatistik',
		'BOX_WEEK'		=>		'Wochenstatistik',
		'BOX_MONTH'		=>		'Monatsstatistik',
		'BOX_ACTUAL'	=>		'Aktuell',
		'BOX_PEAK'		=>		'Spitze',
		'BOX_AVERAGE'	=>		'Durchschnitt',
		## Box Responses
		### Add box
		'BOX_INCOMPLETE'	=> 'Bitte füllen Sie alle benötigten Angaben korrekt ein!',
		'BOX_ERROR'			=> 'Es ist ein Fehler bei dem Hinzufügen der Box aufgetreten!',
		'BOX_SUCCESS'		=> 'Box wurde hinzugefügt.',
		'BOX_CHECKSUCCESS'	=> 'Box wurde hinzugefügt und die Verbindung erfolgreich aufgebaut.',
		'BOX_CHECKFAIL'		=> 'Box wurde hinzugefügt, doch die Verbindung zu FTP/SSH konnte nicht aufgebaut werden. Bitte überprüfen Ihre Angaben.',
		'BOX_LIMITED'		=> 'You have reached your package limit! If you wish to add a new Box you need to upgrade your package.', /*TRANSLATE*/
		### Update Box
		'BOX_UPDATED_SUCCESS'	=>	'Box wurde aktualisiert!',
		'BOX_UPDATED_FAIL' 		=>	'Die Aktualisierung der Box ist fehlgeschlagen.',
		'BOX_UPDATED_SUCCESSFAIL' => 'Box wurde erfolgreich aktualisiert, jedoch ist der Verbindungsaufbau fehlgeschlagen.',
		### Box (Query)
		'NO_BOXES_FOUND'	=> 'Es wurden keine Boxen gefunden.',
		### IPs
		'IP_MISSING'			=> 'Bitte geben Sie eine IP an!',
		'IP_INVALID'			=> 'Bitte geben Sie eine gültige IP an!',
		'IP_FAIL'				=> 'Beim Hinzufügen der IP ist ein Fehler aufgetreten.',
		'IP_SUCCESS'			=> 'IP wurde hinzugefügt.',
		'IP_DELETED'			=> 'IP wurde gelöscht.',
		'IP_DELETED_FAIL'   	=> 'Beim Versuch die IP zu löschen ist ein Fehler aufgetreten!',
		'IP_DELETE_NOT_EMPTY' 	=> 'Ip-Adresse kann nur gelöscht werden, wenn diese nicht in Benutzung ist. Ips sind an Spieleserver gebunden.',
		### Actions
		'BOX_DELETED_NOT_EMPTY' => 	'Es laufen Server auf dieser Box. Bevor Sie die Box löschen können, müssen Sie die Server löschen.',
		'BOX_DELETED_SUCCESS' => 	'Box wurde erfolgreich gelöscht.',
		'BOX_DELETED_FAIL' =>		'Beim Versuch die Box zu löschen ist ein Fehler aufgetreten.',
		'BOX_PURGE_SUCCESS' =>		'Boxlogs wurden erfolgreich gelöscht.',
		'BOX_PURGE_FAIL'	=>		'Beim Versuch die Logs zu löschen ist ein Fehler aufgetreten',


		# Clients
		## Add a Client
		'CL_ADDACCOUNT' => 		'Konto hinzufügen',
		'CL_USER_DETAILS' => 	'Neuer Benutzer - Details',
		'CL_GROUP' => 			'Gruppe',
		'CL_FIRSTNAME' => 		'Name',
		'CL_LASTNAME' => 		'Nachname',
		'CL_USERNAME' =>		'Benutzername',
		'CL_EMAIL' => 			'E-mail',
		'CL_PASSWORD' => 		'Passwort',
		'CL_EMAILUSER' => 		'E-mail versenden',
		'CL_SUSPEND_ACCOUNT' => 'Konto sperren',
		'CL_EMAIL_LANG'	=>		'E-mail Sprache',
		## Clients
		'CL_CLIENTS' => 	'Kunden',
		'CL_ID' =>			'ID',
		'CL_SERVERS' => 	'Server',
		'CL_LAST_LOGIN' => 	'Letzter Login',
		'CL_ACCOUNT'	=> 	'Konto',
		'CL_SUSPENDED' =>	'Gesperrt',
		## View Client
		'CL_VIEW_CLIENT' => 		'Kunden anzeigen',
		'CL_DETAILS' => 			'Details',
		'CL_EDIT_CLIENT' =>			'Kunden bearbeiten',
		'CL_LASTVISIT' => 			'Letzter Besuch',
		'CL_LAST_IP' => 			'Letzte benutzte IP',
		'CL_PACKAGE'	=>			'Package',			/*TRANSLATE*/
		'CL_PACKAGE_TYPE' =>		'Type',				/*TRANSLATE*/
		'CL_PACKAGE_BOXES' =>		'Boxes',	/*TRANSLATE*/
		'CL_PACKAGE_SERVERS'=>		'Servers',	/*TRANSLATE*/
		'CL_PACKAGE_CLIENTS' =>		'Clients',	/*TRANSLATE*/
		'CL_PACKAGE_UNLIMITED' =>	'Unlimited Package',/*TRANSLATE*/
		'CL_PACKAGE_EXPIRES' =>		'Package Expires',	/*TRANSLATE*/
		## Actions
		'CL_USER_UPDATED' => 		'Kundenprofil wurde aktualisiert.',
		'CL_REQ_FIELDS' =>			'Bitte füllen Sie die benötigten Felder aus!',
		'CL_INVALID_EMAIL' =>		'Bitte geben Sie eine gültige E-mailadresse an!',
		'CL_NEW_SUCCESS' =>			'Neues Konto wurde erstellt.',
		'CL_MISSING_PASS' =>		'Eine E-mail Benachrichtigung über Kontoänderungen kann nur versendet werden, wenn Sie ein neues Passwort bereitstellen.',
		'CL_NEW_FAIL' =>			'Beim Versuch ein neues Konto anzulegen ist ein Fehler aufgetreten',
		'CL_DELETE_INSUFFICIENT' => 'Aktion verweigert! Sie können ausschlieĂźlich Gruppenmitglieder löschen!',
		'CL_DELETE_SELF_FAIL' =>	'Aktion verweigert!Sie können Ihr eigenes Konto nicht löschen!',
		'CL_DELETE_SUCCESS'	=>		'Benutzer wurde gelöscht.',
		'CL_DELETE_FAIL'	=>		'Beim Versuch einen Benutzer zu löschen ist ein Fehler aufgetreten!',
		'CL_HIJACK_SELF_ERROR' =>	'Sie sind schon bereits angemeldet',
		'CL_HIJACKED'	=>			'Sie durchstöbern die Seite als Kunde <b>%s</b>',
		'CL_HIJACKED_FAIL' =>		'Es ist ein Fehler aufgetreten bein Versuch sich als Kunde anzumelden!',
		'CL_HIJACK_RESTORED' =>		'Sicht wiederhergestellt. Sie stöbern jetzt wieder mit Ihrem Konto.',
		'CL_LIMITED'			=>	'You have reached your package limit! If you wish to add a new Client you need to upgrade your package.', /*TRANSLATE*/


		# Configuration
		## Add Game
		'G_ADDGAME' => 			'Spiel hinzufügen',
		'G_GAME_DETAILS' => 	'Spieldetails',
		'G_NAME' => 			'Name',
		'G_GAME' => 			'Spiel',
		'G_VERSION' => 			'Version',
		'G_STATUS' => 			'Status',
		'G_ACTIVE' => 			'Aktiv',
		'G_INACTIVE' => 		'Inaktiv',
		'G_GAME_SETTINGS' => 	'Spieleinstellungen',
		'G_PRIORITY' => 		'Priorität',
		'G_MAXSLOTS' => 		'Max. Slots',
		'G_TYPE' => 			'Typ',
		'G_PUBLIC' => 			'Ă–ffentlich',
		'G_PRIVATE' => 			'Privat',
		'G_ALLOW_CLIENT' => 	'Dem Kunden das Bearbeiten erlauben?',
		'G_STARTUP_LINE' => 	'Startbefehl',
		'G_GAME_QUERY' => 		'Protokoll',
		'G_QUERY_CODE' => 		'Protokoll Code',
		'G_QUERY_PORT' => 		'Protokoll Port',
		'G_GAME_PROPERTIES' =>  'Spieleigenschaften',
		'G_DEFAULT_PORT' => 	'Standart Port',
		'G_INSTALL_PATH' => 	'Installationspfad',
		'G_PRIORITY_MAX' =>		'Höchste',
		'G_PRIORITY_NORMAL' => 	'Normal',
		'G_PRIORITY_MIN'	=>	'Niedrigste',
		## Games
		'G_GAMES' => 			'Spiele',
		'G_RECORDS_FOUND' => 	'Einträge gefunden',
		'G_SLOTS_AVAILABLE' => 	'Verfügbare Slots',
		'G_QUERY' => 			'Protokoll',
		'G_DIRECTORY' =>		'Ordner',
		'G_SLOTS_FREE' =>  		'Freie Slots',
		## Manage Game (Re-using Add-Game)
		'G_MANAGE' => 			'Spiel verwalen',
		## Cron
		'CRON_SETTINGS' => 	'Cron Einstellungen',
		'CRON_INFO' => 		'Um den Server zu überwachen, aktivieren Sie den Cronjob, welcher alle 10 Minuten wiederholt wird.',
		'CRON_TITLE' => 	'Erstllen Sie den folgenden Cronjob mit PHP:',
		'CRON_PACKAGES'	=>	'To enable Package and Account management, set up the cron job to run every 24 hours.', /*TRANSLATE*/
		## Email
		'EMAIL_TEMPLATE' => 	'E-mail Vorlage',
		'EMAIL_SETTINGS' => 	'E-mail Einstellungen',
		'EMAIL_TITLE' =>		'Titel',
		'EMAIL_SUBJECT' =>		'Betreff',
		'EMAIL_MESSAGE'	=>		'Nachricht',
		'EMAIL_SHORTCODES' => 	'Code Abkürzungen',
		## General
		'SET_SETTINGS' => 			'Allgemeine Einstellungen',
		'SET_PANEL_SETTINGS' => 	'Paneleinstellungen',
		'SET_PANEL'	=>				'Panel',
		'SET_PANEL_NAME' => 		'Panelname',
		'SET_PANEL_URL' => 			'Panel-Url',
		'SET_TEMPLATE'	=> 			'Vorlage',
		'SET_LANGUAGE' => 			'Standartsprache',
		'SET_PUBLIC_REPOSITORY' => 	'Ă–ffentliche Quellen',
		'SET_CHECK_FOR_UPDATES' => 	'Nach Updates suchen',
		'SET_EMAIL' =>				'E-mail',
		'SET_EMAIL_SUPPORT' => 		'Support',
		'SET_EMAIL_NOREPLY' => 		'noreply',
		'SET_GENERAL'	=> 			'Allgemein',
		'SET_GEOIP_LANGUAGE'	=> 	'GEOIP Sprache',
		'SET_GEOIP_LANGUAGE_DESC' =>'Aktiviert (Versucht die Sprache anhand vom Standort der IP zu laden)',
		'SET_GEOIP_IPV6'		=> 	'GEOIP IPv6',
		'SET_GEOIP_IPV6_DESC'	=> 	'Aktiviert (Unterstützung der IPv6 GEOIP Standortbestimmung)',
		'SET_SMARTY_CACHING'	=> 	'Kluges Caching',
		'SET_SHOW_STATS'		=> 	'Statistiken anzeigen',
		'SET_ENABLED'			=> 	'Aktiviert',
		## License Settings
		'LIC_LICENSE_SETTINGS' => 	'Lizenzeinstellungen',
		'LIC_COPY_LICENSE' => 		'Kopieren Sie Ihre Lizenz',
		### Actions
		#### Games
		'MISSING_FIELDS'	=>		'Bitte füllen Sie alle erforderlichen Felder aus!',
		'G_GAME_ADDED_SUCCESS' =>	'Neue Spielvorlage erfolgreich hinzugefügt.',
		'G_GAME_ADDED_FAIL'  =>		'Beim Hinzufügen einer neuen Spielvorlage ist ein Fehler aufgetreten!',
		'G_GAME_EDITED_SUCCESS' =>	'Spielvorlage wurde erfolgreich bearbeitet.',
		'G_GAME_EDITED_FAIL' =>		'Beim Versuch die Spielvorlage zu bearbeiten ist ein Fehler aufgetreten',

		# Servers
		## Add Server
		'S_ADDSERVER' => 			'Fügen Sie einen Server hinzu',
		'S_CLIENT' => 				'Kunde',
		'S_CLIENTNAME' => 			'Kundenname',
		'S_GAME' => 				'Spiel',
		'S_SERVER_PROPERTIES' => 	'Servereinstellungen',
		'S_NAME' => 				'Name',
		'S_EXPIRES' => 				'Läuft ab',
		'S_NEVER'	=> 				'Niemals',
		'S_SERVER_SETTINGS' => 		'Servereinstellungen',
		'S_PRIORITY' => 			'Priorität',
		'S_MAXSLOTS' => 			'Max. Slots',
		'S_TYPE' => 				'Typ',
		'S_PUBLIC' => 				'Ă–ffentlich',
		'S_PRIVATE' => 				'Privat',
		'S_ALLOW_CLIENT' => 		'Dem Kunden das Bearbeiten erlauben?',
		'S_STARTUP_LINE' => 		'Startkommando',
		# Manage Server
		'S_MANAGE'	=> 			'Verwalten',
		'S_REBUILD_SERVER'	=> 	'Server wiederaufbauen',
		'S_DELETE_SERVER' => 	'Server löschen',
		'S_INSTALL_SERVER' => 	'Server installieren',
		'S_ADVANCED'	=> 		'Erweitert',
		'S_SERVER_BOX' => 		'Box',
		'S_STATUS' => 			'Status',
		'S_PENDING' => 			'Ausstehend',
		'S_ACTIVE'	=> 			'Aktiv',
		'S_SUSPENDED' => 		'Gesperrt',
		'S_IP' => 				'IP',
		'S_PORT' => 			'Port',
		'S_GAME_QUERY' => 		'Spielprotokoll',
		'S_QUERY_CODE' => 		'Protokoll Code',
		'S_QUERY_PORT'	=> 		'Protokoll Port',
		'S_SSH_SETTINGS' => 	'SSH Einstellungen',
		'S_SSH_USER'	=> 		'Benutzer',
		'S_SSH_PASSWORD' => 	'Passwort',
		'S_SSH_HOMEDIR'	=> 		'Heimatverzeichnis',
		'S_SSH_INSTALLDIR' =>  	'Installationverzeichnis',
		'S_SSH_UPDATEUSER' => 	'Benutzer aktuallisieren',
		'S_SERVER_OWNER'  => 	'Serverbesitzer',
		## Servers
		'S_SERVERS_FOUND' => 	'Server gefunden',
		'S_INFO'	=> 			'Information',
		'S_ACTIONS' => 			'Aktionen',
		'S_SLOTS' => 			'Slots',
		'S_PLAYERS' => 			'Spieler',
		'S_INACTIVE' =>			'Server steht der Installation aus..',
		## Show
		'S_SHOW'	=> 			'Zeigen',
		'S_WEBFTP'	=> 			'WebFTP',
		'S_CONSOLE' => 			'Konsole',
		'S_CLIENT_DETAILS' => 	'Kundendetails',
		'S_GROUP'	=> 			'Gruppe',
		'S_LAST_VISIT' => 		'Letzter Besuch',
		'S_LAST_IP' => 			'Zuletzt benutzte IP',
		'S_FIRSTNAME' => 		'Name',
		'S_LASTNAME' => 		'Nachname',
		'S_USERNAME' => 		'Benutzername',
		'S_EMAIL' => 			'E-mail',
		'S_SERVERS'	=> 			'Server',
		'S_LOCATION' => 		'Standort',
		'S_FTP_IP'	=> 			'FTP IP',
		'S_FTP_PORT' => 		'FTP Port',
		'S_FTP_USER' => 		'FTP Benutzer',
		'S_FTP_PASSWORD' => 	'FTP Passwort',
		## Console
		'S_ENTER_COMMAND' => 		'Befehl eingeben',
		'S_ENTER' => 				'Ausführen',
		'S_SERVER_NOT_RUNNING' =>	'Server läuft nicht!',
		## WebFTP
		'S_FTP_DETAILS' => 		'FTP Details',
		'S_FTP_DETAILS_FULL' => 'IP: <b>%s</b> | Port: <b>%s</b> | Benutzer: <b>%s</b> | Passwort: <b>%s</b>',
		'S_FTP_FILE' =>		 	'Datei',
		'S_FTP_SIZE' => 		'GröĂźe',
		'S_FTP_OWNER' =>		'Benutzer',
		'S_FTP_GROUP' => 		'Gruppe',
		'S_FTP_PERMS' => 		'Berechtigungen',
		'S_FTP_UPLOAD' => 		'Datei hochladen',
		'S_FTP_NEWDIR' => 		'Neues Verzeichnis erstellen',
		'S_FTP_NEWFILE'	=>		'Neue Datei erstellen',
		## Install
		'S_INSTALLSERVER' => 	'Server installieren',
		'S_INSTALL_BOX'	 =>		'Box',
		'S_INSTALL_IP'	=>		'IP',
		'S_USER_NOTE'	=>		'Standart: Kundennummer wurde mit 100 multipliziert',
		'S_PASSWORD_NOTE' => 	'Leer lassen um ein Zufallspasswort zu erhalten',
		'S_CREATE_USER' =>		'Benutzer erstllen',
		'S_AUTOINSTALL' =>		'Automatisches Installieren der Datein',
		'S_USER'		=>		'Benutzer',
		'S_PASSWORD'	=>		'Passwort',
		'S_HOMEDIR'		=>		'Heimatsverzeichnis',
		'S_INSTALLDIR'	=>		'Installationsverzeichnis',
		'S_ENABLED'		=>		'Aktiviert',
		## Actions
		'S_SERVER_ADDED_SUCCESS'=>	'Neuer Server wurde erfolgreich erstellt. Nun können Sie diesen aufsetzen',
		'S_SERVER_ADDED_FAIL'	=> 	'Beim Versuch einen neuen Server zu erstellen ist ein Fehler aufgetreten.',
		'S_INSTALL_SUCCESS'		=>	'Server ist aufgesetzt -Warten Sie einige Minuten bis der Prozess komplett vollzogen wurde, bevor Sie den Server starten!',
		'S_INSTALL_FAIL'		=>	'Server wurde aufgesetzt. Jedoch ist beim Versuch eine SSH-Verbindung aufzubauen ein Fehler aufgetreten',
		'S_SSH_CONNECT_FAIL'	=>	'Konnte nicht zum SSH-Server verbinden!?',
		'S_SSH_SERVER_STARTED'	=>	'Server gestartet',
		'S_SSH_SERVER_FAILED'	=>	'Server kann nicht gestartet werden!',
		'S_SSH_SERVER_RESTARTED'=>  'Server wurde neugestartet',
		'S_SSH_SERVER_STOPPED'	=>	'Server wurde angehalten',
		'S_FTP_CONNECTION_FAIL'	=> 	'Es konnte keine Verbindung zum FTP-Server hergestellt werden!',
		'S_FTP_DOWNLOAD_FAIL'	=>	'Download fehlgeschlagen. Möglicherweise unzureichende Rechte?',
		'S_FTP_ACTION_FAILED'	=>	'Beim Versuch die Aktion durchzuführen ist ein Fehler aufgetreten.',
		'S_SETTINGS_UPDATED'	=>  'Servereinstellungen wurden aktualisiert.',
		'S_REBUILD_NOTICE'		=> 	'Server wird wiederaufgesetzt. Gedulden Sie sich einige Minuten',
		'S_SERVER_DELETED'		=>	'Server wurde gelöscht.',
		'S_LIMITED'				=>	'You have reached your package limit! If you wish to add a new Server you need to upgrade your package.', /*TRANSLATE*/

		# Utilites
		## License
		'LIC_LICENSE' => 		'Lizenz',
		'LIC_INFORMATION' => 	'Lizenzinformation',
		'LIC_REGISTERED_TO' => 	'Registriert auf',
		'LIC_TYPE' => 			'Lizenztyp',
		'LIC_ALLOWED_BOXES' => 	'Erlaubte Boxen',
		'LIC_USED' => 			'benutzt',
		'LIC_BRANDING' => 		'Markierung',
		'LIC_VALID_DOMAIN' => 	'Gültige Domain',
		'LIC_VALID_IP' => 		'Gültige IP',
		'LIC_CREATED' => 		'Erstellt',
		'LIC_EXPIRES' => 		'Läuft ab',
		'LIC_VERSION' => 		'Version',
		'LIC_LAST_UPDATE' => 	'Letztes Update',
		## Logs
		'SYS_LOGS' => 		'System Logs',
		'SYS_ID' => 		'ID',
		'SYS_MESSAGE' => 	'Nachricht',
		'SYS_CLIENT' => 	'Kunde',
		'SYS_IP' => 		'IP',
		'SYS_TIMESTAMP' => 	'Zeitstempel',
		### Actions
		'SYS_LOGS_DELETED'		=> 'Systemlogs wurden gelöscht.',
		'SYS_LOGS_DELETE_FAIL'	=> 'Beim Versuch die Systemlogs zu löschen ist ein Fehler aufgetreten!',

		# Buttons (Forms)
'SAVE' => 			'Speichern',
		'ADD' => 			'Hinzufügen',
		'ADD_ACCOUNT' => 	'Konto hinzufügen',
		'ADD_IP' => 		'IP-Addresse hinzufügen',
		'ADD_BOX' => 		'Box hinzufügen',
		'ADD_SERVER' => 	'Server hinzufügen',
		'NEXT' => 			'Nächste',
		'PURGE_LOGS' => 	'Logs löschen',
		'UPLOAD' => 		'Hochladen',
		'CREATE' => 		'Erstellen',
		'FINISH' => 		'Fertigstellen',
		'PUBLISH' =>		'Veröffentlichen',
		'DELETE' =>			'Löschen',

		# Buttons (A links)
		'VIEW_ALL' => 			'Alle anzeigen',
		'BOX_BACKTO' => 		'Zurück zur Box',
		'GAMES_BACKTO' => 		'Zurück zu den Spielen',
		'SERVERS_BACKTO' => 	'Zurück zu den Servern',
		'SERVER_BACKTO' => 		'Zurück zu dem Server',
		'CANCEL' => 			'Abbrechen',
		'PREVIOUS' => 			'Vorherige',
		'ADD_A_CLIENT' => 		'Neuen Kunden hinzufügen',
		'ADD_A_GAME' => 		'Neues Spiel hinzufügen',
		'DELETE_CLIENT' => 		'Kunden löschen',
		'LOGIN_AS' => 			'Als Kunde anmelden',
		'PURGE_CONSOLE' =>		'Konsolenlogs löschen',
		'DOWNLOAD_CONSOLE' =>	'Konsolenlogs herunterladen',
		'BACK_TO_FTP'	=>		'Zurück zum WebFTP',
		'GO_BACK'	=>			'Zurück gehen',
		'STATS'		=>			'Statistiken',
		'CONFIGURE'	 		=>	'Konfigurieren',

		# Logs
		'LOG_SERVER_STARTED'  => 		'Server gestartet: %s',
		'LOG_SERVER_RESTARTED' =>		'Server neugestartet: %s',
		'LOG_SERVER_STOPPED' => 		'Server angehalten: %s',
		'LOG_SERVER_EDITED'	=> 			'Server bearbeitet: %s',
		'LOG_SERVER_INSTALLED' => 		'Server aufgesetzt: %s',
		'LOG_SERVER_REBUILD' =>			'Server wiederaufgesetzt: %s',
		'LOG_SERVER_ADDED' =>			'Server hinzugefügt: %s',
		'LOG_SERVER_DELETED' =>			'Server gelöscht: %s',
		'LOG_BOX_ADDED'	=> 				'Box hinzugefügt: %s',
		'LOG_BOX_DELETED' => 			'Box gelöscht %s',
		'LOG_BOX_EDITED' => 			'Box bearbeitet: %s',
		'LOG_CLIENT_ADDED' => 			'Kunde hinzugefügt: %s',
		'LOG_CLIENT_EDITED'	=> 			'Kunde bearbeitet: %s',
		'LOG_CLIENT_DELETED' => 		'Kunde gelöscht: %s',
		'LOG_IP_ADDED' => 				'IP hinzugefügt: %s',
		'LOG_IP_EDITED'	=> 				'IP bearbeitet: %s',
		'LOG_IP_DELETED'=> 				'IP gelöscht: %s',
		'LOG_GAME_ADDED' => 			'Spiel hinzugefügt: %s',
		'LOG_GAME_EDITED' => 			'Spiel bearbeitet: %s',
		'LOG_GAME_DELETED' => 			'Spiel gelöscht: %s',
		'LOG_LOGS_PURGED' => 			'Logs gelöscht',
		'LOG_LICENSE_UPDATED' => 		'Lizenz aktualisiert',
		'LOG_SETTINGS_UPDATED' => 		'Allgemeine Einstellungen aktualisiert',
		'LOG_EMAIL_TEMPLATE_UPDATED' => 'E-mail-Vorlage verändert',
		'LOG_NEWS_PUBLISHED'	=>		'Ankündigung hinzugefügt: %s',
		'LOG_NEWS_DELETED'		=>		'Ankündigung gelöscht: %s',
		'LOG_NEWS_UPDATED'		=>		'Ankündigung aktualisiert: %s',
		
		# jQuery
		'JQ_ARE_YOU_SURE'	=>	'Sind Sie sicher?',
		'JQ_YES'			=>	'Ja',
		'JQ_CANCEL'			=> 	'Nein',

		/**
		 * Client vars
*/
		# Global
		'SERVER' => 	'Server',
		'ORDER' => 		'Bestellen',
		'SUPPORT' => 	'Kundenbetreuung',

		# Index
		'CL_IND_WELCOME' => 	'Wilkommen im Kontrollpanel!',
		'CL_IND_DETAILS' => 	'Details',
		'CL_IND_FIRSTNAME' => 	'Name',
		'CL_IND_LASTNAME' => 	'Nachname',
		'CL_IND_EMAIL' => 		'Email',
		'CL_IND_SERVERS' => 	'Server',
		'CL_IND_PENDING' =>		'Ausstehend',
		'CL_IND_GAMESERVERS' => 'Spieleserver',
		'CL_IND_TS_SERVERS' => 	'TeamSpeakserver',
		'CL_IND_MESSAGES' => 	'Nachrichten',
		'CL_IND_STATUS' => 		'Status',
		'CL_IND_NAME' => 		'Name',
		'CL_IND_GAME' => 		'Spiel',
		'CL_IND_INFO' => 		'Information',
		'CL_IND_ACTIONS' => 	'Aktionen',
		'CL_IND_IP' => 			'IP',
		'CL_IND_PLAYERS' => 	'Spieler',
		'CL_IND_SLOTS' => 		'Slots',
		'CL_IND_EXPIRES' => 	'Läuft ab',
		## Outputs
		'CL_ANNOUNCEMENT' =>	'Ankündigung',
		'CL_NO_SERVERS'	=>		'Ihr Server ist abgelaufen.',
		'CL_PENDING_SERVER'	=>	'Ihr Server steht der Installation aus',
);