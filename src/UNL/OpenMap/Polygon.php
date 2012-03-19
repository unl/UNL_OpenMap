<?php
class UNL_OpenMap_Polygon
{
    /**
     * Array of UNL_OpenMap_LatLng sets
     */
    public $coords = array();

    function __construct($options = array())
    {
        if (isset($options['coords'])) {
            foreach ($options['coords'] as $latlon) {
                $this->coords[] = new UNL_OpenMap_LatLng(array('lat'=>$latlon['lat'], 'lng'=>$latlon['lon']));
            }
        }
    }
}