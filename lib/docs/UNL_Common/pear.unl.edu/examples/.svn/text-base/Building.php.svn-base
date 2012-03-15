<?php
/**
 * Simple example to show how to select buildings and display them within a form.
 * 
 * @author Brett Bieber
 * @package UNL_Common
 * Created on Sep 27, 2005
 */

chdir(dirname(__FILE__).'/../');

set_include_path(dirname(dirname(__FILE__)).'/src'.PATH_SEPARATOR.get_include_path());

require_once 'UNL/Common/Building.php';
require_once 'HTML/QuickForm.php';
$bldgs = new UNL_Common_Building();
$form =& new HTML_QuickForm();
$form->addElement('select','buildings','Buildings',$bldgs->codes);
echo $form->toHtml();
?>
