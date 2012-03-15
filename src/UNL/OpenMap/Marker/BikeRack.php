<?php
class UNL_OpenMap_Marker_BikeRack extends UNL_OpenMap_Marker
{
    public function __construct($options = array())
    {
        parent::__construct($options);
        if (!isset($options['title'])) {
            $racks = new UNL_OpenMap_MarkerList_BikeRacks($options);
            foreach ($racks[$options['code']] as $key=>$value) {
                $this->$key = $value;
            }
        }
        $this->info = new UNL_OpenMap_Marker_BikeRack_Info($this->toArray() + array('name'=>$this->title));
    }
}