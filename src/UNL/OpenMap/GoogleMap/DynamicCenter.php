<?php
class UNL_OpenMap_GoogleMap_DynamicCenter extends UNL_OpenMap_GoogleMap
{
    public $options = array();

    function __construct($options = array())
    {
        $this->options = $options + $this->options;

        switch($options['view']) {
            case 'building':
                $center  = $this->getBuildingCenter($options);
                $markers = $this->getCampusMarkers($options);
                break;
            default:
                $center = new UNL_OpenMap_LatLng_CityCampusCenter($options);
        }
        $this->setCenter($center);
        if ($markers) {
            $this->setMarkers($markers);
        }
        parent::__construct($options);
    }

    function getBuildingCenter($options)
    {
        $geo = new UNL_Geography_SpatialData_Campus();

        if ($geo->buildingExists($options['code'])) {
            $coords = $geo->getGeoCoordinates($options['code']);
            return new UNL_OpenMap_LatLng(array('lat'=>$coords['lat'], 'lng'=>$coords['lon']));
        }
        throw new Exception('Unknown building!', 404);
    }

    function getCampusMarkers()
    {
        return new UNL_OpenMap_MarkerList_Buildings();
    }
}