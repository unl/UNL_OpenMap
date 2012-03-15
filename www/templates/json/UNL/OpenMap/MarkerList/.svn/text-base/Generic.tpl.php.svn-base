<?php
$markers = array();

if ($context instanceof Savvy_ObjectProxy) {
    $context = $context->getRawObject();
}

foreach ($context as $marker) {
    $subclass = str_replace('UNL_TourMap_Marker_', '', get_class($marker));

    switch ($subclass) {
        case 'Building':
        case 'EmergencyPhone':
        case 'BikeRack':
        case 'Sculpture':
        case 'PoliceStation':
            $name = strtolower($subclass).'s';
            break;
        default:
            throw new Exception('Unknown subclass of marker type, '.$subclass);
    }
    $markers[$name][] = '"'.$marker->code.'":'.$savvy->render($marker);
}

$ws = array("\r\n", "\n", "\r", "    ");

foreach ($markers as $name=>$sub_markers) {
    echo '"'.$name.'":{' . PHP_EOL;
    echo implode(",\n", str_replace($ws, '', $sub_markers));
    echo PHP_EOL . '},' . PHP_EOL;

}
