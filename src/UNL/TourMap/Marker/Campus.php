<?php
class UNL_TourMap_Marker_Campus extends UNL_TourMap_Marker
{
    public function __construct($options = array())
    {
        parent::__construct($options);
        if (!isset($options['title'])) {
            $items = new UNL_TourMap_MarkerList_Campuses($options);
            foreach ($items[$options['code']] as $key=>$value) {
                $this->$key = $value;
            }
        }
        $this->info = new UNL_TourMap_Marker_Campus_Info($this->toArray() + array('name'=>$this->title));
    }
}