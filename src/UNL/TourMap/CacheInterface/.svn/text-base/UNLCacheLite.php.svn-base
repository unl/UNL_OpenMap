<?php
/**
 * A caching service utilizing Cache_Lite
 * 
 * @author bbieber
 */
class UNL_TourMap_CacheInterface_UNLCacheLite implements UNL_TourMap_CacheInterface
{
    /**
     * UNL_Cache_Lite object
     * 
     * @var Cache_Lite
     */
    protected $cache;
    
    public $options = array('lifeTime'=>604800); // One week cache time
    
    /**
     * Constructor
     */
    function __construct($options = array())
    {
        $this->options = $options + $this->options;
        $this->cache = new UNL_Cache_Lite($this->options);
    }
    
    /**
     * Get an item stored in the cache
     * 
     * @see UNL/UndergraduateBulletin/UNL_TourMap_CacheInterface#get()
     */
    function get($key)
    {
        return $this->cache->get($key, 'UndergraduateBulletin');
    }
    
    /**
     * Save an element to the cache
     * 
     * @see UNL/UndergraduateBulletin/UNL_TourMap_CacheInterface#save()
     */
    function save($data, $key)
    {
        return $this->cache->save($data, $key, 'UndergraduateBulletin');
    }

}

