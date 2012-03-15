<?php
/**
 * This package is an a DB_DataObject which connects to the database and allows searching for artist info.
 * 
 * @package UNL_Common_Arists
 * @author bbieber
 */
require_once 'DB/DataObject.php';
require_once 'UNL/Common/Artists/config.inc.php';

/**
 * DataObject for artist info.
 *
 * @package UNL_Common_Artists
 */
class UNL_Common_Artists extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'artists';                         // table name
    public $id;                              // int(11)  not_null primary_key auto_increment
    public $first_name;                      // string(50)  not_null
    public $middle_name;                     // string(100)  
    public $last_name;                       // string(50)  not_null
    public $dob;                             // date(10)  binary
    public $dod;                             // date(10)  binary
    public $info;                            // blob(16777215)  blob

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('UNL_Common_Artists',$k,$v); }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
    
    
    static public $db_file = 'unl_common_artists.sqlite';
    
    static private $db;
    
    static function getDB()
    {
        if (!isset(self::$db)) {
            return self::__connect();
        }
        return self::$db;
    }

    static public function getDataDir()
    {
        if (file_exists(dirname(dirname(dirname(__FILE__)))).'/data/unl_common_artists.sqlite') {
            $data_dir = dirname(dirname(dirname(__FILE__))).'/data';
        } else {
            $data_dir = dirname(dirname(dirname(__FILE__))).'/data/UNL_Common_Artists/pear.unl.edu';
        }
        return $data_dir;
    }
    
    static protected function __connect()
    {
        if (self::$db = new SQLiteDatabase(self::getDataDir().self::$db_file)) {
            return self::$db;
        }
        throw new Exception('Cannot connect to database!');
    }
    
    static function tableExists($table)
    {
        $db = self::getDB();
        $result = $db->query("SELECT name FROM sqlite_master WHERE type='table' AND name='$table'");
        return $result->numRows() > 0;
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
    
    static public function getTableDefinition()
    {
        return "CREATE TABLE artists (
                  id int(11) NOT NULL,
                  first_name varchar(50) NOT NULL default '',
                  middle_name varchar(100) default NULL,
                  last_name varchar(50) NOT NULL default '',
                  dob date default NULL,
                  dod date default NULL,
                  info mediumtext,
                  PRIMARY KEY  (id)
                ) ;";
    }
    
    static function _checkDB()
    {
       if (!self::tableExists('artists')) {
            self::getDB()->queryExec(self::getTableDefinition());
            self::importCSV('artists', self::getDataDir().'artists.csv');
        }
    }
    
    /**
     * Returns an associative array of the fields for this table.
     *
     * @return array
     */
    public function table()
    {
        $table = array(
            'id'          => 129,
            'first_name'  => 130,
            'middle_name' => 2,
            'last_name'   => 130,
            'dob'         => 6,
            'dod'         => 6,
            'info'        => 66
        );
        return $table;
    }
    
    function keys()
    {
        return array(
            'id',
        );
    }
    
    function sequenceKey()
    {
        return array('id',true);
    }
}
