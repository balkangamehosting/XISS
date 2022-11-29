<?php
# Disallow direct access
if (!_ROUTING_)	die("Error (NO ROUTING) :: Direct access not allowed...");

/**
 * Slovenian language translation
 *
 * @author Nate 'L0
 *
 */
$language = array(
				
	# Global Errors
	'ERROR_PARAMS' => 				'NAPAKA! Preveč parametrov..',
	'ERROR_GENERAL' => 				'Prišlo je do napake',
	'ERROR_CRITICAL' => 			'Kritična napaka ...' ,
	'ERROR_GENERIC' => 				'Stran ni najdena',
	'ERROR_TITLE' => 				'Napaka!',
	'ERROR_NOTFOUND' => 			'404 - Stran, ki jo iščete ne obstaja..',
	'ERROR_INSUFFICENT' => 			'Nimate zadostnih pravic za ogled strani!',
	'ERROR_INSUFFICENT_LEVEL' =>	'Nimate pravice za izvedbo te operacije!',
		
	# ACL Levels
	'GUEST' => 		'Gost',			
	'USER' => 		'Uporabnik',
	'RESELLER' => 	'Reseller',
	'ADMIN' => 		'Admin',
	
	# Globals (set in class_Tags (mostly))
	'COPYRIGHT'	=> 				'Copyright',
	'RIGHTSRESERVED' => 		'Vse pravice pridržane',
	'SITESTATS' => 				'| Spomin v rabi: %s | Stran naložena v %s sekundah | Izvedenih %s poizvedb',	
	'LOGOUT' => 				'Odjava',
	'LOGGED_AS' => 				'Prijavljeni ste kot <b>%s</b>',
	'HIJACKED_RESTORE' => 		'Obnovite Račun',
	'SELECT' => 				'Izberi',
	'OTHER'	=>					'Drugo',
	'REFRESH' =>				'Osveži',
	'CHANGES_SAVED_OK'	=>		'Spremembe so bile shranjene',
	'CHANGES_SAVED_FAIL' =>		'Prišlo je do napake pri shranjevanju sprememb!',
	## Months	
	'JANUARY' => 	'Januar',
	'FEBRURARY' => 	'Februar',
	'MARCH' =>		'Marec',
	'APRIL' =>		'April',
	'MAY'	=>		'Maj',
	'JUNE' =>		'Junij',
	'JULY'	=>		'Julij',
	'AUGUST' =>		'Avgust',
	'SEPTEMBER' => 	'September',
	'OCTOBER' =>	'Oktober',
	'NOVEMBER' =>	'November',
	'DECEMBER'	=>	'December',
	## Days
	'SUNDAY' => 	'Nedelja',	
	'MONDAY' =>		'Ponedeljek',
	'TUESDAY' =>	'Torek',
	'WEDNESDAY' =>	'Sreda',
	'THURSDAY' =>	'Četrtek',
	'FRIDAY' =>		'Petek',
	'SATURDAY'	=>	'Sobota',
	## Time Labels		
	'SEC'			=>	'sek.',	
	'MIN'			=>	'min',
	'MINS'			=>	'min.',
	'HOUR'			=>	'ura',	
	'HOURS'			=>	'ur',
	'DAY'			=>	'dan',	
	'DAYS'			=>	'dni',
	'WEEK'			=>	'teden',
	'WEEKS'			=>	'ted.',
	'MONTH'			=>	'mesec',
	'MONTHS'		=>	'mes.',	
	'YEAR'			=>	'leto',	
	'YEARS'			=>	'let',
	'DECADE'		=>	'des.',	
	'DECADES'		=>	'des.',
	## Top Nav
	'HOME' => 				'Domov',
	'CLIENTS' => 			'Stranke',
	'SERVERS' => 			'Strežniki',
	'BOXES' => 				'Boxi',
	'UTILITIES' =>			'Pripomočki',
	'LICENSEINFO' =>		'Licenca',
	'SYSLOGS' =>			'Sistemska Poročila',
	'SETTINGS' =>			'Nastavitve',
	'GENERAL_SETTINGS'=>	'Splošne Nastavitve',
	'MANAGE_GAMES'	=> 		'Nastavitev Iger',
	'EMAIL_TEMPLATE' => 	'E-mail Nastavitve',
	'LICENSE_SETTINGS' =>	'Nastavitev Licence',
	'CRON_JOBS' =>			'Cron Nastavitve',
	'ACCOUNT'	=>			'Račun',
	'ORDERS'	=>			'Naročila',
	'INVOICES' =>			'Zahtevki',
	## Pagination
	'FIRST'	=>				'Prva',
	'LAST'		=>			'Zadnja',
	'SHOWING_PAGES'	=>		'Stran %s od %s',
	'PAGE'	=>				'stran',
		
	# Login
	'L_USERNAME' => 			'Uporabniško ime',
	'L_PASSWORD' => 			'Geslo',
	'L_LOGIN' => 				'Prijava',
	'L_FORGOTPASS' => 			'Pozabljeno geslo?',		
	'L_NOTFILLED' => 			'Prosim izpolnite vsa polja..',
	'L_LOGFAIL' => 				'Uporabniško ime ali geslo ni pravilno!',
	'L_LOGSUSPENDED' => 		'%s, vaš račun je suspendiran.',	
	'L_RESETPASS' => 			'Ponastavitev gesla',
	'L_USERORMAIL' => 			'Vnesite uporabniško ime ali E-mail',
	'L_BACKTOLOGIN' => 			'Nazaj na prijavo',
	'L_ENTERMAIL' => 			'Prosimo vnesite Uporabniško ime ali E-mail..',
	'L_RESETSUCCESS' => 		'Novo geslo je bilo poslano na vaš E-mail.',
	'L_RESETFAIL' => 			'Uporabnik ali E-mail ne obstaja v naši bazi.',
	'L_FLOODWAIT' => 			'Počakati morate %s sekund predno lahko poskusite ponovno.',
	'L_RESETSUCCESSMAILFAIL' => 
		'Novo geslo je bilo generirano vendar je prišlo do napake pri pošiljanju E-maila.
		Prosimo kontaktirajte <a href="mailto:'.MAIL_SUPPORT.'?subject=Failed Password reset">podpora</a>, da vam Admin ponastavi geslo.',
				
	# Mail (Avoid tabs so mail aligns right..)
	'MAIL_RESETPASS' => 	'Ponastavitev gesla',
	'MAIL_RESETPASSMSG' =>
	
'Živjo!

Zahtevali ste ponastavitev gesla.
Vaše novo geslo je: %s
				
V kolikor niste zahtevali novega gesla ignorirajte to sporočilo in uporabite staro geslo za prijavo.',

	'MAIL_EDITED_ACCOUNT_TITLE' => 'Podrobnosti Računa',
	'MAIL_EDITED_ACCOUNT' =>	
'Živjo %s!

Administrator je uredil vaš račun.
		
Novi podatki;
Uporabniško ime: %s
Geslo: %s
		
Za prijavo uporabite zgoraj omenjeno uporabniško ime in geslo.',

	'MAIL_NEW_ACCOUNT_TITLE' => 'Novi Račun',
	'MAIL_NEW_ACCOUNT' =>
'Živjo %s!
		
Na naši strani ne bil za vas ustvarjen novi račun.
Za prijavo pojdite na: %s
		
Podatki za prijavo;
Uporabniško ime: %s
Geslo: %s
		
Vaše podatke lahko spremenite na: %s ',

'MAIL_EXPIRE_NOTICE_TITLE' => 'Notice :: Your account will soon expire!',
'MAIL_EXPIRE_NOTICE'	=>
'Pozdravljeni %s!

V vašo vednost - Vaš račun bo potekel po %s!
V kolikor ne podaljšate vaš paket, bo vaš račun zamrznjen 
skupaj z vsemi storitvami, ki jih nudite uporabnikom.

V izogib nevšečnostim prosimo podaljšajte vaš Paket.
V kolikor ne želite več uporabljati naših storitev lahko ignorirate 
to sporočilo in bo vaš račun avtomatično zamrznjen po poteku vašega Paketa. 

V kolikor imate kakršnakoli vprašanja ali potrebujete pomoč nas kontaktirajte
z oddajo zahtevka za podporo in Vam bomo z veseljem pomagali.

Lepo pozdravljeni!',
		
	# Admin
	## Index
	'IND_HOME' => 			'Začetna',
	'IND_WELCOME' => 		'Dobrodošli v Vaši nadzorni plošči!',
	'IND_CLIENTS' => 		'Stranke',
	'IND_ACTIVE' => 		'Aktivni',
	'IND_EXPIRED' => 		'Potekli',
	'IND_INACTIVE' => 		'Neaktivni',
	'IND_SUSPENDED' => 		'Zamrznjeni',
	'IND_SERVERS' => 		'Strežniki',
	'IND_PENDING' => 		'Čakajočih',
	'IND_BOXES' => 			'Boxi',
	'IND_ONLINE' => 		'Dosegljivi',
	'IND_OFFLINE' => 		'Nedosegljivi',
	'IND_UNREACHABLE' => 	'Nedostopni',
	'IND_ANNOUNCEMENT' => 	'Oznani',
	'IND_LAST_15_EVENTS' => 'Zadnjih 15 dogodkov',
	'IND_ID'	=> 			'ID',
	'IND_MESSAGE' => 		'Sporočilo',
	'IND_CLIENT' => 		'Stranka',
	'IND_IP' => 			'IP',
	'IND_TIMESTAMP' => 		'Čas',		
	## Account
	'ACC_GROUP' => 	'Skupina',
	'ACC_LASTVISIT' => 'Zadnji Obisk',
	'ACC_LASTIP' => 'Zadnji IP naslov',
	'ACC_FIRSTNAME' => 'Ime',
	'ACC_LASTNAME' => 'Priimek',
	'ACC_LANGUAGE' => 'Jezik',
	'ACC_USERNAME' => 'Uporabniško Ime',
	'ACC_EMAIL'	=> 'E-mail',
	'ACC_PASS'	=> 'Geslo',
	'ACC_PASSCONFIRM' => 'Potrdite Geslo',
	## Announcement
	'ANN_ANNOUNCEMENT' =>	'Oznanilo',
	### Actions
	'IND_NEWS_ADDED'	=>		'Oznanilo je shranjeno in objavljeno - Oznanilo bo poteklo v 7 dneh..',
	'IND_NEWS_FAILED'	=>		'Prišlo je do napake pri oddaji objave!',
	'IND_NEWS_DELETED'	=>		'Oznanilo je bilo izbrisano',
	'IND_NEWS_DELETE_FAIL' =>	'Prišlo je do napake pri brisanju oznanila!',
	'IND_NEWS_NOT_FOUND' =>		'Napaka! Oznanilo, ki ga iščete ne obstaja - verjetno je bilo izbrisrano.',
	'ACC_PASS_MISMATCH' =>		'Gesli se ne ujemata!',
	'ACC_PASS_TOO_SHORT' =>		'Geslo je prekratko! Geslo mora vsebovati vsaj 6 znakov!',
	
	# Box
	## Add-box
	'BOX_ADVANCED' => 'Napredno',
	'BOX_BOX' => 'Box',	
	"BOX_ADDBOX" => 'Dodajte Box',
	'BOX_NAME' => 'Ime',
	'BOX_LOCATION' => 'Lokacija',
	'BOX_IP' => 'IP',
	'BOX_PROPERTIES' => 'Lastnosti (Opcijsko)',
	'BOX_NETWORK' => 'Omrežje',
	'BOX_GB' => 'GB',
	'BOX_MB' => 'MB',
	'BOX_OS_TYPE' => 'OS Tip',
	'BOX_DISTRO' => 'Distribucija',
	'BOX_DISTRO_VERSION' => 'Verzija',
	'BOX_CPU' => 'Procesor',
	'BOX_HDD' => 'Trdi Disk',
	'BOX_RAM' => 'Spomin',
	'BOX_COST' => 'Cena',
	'BOX_SSH_SETTINGS' => 'SSH Nastavitve',
	'BOX_SSH_USER' => 'Uporabnik',
	'BOX_SSH_PASSWORD' => 'Geslo',
	'BOX_SSH_PORT' => 'SSH Vrata',
	'BOX_SSH_LOGIN_TYPE' => 'Vrsta Prijave',
	'BOX_SSH_USE_SUDO' => 'Uporabi SUDO komando?',
	'BOX_FTP_SETTINGS' => 'FTP Nastavitve',
	'BOX_FTP_PORT' => 'FTP Vrata',
	'BOX_FTP_PASSIVE' => 'Pasivni način',
	'BOX_CHECKS' => 'Preverjanje',
	'BOX_ENABLED' => 'Vklopljeno',
	'BOX_VERIFY' => 'Preveri povezavo',
	## Add IP
	'BOX_BOXNAME' => 'Ime Strežnika',
	'BOX_BOXLOCATION' => 'Lokacija',
	'BOX_ADDIP' => 'Dodaj IP',
	'BOX_IPADDRESS' => 'IP Naslov',
	'BOX_CONNECTIVITY' => 'Povezljivost',
	'BOX_VERIFY_IP' => 'Preveri IP',
	## Box
	'BOX_BOXES_FOUND' => 'Najdenih strežnikov',
	'BOX_ID_NAME' => 'ID/Ime',
	'BOX_IPS' =>	'IPji',
	'BOX_SERVERS' => 'Strežniki',
	'BOX_SSH'	=> 	'SSH',
	'BOX_FTP'	=>	'FTP',
	'BOX_STATISTICS' => 'Statistika',
	'BOX_LOAD'	=> 'Obremenjenost',
	'BOX_MEMORY' => 'Spomin',
	'BOX_MEMORY_STATS' => 'V rabi %s od %s',
	## Box Games
	'BOX_GAMES' => 'Igre',
	'BOX_INSTALLED_GAMES' => 'Inštalirane Igre',
	'BOX_LABEL' => 'Oznaka',
	'BOX_GAME' => 'Igra',
	'BOX_INSTALL_PATH' => 'Direktorij',
	## Box Logs
	'BOX_LOGS' => 'Zapiski',
	'BOX_ID'	=> 'ID',
	'BOX_MESSAGE' => 'Sporočilo',
	'BOX_CLIENT' => 'Stranka',
	'BOX_TIMESTAMP' => 'Čas',
	## Box Servers	
	'BOX_SERVERS_FOUND' => 'Najdenih Strežnikov',
	'BOX_STATUS'	=> 'Status',
	'BOX_INFO'	=> 'Info',
	'BOX_ACTIONS' => 'Izvedi',
	'BOX_PLAYERS' => 'Igralcev',
	'BOX_SLOTS'	=> 'Mest',
	## Manage Box (Re-using Add-Box mostly)
	'BOX_MANAGE' => 'Uredi',
	'BOX_OWNER'	=>			'Lastnik',
	'BOX_USER'	=>			'Uporabnik',
	## Show Box
	'BOX_SHOW' => 'Box',
	'BOX_DETAILS' => 'Lastnosti',
	'BOX_LAST_5_ENTRIES' => 'Zapiski (zadnjih 5 zapisov)',
	'BOX_LAST_5_STATS' => 	'Stastistika (zadnjih 20 zapisov)',
	'BOX_IP_ASSIGNED' => 	'IP naslovi v rabi',
	'BOX_USED_PORTS' => 	'Vrata v rabi',	
	'BOX_DELETE'	=>		'Izbriši Strežnik',
	## Box Stats
	'BOX_BANDWIDTH'	=>		'Promet',
	'BOX_BAND_TX'	=>		'TX (poslano)',
	'BOX_BAND_RX'	=>		'RX (prejeto)',
	'BOX_SWAP'		=>		'Swap',
	'BOX_USED'		=>		'V rabi',
	'BOX_FREE'		=>		'Prosto',
	'BOX_TOTAL'		=>		'Skupno',
	'BOX_AVG'		=>		'Povprečno',
	'BOX_UPTIME'	=>		'V pripravljenosti',
	'BOX_UPDATED'	=>		'Zadnja posodobitev',
	'BOX_DAY'		=>		'Dnevna Statistika',
	'BOX_WEEK'		=>		'Tedenska Statistika',
	'BOX_MONTH'		=>		'Mesečna Statistika',
	'BOX_ACTUAL'	=>		'Aktualno',
	'BOX_PEAK'		=>		'Vrh',
	'BOX_AVERAGE'	=>		'Povprečje',
	## Box Responses
	### Add Box
	'BOX_INCOMPLETE'	=> 'Prosimo pravilno izpolnite vsa obvezna polja!',
	'BOX_ERROR'			=> 'Prišlo je do napake pri dodajanju Boxa!',
	'BOX_SUCCESS'		=> 'Box je bil dodan.',
	'BOX_CHECKSUCCESS'	=> 'Box je bil dodan in povezava uspešno vzpostavljena.',
	'BOX_CHECKFAIL'		=> 'Box je bil dodan vendar je prišlo do napake pri vzpostavljanju FTP/SSH povezave! Preverite geslo/uporabniško ime.',
	'BOX_LIMITED'		=> 'Dosegli ste limit vašega paketa! V kolikor želite dodati novi Box morate nadgraditi vaš račun.',
	### Update Box
	'BOX_UPDATED_SUCCESS'	=>	'Spremembe so bile shranjene!',
	'BOX_UPDATED_FAIL' 		=>	'Prišlo je do napake pri shranjevaju sprememb.',
	'BOX_UPDATED_SUCCESSFAIL' =>'Spremembe so bile shranjene vendar je prišlo napake pri vzpostavitvi FTP/SSH povezave.',
	### Box (Query)
	'NO_BOXES_FOUND'	=> 'Ni najdenih Strežnikov.',
	### IPs
	'IP_MISSING'			=> 'Prosim vnesite IP naslov!',
	'IP_INVALID'			=> 'Prosim vnesite veljavni IP naslov!',
	'IP_FAIL'				=> 'Prišlo je do napake pri dodajanu IP naslova.',
	'IP_SUCCESS'			=> 'IP naslov je bil dodan.',
	'IP_DELETED'			=> 'IP naslov je bil izbrisan.',
	'IP_DELETED_FAIL'   	=> 'Prišlo je do napake pri brisanju IP naslova!',
	'IP_DELETE_NOT_EMPTY' 	=> 'IP naslov lahko odstranite samo ko ni v uporabi - vezan na Igralniške Strežnike.',
	### Actions
	'BOX_DELETED_NOT_EMPTY' => 	'Na strežniku so inštalirane Igre - Prosimo najprej izbrišite Igralne Strežnike.',
	'BOX_DELETED_SUCCESS' => 	'Strežnik je bil izbrisan.',
	'BOX_DELETED_FAIL' =>		'Prišlo je do napake pri brisanju strežnika.',
	'BOX_PURGE_SUCCESS' =>		'Zapiski so bili uspešno pobrisani.',
	'BOX_PURGE_FAIL'	=>		'Prišlo je do napake pri izbrisu zapiskov.',
	
	# Clients
	## Add a Client
	'CL_ADDACCOUNT' => 'Dodajanje Računa',
	'CL_USER_DETAILS' => 'Novi Uporabnik - Podrobnosti',
	'CL_GROUP' => 'Skupina',
	'CL_FIRSTNAME' => 'Ime',
	'CL_LASTNAME' => 'Priimek',
	'CL_USERNAME' => 'Uporabniško Ime',
	'CL_EMAIL' => 'E-mail',
	'CL_PASSWORD' => 'Geslo',
	'CL_EMAILUSER' => 'Pošljite E-mail',
	'CL_SUSPEND_ACCOUNT' => 'Zamrzni račun',
	'CL_EMAIL_LANG'	=>		'E-mail Jezik',
	## Clients
	'CL_CLIENTS' => 'Stranke',
	'CL_ID' =>		'ID',
	'CL_SERVERS' => 'Strežniki',
	'CL_LAST_LOGIN' => 'Zadnja Prijava',
	'CL_ACCOUNT'	=> 'Račun',
	'CL_SUSPENDED' =>	'Zamrznjen',
	## View Client
	'CL_VIEW_CLIENT' => 		'Prikaži Uporabnika',
	'CL_DETAILS' => 			'Podrobnosti',
	'CL_EDIT_CLIENT' => 		'Uredi Uporabnika',
	'CL_LASTVISIT' => 			'Zadnji obisk',
	'CL_LAST_IP' => 			'Zadnji IP Naslov',	
	'CL_PACKAGE'	=>			'Paket',
	'CL_PACKAGE_TYPE' =>		'Tip',
	'CL_PACKAGE_BOXES' =>		'Boxov',
	'CL_PACKAGE_SERVERS'=>		'Strežnikov',
	'CL_PACKAGE_CLIENTS' =>		'Uporabnikov',
	'CL_PACKAGE_UNLIMITED' =>	'Neomejen Paket',
	'CL_PACKAGE_EXPIRES' =>		'Paket poteče',
	## Actions	
	'CL_USER_UPDATED' => 		'Podatki uporabnika so bili posodobljeni.',
	'CL_REQ_FIELDS' =>			'Prosim izpolnite vsa obvezna polja!',
	'CL_INVALID_EMAIL' =>		'Prosim vnesite veljavni E-mail naslov!',
	'CL_NEW_SUCCESS' =>			'Novi račun je bil ustvarjen.',
	'CL_MISSING_PASS' =>		'E-mail o urejanju računa je lahko poslan samo, ko sprememba vključuje tudi novo geslo!',
	'CL_NEW_FAIL' =>			'Prišlo je do napake pri dodajanju novega računa',
	'CL_DELETE_INSUFFICIENT' => 'Akcija zavrnjena. Izbrišete lahko samo uporabnike iz skupine Uporabniki..',
	'CL_DELETE_SELF_FAIL' =>	'Akcija zavrnjena! Ne morete izbrisati svojega računa!',
	'CL_DELETE_SUCCESS'	=>		'Uporabnik je bil izbrisan.',
	'CL_DELETE_FAIL'	=>		'Prišlo je do napake pri brisanju uporabnika!',
	'CL_HIJACK_SELF_ERROR' =>	'Ne morete se prijaviti kot vi..',
	'CL_HIJACKED'	=>			'Sedaj ste prijavljeni kot <b>%s</b>',
	'CL_HIJACKED_FAIL' =>		'Prišlo je do napake pri prijavi v tuji račun!',
	'CL_HIJACK_RESTORED' =>		'Pravice obnovljene - Ponovno brskata z svojim računom.',
	'S_LIMITED'				=> 	'Dosegli ste limit vašega paketa! V kolikor želite dodati novega Uporabnika morate nadgraditi vaš račun.',
	
	# Configuration
	## Add Game
	'G_ADDGAME' => 'Dodaj Igro',
	'G_GAME_DETAILS' => 'Podrobno',
	'G_NAME' => 'Ime',
	'G_GAME' => 'Igra',
	'G_VERSION' => 'Verzija',
	'G_STATUS' => 'Status',
	'G_ACTIVE' => 'Aktivni',
	'G_INACTIVE' => 'Neaktivni',
	'G_GAME_SETTINGS' => 'Nastavitve',
	'G_PRIORITY' => 'Prioriteta',
	'G_MAXSLOTS' => 'Max Mest',
	'G_TYPE' => 'Tip Strežnika',
	'G_PUBLIC' => 'Javni',
	'G_PRIVATE' => 'Privatni',
	'G_ALLOW_CLIENT' => 'Uporabnik lahko spremeni?',
	'G_STARTUP_LINE' => 'Zagonski ukaz',
	'G_GAME_QUERY' => 'Vrsta Poizvedbe',
	'G_QUERY_CODE' => 'Koda Poizvedbe',
	'G_QUERY_PORT' => 'Vrata Poizvedbe',
	'G_GAME_PROPERTIES' => 'Lastnosti',
	'G_DEFAULT_PORT' => 'Privzeta Vrata',
	'G_INSTALL_PATH' => 'Imenik',
	'G_PRIORITY_MAX' =>		'Največja',
	'G_PRIORITY_NORMAL' => 	'Normalna',
	'G_PRIORITY_MIN'	=>	'Najmanjša',
	## Games
	'G_GAMES' => 'Igre',
	'G_RECORDS_FOUND' => 'Najdenih zapisov',
	'G_SLOTS_AVAILABLE' => 'Mest na voljo',
	'G_QUERY' => 'Poizvedba',	
	'G_DIRECTORY' =>	'Imenik', 
	'G_SLOTS_FREE' =>  	'prostih mest',
	## Manage Game (Re-using Add-Game)
	'G_MANAGE' => 'Urejanje Igre',
	## Cron
	'CRON_SETTINGS' => 	'Cron Nastavitve',
	'CRON_INFO' => 		'Za nadzorovanje strežnikov dodajte ukaz spodaj na Cron list v ciklu vsakih 10 minut.',
	'CRON_TITLE' => 	'V Cron listi dodajte sledeči ukaz:',
	'CRON_PACKAGES'	=>	'Za nadzarovanje Računov in vodenje aktivne evidence dodajta ukaz spodaj na Cron listo v ciklu 24ur.',
	## Email
	'EMAIL_TEMPLATE' => 'E-mail Nastavitve',
	'EMAIL_SETTINGS' => 'E-mail Nastavitve',
	'EMAIL_TITLE' =>	'Naslov',
	'EMAIL_SUBJECT' =>	'Zadeva',
	'EMAIL_MESSAGE'	=>	'Sporočilo',
	'EMAIL_SHORTCODES' => 'Bližnjice',
	## General
	'SET_SETTINGS' => 'Splošne Nastavitve',
	'SET_PANEL_SETTINGS' => 'Nastavitve Nadzorne Plošče',
	'SET_PANEL'	=>	'Nadzorna Plošča',
	'SET_PANEL_NAME' => 'Ime Strani',
	'SET_PANEL_URL' => 'Povezava Strani',
	'SET_TEMPLATE'	=> 'Predloga',
	'SET_LANGUAGE' => 'Privzeti Jezik',
	'SET_PUBLIC_REPOSITORY' => 'Javna Shramba',
	'SET_CHECK_FOR_UPDATES' => 'Posodobitve',
	'SET_EMAIL' =>	'E-mail',
	'SET_EMAIL_SUPPORT' => 'Podpora',
	'SET_EMAIL_NOREPLY' => 'Brez Odgovora',
	'SET_GENERAL'	=> 'Splošno',
	'SET_GEOIP_LANGUAGE'	=> 'GEOIP Jezik',
	'SET_GEOIP_LANGUAGE_DESC' => 'Omogoči (Poskuša naložiti jezik glede na IP lokacijo uporabnika)',
	'SET_GEOIP_IPV6'		=> 'GEOIP IPv6',
	'SET_GEOIP_IPV6_DESC'	=> 'Omogoči (Podpora za GEOIP IPv6 naslove)',
	'SET_SMARTY_CACHING'	=> 'Smarty Predpomnenje',
	'SET_SHOW_STATS'		=> 'Prikaz Statistike',
	'SET_ENABLED'			=> 'Omogoči',	
	## License Settings
	'LIC_LICENSE_SETTINGS' => 'Nastavitev Licence',
	'LIC_COPY_LICENSE' => 'Prilepite svojo licenco',
	### Actions
	#### Games
	'MISSING_FIELDS'	=>		'Prosimo izpolnite vsa zahtevana polja!',
	'G_GAME_ADDED_SUCCESS' =>	'Igra je bila uspešno dodana.',
	'G_GAME_ADDED_FAIL'  =>		'Prišlo je do napake pri dodajanju igre!',
	'G_GAME_EDITED_SUCCESS' =>	'Spremembe so bile shranjene.',
	'G_GAME_EDITED_FAIL' =>		'Prišlo je do napake pri shranjevanju sprememb!',
	
	# Servers
	## Add Server
	'S_ADDSERVER' => 'Dodaj Strežnik',
	'S_CLIENT' => 'Stranka',
	'S_CLIENTNAME' => 'Ime',
	'S_GAME' => 'Igra',
	'S_SERVER_PROPERTIES' => 'Lastnosti Strežnika',
	'S_NAME' => 'Ime',
	'S_EXPIRES' => 'Poteče',
	'S_NEVER'	=> 'Nikoli',
	'S_SERVER_SETTINGS' => 'Nastavitve Strežnika',
	'S_PRIORITY' => 'Prioriteta',
	'S_MAXSLOTS' => 'Max Mest',
	'S_TYPE' => 'Tip Strežnika',
	'S_PUBLIC' => 'Javni',
	'S_PRIVATE' => 'Privatni',
	'S_ALLOW_CLIENT' => 'Uporabnik lahko spremeni?',
	'S_STARTUP_LINE' => 'Zagonski ukaz',
	## Manage Server
	'S_MANAGE'	=> 'Urejanje Strežnika',
	'S_REBUILD_SERVER'	=> 'Obnovi Strežnik',
	'S_DELETE_SERVER' => 'Izbriši Strežnik',
	'S_INSTALL_SERVER' => 'Inštaliraj Strežnik',
	'S_ADVANCED'	=> 'Napredno',
	'S_SERVER_BOX' => 'Box',
	'S_STATUS' => 'Status',
	'S_PENDING' => 'V postopku',
	'S_ACTIVE'	=> 'Aktivni',
	'S_SUSPENDED' => 'Suspendiran',
	'S_IP' => 'IP',
	'S_PORT' => 'Vrata',
	'S_GAME_QUERY' => 'Poizvedba Igre',
	'S_QUERY_CODE' => 'Tip Poizvedbe',
	'S_QUERY_PORT'	=> 'Vrata Poizvedbe',
	'S_SSH_SETTINGS' => 'SSH Nastavitve',
	'S_SSH_USER'	=> 'Uporabnik',
	'S_SSH_PASSWORD' => 'Geslo',
	'S_SSH_HOMEDIR'	=> 'Ciljna Mapa',
	'S_SSH_INSTALLDIR' =>  'Izvorna Mapa',
	'S_SSH_UPDATEUSER' => 'Posodobi Uporabnika',
	'S_SERVER_OWNER'  => 'Lastnik',
	## Servers
	'S_SERVERS_FOUND' => 	'Najdenih Strežnikov',
	'S_INFO'	=> 			'Info',
	'S_ACTIONS' => 			'Izvedi',
	'S_SLOTS' => 			'Mest',
	'S_PLAYERS' => 			'Igralcev',	
	'S_INACTIVE' =>			'Strežnik mora biti inštaliran..',
	## Show
	'S_SHOW'	=> 'Prikaži',
	'S_WEBFTP'	=> 'WebFTP',
	'S_CONSOLE' => 'Konzola',
	'S_CLIENT_DETAILS' => 'Podrobnosti Uporabnika',
	'S_GROUP'	=> 	'Skupina',
	'S_LAST_VISIT' => 'Zadnji Obisk',
	'S_LAST_IP' => 'Zadnji IP',
	'S_FIRSTNAME' => 'Ime',
	'S_LASTNAME' => 'Priimek',
	'S_USERNAME' => 'Uporabniško ime',
	'S_EMAIL' => 'E-mail',
	'S_SERVERS'	=> 'Strežnikov',
	'S_LOCATION' => 'Lokacija',
	'S_FTP_IP'	=> 'FTP IP',
	'S_FTP_PORT' => 'FTP Vrata',
	'S_FTP_USER' => 'FTP Uporabnik',
	'S_FTP_PASSWORD' => 'FTP Geslo',
	## Console
	'S_ENTER_COMMAND' => 		'Vnesite ukaz',
	'S_ENTER' => 				'Izvedi',	
	'S_SERVER_NOT_RUNNING' =>	'Igralni Strežnik je ustavljen!',
	## WebFTP
	'S_FTP_DETAILS' => 		'FTP Podrobnosti',
	'S_FTP_DETAILS_FULL' =>	'IP: <b>%s</b> | Vrata: <b>%s</b> | Uporabnik: <b>%s</b> | Geslo: <b>%s</b>',
	'S_FTP_FILE' => 		'Datoteka',
	'S_FTP_SIZE' => 		'Velikost',
	'S_FTP_OWNER' => 		'Uporabnik',
	'S_FTP_GROUP' => 		'Skupina',
	'S_FTP_PERMS' => 		'Dovoljenja',
	'S_FTP_UPLOAD' => 		'Naloži datoteko',
	'S_FTP_NEWDIR' => 		'Ustvari novo mapo',
	'S_FTP_NEWFILE'	=>		'Nova datoteka',
	## Install
	'S_INSTALLSERVER' => 	'Inštalacija strežnika',
	'S_INSTALL_BOX'	 =>		'Strežnik',
	'S_INSTALL_IP'	=>		'IP',
	'S_USER_NOTE'	=>		'Privzeto: ID stranke pomnoženo z 100',
	'S_PASSWORD_NOTE' => 	'Pustite prazno za naključno generirano geslo',
	'S_CREATE_USER' =>		'Ustvari uporabnika',
	'S_AUTOINSTALL' =>		'Auto Inštalacija igre',
	'S_USER'		=>		'Uporabnik',
	'S_PASSWORD'	=>		'Geslo',
	'S_HOMEDIR'		=>		'Domača mapa',
	'S_INSTALLDIR'	=>		'Inštalacijska mapa',
	'S_ENABLED'		=>		'Omogoči',
	## Actions
	'S_SERVER_ADDED_SUCCESS' =>	'Novi igralni strežnik je bil dodan, sedaj ga je potrebno inštalirati..',
	'S_SERVER_ADDED_FAIL'	=> 	'Prišlo je do napake pri dodajanju Igralnega Strežnika!',
	'S_INSTALL_SUCCESS'		=>	'Strežnik je inštaliran - počakajte minuto ali dve predno zaženete igro!',
	'S_INSTALL_FAIL'		=>	'Strežnik je bil inštaliran vendar je prišlo do napake pri ustvarjanju FTP uporabnika/inštalaciji igre..',
	'S_SSH_CONNECT_FAIL'	=>	'Prišlo je do napake pri vzpostavitvi z SSH strežnikom!',
	'S_SSH_SERVER_STARTED'	=>	'Igralni Strežnik je zagnan',
	'S_SSH_SERVER_FAILED'	=>	'Prišlo je do napake pri zagonu Igralnega Strežnika!',
	'S_SSH_SERVER_RESTARTED' => 'Igralni Strežnik je bil ponovno zagnan',
	'S_SSH_SERVER_STOPPED'	=>	'Igralni Strežnik je ustavljen',
	'S_FTP_CONNECTION_FAIL'	=> 	'Prišlo je do napake pri povezavi z FTP strežnikom!',
	'S_FTP_DOWNLOAD_FAIL'	=>	'Prenos ni uspel. Mogoče nimate dovoljenja za prenos te datoteke?',
	'S_FTP_ACTION_FAILED'	=>	'Prišlo je do napake pri izvršbi ukaza..',
	'S_SETTINGS_UPDATED'	=>  'Nastavitve so bile shranjene',
	'S_REBUILD_NOTICE'		=> 	'Igralni strežnik je v postopku ponastavitve - prosimo počakajte par minut.',
	'S_SERVER_DELETED'		=>	'Strežnik je bil izbrisan!',
	'S_LIMITED'				=> 'Dosegli ste limit vašega paketa! V kolikor želite dodati novi Strežnik morate nadgraditi vaš račun.',
	
	# Utilites
	## License
	'LIC_LICENSE' => 'Licenca',
	'LIC_INFORMATION' => 'Lastnosti Licence',
	'LIC_REGISTERED_TO' => 'Registrirano na',
	'LIC_TYPE' => 'Tip Licence',
	'LIC_ALLOWED_BOXES' => 'Št. Strežnikov',
	'LIC_USED'	=> 'v rabi',
	'LIC_BRANDING' => 'Lastnišvo',
	'LIC_VALID_DOMAIN' => 'Veljavna Domena',
	'LIC_VALID_IP' => 'Veljavni IP',
	'LIC_CREATED' => 'Izdana',
	'LIC_EXPIRES' => 'Poteče',
	'LIC_VERSION' => 'Verzija',
	'LIC_LAST_UPDATE' => 'Zadnja Posodobitev',
	## Logs
	'SYS_LOGS' => 'Sistemski Zapiski',
	'SYS_ID' => 'ID',
	'SYS_MESSAGE' => 'Sporočilo',
	'SYS_CLIENT' => 'Uporabnik',
	'SYS_IP' => 'IP',
	'SYS_TIMESTAMP' => 'Čas',
	### Actions
	'SYS_LOGS_DELETED'		=> 'Sistemska Poročila so bila izbrisana',
	'SYS_LOGS_DELETE_FAIL'	=> 'Prišlo je do napake pri brisanju Sistemskih Poročil',
	
	# Buttons (Forms)
	'SAVE' => 			'Shrani',
	'ADD' => 			'Dodaj',
	'ADD_ACCOUNT' => 	'Dodaj Račun',
	'ADD_IP' => 		'Dodaj IP Naslov',
	'ADD_BOX' => 		'Dodaj Strežnik',
	'ADD_SERVER' => 	'Dodaj Strežnik',
	'NEXT' => 			'Naprej',
	'PURGE_LOGS' => 	'Počisti zapiske',
	'UPLOAD' => 		'Naloži',
	'CREATE' => 		'Ustvari',
	'FINISH' => 		'Zaključi',
	'PUBLISH' =>		'Objavi',
	'DELETE' =>			'Izbriši',
	
	# Buttons (A links)
	'VIEW_ALL' => 			'Prikaži vse',
	'BOX_BACKTO' => 		'Nazaj na Box',
	'GAMES_BACKTO' => 		'Nazaj na Igre',
	'SERVERS_BACKTO' => 	'Nazaj na Strežnike',
	'SERVER_BACKTO' => 		'Nazaj na Strežnik',
	'CANCEL' => 			'Preklic',
	'PREVIOUS' => 			'Nazaj',
	'ADD_A_CLIENT' => 		'Dodaj Stranko',
	'ADD_A_GAME' => 		'Dodaj novo Igro',
	'DELETE_CLIENT' => 		'Izbriši Uporabnika',
	'LOGIN_AS' => 			'Prijavi se kot Uporabnik',
	'PURGE_CONSOLE' =>		'Počisti zapisek',
	'DOWNLOAD_CONSOLE' =>	'Prenesi zapisek',
	'BACK_TO_FTP'	=>		'Nazaj na webFTP',
	'GO_BACK'	=>			'Nazaj',
	'STATS'		=>			'Statistika',
	'CONFIGURE'		 	=>	'Konfiguriranje',
	
	# Logs
	'LOG_SERVER_STARTED'  => 		'Zagon Igralnega Strežnika: %s',
	'LOG_SERVER_RESTARTED' =>		'Ponovni zagon Igralnega Strežnika: %s',
	'LOG_SERVER_STOPPED' => 		'Ustavitev Igralnega Strežnika: %s',
	'LOG_SERVER_EDITED'	=> 			'Urejanje Igralnega Strežnika: %s',
	'LOG_SERVER_INSTALLED' => 		'Inštalacija Igralnega Strežnika: %s',
	'LOG_SERVER_REBUILD' =>			'Ponastavitev Igralnega Strežnika: %s',
	'LOG_SERVER_ADDED' =>			'Igralni Strežnik dodan: %s',
	'LOG_SERVER_DELETED' =>			'Igralni Strežnik izbrisan: %s',
	'LOG_BOX_ADDED'	=> 				'Strežnik dodan: %s',
	'LOG_BOX_DELETED' => 			'Strežnik izbrisan: %s',
	'LOG_BOX_EDITED' => 			'Urejanje Strežnika: %s',
	'LOG_CLIENT_ADDED' => 			'Uporabnik dodan: %s',
	'LOG_CLIENT_EDITED'	=> 			'Urejanje Uporabnika: %s',
	'LOG_CLIENT_DELETED' => 		'Izbris Uporabnika: %s',
	'LOG_IP_ADDED' => 				'IP naslov dodan: %s',
	'LOG_IP_EDITED'	=> 				'Urejanje IP naslova: %s',
	'LOG_IP_DELETED'=> 				'IP naslov izbrisan: %s',
	'LOG_GAME_ADDED' => 			'Igra dodana: %s',
	'LOG_GAME_EDITED' => 			'Urejanje Igre: %s',
	'LOG_GAME_DELETED' => 			'Igra Izbrisana: %s',
	'LOG_LOGS_PURGED' => 			'Pobris Zapiskov',
	'LOG_LICENSE_UPDATED' => 		'Urejanje Licence',
	'LOG_SETTINGS_UPDATED' => 		'Urejanje Splošnih Nastavitev',
	'LOG_EMAIL_TEMPLATE_UPDATED' => 'Urejanje E-mail predloge',
	'LOG_NEWS_PUBLISHED'	=>		'Novo Oznanilo: %s',
	'LOG_NEWS_DELETED'		=>		'Izbris Oznanila: %s',
	'LOG_NEWS_UPDATED'		=>		'Oznanilo posodobljeno: %s',
	
	# jQuery
	'JQ_ARE_YOU_SURE'	=>	'Ali ste prepričani?',
	'JQ_YES'			=>	'Da',
	'JQ_CANCEL'			=> 	'Prekliči',

/**
 * Client vars 
 */
	# Global
	'SERVER' => 'Strežnik',
	'ORDER' => 'Naročilo',
	'SUPPORT' => 'Podpora', 
	
	# Index
	'CL_IND_WELCOME' => 	'Dobrodošli v Vaši Nadzorni Plošči!',
	'CL_IND_DETAILS' => 	'Podrobnosti',
	'CL_IND_FIRSTNAME' => 	'Ime',
	'CL_IND_LASTNAME' => 	'Priimek',
	'CL_IND_EMAIL' => 		'Email',
	'CL_IND_SERVERS' => 	'Strežniki',
	'CL_IND_PENDING' =>		'Čakajočih',
	'CL_IND_GAMESERVERS' => 'Igralni Strežniki',
	'CL_IND_TS_SERVERS' => 	'TeamSpeak Strežniki',
	'CL_IND_MESSAGES' => 	'Sporočila',
	'CL_IND_STATUS' => 		'Stanje',
	'CL_IND_NAME' => 		'Ime',
	'CL_IND_GAME' => 		'Igra',
	'CL_IND_INFO' => 		'Info',
	'CL_IND_ACTIONS' => 	'Izvedi',
	'CL_IND_IP' => 			'IP',
	'CL_IND_PLAYERS' => 	'Igralcev',
	'CL_IND_SLOTS' => 		'Mest',
	'CL_IND_EXPIRES' => 	'Poteče',
	'CL_ANNOUNCEMENT' =>	'Oznanilo',
	'CL_NO_SERVERS'	=>		'Vaši Igralni Strežnik je potekel..',
	'CL_PENDING_SERVER'	=>	'Vaš Strežnik je v postopku Inštalacije..',
	
);
