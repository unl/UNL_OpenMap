<?php
class UNL_OpenMap_MarkerList_Buildings_Lincoln extends UNL_OpenMap_MarkerList_Buildings
{
    public $title = 'UNL Buildings in Lincoln (Off-Campus)';

    function getBuildingList()
    {
        $this->locations = new UNL_Common_Building_Lincoln();
        asort($this->locations->codes);
        return $this->locations->codes;
    }
}