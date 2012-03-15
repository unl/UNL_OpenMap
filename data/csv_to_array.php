<?php

$buildings = array();
$locations = array();
$duplicates = '';

if (($file_fmp   = fopen(dirname(__FILE__)."/all_buildings.csv", "r")) !== FALSE &&
    ($file_ucomm = fopen(dirname(__FILE__)."/additional_buildings.csv", "r")) !== FALSE
) {
    foreach (array($file_fmp,$file_ucomm) as $file) {
        while (($data = fgetcsv($file)) !== FALSE) {
            if (count($data) > 3) {
                echo 'ERROR with data! Check that commas, quotes are escaped.';
                var_dump($data);
                exit();
            }
            if (array_key_exists($data[1], $buildings)) {
                $duplicates = "Duplicate building code: ".$data[1]."\n";
            }

            if (stristr($data[2],'Sites') && stristr($data[2],'Lincoln')) {
                $data[2] = 'Sites in Lincoln';
            }

            $buildings[$data[1]]['name'] = $data[0];
            $buildings[$data[1]]['location'] = $data[2];
            if (!isset($locations[$data[2]])) {
                $locations[$data[2]] = array();
            }
            $locations[$data[2]][$data[1]] = $data[0];
        }
        fclose($file);
    }
}

var_dump($buildings);
var_dump($locations);
echo $duplicates;

file_put_contents(dirname(__FILE__).'/buildings.inc.php', "<?php\nreturn ".
                                var_export($buildings, true).
                                ';');

file_put_contents(dirname(__FILE__).'/locations.inc.php', "<?php\nreturn ".
                                var_export($locations, true).
                                ';');
