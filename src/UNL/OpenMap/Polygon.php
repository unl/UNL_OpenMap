<?php
class UNL_OpenMap_Polygon
{
    /**
     * Array of UNL_OpenMap_LatLng sets
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