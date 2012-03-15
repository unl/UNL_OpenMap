<?php

class UNL_Common
{

    /**
     * The driver to be used for retrieving data
     *
     * @var UNL_Common_DataDriverInterface
     */
    public static $driver;

    /**
     * Get the current data driver
     *
     * @return UNL_Common_DataDriverInterface
     */
    static public function getDriver()
    {
        if (!isset(self::$driver)) {
            require_once 'UNL/Common/DataDriverInterface.php';
            require_once 'UNL/Common/JSONDataDriver.php';
            self::$driver = new UNL_Common_JSONDataDriver();
        }
        return self::$driver;
    }

}

