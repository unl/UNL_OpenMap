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
            if (isset($placemark->Point) || isset($placemark->Polygon)) {
                if (!array_key_exists((string)$placemark->name, $info)) {
                    $info[(string)$placemark->name]['code'] = count($info);
                    $info[(string)$placemark->name]['title'] = (string)$placemark->name;
                }
                if (isset($placemark->Point)) {
                    $geo = $placemark->Point->coordinates;
                    $geo = explode(',', trim((string)$geo));
                    $info[(string)$placemark->name]['lat'] = $geo[1];
                    $info[(string)$placemark->name]['lng'] = $geo[0];
                }
                if (isset($placemark->Polygon)) {
                    $coords = array();
                    $poly = $placemark->Polygon->outerBoundaryIs->LinearRing->coordinates;//var_dump($poly);
                    preg_match_all("/[\s]*(?P<lon>\S+),(?P<lat>\S+),0.0*[\s]*/", $poly, $matches);
                    foreach ($matches[0] as $key => $match) {
                        $coords[$key]['lat'] = $matches['lat'][$key];
                        $coords[$key]['lon'] = $matches['lon'][$key];
                    }
                    $info[(string)$placemark->name]['coords'] = $coords;
                }
            } else {
                throw new Exception('Do not know how to work with supplied KML file',404);
            }
        }

        parent::__construct($info);
    }

    function current()
    {
        $data = parent::current();

        $position = new UNL_OpenMap_LatLng(array('lat' => $data['lat'], 'lng' => $data['lng']));

        $polygon = new UNL_OpenMap_Polygon(array('coords' => $data['coords']));

        return new $this->markerClass(array(
                                        'position' => $position,
                                        'polygon' => $polygon,
                                        'title' => $data['title'],
                                        'code' => $data['code']));
    }
}