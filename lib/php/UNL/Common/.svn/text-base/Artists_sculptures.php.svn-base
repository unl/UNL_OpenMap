<?php
/**
 * This package is an a DB_DataObject which connects to the database and allows searching for artist_sculptures.
 * 
 * @package UNL_Common_Arists
 * @author bbieber
 */
require_once 'DB/DataObject.php';
require_once 'UNL/Common/Artists/config.inc.php';
require_once 'UNL/Common/Artists.php';
require_once 'UNL/Common/Sculptures.php';

/**
 * Dataobject for interacting with the Artists_sculptures table.
 * 
 * @package UNL_Common_Artists_sculptures
 */
class UNL_Common_Artists_sculptures extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'artists_sculptures';              // table name
    public $artist_id;                       // int(11)  not_null multiple_key
    public $sculpture_id;                    // int(11)  not_null

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('UNL_Common_Artists_sculptures',$k,$v); }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
    
    static function getTableDefinition()
    {
        return "CREATE TABLE artists_sculptures (
                  artist_id int(11) NOT NULL default '0',
                  sculpture_id int(11) NOT NULL default '0'
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
            'artist_id'    => 129,
            'sculpture_id' => 129,
        );
        return $table;
    }
    
    function links()
    {
        return array('artist_id'    => 'artists:id',
                     'sculpture_id' => 'sculptures:id');
    }
}
