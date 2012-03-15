<?php
class UNL_OpenMap_MarkerList_Campuses extends UNL_OpenMap_MarkerList_KML
{
    public $title = 'UNL Campuses';

    protected $markerClass = 'UNL_OpenMap_Marker_Campus';

    function __construct($options = array())
    {
        $options['filename'] = dirname(dirname(dirname(dirname(dirname(__FILE__))))).'/data/campuses.kml';
        parent::__construct($options);
    }
}