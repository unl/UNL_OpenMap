<?php

class UNL_OpenMap_OutputController extends Savvy
{
    
    static protected $cache;
    
    static public $defaultExpireTimestamp = null;
    
    function __construct($options = array())
    {
        parent::__construct();
    }
    
    static public function setCacheInterface(UNL_OpenMap_CacheInterface $cache)
    {
        self::$cache = $cache;
    }
    
    /**
     * get the cache interface
     * @return UNL_OpenMap_CacheInterface
     */
    static public function getCacheInterface()
    {
        if (!isset(self::$cache)) {
            self::setCacheInterface(new UNL_OpenMap_CacheInterface_UNLCacheLite());
        }
        return self::$cache;
    }
    
    static public function setDefaultExpireTimestamp($timestamp)
    {
        self::$defaultExpireTimestamp = $timestamp;
    }
    
    static public function getDefaultExpireTimestamp()
    {
        return self::$defaultExpireTimestamp;
    }
    
    public function renderObject($object, $template = null)
    {
        if ($object instanceof UNL_OpenMap_CacheableInterface
            || ($object                    instanceof Savvy_ObjectProxy
                && $object->getRawObject() instanceof UNL_OpenMap_CacheableInterface)) {
            $key = $object->getCacheKey();
            
            // We have a valid key to store the output of this object.
            if ($key !== false && $data = self::getCacheInterface()->get($key)) {
                // Tell the object we have cached data and will output that.
                $object->preRun(true);
            } else {
                // Content should be cached, but none could be found.
                //flush();
                ob_start();
                $object->preRun(false);
                $object->run();
                
                $data = parent::renderObject($object, $template);
                
                if ($key !== false) {
                    self::getCacheInterface()->save($data, $key);
                }
                ob_end_clean();
            }
            
            if ($object instanceof UNL_OpenMap_PostRunReplacements) {
                $data = $object->postRun($data);
            }
            
            return $data;
        }
        
        return parent::renderObject($object, $template);

    }
    
    /**
     * 
     * @param timestamp $expires timestamp
     * 
     * @return void
     */
    function sendCORSHeaders($expires = null)
    {
        // Specify domains from which requests are allowed
        header('Access-Control-Allow-Origin: *');

        // Specify which request methods are allowed
        header('Access-Control-Allow-Methods: GET, OPTIONS');

        // Additional headers which may be sent along with the CORS request
        // The X-Requested-With header allows jQuery requests to go through

        header('Access-Control-Allow-Headers: X-Requested-With');

        // Set the ages for the access-control header to 20 days to improve speed/caching.
        header('Access-Control-Max-Age: 1728000');

        if (isset($expires)) {
            // Set expires header for 24 hours to improve speed caching.
            header('Expires: '.date('r', $expires));
        }
    }
}

