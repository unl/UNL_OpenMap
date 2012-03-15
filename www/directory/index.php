<?php

if (file_exists(dirname(__FILE__) . '/../../config.inc.php')) {
    require_once dirname(__FILE__) . '/../../config.inc.php';
} else {
    require_once dirname(__FILE__) . '/../../config.sample.php';
}

// Initialize output settings for this page.
UNL_Common::$driver = new UNL_OpenMap_BuildingDriver();
UNL_Geography_SpatialData_Campus::$driver = new UNL_Geography_SpatialData_PDOSQLiteDriver();

$outputcontroller = new UNL_OpenMap_OutputController();
$outputcontroller->setTemplatePath(dirname(dirname(__FILE__)).'/templates/html');


if (isset($_GET['mc'])) {
    $id = 'tourdirectorymc';
} else {
    $id = 'tourdirectory';
}

$page = UNL_Templates::factory('Fixed');
UNL_Templates::$options['templatedependentspath'] = $_SERVER['DOCUMENT_ROOT'];
$page->doctitle        = '<title>UNL | Tour | Directory</title>';
$page->breadcrumbs     = '<ul>
                <li><a href="http://www.unl.edu/">UNL</a></li>
                <li>Campus Maps</li>
            </ul>';
$page->navlinks        = file_get_contents('http://www.unl.edu/ucomm/sharedcode/navigation.html');
$page->titlegraphic    = '<h1>UNL Tour Directory</h1>';
$page->leftRandomPromo = '';
$page->head .= '<style type="text/css">
@import url(../css/map.css);
</style>';

$page->maincontentarea = '<p>This list contains the official list of buildings and abbreviations. The building code/abbreviation is used
in class schedules as well as the <a href="http://peoplefinder.unl.edu/" title="Peoplefinder">online directory</a>. Click a building name to view
its location on the campus maps.</p>';
$page->maincontentarea .= '
<div id="mapnav" style="margin-top:15px;">
                <div id="pointlist">
                <h3 class="sec_header">All Buildings</h3>
';
$page->maincontentarea .= $outputcontroller->render(new UNL_OpenMap_MarkerList_Buildings(), 'UNL/TourMap/MarkerList.tpl.php');
$page->maincontentarea .= '</div>
            </div>';
if (isset($_GET['mc'])) {
    $data = $page->maincontentarea;
} else {
    $data = $page->toHtml();
}
echo $data;
