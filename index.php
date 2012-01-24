<?php
//init constants
define('APPLICATION_PATH', __DIR__);
define ('MODULE_PATH', APPLICATION_PATH.'/modules');
define ('LIBRARY_PATH', APPLICATION_PATH.'/library');
set_include_path(LIBRARY_PATH);
//Register the default loader
$callback = function($class) {
	require_once(str_replace('\\','/',$class).'.php'); // Sorry!
};
spl_autoload_register($callback);
//Start the module bootstrap - load each module
\Bootstrap::setup();
