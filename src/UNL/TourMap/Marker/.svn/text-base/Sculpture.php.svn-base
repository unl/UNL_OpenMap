<?php
class UNL_TourMap_Marker_Sculpture extends UNL_TourMap_Marker
{
    public $artist;

    public function __construct($options = array())
    {
        parent::__construct($options);
    
        // Only populate the info property if needed to avoid making a call to mediahub to get video list for every building on default page load
        if (isset($options['nugget']) && in_array($options['nugget'], array('info', 'image'))) {
            $this->info = new UNL_TourMap_Marker_Sculpture_Info($options);
        }
    }
}