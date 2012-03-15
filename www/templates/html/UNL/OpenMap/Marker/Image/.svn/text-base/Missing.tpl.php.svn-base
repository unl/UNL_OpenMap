<?php
$feature = $parent->context->options['view'];
$size = 'md';
if (isset($parent->context->options['parameters'], $parent->context->options['parameters'][1])) {
    $size = $parent->context->options['parameters'][1];
}

$path = UNL_TourMap_Marker_Image::getImageDir($feature).'/icon_'.$size.'.png';
if (!file_exists($path)) {
    $savvy->render(new Exception('No default image found', 404));
    exit();
}

// send the default image, right now it's just the default building image
header('Content-type: image/png');
echo file_get_contents($path);
exit();