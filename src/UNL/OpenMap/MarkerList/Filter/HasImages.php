<?php
class UNL_OpenMap_MarkerList_Filter_HasImages extends FilterIterator
{
    function __construct(UNL_OpenMap_MarkerList $iterator)
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
        if ($info->images instanceof UNL_OpenMap_Marker_Image_Missing) {
            return false;
        }
        return true;
    }
}