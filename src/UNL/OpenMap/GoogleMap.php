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
    public $zoom = 16;

    /**
     * The min zoom level a user is allowed to see
     *
     * @var int
     */
    public $mapMinZoom = 0;

    /**
     * The max zoom level a user is allowed to see
     *
     * @var int
     */
    public $mapMaxZoom = 20;

    /**
     * The type of map to render.
     *
     * @var string ROADMAP|SATELLITE|HYBRID|TERRAIN
     */
    public $type;

    const MAPTYPE_ROADMAP   = 'roadmap';
    const MAPTYPE_SATELLITE = 'satellite';
    const MAPTYPE_HYBRID    = 'hybrid';
    const MAPTYPE_TERRAIN   = 'terrain';

    /**
     * All the points displayed on this map
     *
     * @var Iterator
     */
    public $markers;

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
    }

    public function setCenter(UNL_OpenMap_LatLng $center)
    {
        $this->center = $center;
        return $this;
    }

    public function setMarkers(Iterator $markers)
    {
        $this->markers = $markers;
        return $this;
    }
}