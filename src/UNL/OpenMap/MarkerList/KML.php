<?php
class UNL_OpenMap_MarkerList_KML extends ArrayIterator implements UNL_OpenMap_MarkerList
{
    public $title = 'KML File';

    public $xml;

    protected $markerClass = 'UNL_OpenMap_Marker';

    function __construct($options = array())
    {
        if (!isset($options['filename'])) {
            throw new Exception('You must pass a filename parameter');
        }

        $this->xml = simplexml_load_file($options['filename']);
        $info = array();

        foreach ($this->xml->Document->Placemark as $placemark) {
            if (isset($placemark->Point)) {
                $geo = $placemark->Point->coordinates;
                $geo = explode(',', trim((string)$geo));
                $info[] = array('lat'=>(float)$geo[1], 'lng'=>(float)$geo[0], 'title'=> $this->title.": ".(string)$placemark->name, 'code'=>count($info));
            } else if (isset($placemark->Polygon)) {
                $geo = $placemark->Polygon->outerBoundaryIs->LinearRing->coordinates;
                $coords = preg_split("/[\s]+/", trim((string)$geo));echo '<pre>';var_dump($coords);exit;
                $info[] = array('lat'=>(float)$geo[1], 'lng'=>(float)$geo[0], 'title'=> $this->title.": ".(string)$placemark->name, 'code'=>count($info));
            } else {
                throw new Exception('Do not know how to work with supplied KML file',404);
            }
        }
        parent::__construct($info);
    }

    function current()
    {
        $point = parent::current();
        $position = new UNL_OpenMap_LatLng(array('lat'=>$point['lat'], 'lng'=>$point['lng']));
        $code = $this->key();

        return new $this->markerClass(array('position'=>$position, 'title'=>$point['title'], 'code'=>$code));
    }
}