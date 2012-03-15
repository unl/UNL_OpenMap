<?php
class UNL_TourMap_MarkerList_EmergencyPhones extends SPLFileObject implements UNL_TourMap_MarkerList, ArrayAccess
{
    public $title = 'UNL Emergency Phones';
    
    public $phones = array();
    
    function __construct($options = array())
    {
        $csv = UNL_TourMap::getDataDir().'/emergencyphones.csv';
        parent::__construct($csv);
        $this->setFlags(SplFileObject::READ_CSV);
    }
    
    function current()
    {
        list($title, $campus, $lng, $lat) = parent::current();
        $title    = 'Emergency Phone: '.$title;
        $position = new UNL_TourMap_LatLng(array('lat'=>$lat, 'lng'=>$lng));
        $code     = (string)$this->key();

        return new UNL_TourMap_Marker_EmergencyPhone(array('position'=>$position, 'title'=>$title, 'code'=>$code));
    }

    function offsetExists($offset)
    {
        $current = $this->getCurrentLine();
        return $this->seek($offset);
    }

    function offsetGet($offset)
    {
        $this->seek($offset);
        return $this->current();
    }

    function offsetSet($offset, $value)
    {
        throw new Exception('The emergency phones file is not writeable.');
    }

    function offsetUnset($offset)
    {
        throw new Exception('The emergency phones file is not writeable.');
    }
}