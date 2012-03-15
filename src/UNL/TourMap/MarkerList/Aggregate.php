<?php
class UNL_TourMap_MarkerList_Aggregate extends AppendIterator implements UNL_TourMap_MarkerList
{
    public $options = array('markers'=>array());

    function __construct($options = array())
    {
        $this->options = $options + $this->options;

        if (!is_array($this->options['markers'])) {
            $this->options['markers'] = array($this->options['markers']);
        }

        parent::__construct();

        foreach ($this->options['markers'] as $marker_type) {
            switch ($marker_type) {
                case 'bikeracks':
                    $class = 'BikeRacks';
                    break;
                case 'emergencyphones';
                    $class = 'EmergencyPhones';
                    break;
                case 'policestations';
                    $class = 'PoliceStations';
                    break;
                default:
                    $class = ucwords($marker_type);
                    break;
            }
            $class = 'UNL_TourMap_MarkerList_'.$class;
            $markers = new $class($options);
            $this->append($markers);
        }
    }
}