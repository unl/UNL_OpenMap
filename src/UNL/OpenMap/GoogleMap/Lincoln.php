<?php
class UNL_OpenMap_GoogleMap_Lincoln extends UNL_OpenMap_GoogleMap
{
    public $options = array('zoom' => 13);

    function __construct($options = array())
    {
        $this->options = $options + $this->options;

        $this->markers = new UNL_OpenMap_MarkerList_Aggregate($this->options);

        $this->setCenter(new UNL_OpenMap_LatLng_LincolnCenter($options));
        parent::__construct($this->options);

    }

}
