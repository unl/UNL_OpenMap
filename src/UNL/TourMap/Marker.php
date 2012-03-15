<?php
class UNL_TourMap_Marker
{
    /**
     * Marker position. Required.
     *
     * @var UNL_TourMap_LatLng
     */
    public $position;

    /**
     * LatLng points that define objects' boundaries.
     *
     * @var UNL_TourMap_Polygon
     */
    public $polygon;

    /**
     * Rollover text
     *
     * @var string
     */
    public $title;

    /**
     * Unique Identifier
     *
     * @var string
     */
    public $code;

    /**
     * Various data that appears in the pop-up info box
     *
     * @var UNL_TourMap_Marker_Info
     */
    public $info;

    public function __construct($options = array())
    {
        if (isset($options['position'])) {
            UNL_TourMap::setObjectFromArray($this, $options);
        }
    }

    function toArray()
    {
        return get_object_vars($this);
    }
}