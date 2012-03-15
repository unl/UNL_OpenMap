<?php
require_once 'UNL/Common/Artists_sculptures.php';

class UNL_TourMap_Marker_Sculpture_Info extends UNL_TourMap_Marker_Info
{
    public $sculpture;
    protected $_artists;

    function __construct($options = array())
    {
        if (!isset($options['code'])) {
            throw new Exception('No sculpture to show info for!', 403);
        }

        $this->sculpture = new UNL_Common_Sculptures();
        if (!$this->sculpture->get($options['code'])) {
            throw new Exception('Sorry, that sculpture doesn\'t exist!', 404);
        }

        $this->code = $options['code'];
        $this->name = $this->sculpture->title;
        $this->description = $this->sculpture->info;

        $size = isset($options['parameters'][1]) ? $options['parameters'][1] : 'lg';
        foreach (UNL_TourMap_Marker_Image::getImageCollection('sculpture', $this->code, $size) as $imgOpt) {
            $this->images[] = new UNL_TourMap_Marker_Image($imgOpt);
        }
    }

    function getArtists()
    {
        if ($this->_artists === null) {
            $artists = array();
            $artist_sculptures = new UNL_Common_Artists_sculptures();
            $artist_sculptures->sculpture_id = $this->code;
            if ($artist_sculptures->find()) {
                while ($artist_sculptures->fetch()) {
                    $artists[] = $artist_sculptures->getLink('artist_id');
                }
            }
            $this->_artists = $artists;
        }

        return $this->_artists;
    }

    function __toString()
    {
        return 'unknown';
    }
}