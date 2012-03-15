<?php
class UNL_TourMap_MarkerList_Campuses extends UNL_TourMap_MarkerList_KML
{
    public $title = 'UNL Campuses';

    protected $markerClass = 'UNL_TourMap_Marker_Campus';

    function __construct($options = array())
    {
        $options['filename'] = dirname(dirname(dirname(dirname(dirname(__FILE__))))).'/data/campuses.kml';
        parent::__construct($options);
    }
}