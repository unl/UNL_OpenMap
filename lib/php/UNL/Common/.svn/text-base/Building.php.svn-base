<?php
/**
 * Structure for the UNL Common Building portions of the UNL_Common package.
 * 
 * @author Brett Bieber
 * @package UNL_Common
 * @created Created on Sep 27, 2005
 */
require_once 'UNL/Common/Building/City.php';
require_once 'UNL/Common/Building/East.php';
require_once 'UNL/Common/Building/Lincoln.php';

/**
 * Simple object which can retreive the buildings on both city and east campus as well as UNL buildings off-campus in Lincoln.
 * 
 * @package UNL_Common
 */
class UNL_Common_Building
{
    
    var $codes = array();
    
    function __construct()
    {
        $this->codes = UNL_Common::getDriver()->getAllBuildings();
        asort($this->codes,SORT_STRING);
    }
    
    /**
    * Return all the codes
    *
    * @access  public
    * @return  array   all codes as associative array
    */
    function getAllCodes()
    {
        return $this->codes;
    }
    
    /**
     * Checks if a building with the given code exists.
     * @param string Building code.
     * @return bool true|false
     */
    function buildingExists($code)
    {
        if (isset($this->codes[$code])) {
            return true;
        }
        return false;
    }
    
    /**
     * returns city, east or lincoln
     * 
     * @param string $code Building Code
     */
    function getCampus($code)
    {
        $east = new UNL_Common_Building_East();
        $city = new UNL_Common_Building_City();
        $lincoln = new UNL_Common_Building_Lincoln();
        if (isset($east->codes[$code])) {
            return 'east';
        } elseif (isset($city->codes[$code])) {
            return 'city';
        } elseif (isset($lincoln->codes[$code])) {
            return 'lincoln';
        }
        return false;
    }
}

