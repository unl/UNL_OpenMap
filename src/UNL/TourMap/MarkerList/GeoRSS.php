<?php
class UNL_TourMap_MarkerList_GeoRSS extends ArrayIterator implements UNL_TourMap_MarkerList
{
    public $title = 'Geo RSS Feed';

    public $xml;

    protected $markerClass = 'UNL_TourMap_Marker';

    function __construct($options = array())
    {
        if (!isset($options['filename'])) {
            throw new Exception('You must pass a filename parameter');
        }

        $this->xml = simplexml_load_file($options['filename']);
        $info = array();

        foreach ($this->xml->channel->item as $loc) {
            $geo = $loc->children('http://www.georss.org/georss');
            $geo = explode(' ', trim((string)$geo));
            $info[] = array('lat'=>(float)$geo[0], 'lng'=>(float)$geo[1], 'title'=>(string)$loc->title, 'description'=>(string)$loc->description, 'code'=>count($info));
        }
        parent::__construct($info);
    }

    function current()
    {
        $point = parent::current();
        $position = new UNL_TourMap_LatLng(array('lat'=>$point['lat'], 'lng'=>$point['lng']));
        $code = (string)$this->key();

        return new $this->markerClass(array('position'=>$position, 'title'=>$point['title'], 'code'=>$code));
    }
}