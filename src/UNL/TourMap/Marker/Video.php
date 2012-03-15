<?php
class UNL_TourMap_Marker_Video
{
    public $options = array('number'=>1);

    public $code;

    public $number;

    public $url;

    public $link;

    function __construct($options = array())
    {
        $this->options = $options + $this->options;
        if (!isset($this->options['code'])) {
            throw new Exception('No feature to show info for!', 403);
        }

        $this->code = $this->options['code'];

        $this->number = $this->options['number'];

        $json       = self::getMediaHubJSONasArray($this->code);
        $record     = array_pop($json);
        $this->url  = $record['url'];
        $this->link = $record['link'];
    }

    public static function numberOf($code)
    {
        return count(self::getMediaHubJSONasArray($code));
    }

    private static function getMediaHubJSONasArray($code)
    {
        $jsonurl = 'http://mediahub.unl.edu/tags/'.$code.'?format=json';
        $json = file_get_contents($jsonurl);
        $json_output = json_decode($json, true);
        return $json_output;
    }
}
