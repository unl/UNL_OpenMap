<div class="infobox-content-col first">
<?php foreach ($context->getArtists() as $artist): ?>
    <div><em><?php echo $artist->first_name . ' ' . $artist->last_name ?></em></div>

<?php endforeach; ?>
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
		<img src="<?php echo $image->getUrl('sm') ?>" alt="Sculpture Photo" />
    <?php endforeach; ?>
    </div>
</div>
<div id="fullImage"><img src="<?php echo UNL_OpenMap_Controller::getURL(); ?>css/images/iconLoading.gif" /></div>

<script type="text/javascript">UNLTourMap.setupImageSwitch();</script>
