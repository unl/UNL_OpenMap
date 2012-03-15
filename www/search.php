<?php
require_once '../tour.functions.php';
require_once '../config.inc.php';

if (isset($_GET['q'])) {
    $q = $_GET['q'];
    if ($results = searchTour($q)) {
        foreach ($results as $item) {
            echo "<a onclick='" . $item->link . "' href='#'>" . 
                    strtotitle(strtolower($item->title)) . "</a>\n";
        }
    } else {
        echo '<span style="padding:2px">Sorry, your search did not return any results.</span>';
    }
}

