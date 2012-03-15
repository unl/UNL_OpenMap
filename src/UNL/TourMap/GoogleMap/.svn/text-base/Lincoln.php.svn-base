<?php
class UNL_TourMap_GoogleMap_Lincoln extends UNL_TourMap_GoogleMap
{
    public $options = array('zoom' => 13);

    function __construct($options = array())
    {
        $this->options = $options + $this->options;

        $this->markers = new UNL_TourMap_MarkerList_Aggregate($this->options);

        $this->setCenter(new UNL_TourMap_LatLng_LincolnCenter($options));
        parent::__construct($this->options);

    }

}
