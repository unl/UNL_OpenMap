<?php
class UNL_OpenMap_Marker_PoliceStation extends UNL_OpenMap_Marker
{
    public function __construct($options = array())
    {
        parent::__construct($options);
        if (!isset($options['title'])) {
            $racks = new UNL_OpenMap_MarkerList_PoliceStations($options);
            foreach ($racks[$options['code']] as $key=>$value) {
                $this->$key = $value;
            }
        }
        $this->info = new UNL_OpenMap_Marker_PoliceStation_Info($this->toArray() + array('name'=>$this->title));
    }
}