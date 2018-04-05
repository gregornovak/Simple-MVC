<?php

/**
 * Custom MVC - Simple PHP MVC framework
 *
 * @author Gregornovak
 * @link https://github.com/gregornovak
 * @license http://opensource.org/licenses/MIT MIT License
 */

 // Error reporting enabled
error_reporting(-1);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Defined a shortcut constant for directory seperator
define('DS', DIRECTORY_SEPARATOR);
define('ROOTDIR', realpath(__DIR__.'/../') . DS);
define('VIEWS', ROOTDIR . 'application/views');

// Require autoload file
require_once __DIR__ . DS . '..' . DS . 'vendor' . DS . 'autoload.php';

// Initialize the application
$app = new \Gregor\Core\Application();