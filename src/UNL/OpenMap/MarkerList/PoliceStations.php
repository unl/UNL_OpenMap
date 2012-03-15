<?php
class UNL_OpenMap_MarkerList_PoliceStations extends UNL_OpenMap_MarkerList_GeoRSS
{
    public $title = 'Police Stations';

    protected $markerClass = 'UNL_OpenMap_Marker_PoliceStation';
    
    function __construct($options = array())
    {
        $options['filename'] = dirname(dirname(dirname(dirname(dirname(__FILE__))))).'/data/policestations.xml';
        parent::__construct($options);
    }
    
}