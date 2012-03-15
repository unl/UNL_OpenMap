<?php
/**
* @author Brett Bieber
* @package UNL_Common
* Created on Sep 27, 2005
*/

require_once dirname(__FILE__).'/../../Common.php'; 

/**
 * Class which can retrieve the buildings and codes for East Campus
 * 
 * @package UNL_Common
 */
class UNL_Common_Building_East
{
    public $codes = array();
    
    /**
     * Constructor connects to database and loads codes and names.
     * @return bool False on error
     */
    function __construct()
    {
        $this->codes = UNL_Common::getDriver()->getEastBuildings();
    }

}
