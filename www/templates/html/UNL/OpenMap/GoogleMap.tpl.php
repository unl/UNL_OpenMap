<?php if ($context->options['format'] == 'partial') : ?>
<script type="text/javascript">WDN.loadCSS('<?php echo UNL_OpenMap_Controller::getURL(); ?>css/map.css');</script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?v=3.3&amp;sensor=false"></script>
<script type="text/javascript" src="/wdn/templates_3.0/scripts/plugins/ui/jQuery.ui.js"></script>
<script type="text/javascript" src="/wdn/templates_3.0/scripts/plugins/hashchange/jQuery.hashchange.1-3.min.js"></script>
<script type="text/javascript">var UNL_TOUR_URL = "<?php echo UNL_OpenMap_Controller::getURL(); ?>"; var mobile = false;</script>
<script type="text/javascript" src="<?php echo UNL_OpenMap_Controller::getURL(); ?>js/map.js"></script>
<?php endif; ?>
<script type="text/javascript">
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
    UNLTourMap.markerData =
        <?php
        $savvy->setTemplatePath((UNL_OpenMap_Controller::getFileRoot().'/www/templates/json'));
        echo $savvy->render($context->getRaw('markers'), 'UNL/TourMap/MarkerList.tpl.php');
        $savvy->setTemplatePath((UNL_OpenMap_Controller::getFileRoot().'/www/templates/html'));
        ?>;
    WDN.jQuery(window).load(function(e) {
        UNLTourMap.initialize();
        <?php
        if (isset($context->options['markers'])) {
            foreach ($context->options['markers'] as $marker_type) {
                echo "UNLTourMap.setUpMarkers('$marker_type');";
            }
        }
        ?>
        if (window.location.hash) {
            WDN.jQuery(window).trigger('hashchange');
        }

    <?php if ($context->getRawObject() instanceof UNL_OpenMap_GoogleMap_DynamicCenter) : ?>
        UNLTourMap.openBuildingInfo("<?php echo $context->options['code']; ?>");
    <?php endif; ?>

    });
</script>
<?php
// Default dimensions for map
$width  = '960px';
$height = '620px';
if (isset($context->options['format'])
    && ($context->options['format'] == 'mobile' || $context->options['format'] == 'partial')) {
    $width = $height = '100%';
}
?>
<div style="width:<?php echo $width; ?>;height:<?php echo $height; ?>">
    <div id="map_canvas" style="width:100%;height:100%">
        <noscript>
            <?php include __DIR__ . '/../../../staticgooglemapsv2/UNL/TourMap/GoogleMap.tpl.php'; ?>
        </noscript>
    </div>
</div>
