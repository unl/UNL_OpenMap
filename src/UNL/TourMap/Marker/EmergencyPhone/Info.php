<?php
class UNL_TourMap_Marker_EmergencyPhone_Info extends UNL_TourMap_Marker_Info
{
    function __construct($options = array())
    {
        parent::__construct($options);
        $this->setFromArray($options);
    }
}