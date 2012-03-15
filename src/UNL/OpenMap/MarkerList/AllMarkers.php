<?php
class UNL_OpenMap_MarkerList_AllMarkers extends RecursiveArrayIterator
{
    public $title = 'All markers';
    
    function __construct($options = array())
    {
        parent::__construct(array(new UNL_OpenMap_MarkerList_Buildings($options),
                                  new UNL_OpenMap_MarkerList_EmergencyPhones($options),
                                  new UNL_OpenMap_MarkerList_Sculptures($options),
                                  new UNL_OpenMap_MarkerList_BikeRacks($options)));
    }
}