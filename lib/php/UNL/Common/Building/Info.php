<?php
/**
 * This package has information for buildings on campus. 
 * Currently the information is structured in HTML snippets.
 * 
 * @package UNL_Common_Building_Info
 * @author Brett Bieber
 */

require_once 'UNL/Common/Building.php'; 

class UNL_Common_Building_Info
{
	public $bldgs;
	
	static public $db_file = 'building_info.sqlite';
    
    static private $db;
	
	function __construct()
	{
		$this->bldgs = new UNL_Common_Building();
	}
	
	/**
	 * Checks if a building with the given code exists.
	 * @param string Building code.
	 * @return bool true|false
	 */
	function buildingExists($code)
	{
	    return $this->bldgs->buildingExists($code);
	}
	
	/**
	 * Returns a HTML snippet of information about a building on campus.
	 * 
	 * @param string $code Building Code for the building you want coordinates of.
	 * @return string Snippet of text description. 
	 */
	function getHtml($code)
	{
		if ($this->buildingExists($code)) {
			// Code is valid, find the building information.
			$this->_checkDB();
            if ($result = self::getDB()->query('SELECT description FROM building_info WHERE code = \''.$code.'\';')) {
				while ($data = $result->fetch()) {
					return $data['description'];
				}
			}
		}
		return false;
	}
	
    static function getDB()
    {
        if (!isset(self::$db)) {
            return self::__connect();
        }
        return self::$db;
    }
    
    static function tableExists($table)
    {
        $db = self::getDB();
        $result = $db->query("SELECT name FROM sqlite_master WHERE type='table' AND name='$table'");
        return $result->numRows() > 0;
    }
    
    static protected function __connect()
    {
        if (self::$db = new SQLiteDatabase(self::getDataDir().self::$db_file)) {
            return self::$db;
        }
        throw new Exception('Cannot connect to database!');
    }
    
    static function importCSV($table, $filename)
    {
        $db = self::getDB();
        if ($h = fopen($filename,'r')) {
            while ($line = fgets($h)) {
                $data = array();
                $line = str_replace('NULL', '""', $line);
                foreach (explode('","',$line) as $field) {
                    $data[] = "'".sqlite_escape_string(stripslashes(trim($field, "\"\n")))."'";
                }
                $data = implode(',',$data);
                $db->queryExec("INSERT INTO ".$table." VALUES ($data);");
            }
        }
    }
	
    protected function _checkDB()
    {
       if (!self::tableExists('building_info')) {
            self::getDB()->queryExec(self::getTableDefinition());
            self::importCSV('building_info', self::getDataDir().'building_info.csv');
        }
    }
    
    static public function getDataDir()
    {
        return dirname(dirname(dirname(dirname(dirname(__FILE__))))) . '/data/UNL_Common_Building_Info/data/';
    }
    
    static public function getTableDefinition()
    {
        return "CREATE TABLE building_info (
                  id int(11) NOT NULL,
                  code varchar(10) NOT NULL default '',
                  description mediumtext,
                  PRIMARY KEY  (id),
                  UNIQUE (code)
                ) ;";
    }
}
?>