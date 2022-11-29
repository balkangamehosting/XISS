<?php
# Set script access
if (!_BASE_)
	die("Error, direct access not allowed..");
else
	define('_ROUTING_', true);

# Include Main functionality
include 'core/dispatcher.php';
include 'core/classes/class_Container.php';
include 'core/classes/class_Statistics.php';
include 'core/classes/class_Language.php';
include 'core/classes/class_Template.php';
include 'core/classes/class_Exporter.php';
//include 'core/classes/class_Database.php'; # Included in constants..
include 'core/classes/class_Forms.php';
include 'core/API.php';

/**
 * Autoloader
 *
 * @desc Auto loads any class called from module.
 * Note that only classes inside plugins can be invoked.
 */
function autoloader($class) {
	# Check first if class already exists
	if (class_exists($class))
		return;
	# Don't try to load stuff that doesn't exists.
	# Modules are set by dispatcher, Smarty loads it's own stuff etc..
	elseif (file_exists( 'plugins/class_' . $class . '.php'))
		include 'plugins/class_' . $class . '.php';
}
spl_autoload_register('autoloader');

# Load disaptcher
$dispatch = new core_Dispatch();

# Dispatch it now
$dispatch->dispatch();
