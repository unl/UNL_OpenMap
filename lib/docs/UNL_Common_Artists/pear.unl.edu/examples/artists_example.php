<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>UNL_Common_Artists</title>
</head>

<body>
<p>This file demonstrates the usage of the UNL_Common_Artists package.</p>
<?php
set_include_path(dirname(dirname(__FILE__)).PATH_SEPARATOR.get_include_path());
require_once 'UNL/Common/Artists.php';

$artists = new UNL_Common_Artists();

if ($artists->find()) {
	while ($artists->fetch()) {
		echo "{$artists->last_name}, {$artists->first_name} ".date('Y',strtotime($artists->dob))."<br />";
	}
}

echo '<a href="#" onclick="document.getElementById(\'source\').style.display=\'block\'; return false;">View Source+</a><div id="source" style="display:none;">'.highlight_file($_SERVER['SCRIPT_FILENAME'],true).'</div>';
?>
</body>
</html>