<h4 id="infoBoxTitle"><?php echo $context->name; ?>
<?php if (isset($context->code) && !empty($context->code)) : ?>
    <span class="code">(<?php echo $context->code; ?>)</span>
<?php endif; ?>
</h4>
<div id="infoBoxContent">
    <?php
    echo $savvy->render($context);
    ?>
</div>
<div class="clear"></div>
<?php
/*
if (!empty($context->videos) && !($context->getRaw('videos') instanceof UNL_TourMap_Marker_Video_Missing)) {
    echo $savvy->render($context->videos, 'UNL/TourMap/Marker/Video.tpl.php');
}
*/
?>

<?php /* if (!empty($context->images) && !($context->getRaw('images') instanceof UNL_TourMap_Marker_Image_Missing)) : ?>
<img id="infoBoxBackground" src="<?php echo UNL_TourMap::getURL() . strtolower($feature) . '/' . $context->code . '/image/' . '1' . '/lg'; ?>" alt="Image of <?php echo $context->code; ?>" />
<?php endif; */ ?>
