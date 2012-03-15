
<entry>
    <title><?php echo $context->title; ?></title>
    <link rel="alternate" type="text/html" href="<?php echo UNL_OpenMap_Controller::getURL().'emergencyphone/'.'AAAA'; ?>"/>
    <georss:point><?php echo $context->position->lat; ?> <?php echo $context->position->lng; ?></georss:point>
    <geo:lat><?php echo $context->position->lat; ?></geo:lat>
    <geo:long><?php echo $context->position->lng; ?></geo:long>
    <content type="html">
        &lt;h4&gt;<?php echo $context->title; ?>&lt;/h3&gt;
    </content>
    <dc:subject>emergency phones</dc:subject>
</entry>