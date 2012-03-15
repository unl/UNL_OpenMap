<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>UNL_Common_Building_Info</title>
</head>

<body>
<p>This file demonstrates the usage of the UNL_Common_Building_Info package.</p>
<?php
require_once 'UNL/Common/Building.php';
require_once 'UNL/Common/Building/Info.php';

$bldgs = new UNL_Common_Building();
$info = new UNL_Common_Building_Info();

$bldg_code = 'ARCH';
echo "<p>Here some information about the building you requested, {$bldgs->codes[$bldg_code]} ($bldg_code)</p>";
echo $info->getHtml($bldg_code);
echo '<a href="#" onclick="document.getElementById(\'source\').style.display=\'block\'; return false;">View Source+</a><div id="source" style="display:none;">'.highlight_file($_SERVER['SCRIPT_FILENAME'],true).'</div>';
$bldg_code = '501';
echo "<p>Here some information about the building you requested, {$bldgs->codes[$bldg_code]} ($bldg_code)</p>";
echo $info->getHtml($bldg_code);
$bldg_code = '420';
echo "<p>Here some information about the building you requested, {$bldgs->codes[$bldg_code]} ($bldg_code)</p>";
echo $info->getHtml($bldg_code);
?>

</body>
</html>