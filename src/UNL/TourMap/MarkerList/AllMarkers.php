<?php
class UNL_TourMap_MarkerList_AllMarkers extends RecursiveArrayIterator
{
    public $title = 'All markers';
    
    function __construct($options = array())
    {
        parent::__construct(array(new UNL_TourMap_MarkerList_Buildings($options),
                                  new UNL_TourMap_MarkerList_EmergencyPhones($options),
                                  new UNL_TourMap_MarkerList_Sculptures($options),
                                  new UNL_TourMap_MarkerList_BikeRacks($options)));
    }
}