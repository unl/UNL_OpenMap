<?php
class UNL_Geography_SpatialData_UNLMapsWebServiceDriver implements UNL_Geography_SpatialData_DriverInterface
{
    public $maps_server = 'http://maps.unl.edu/';

    public $bldgs;

    public $geo_data;

    function __construct()
    {
        $this->bldgs = new UNL_Common_Building();
        $json = file_get_contents($this->maps_server.'?view=buildings&format=json');
        if (false === $json) {
            throw new Exception('Could not connect to the maps web service');
        }

        $data = json_decode($json, true);

        if (false === $data) {
            throw new Exception('The data retrieved was invalid json');
        }

        $this->geo_data = $data['buildings'];
    }
    /**
     * Returns the geographical coordinates for a building.
     * 
     * @param string $code Building Code for the building you want coordinates of.
     * @return Associative array of coordinates lat and lon. false on error. 
     */
    function getGeoCoordinates($code)
    {
        if (isset($this->geo_data[$code])) {
            return array('lat'=>$this->geo_data[$code]['position']['point']['latitude'],
                         'lon'=>$this->geo_data[$code]['position']['point']['longitude']);
        }
        return false;
    }

    /**
     * Checks if a building with the given code exists.
     * @param string Building code.
     * @return bool true|false
     */
    function buildingExists($code)
    {
        if (isset($this->bldgs->codes[$code])) {
            return true;
        }

        return false;
    }
}