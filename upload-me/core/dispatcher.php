<?php
# Disallow direct access
if (!_ROUTING_)	die("Error (NO ROUTING) :: Direct access not allowed...");

/**
 * Includs core files required for framework to work.
 */
# Constants (derived from config.php)
include 'core/lib/constants.php';
# GEOIP
include 'core/classes/class_Geoip.php';

/**
 * Sorts language. Loads correct language based upon user IP 
 * (if GEOIP lookup is enabled), otherwise it's default script language.
 */
if (class_exists('core_class_Geoip'))
	$GEOIP = new core_class_GeoIP();

/**
 * Intercepts the url call and dispatches it to 
 * appropriate modules and then tries to load methods.
 */
class core_Dispatch 
{
	/**
	 * Checks if controller (file) exists.
	 *
	 * @desc See if controller exists
	 * @param controller name
	 * @return boolean
	 */
	private function isController($controllerName)
	{
		if(file_exists('modules/'.$controllerName.'/controller.'.$controllerName.'.php'))
			return true;
		else
			return false;
	}

	/**
	 * Checks if method inside controller exists.
	 * 
	 * @param class
	 * @param function
	 * @return string
	 */
	private function setFunction($class, $func)
	{
		if($func == '')
		{
			$func = '_default';
		}

		if(!is_callable(array($class,$func)))
		{
			$func = '_error';
		}

		return $func;
	}

	/**
	 * Breaks and sorts URL so things right controller and method can be called.	 
	 * 
	 * @return string $module|$function|$params:
	 */
	public function args($type='base')
	{
		$requestURI = explode('/', $_SERVER['REQUEST_URI']);
			$scriptName = explode('/',$_SERVER['SCRIPT_NAME']);

		$commandArray = array_diff_assoc($requestURI,$scriptName);
			$commandArray = array_values($commandArray);

		$controllerName = $commandArray[0];
			$controllerFunction = @$commandArray[1];

		$parameters = array_slice($commandArray,2);

		# If empty go to _default function
		if($controllerName == '')
		{
			$controllerName = 'index';
		}

		switch ($type) {
			# Controller
			case 'base':
				return $controllerName;
				break;
			# Method
			case 'function':
				return $controllerFunction;
				break;
			# Extra functionality ( URL: Controller/Method/Rest(params) )
			case 'params':
				return $parameters;
				break;
			default:
				return $controllerName;
				break;
		}
	}

	/**
	 * Sorts, builds and dispatches all.
	 */
	 public function dispatch()
	 { 
		$controller = $this->args('base');
		$found = true;

		# Check if controller exists
		if (!$this->isController($controller))
			$found = false;

		if (!$found)
			# If not, load main page
			include('modules/error/controller.error.php');
		else
			# Else load it now
			include('modules/'.$controller.'/controller.'.$controller.'.php');

		# Set it
		$class = (!$found) ? 'errorController' : $controller.'Controller';
			$function = $this->setFunction( $class, $this->args('function') );
				$load = new $class($controller);

		# Call it
		call_user_func(array($load,$function));
	}
}
