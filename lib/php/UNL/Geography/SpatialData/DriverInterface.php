<?php

interface UNL_Geography_SpatialData_DriverInterface
{
    /**
     * Returns the geographical coordinates for a building.
     * 
     * @param string $code Building Code for the building you want coordinates of.
     * @return Associative array of coordinates lat and lon. false on error. 
     */
    function getGeoCoordinates($code);

    /**
     * Checks if a building with the given code exists.
     * @param string Building code.
     * @return bool true|false
     */
    function buildingExists($code);
}