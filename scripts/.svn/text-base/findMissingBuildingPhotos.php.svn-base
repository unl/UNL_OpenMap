<?php

require_once dirname(__FILE__).'/../config.inc.php';
$buildings = new UNL_TourMap_MarkerList_Buildings();

$filtered = new UNL_TourMap_MarkerList_Filter_HasNoImages($buildings);

foreach ($filtered as $building) {
    echo $building->title.PHP_EOL;
}
