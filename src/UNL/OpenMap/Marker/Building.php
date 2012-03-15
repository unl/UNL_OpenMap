<?php
class UNL_OpenMap_Marker_Building extends UNL_OpenMap_Marker
{
    public $campus;

    public function __construct($options = array())
    {
        parent::__construct($options);

        // Only populate the info property if needed to avoid making a call to mediahub to get video list for every building on default page load
        if (isset($options['nugget']) && in_array($options['nugget'], array('info', 'image', 'video'))) {
            $this->info = new UNL_OpenMap_Marker_Building_Info($options);
        }
    }

    function getInfo()
    {
        $this->info = new UNL_OpenMap_Marker_Building_Info(get_object_vars($this));
        return $this->info;
    }
}