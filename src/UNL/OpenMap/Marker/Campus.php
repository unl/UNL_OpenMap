<?php
class UNL_OpenMap_Marker_Campus extends UNL_OpenMap_Marker
{
    public function __construct($options = array())
    {
        parent::__construct($options);
        if (!isset($options['title'])) {
            $items = new UNL_OpenMap_MarkerList_Campuses($options);
            foreach ($items[$options['code']] as $key=>$value) {
                $this->$key = $value;
            }
        }
        $this->info = new UNL_OpenMap_Marker_Campus_Info($this->toArray() + array('name'=>$this->title));
    }
}