<?php

if (file_exists(dirname(__FILE__) . '/../config.inc.php')) {
    require_once dirname(__FILE__) . '/../config.inc.php';
} else {
    require_once dirname(__FILE__) . '/../config.sample.php';
}

// Initialize output settings for this page.
UNL_Common::$driver = new UNL_TourMap_BuildingDriver();
UNL_Geography_SpatialData_Campus::$driver = new UNL_Geography_SpatialData_PDOSQLiteDriver();

$tour = new UNL_TourMap(UNL_TourMap_Router::getRoute($_SERVER['REQUEST_URI']) + $_GET);

$outputcontroller = new UNL_TourMap_OutputController();
$outputcontroller->setTemplatePath(dirname(__FILE__).'/templates/html');

if ($tour->options['format'] == 'html') {
    $outputcontroller->setEscape('htmlentities');
} else {
    switch($tour->options['format']) {
        case 'partial':
            $outputcontroller->setEscape('htmlentities');
        case 'staticgooglemapsv2':
            Savvy_ClassToTemplateMapper::$output_template['UNL_TourMap'] = 'UNL/TourMap-partial';
            break;
        case 'georss':
            header('Content-Type:application/rss+xml');
            $outputcontroller->setEscape('htmlspecialchars');
            break;
        case 'json':
            //header('Content-Type:application/json');
            break;
        case 'kml':
            $outputcontroller->setEscape('htmlspecialchars');
            header('Content-Type:application/vnd.google-earth.kml+xml');
            header('Content-Disposition:filename="'.$tour->options['view'].'.kml"');
            break;
        case 'mobile':
            $outputcontroller->setEscape('htmlentities');
            break;
        default:
    }
    $outputcontroller->sendCORSHeaders();
    $outputcontroller->addTemplatePath(dirname(__FILE__).'/templates/'.$tour->options['format']);
}

$outputcontroller->addGlobal('controller', $tour);

//$outputcontroller->addFilters(array($tour, 'postRun'));
echo $outputcontroller->render($tour);


