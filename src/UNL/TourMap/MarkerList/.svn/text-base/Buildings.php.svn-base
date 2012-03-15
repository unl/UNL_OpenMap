<?php
class UNL_TourMap_MarkerList_Buildings extends FilterIterator implements UNL_TourMap_MarkerList
{
    public $title = 'UNL Buildings';
    
    public $buildings;
    
    public $locations;

    public $hidden_buildings;

    public $options;

    private $geo;

    function __construct($options = array())
    {
        $this->options = $options;
        
        $this->locations        = require_once UNL_TourMap::getDataDir().'/buildings.inc.php';
        $this->hidden_buildings = require_once UNL_TourMap::getDataDir().'/hidden_buildings.inc.php';
        $this->geo              = new UNL_Geography_SpatialData_Campus();
        $this->buildings        = $this->getBuildingList();

        asort($this->buildings);
        parent::__construct(new ArrayIterator($this->buildings));
    }
    
    function getBuildingList()
    {
        return $this->locations;
    }
    
    function accept()
    {
        $code = $this->key();

        if (in_array($code, $this->hidden_buildings)) {
            return false;
        }

        if ($this->geo->getGeoCoordinates($this->key())) {
            return true;
        }
        return false;
    }

    function current()
    {
        if (get_class($this) == 'UNL_TourMap_MarkerList_Buildings') {
            $bldg = parent::current();
            $name = $bldg['name'];
        } else {
            $name = parent::current();
        }
        $coords   = $this->geo->getGeoCoordinates($this->key());
        $position = new UNL_TourMap_LatLng(array('lat'=>$coords['lat'], 'lng'=>$coords['lon']));
        $campus   = 'unknown';

        if ($this instanceof UNL_TourMap_MarkerList_Buildings_CityCampus) {
            $campus = 'city';
        } elseif ($this instanceof UNL_TourMap_MarkerList_Buildings_EastCampus) {
            $campus = 'east';
        } elseif (isset($this->locations, $this->locations[parent::key()])) {
            if ($this->locations[parent::key()]['location'] == 'City Campus') {
                $campus = 'city';
            } elseif ($this->locations[parent::key()]['location'] == 'East Campus') {
                $campus = 'east';
            } elseif ($this->locations[parent::key()]['location'] == 'Sites in Lincoln') {
                $campus = 'lincoln';
            }
        }

        return new UNL_TourMap_Marker_Building(array('position'=>$position, 'title'=>$name, 'code'=>parent::key(), 'campus'=>$campus));
    }
}