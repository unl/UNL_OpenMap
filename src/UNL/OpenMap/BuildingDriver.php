<?php
class UNL_OpenMap_BuildingDriver implements UNL_Common_DataDriverInterface
{
    static $locations;

    function getAllBuildings()
    {
        $all = $this->_getLocations();
        return array_merge($all['City Campus'], $all['East Campus'], $all['Sites in Lincoln']);
    }

    function getCityBuildings()
    {
        $all = $this->_getLocations();
        return $all['City Campus'];
    }

    function getEastBuildings()
    {
        $all = $this->_getLocations();
        return $all['East Campus'];
    }

    function getLincolnBuildings()
    {
        $all = $this->_getLocations();
        return $all['Sites in Lincoln'];
    }

    protected function _getLocations()
    {
        if (!isset(self::$locations)) {
            self::$locations = require UNL_OpenMap_Controller::getDataDir().'/locations.inc.php';
        }
        return self::$locations;
    }
}