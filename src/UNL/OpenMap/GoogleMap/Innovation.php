<?php
class UNL_OpenMap_GoogleMap_Innovation extends UNL_OpenMap_GoogleMap
{
    public $options = array('zoom' => 16);

    function __construct($options = array())
    {
        $this->options = $options + $this->options;

        if (empty($this->options['markers'])) {
            $this->options['markers'] = array('buildings');
        }

        $this->markers = new UNL_OpenMap_MarkerList_Aggregate($this->options);

        $this->setCenter(new UNL_OpenMap_LatLng_InnovationCampusCenter($options));
        parent::__construct($this->options);

    }

}
