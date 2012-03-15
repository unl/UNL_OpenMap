<?php
class UNL_TourMap_MarkerList_Buildings_CityCampus extends UNL_TourMap_MarkerList_Buildings
{
    public $title = 'UNL City Campus Buildings';
    
    function getBuildingList()
    {
        $this->locations = new UNL_Common_Building_City();
        asort($this->locations->codes);
        return $this->locations->codes;
    }
}