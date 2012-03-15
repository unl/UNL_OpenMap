<?php
class UNL_TourMap_MarkerList_Filter_HasImages extends FilterIterator
{
    function __construct(UNL_TourMap_MarkerList $iterator)
    {
        parent::__construct($iterator);
    }
    
    function accept()
    {
        try {
            $info = $this->current()->getInfo();
        } catch(Exception $e) {
            return false;
        }
        if ($info->images instanceof UNL_TourMap_Marker_Image_Missing) {
            return false;
        }
        return true;
    }
}