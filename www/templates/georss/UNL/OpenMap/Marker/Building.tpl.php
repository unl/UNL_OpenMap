
<entry>
    <title><?php echo $context->title; ?></title>
    <description>Building Code: <?php echo $context->code; ?></description>
    <link rel="alternate" type="text/html" href="<?php echo UNL_OpenMap_Controller::getURL().$context->code; ?>"/>
    <georss:point><?php echo $context->position->lat; ?> <?php echo $context->position->lng; ?></georss:point>
    <geo:lat><?php echo $context->position->lat; ?></geo:lat>
    <geo:long><?php echo $context->position->lng; ?></geo:long>
    <georss:featurename><?php echo $context->title; ?></georss:featurename>
    <georss:featuretypetag>buildings</georss:featuretypetag>
    <content type="html">
        &lt;h4&gt;<?php echo $context->title; ?>&lt;/h3&gt;
    </content>
    <dc:subject>buildings</dc:subject>
</entry>