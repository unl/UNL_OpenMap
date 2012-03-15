<script type="text/javascript">
$(window).load(function(e) {
    UNLTourMap.defaultZoom = <?php echo (int)$context->zoom; ?>;
    UNLTourMap.mapMinZoom = <?php echo (int)$context->mapMinZoom; ?>;
    UNLTourMap.mapMaxZoom = <?php echo (int)$context->mapMaxZoom; ?>;
    UNLTourMap.centerLat = <?php echo (float)$context->center->lat; ?>;
    UNLTourMap.centerLng = <?php echo (float)$context->center->lng; ?>;
<?php if (isset($context->tile_resource)): ?>
    UNLTourMap.tileWidth = <?php echo (int)$context->options['tileWidth']; ?>;
    UNLTourMap.tileHeight = <?php echo (int)$context->options['tileHeight']; ?>;
    UNLTourMap.minx = <?php echo (float)$context->options['minx']; ?>;
    UNLTourMap.miny = <?php echo (float)$context->options['miny']; ?>;
    UNLTourMap.maxx = <?php echo (float)$context->options['maxx']; ?>;
    UNLTourMap.maxy = <?php echo (float)$context->options['maxy']; ?>;
    UNLTourMap.mapBounds = new google.maps.LatLngBounds(new google.maps.LatLng(UNLTourMap.minx, UNLTourMap.miny), new google.maps.LatLng(UNLTourMap.maxx, UNLTourMap.maxy));
<?php endif; ?>


<?php if (isset($context->markers)): ?>
    UNLTourMap.markerData = {
        <?php
        $savvy->setTemplatePath((UNL_TourMap::getFileRoot().'/www/templates/json'));
        echo $savvy->render($context->markers, 'UNL/TourMap/MarkerList/Generic.tpl.php');
        $savvy->setTemplatePath((UNL_TourMap::getFileRoot().'/www/templates/html'));
        ?>
    }
<?php endif; ?>

    UNLTourMap.initialize('mobile');
    if (window.location.hash) {
        $(window).trigger('hashchange');
    }


<?php if ($context->getRawObject() instanceof UNL_TourMap_GoogleMap_DynamicCenter) : ?>
    UNLTourMap.openBuildingInfo("<?php echo $context->options['code']; ?>");
<?php endif; ?>


});
</script>

<div id="main">
    <div id="header">
    UNL MAPS- $=<span id="jquery"></span> Map hgt: <span id="header_sizedebug"></span>, ScreenWidth: <span id="header_width"></span>
    </div>
    <div id="page" style="position:relative;width:100%;">
        <div id="main_map">
            <div id="map_canvas" style="overflow:hidden;position:relative;">
                <noscript>
                    <img alt="UNL Campus Map" src="http://maps.google.com/maps/api/staticmap?center=<?php echo $context->center->lat.','.$context->center->lng; ?>&zoom=<?php echo $context->zoom; ?>&size=928x620&maptype=<?php echo $context->type; ?>&sensor=false" />
                </noscript>
            </div>
        </div>
    </div>
</div>
