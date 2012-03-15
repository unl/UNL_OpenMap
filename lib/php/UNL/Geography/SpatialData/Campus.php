<?php
/**
 * This package houses and returns spatial data for the UNL Campus.
 * 
 * Initially we only have latitude and longitude for a few buildings on campus.
 * 
 * 
 * @author Brett Bieber
 * @package UNL_Geography_SpatialData_Campus
 */
require_once 'UNL/Common/Building.php';

class UNL_Geography_SpatialData_Campus
{
    
    /**
     * The driver to be used for retrieving data
     *
     * @var UNL_Geography_SpatialData_DriverInterface
     */
    public static $driver;

    /**
     * Get the current data driver
     *
     * @return UNL_Geography_SpatialData_DriverInterface
     */
    static public function getDriver()
    {
        if (!isset(self::$driver)) {
            require_once 'UNL/Geography/SpatialData/DriverInterface.php';
            require_once 'UNL/Geography/SpatialData/UNLMapsWebServiceDriver.php';
            self::$driver = new UNL_Geography_SpatialData_UNLMapsWebServiceDriver();
        }
        return self::$driver;
    }

    /**
     * Returns the geographical coordinates for a building.
     * 
     * @param string $code Building Code for the building you want coordinates of.
     * @return Associative array of coordinates lat and lon. false on error. 
     */
    function getGeoCoordinates($code)
    {
        return self::getDriver()->getGeoCoordinates($code);
    }

    /**
     * Checks if a building with the given code exists.
     * @param string Building code.
     * @return bool true|false
     */
    function buildingExists($code)
    {
        return self::getDriver()->buildingExists($code);
    }
    
    /**
     * returns the map url for a given building.
     * 
     * @param string $code Building code.
     * @return string URL to the map.
     */
    function getMapURL($code)
    {
        $mapurl = 'http://maps.unl.edu/#';
        return $mapurl.$code;
    }
}

