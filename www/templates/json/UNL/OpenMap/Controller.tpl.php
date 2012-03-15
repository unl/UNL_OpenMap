<?php
$class = $context->view_map[$context->options['view']];
$class = explode("_", $class);
$class = $class[1];

if ($class == 'TourMap') {
    echo $savvy->render($context->output,'UNL/TourMap/MarkerList.tpl.php');
} else {
    // Pass through the context
    echo $savvy->render($context->output);
}