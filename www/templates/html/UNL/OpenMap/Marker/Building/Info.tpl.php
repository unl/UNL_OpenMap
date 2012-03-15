<div class="infobox-content-col first">
<?php
if (gettype($context->getRaw('description')) == 'string') {
    echo $context->getRaw('description');
} else {
    echo $savvy->render($context->description);
}
?>
</div>
<div class="infobox-content-col">
    <div class="markerImages">
    <?php foreach ($context->images as $image) : ?>
        <?php if ($image instanceof UNL_OpenMap_Marker_Image_Missing) : ?>
            <img src="<?php echo UNL_OpenMap_Controller::getURL().$parent->parent->context->options['view']."/".$context->code."/image/1/lg"; ?>" alt="No Available Image" />
        <?php else : ?>
            <img src="<?php echo $image->getUrl('sm'); ?>" alt="Building Photo" />
        <?php endif; ?>
    <?php endforeach; ?>
    </div>
</div>
<div id="fullImage"><img src="<?php echo UNL_OpenMap_Controller::getURL(); ?>css/images/iconLoading.gif" alt="Building Photo Loading" /></div>

<script type="text/javascript">UNLTourMap.setupImageSwitch();</script>
