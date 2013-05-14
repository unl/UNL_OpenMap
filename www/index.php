<?php

if (file_exists(dirname(__FILE__) . '/../config.inc.php')) {
    require_once dirname(__FILE__) . '/../config.inc.php';
} else {
    require_once dirname(__FILE__) . '/../config.sample.php';
}

// Initialize output settings for this page.
UNL_Common::$driver = new UNL_OpenMap_BuildingDriver();
UNL_Geography_SpatialData_Campus::$driver = new UNL_Geography_SpatialData_PDOSQLiteDriver();

$controller = new UNL_OpenMap_Controller(UNL_OpenMap_Router::getRoute($_SERVER['REQUEST_URI']) + $_GET);

$outputcontroller = new UNL_OpenMap_OutputController();
$outputcontroller->setTemplatePath(dirname(__FILE__).'/templates/html');

if ($controller->options['format'] == 'html') {
    $outputcontroller->setEscape('htmlentities');
} else {
    switch($controller->options['format']) {
        case 'partial':
            $outputcontroller->setEscape('htmlentities');
        case 'json':
            header('Content-Type:application/json');
            break;
        case 'mobile':
            $outputcontroller->setEscape('htmlentities');
            break;
        default:
    }
    $outputcontroller->sendCORSHeaders();
    $outputcontroller->addTemplatePath(dirname(__FILE__).'/templates/'.$controller->options['format']);
}

$outputcontroller->addGlobal('controller', $controller);

//$outputcontroller->addFilters(array($controller, 'postRun'));
echo $outputcontroller->render($controller);


