<?php
$markers = array();

if ($context instanceof Savvy_ObjectProxy) {
    $context = $context->getRawObject();
}

foreach ($context as $marker) {
    $subclass = str_replace('UNL_OpenMap_Marker_', '', get_class($marker));

    switch ($subclass) {
        case 'BikeRack':
        case 'Building':
        case 'Campus':
        case 'EmergencyPhone':
        case 'Sculpture':
        case 'PoliceStation':
            $name = strtolower($subclass).'s';
            break;
        default:
            throw new Exception('Unknown subclass of marker type, '.$subclass);
    }
    $markers[$name][] = $savvy->render($marker);
}

$ws = array("\r\n", "\n", "\r", "    ");

foreach ($markers as $name=>$sub_markers) {
    echo implode(",\n", str_replace($ws, '', $sub_markers));
}
