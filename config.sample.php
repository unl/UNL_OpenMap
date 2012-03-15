<?php
/**
 * This file defines constants for the configurable portions of the tour.
 */
ini_set('display_errors',true);
error_reporting(E_ALL);

function autoload($class)
{
    $class = str_replace('_', '/', $class);
    include $class . '.php';
}
    
spl_autoload_register("autoload");

// Set to false on production machines
ini_set('display_errors', true);
error_reporting(E_ALL);

set_include_path(dirname(__FILE__).'/src'.PATH_SEPARATOR.dirname(__FILE__).'/lib/php');

UNL_OpenMap_Controller::$url = 'http://localhost/workspace/UNL_OpenMap/www/';
UNL_OpenMap_Marker_Image::$image_dir = dirname(__FILE__).'/www/images/';
