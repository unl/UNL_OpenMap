<?php
/**
 * This package is an a DB_DataObject which connects to the database and allows searching for sculpture info.
 * 
 * @package UNL_Common_Arists
 * @author bbieber
 */
require_once 'DB/DataObject.php';
require_once 'UNL/Common/Artists/config.inc.php';

/**
 * Dataobject for Sculpture info.
 * 
 * @package UNL_Common_Artists
 */
class UNL_Common_Sculptures extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'sculptures';                      // table name
    public $id;                              // int(11)  not_null primary_key auto_increment
    public $title;                           // string(255)  not_null
    public $media;                           // string(100)  not_null
    public $date;                            // date(10)  binary
    public $info;                            // blob(16777215)  not_null blob
    public $imageurl;                        // string(255)  
    public $lat;                             // real(16)  
    public $lon;                             // real(16)  

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('UNL_Common_Sculptures',$k,$v); }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
    
    static public function getTableDefinition()
    {
        return "CREATE TABLE sculptures (
                  id int(11) NOT NULL,
                  title varchar(255) NOT NULL default '',
                  media varchar(100) NOT NULL default '',
                  date date default '0000-00-00',
                  info mediumtext NOT NULL,
                  imageurl varchar(255) default NULL,
                  lat float(16,14) default NULL,
                  lon float(16,14) default NULL,
                  PRIMARY KEY  (id)
                ) ;";
    }
    
    /**
     * Returns an associative array of the fields for this table.
     *
     * @return array
     */
    public function table()
    {
        $table = array(
            'id'       => 129,
            'title'    => 130,
            'media'    => 130,
            'date'     => 6,
            'info'     => 194,
            'imageurl' => 2
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
