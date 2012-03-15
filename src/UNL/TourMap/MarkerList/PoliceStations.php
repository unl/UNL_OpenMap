<?php
class UNL_TourMap_MarkerList_PoliceStations extends UNL_TourMap_MarkerList_GeoRSS
{
    public $title = 'Police Stations';

    protected $markerClass = 'UNL_TourMap_Marker_PoliceStation';
    
    function __construct($options = array())
    {
        $options['filename'] = dirname(dirname(dirname(dirname(dirname(__FILE__))))).'/data/policestations.xml';
        parent::__construct($options);
    }
    
}