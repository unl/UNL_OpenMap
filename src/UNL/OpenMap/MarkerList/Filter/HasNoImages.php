<?php
class UNL_OpenMap_MarkerList_Filter_HasNoImages extends UNL_OpenMap_MarkerList_Filter_HasImages
{
    function __construct(UNL_OpenMap_MarkerList $iterator)
    {
        parent::__construct($iterator);
    }
    
    function accept()
    {
        return !parent::accept();
    }
}