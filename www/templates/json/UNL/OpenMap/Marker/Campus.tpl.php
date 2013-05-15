{
    "code":"<?php echo $context->code; ?>",
    "name":"<?php echo $context->title; ?>",
    "position":{
        "point":
            {
            "latitude":"<?php echo $context->position->lat; ?>",
            "longitude":"<?php echo $context->position->lng; ?>"
            },
        "polygon":
            [
            <?php
            $keys = array_keys($context->polygon->coords);
            $last_key = end($coords);
            foreach ($context->polygon->coords as $key => $coords): ?>
                {
                    "latitude":"<?php echo $coords->lat; ?>",
                    "longitude":"<?php echo $coords->lng; ?>"
                }<?php echo ($key == $last_key ? '' : ',');?>

            <?php endforeach; ?>
            ]
    }
}
