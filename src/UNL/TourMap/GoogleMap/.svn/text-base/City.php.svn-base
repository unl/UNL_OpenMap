<?php
class UNL_TourMap_GoogleMap_City extends UNL_TourMap_GoogleMap
{
    public $options = array('zoom' => 16);
    
    function __construct($options = array())
    {
        $this->options = $options + $this->options;

        $this->markers = new UNL_TourMap_MarkerList_Aggregate($this->options);

        $this->setCenter(new UNL_TourMap_LatLng_CityCampusCenter($options));
        parent::__construct($this->options);

    }

}
