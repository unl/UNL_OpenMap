<?php
class UNL_OpenMap_Marker
{
    /**
     * Marker position. Required.
     *
     * @var UNL_OpenMap_LatLng
     */
    public $position;

    /**
     * LatLng points that define objects' boundaries.
     *
     * @var UNL_OpenMap_Polygon
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
     * @var UNL_OpenMap_Marker_Info
     */
    public $info;

    public function __construct($options = array())
    {
        if (isset($options['position'])) {
            UNL_OpenMap_Controller::setObjectFromArray($this, $options);
        }
    }

    function toArray()
    {
        return get_object_vars($this);
    }
}