{
    "code":"<?php echo $context->code; ?>",
    "name":"<?php echo $context->title; ?>",
    "campus":"<?php echo $context->campus; ?>",
    "position":{
        "point":
            {
            "latitude":"<?php echo $context->position->lat; ?>",
            "longitude":"<?php echo $context->position->lng; ?>"
            },
        "polygon":
            {
            <?php $last_key = end(array_keys($context->polygon->coords));
            foreach ($context->polygon->coords as $key => $coords): ?>
                {
                    "latitude":"<?php echo $coords->lat; ?>",
                    "longitude":"<?php echo $coords->lng; ?>"
                }<?php echo ($key == $last_key ? '' : ',');?>

            <?php endforeach; ?>
            }
    }
}