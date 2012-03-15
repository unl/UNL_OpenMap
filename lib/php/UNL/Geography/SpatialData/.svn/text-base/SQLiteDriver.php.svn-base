<?php

class UNL_Geography_SpatialData_SQLiteDriver implements UNL_Geography_SpatialData_DriverInterface
{

    static public $db_file = 'spatialdata.sqlite';

    protected $db;
    
    public $bldgs;

    protected $db_class = 'SQLiteDatabase';

    function __construct()
    {
        $this->bldgs = new UNL_Common_Building();
    }

    /**
     * Returns the geographical coordinates for a building.
     * 
     * @param string $code Building Code for the building you want coordinates of.
     * @return Associative array of coordinates lat and lon. false on error. 
     */
    function getGeoCoordinates($code)
    {
        $this->_checkDB();
        if ($result = $this->getDB()->query('SELECT lat,lon FROM campus_spatialdata WHERE code = \''.$code.'\';')) {
            while ($coords = $result->fetch()) {
                return array('lat'=>$coords['lat'],
                             'lon'=>$coords['lon']);
            }
        }
        return false;
    }

    /**
     * Checks if a building with the given code exists.
     * @param string Building code.
     * @return bool true|false
     */
    function buildingExists($code)
    {
        if (isset($this->bldgs->codes[$code])) {
            return true;
        }

        return false;
    }

    protected function _checkDB()
    {
       if (!$this->tableExists('campus_spatialdata')) {
            $this->getDB()->query(self::getTableDefinition());
            $this->importCSV('campus_spatialdata', self::getDataDir().'campus_spatialdata.csv');
        }
    }

    static public function getTableDefinition()
    {
        return "CREATE TABLE campus_spatialdata (
                  id int(11) NOT NULL,
                  code varchar(10) NOT NULL default '',
                  lat float(16,14) NOT NULL default '0.00000000000000',
                  lon float(16,14) NOT NULL default '0.00000000000000',
                  PRIMARY KEY  (id),
                  UNIQUE (code)
                ) ; ";
    }

    function getDB()
    {
        if (!isset($this->db)) {
            return $this->__connect();
        }
        return $this->db;
    }

    function tableExists($table)
    {
        $db = $this->getDB();
        $result = $db->query("SELECT name FROM sqlite_master WHERE type='table' AND name='$table'");
        return $this->_getResultRowCount($result) > 0;
    }

    protected function _getResultRowCount($result)
    {
        return $result->numRows();
    }

    protected function __connect()
    {
        if ($this->db = new $this->db_class(self::getDataDir().self::$db_file)) {
            return $this->db;
        }
        throw new Exception('Cannot connect to database!');
    }

    public function importCSV($table, $filename)
    {
        $db = $this->getDB();
        if ($h = fopen($filename,'r')) {
            while ($line = fgets($h)) {
                $data = array();
                $line = str_replace('NULL', '""', $line);
                foreach (explode('","',$line) as $field) {
                    $data[] = "'".sqlite_escape_string(stripslashes(trim($field, "\"\n")))."'";
                }
                $data = implode(',',$data);
                $db->query("INSERT INTO ".$table." VALUES ($data);");
            }
        }
    }

    static public function getDataDir()
    {
        if (file_exists(dirname(dirname(dirname(dirname(dirname(__FILE__))))) . '/data/pear.unl.edu/UNL_Geography_SpatialData_Campus')) {
            return dirname(dirname(dirname(dirname(dirname(__FILE__))))) . '/data/pear.unl.edu/UNL_Geography_SpatialData_Campus/';
        }
        if (file_exists(dirname(dirname(dirname(dirname(dirname(__FILE__))))) . '/data/UNL_Geography_SpatialData_Campus')) {
            return dirname(dirname(dirname(dirname(dirname(__FILE__))))) . '/data/UNL_Geography_SpatialData_Campus/data/';
        }
        return dirname(dirname(dirname(dirname(dirname(__FILE__))))) . '/data/';
    }
}