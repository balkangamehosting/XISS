<?php
# Disallow direct access
if (!_ROUTING_)	die("Error (NO ROUTING) :: Direct access not allowed...");

/**
 * GEOIP (Language dispatcher) class
 * 
 * @desc Gets user's location thru geoip, see's if local language file exists, and if it does,
 * 		 it sets user's session with that language loaded. 
 * 		 Functionality of this class is controlled by config.php file (ws_lang_autoload variable).
 *  
 * 		 Note: 
 * 		 IPv6 is supported, but since some servers may not support it, it has to be additionally
 * 		 enabled by ws_lang_IPv6 variable in config.php file. If ws_lang_autoload is disabled, it 
 * 		 wont work regardles the setting.
 * 
 * 		 Note 2: 
 * 		 On local server it will always load script default language (due local lan).  
 * @author Nate 'L0
 * 
 */
class core_class_Geoip
{
	/**
	 * Figure out if it's IPv4 or IPv6 address.
	 * 
	 * @return boolean (True if IPv6)
	 */
	private function check_ipv() 
	{
		if (filter_var(
			$_SERVER['REMOTE_ADDR'], 
				FILTER_VALIDATE_IP, 
					FILTER_FLAG_IPV4|FILTER_FLAG_NO_PRIV_RANGE|FILTER_FLAG_NO_RES_RANGE
		))
			return true;
		else
			return false;
	}
	
	/**
	 * Queries IPv4 database.
	 * 
	 * @return string
	 */
	private function get_country() 
	{	
		include('core/vendors/geoip/geoip.inc');
		$gi = geoip_open('core/vendors/geoip/GeoIP.dat',GEOIP_STANDARD);
	
		# Country code
		$country_code = geoip_country_code_by_addr($gi, $_SERVER['REMOTE_ADDR']);
	
		geoip_close($gi);
	
		return $country_code;
	}
	
	/**
	* Queries IPv6 database.
	* 
	* @return string
	*/
	private function get_countryIPv6() 
	{	
		include('core/vendors/geoip/geoip.inc');
	
		$gi = geoip_open('core/vendors/geoip/GeoIPv6.dat',GEOIP_STANDARD);
	
		# Country code
		$country_code = geoip_country_code_by_addr_v6($gi, $_SERVER['REMOTE_ADDR']);
	
		geoip_close($gi);
	
		return $country_code;
	}
	
	/**
	 * Loads language based upon config and user location.
	 * 
	 * @return Language
	 */
	private function check_lang() 
	{	
		# If autload is on obtain the country code
		if (WS_LANG_AUTOLOAD) 
		{
			$lang = (
				# Check IP and (try to)load either IPv4 or IPv6 library
				$this->check_ipv() ? $this->get_country() :
					
					# Addres is IPv6 but let's see if script has IPv6 enabled,
					# if not, load script default language.
					(WS_LANG_IPV6 ? $this->get_countryIPV6() : $lang = WS_LANG ) 
			);
		}
		else
		{
			$lang = WS_LANG;
		}				
	
		# If file exists load that language
		if (file_exists('lang/'.$lang.'/language.php')) 
		{
			$_SESSION['lang'] = $lang;
			return $lang;
		
		}
		else # Else load default language
		{
			$_SESSION['lang'] = WS_LANG;
			return WS_LANG;
		}
	}
	
	/**
	 * Auto loads language if it's enabled and there's a local translation for it,
	 * otherwise, it returns script default language (config.php -- ws_lang variable).
	 */
	public function __construct() 
	{
		# Language is loaded in session
		$language = (@empty($_SESSION['lang']) || !@$_SESSION['lang']) ? false : $_SESSION['lang'];
	
		# Session is empty
		if (!$language)
			$language = $this->check_lang();
		
		return $language;
	}
}
