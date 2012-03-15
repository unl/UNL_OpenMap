<?php
/**
 * This file parses the configuration and connection details for the artists and sculptures databases.
 * 
 * @package UNL_Common_Arists
 * @author bbieber
 */
require_once 'DB/DataObject.php';

if (file_exists(dirname(dirname(dirname(__FILE__))).'/data/unl_common_artists.sqlite')) {
    $data_dir = dirname(dirname(dirname(__FILE__))).'/data';
} else {
    $data_dir = dirname(__FILE__).'/../../../../data/UNL_Common_Artists/pear.unl.edu';
}

$_unl_common_sclupture_options = &PEAR::getStaticProperty('DB_DataObject','options');
$_unl_common_sclupture_options = array(
    'database'          => 'sqlite:///'.$data_dir.'/unl_common_artists.sqlite',
    'schema_autoload'   => true,
    'autoload'          => true,
    'class_location'    => dirname(__FILE__),
    'require_prefix'    => 'UNL/Common/',
    'class_prefix'      => 'UNL_Common_',
    'quote_identifiers' => true,
);
?>