<?php

foreach($context as $list) {
    if ($list->getRawObject() instanceof UNL_TourMap_MarkerList) {
        echo $savvy->render($list, 'UNL/TourMap/MarkerList.tpl.php');
    } else {
        echo $savvy->render($list);
    }
}