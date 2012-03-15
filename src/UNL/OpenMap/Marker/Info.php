<?php
class UNL_OpenMap_Marker_Info
{
    public $code;

    public $name;

    public $description;

    public $images = array();

    public $videos = array();

    function __construct($options = array())
    {
        if (!isset($options['code'])) {
            throw new Exception('No feature to show info for!', 403);
        }
    }

    function setFromArray($array)
    {
        foreach ($array as $key=>$value) {
            $this->$key = $value;
        }
    }
}