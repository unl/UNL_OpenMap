<?php
class UNL_OpenMap_MarkerList_BikeRacks extends UNL_OpenMap_MarkerList_KML
{
    public $title = 'UNL Bike Racks';

    protected $markerClass = 'UNL_OpenMap_Marker_BikeRack';
    
    function __construct($options = array())
    {
        $options['filename'] = dirname(dirname(dirname(dirname(dirname(__FILE__))))).'/data/bikeracks.kml';
        parent::__construct($options);
    }
}