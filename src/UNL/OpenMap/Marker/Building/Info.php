<?php
class UNL_OpenMap_Marker_Building_Info extends UNL_OpenMap_Marker_Info
{
    function __construct($options = array())
    {
        if (!isset($options['code'])) {
            throw new Exception('No building to show info for!', 403);
        }
        $bldgs = new UNL_Common_Building();
        if (!$bldgs->buildingExists($options['code'])) {
            throw new Exception('Sorry, that building '.$options['code'].' doesn\'t exist!', 404);
        }

        $this->code = $options['code'];
        $this->name = $bldgs->codes[$this->code];

        if (!file_exists(UNL_OpenMap_Controller::getDataDir().'/building_info/'.$this->code.'.html')) {
            $this->description = new UNL_OpenMap_Marker_Info_Missing();
        } else {
            $this->description = file_get_contents(UNL_OpenMap_Controller::getDataDir().'/building_info/'.$this->code.'.html');
        }

        $size = isset($options['parameters'][1]) ? $options['parameters'][1] : 'lg';
        foreach (UNL_OpenMap_Marker_Image::getImageCollection('building', $this->code, $size) as $imgOpt) {
            $this->images[] = new UNL_OpenMap_Marker_Image($imgOpt);
        }
        if (empty($this->images)) {
            $this->images = new UNL_OpenMap_Marker_Image_Missing();
        }

        $number_of_videos = UNL_OpenMap_Marker_Video::numberOf($this->code);
        if (!$number_of_videos) {
            $this->videos = new UNL_OpenMap_Marker_Video_Missing();
        } else {
            $i = 1;
            while ($i <= $number_of_videos) {
                $this->videos[] = new UNL_OpenMap_Marker_Building_Video($options = array('code'=>$this->code,'number'=>$i));
                $i++;
            }
        }
    }
}