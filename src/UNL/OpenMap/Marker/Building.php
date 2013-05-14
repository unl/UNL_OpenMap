<?php
class UNL_OpenMap_Marker_Building extends UNL_OpenMap_Marker
{
    public $campus;

    public function __construct($options = array())
    {
        parent::__construct($options);

        // If title is available that means the options have been passed from UNL_OpenMap_MarkerList_Buildings->current()
        // If title is not available, the individual marker is being requested directly
        if (!isset($options['title'])) {
            $list = new UNL_OpenMap_MarkerList_Buildings($options);
var_dump($list);
            foreach ($list->buildings[$options['code']] as $key => $value) {
                $this->$key = $value;
            }
        }

        // Only populate the info property if needed to avoid making a call to mediahub to get video list for every building on default page load
        if (isset($options['nugget']) && in_array($options['nugget'], array('info', 'image', 'video'))) {
            $this->info = new UNL_OpenMap_Marker_Building_Info($options);
        }
    }

    function getInfo()
    {
        $this->info = new UNL_OpenMap_Marker_Building_Info(get_object_vars($this));
        return $this->info;
    }

    function __get($var)
    {
        switch ($var) {
            case 'description':
                return $this->getDescription();
            case 'majors':
                return new UNL_UndergraduateBulletin_College_Majors(array('college' => $this));
            case 'abbreviation':
                return UNL_UndergraduateBulletin_CollegeList::getAbbreviation($this->name);
        }
        throw new Exception('Unknown member var! '.$var);
    }
}