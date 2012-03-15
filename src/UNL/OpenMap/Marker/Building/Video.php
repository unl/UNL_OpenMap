<?php
class UNL_OpenMap_Marker_Building_Video extends UNL_OpenMap_Marker_Video
{
    function __construct($options = array())
    {
        parent::__construct($options);

        $bldgs = new UNL_Common_Building();
        if (!$bldgs->buildingExists($options['code'])) {
            throw new UNL_OpenMap_Marker_Video_Missing('Sorry, that building doesn\'t exist!', 404);
        }
    }
}