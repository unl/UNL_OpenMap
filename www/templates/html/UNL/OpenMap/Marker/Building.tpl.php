<?php
    $printCampus = '';
    if ($context->campus == "lincoln") {
        $context->campus = 'Lincoln, NE';
    } else {
        $printCampus = ' Campus';
    }
?>
<li class="building"><a href="<?php echo UNL_OpenMap_Controller::getURL().$context->code; ?>"><span class="buildingCode"><?php echo $context->code; ?></span> <span class="format"><?php echo $context->title; ?></span> <span class="campus">(<?php echo $context->campus.$printCampus; ?>)</span> </a></li>
