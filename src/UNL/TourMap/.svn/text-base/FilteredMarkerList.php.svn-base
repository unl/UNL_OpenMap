<?php
class UNL_TourMap_FilteredMarkerList extends IteratorIterator
{
    public $options = array('name' => 'generic');

    function __construct($options = array())
    {
        $this->options = $options + $this->options;

        $list_class = 'UNL_TourMap_MarkerList_'.$this->options['feature'];
        if (!class_exists($list_class)) {
            throw new Exception('Invalid marker list type');
        }

        $filter_class = 'UNL_TourMap_MarkerList_Filter_'.$this->options['filter'];
        if (!class_exists($filter_class)) {
            throw new Exception('Invalid filter type');
        }

        $list     = new $list_class($options);
        $filtered = new $filter_class($list);
        parent::__construct($filtered);
    }
}