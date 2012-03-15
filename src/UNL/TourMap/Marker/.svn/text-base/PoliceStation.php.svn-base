<?php
class UNL_TourMap_Marker_PoliceStation extends UNL_TourMap_Marker
{
    public function __construct($options = array())
    {
        parent::__construct($options);
        if (!isset($options['title'])) {
            $racks = new UNL_TourMap_MarkerList_PoliceStations($options);
            foreach ($racks[$options['code']] as $key=>$value) {
                $this->$key = $value;
            }
        }
        $this->info = new UNL_TourMap_Marker_PoliceStation_Info($this->toArray() + array('name'=>$this->title));
    }
}