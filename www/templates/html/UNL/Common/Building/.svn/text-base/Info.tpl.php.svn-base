<?php
$bldgs = new UNL_Common_Building();

$sd    = new UNL_Geography_SpatialData_Campus();

if (isset($_GET['code'], $bldgs->codes[$_GET['code']])) {
    $bldgname = ucwords(strtolower($bldgs->codes[$_GET['code']]));

    echo '<h2>'.$bldgname.'</h2>';
    if ($htm = $context->getHtml($_GET['code'])) {
        echo $htm;
        echo '<a href="'.$sd->getMapURL($_GET['code']).'" class="permalink">Link</a>';
    } else {
        echo '<p>Sorry, currently no related data is available on this building/sculpture. 
        If you would like to contribute information, please <a href="mailto:acoleman1@unl.edu">contact us</a>.</p>';
    }
} else {
    header('HTTP/1.0 404 Not Found');
}
