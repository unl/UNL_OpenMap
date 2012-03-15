<?php
class UNL_TourMap_MarkerList_Buildings_EastCampus extends UNL_TourMap_MarkerList_Buildings
{
    public $title = 'UNL East Campus Buildings';

    function getBuildingList()
    {
        $this->locations = new UNL_Common_Building_East();
        asort($this->locations->codes);
        return $this->locations->codes;
    }
}