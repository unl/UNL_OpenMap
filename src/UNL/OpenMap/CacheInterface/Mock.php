<?php
class UNL_UnderGraduateBulletin_CacheInterface_Mock implements UNL_OpenMap_CacheInterface
{
    /**
     * Callback function keys will be sent to
     * 
     * @var Callback
     */
    public static $logger;
    
    function get($key)
    {
        // Expired cache always.
        return false;
    }
    
    function save($data, $key)
    {
        // Make it appear as though it was saved.
        if (is_callable(self::$logger)) {
            call_user_func(self::$logger, $key);
        }
        return true;
    }
}
?>