<?php
class UNL_OpenMap_GoogleMap
{
    /**
     * Center point for this map
     *
     * @var UNL_OpenMap_LatLng
     */
    public $center;

    /**
     * A valid zoom level to start
     *
     * @var int
     */
    public $zoom = 15;

    /**
     * The min zoom level a user is allowed to see
     *
     * @var int
     */
    public $mapMinZoom = 12;

    /**
     * The max zoom level a user is allowed to see
     *
     * @var int
     */
    public $mapMaxZoom = 19;

    /**
     * The point to display
     */
    public $marker;

    public $options = array();

    function __construct($options = array())
    {
        $this->options = $options + $this->options;

        if (isset($options['center'])
            && false !== strpos($options['center'], ',')) {
            $coords = explode(',', $options['center']);
            $this->setCenter(new UNL_OpenMap_LatLng(array('lat'=>$coords[0],'lng'=>$coords[1])));
        }

        if (isset($options['zoom'])) {
            $this->zoom = $options['zoom'];
        }

        if (isset($options['marker'])) {
            $this->marker = $options['marker'];
        }
    }

    public function setCenter(UNL_OpenMap_LatLng $center)
    {
        $this->center = $center;
        return $this;
    }
}