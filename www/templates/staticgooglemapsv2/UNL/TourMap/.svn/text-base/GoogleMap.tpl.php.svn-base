<?php
/* @var $context UNL_TourMap_GoogleMap */
$map_options = array();
$map_options['center']  = $context->center->lat.','.$context->center->lng;
$map_options['zoom']    = $context->zoom;
$map_options['size']    = (isset($context->options['size']))? urlencode($context->options['size']):'960x620';
$map_options['maptype'] = $context->type;
$map_options['sensor']  = 'false';
$map_options['markers'] = 'color:red%7C'.$context->center->lat.','.$context->center->lng;

$url = UNL_TourMap::addURLParams('http://maps.google.com/maps/api/staticmap', $map_options);

?>
<a href="<?php echo $controller->getURL(); ?>" title="Go to the full featured UNL campus maps"><img alt="UNL Campus Map" src="<?php echo htmlentities($url, ENT_QUOTES); ?>" /></a>
