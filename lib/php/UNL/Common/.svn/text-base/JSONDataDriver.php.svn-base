<?php
class UNL_Common_JSONDataDriver implements UNL_Common_DataDriverInterface
{
    public static $tour_uri = 'http://maps.unl.edu/';

    function getAllBuildings()
    {
        static $buildings = false;
        if (!$buildings) {
            $uri = self::$tour_uri.'?view=allbuildings&format=json';
            $buildings = $this->retrieveJSONData($uri);
        }
        return $buildings;
    }

    function getCityBuildings()
    {
        static $buildings = false;
        if (!$buildings) {
            $uri = self::$tour_uri.'?view=citybuildings&format=json';
            $buildings = $this->retrieveJSONData($uri);
        }
        return $buildings;
    }

    function getEastBuildings()
    {
        static $buildings = false;
        if (!$buildings) {
            $uri = self::$tour_uri.'?view=eastbuildings&format=json';
            $buildings = $this->retrieveJSONData($uri);
        }
        return $buildings;
    }

    function getLincolnBuildings()
    {
        static $buildings = false;
        if (!$buildings) {
            $uri = self::$tour_uri.'?view=lincolnbuildings&format=json';
            $buildings = $this->retrieveJSONData($uri);
        }
        return $buildings;
    }

    protected function retrieveJSONData($uri)
    {
        if ($contents = file_get_contents($uri)) {
            // try decoding it
            $data = json_decode($contents, true);
            if (is_array($data)) {
                return $data;
            }
        }
        return false;
    }
}