<?php
class UNL_TourMap_MarkerList_BuildingSearch extends FilterIterator implements UNL_TourMap_MarkerList
{
    public $options = array('q'=>'');

    public $title = 'Building Search';

    function __construct($options = array())
    {
        $this->options = $options + $this->options;

        $this->options['q'] = trim($this->options['q']);

        parent::__construct(new UNL_TourMap_MarkerList_Buildings($options));
    }

    function accept()
    {
        if (empty($this->options['q'])) {
            return true;
        }
        if (parent::current() instanceof UNL_TourMap_Marker_Building) {
            $lower_query = strtolower($this->options['q']);
            if (strpos(strtolower(parent::current()->code), $lower_query) !== false
                || strpos(strtolower(parent::current()->title), $lower_query) !== false) {
                return true;
            }
        }
        return false;
    }
}