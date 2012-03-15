<?php
class UNL_TourMap_Marker_EmergencyPhone extends UNL_TourMap_Marker
{
    public function __construct($options = array())
    {
        parent::__construct($options);
        if (!isset($options['title'])) {
            $phones = new UNL_TourMap_MarkerList_EmergencyPhones($options);
            foreach ($phones[$options['code']] as $key=>$value) {
                $this->$key = $value;
            }
        }
        $this->info = new UNL_TourMap_Marker_EmergencyPhone_Info($this->toArray() + array('name'=>$this->title));
    }
}