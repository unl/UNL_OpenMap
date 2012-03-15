<?php
class UNL_TourMap_MarkerList_Filter_HasNoImages extends UNL_TourMap_MarkerList_Filter_HasImages
{
    function __construct(UNL_TourMap_MarkerList $iterator)
    {
        parent::__construct($iterator);
    }
    
    function accept()
    {
        return !parent::accept();
    }
}