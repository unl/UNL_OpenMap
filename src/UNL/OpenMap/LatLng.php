<?php
class UNL_OpenMap_LatLng
{
    public $lat;
    public $lng;

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