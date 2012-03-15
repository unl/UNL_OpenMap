<?php
$path = $context->getPath();
if (file_exists($path)) {
    header('Content-type: image/jpeg');
    echo file_get_contents($path);
    exit();
}

echo $savvy->render($context, 'UNL/TourMap/Marker/Image/Missing.tpl.php');