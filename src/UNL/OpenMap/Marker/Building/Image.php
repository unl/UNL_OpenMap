<?php
class UNL_OpenMap_Marker_Building_Image extends UNL_OpenMap_Marker_Image
{
    function __construct($options = array())
    {
        parent::__construct($options);
        
        $bldgs = new UNL_Common_Building();
        if (!$bldgs->buildingExists($options['code'])) {
            throw new UNL_OpenMap_Marker_Image_Missing('Sorry, that building doesn\'t exist!', 404);
        }
    }
}