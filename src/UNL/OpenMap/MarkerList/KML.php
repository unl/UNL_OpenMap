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
                if (isset($placemark->Point)) {
                    $geo = $placemark->Point->coordinates;
                    $geo = explode(',', trim((string)$geo));
                }
                if (isset($placemark->Polygon)) {
                    $poly = $placemark->Polygon->outerBoundaryIs->LinearRing->coordinates;
                    preg_match_all("/[\s]+(?P<lon>\S+),(?P<lat>\S+),0.0*[\s]+/", $poly, $matches);
                    foreach ($matches[0] as $key => $match) {
                        $coords[$key]['lat'] = $matches['lat'][$key];
                        $coords[$key]['lon'] = $matches['lon'][$key];
                    }
                }
            } else {
                throw new Exception('Do not know how to work with supplied KML file',404);
            }

            $info[] = array(
                        'lat' => $geo[1],
                        'lng' => $geo[0],
                        'coords' => (isset($coords) ? $coords : array()),
                        'title' => $placemark->name,
                        'code' => count($info));
        }

        parent::__construct($info);
    }

    function current()
    {
        $code = $this->key();

        $data = parent::current();

        $position = new UNL_OpenMap_LatLng(array('lat' => $data['lat'], 'lng' => $data['lng']));

        $polygon = new UNL_OpenMap_Polygon(array('coords' => $data['coords']));

        return new $this->markerClass(array(
                                        'position' => $position,
                                        'polygon' => $polygon,
                                        'title' => $data['title'],
                                        'code' => $code));
    }
}