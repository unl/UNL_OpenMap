<?php
/**
 * College data for the UNL_Common package.
 * 
 * @author Brett Bieber
 * @package UNL_Common
 * Created on Mar 27, 2006
 */

/**
 * Class which holds an array of all the colleges on campus.
 * 
 * @package UNL_Common
 */
class UNL_Common_Colleges {
    var $colleges = array();
    function UNL_Common_Colleges()
    {
        $this->colleges['CBA'] = 'Business Administration';
        $this->colleges['FPA'] = 'Fine & Performing Arts';
        $this->colleges['ASC'] = 'Arts & Sciences';
        $this->colleges['EHS'] = 'Education and Human Sciences';
        $this->colleges['JMC'] = 'Journalism & Mass Communications';
        $this->colleges['ANR'] = 'Agricultural Sciences & Natural Resources';
        $this->colleges['ENG'] = 'Engineering';
        $this->colleges['ARH'] = 'Architecture';
        $this->colleges['DNT'] = 'College of Dentistry';
        $this->colleges['LAW'] = 'Law';
        $this->colleges['GRD'] = 'Graduate Studies';
        $this->colleges['GEN'] = 'General Studies';
        $this->colleges['NUR'] = 'Nursing';
        array_multisort($this->colleges,SORT_ASC);
    }
    
    /**
    * Return all the codes
    *
    * @access  public
    * @return  array   all colleges as associative array
    */
    function getAllColleges()
    {
        return $this->colleges;
    }
}
?>
