<?php

require_once dirname(__FILE__).'/../config.inc.php';
$buildings = new UNL_OpenMap_MarkerList_Buildings();

$filtered = new UNL_OpenMap_MarkerList_Filter_HasNoImages($buildings);

foreach ($filtered as $building) {
    echo $building->title.PHP_EOL;
}
