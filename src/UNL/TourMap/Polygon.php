<?php
class UNL_TourMap_Polygon
{
    /**
     * Array of UNL_TourMap_LatLng sets
     */
    public $coords;

    function __construct($options = array())
    {
        if (isset($options['lat'])) {
            $this->lat = $options['lat'];
        }
        if (isset($options['lng'])) {
            $this->lng = $options['lng'];
        }
    }
}