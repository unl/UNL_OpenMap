<?php
class UNL_OpenMap_Marker_Image
{
    public $options = array('size'=>'lg', 'number'=>1);

    public static $image_dir;

    public $feature;

    public $code;

    public $number;

    public $size;

    public $mimetype = 'jpg';

    function __construct($options = array())
    {
        $this->options = $options + $this->options;
        if (!isset($this->options['code'])) {
            throw new Exception('No feature to show info for!', 403);
        }
        $this->feature = $this->options['feature'];
        $this->code   = $this->options['code'];
        $this->number = $this->options['number'];
        $this->size   = $this->options['size'];
    }

    protected function _normalizeNumber()
    {
        return $this->number;
    }

    public function getPath()
    {
        $path = self::getImageDir($this->feature);

        $path .= '/' . $this->code;
        if (!empty($this->number)) {
            $path .= '_' . $this->_normalizeNumber();
        }
        $path .= '_' . $this->size . '.' . $this->mimetype;

        return $path;
    }

    public function getUrl($size = null)
    {
        if (empty($size)) {
            $size = $this->size;
        }

        return UNL_OpenMap_Controller::getURL() . $this->feature . '/' . $this->code
            . '/image/' . intval($this->number) . '/' . $size;
    }

    public static function getImageDir($feature = null)
    {
        if (!isset(self::$image_dir)) {
            self::$image_dir = dirname(dirname(dirname(dirname(dirname(__FILE__))))).'/www/images';
        }

        if ($feature) {
            switch($feature) {
                case 'building':
                case 'marker':
                case 'sculpture':
                    return self::$image_dir.'/'.$feature;
            }
        }

        return self::$image_dir;
    }

    /**
     * Get a collection of images reulated to the feature
     *
     * @param string     $feature Feature, e.g. building
     * @param string|int $code    Unique ID for this feature, e.g. ADMN
     * @param string     $size    Size of images request, e.g. lg
     */
    public static function getImageCollection($feature, $code, $size)
    {
        $imgDir = new DirectoryIterator(UNL_OpenMap_Marker_Image::getImageDir($feature));
        $regex  = '/^' . $code . '(?:_(\d+))?' . '_' . $size . '\.jpg$' . '/';
        $filter = new RegexIterator($imgDir, $regex, RegexIterator::GET_MATCH);

        $images = array();
        foreach ($filter as $fileMatch) {
            $images[] = array(
                'feature' => $feature,
                'code' => $code,
                'number' => isset($fileMatch[1]) ? $fileMatch[1] : '',
                'size' => $size
            );
        }

        return $images;
    }

    public static function numberOf($feature,$code)
    {
        $i = 1;
        $dir = self::getImageDir().'/'.$feature.'/';
        $filename = $code.'_'.sprintf("%02d",$i).'_lg.jpg';

        if (!file_exists($dir.$filename)) {
            return false;
        }

        while (file_exists($dir.$filename)) {
            $i++;
            $filename = $code.'_'.sprintf("%02d",$i).'_lg.jpg';
        }
        return $i-1;
    }
}
