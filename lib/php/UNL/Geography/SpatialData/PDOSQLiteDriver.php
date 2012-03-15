<?php

class UNL_Geography_SpatialData_PDOSQLiteDriver extends UNL_Geography_SpatialData_SQLiteDriver
{

    function __construct()
    {
        self::$db_file  = 'spatialdata.pdo.sqlite';
        parent::__construct();
    }

    protected function __connect()
    {
        $this->db = new PDO('sqlite:'.self::getDataDir().self::$db_file);
        return $this->db;
    }

    protected function _getResultRowCount($result)
    {
        return $result->rowCount();
    }

}