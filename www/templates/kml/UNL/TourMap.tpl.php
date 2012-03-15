<?php
echo '<?xml version="1.0" encoding="UTF-8"?>';
?>

<kml xmlns="http://www.opengis.net/kml/2.2">
    <Document>
        <name><?php echo $context->output->title; ?></name>
        <Style id="buildingPlacemark">
          <IconStyle>
            <Icon>
              <href><?php echo UNL_TourMap::getURL(); ?>images/icons/buildings64.png?FOOL_GOOGLE_CACHE_FOR_TESTING=<?php echo time();?></href>
            </Icon>
            <hotSpot x="0.5" y="0.5" xunits="fraction" yunits="fraction" />
          </IconStyle>
        </Style>
        <Style id="sculpturePlacemark">
          <IconStyle>
            <Icon>
              <href><?php echo UNL_TourMap::getURL(); ?>images/icons/sculptures64.png?FOOL_GOOGLE_CACHE_FOR_TESTING=<?php echo time();?></href>
            </Icon>
            <hotSpot x="0.5" y="0.5" xunits="fraction" yunits="fraction" />
          </IconStyle>
        </Style>
        <Style id="emergencyphonePlacemark">
          <IconStyle>
            <Icon>
              <href><?php echo UNL_TourMap::getURL(); ?>images/icons/emergencyphones64.png?FOOL_GOOGLE_CACHE_FOR_TESTING=<?php echo time();?></href>
            </Icon>
            <hotSpot x="0.5" y="0.5" xunits="fraction" yunits="fraction" />
          </IconStyle>
        </Style>
        <Style id="policestationPlacemark">
          <IconStyle>
            <Icon>
              <href><?php echo UNL_TourMap::getURL(); ?>images/icons/policestations64.png?FOOL_GOOGLE_CACHE_FOR_TESTING=<?php echo time();?></href>
            </Icon>
            <hotSpot x="0.5" y="0.5" xunits="fraction" yunits="fraction" />
          </IconStyle>
        </Style>
        <?php echo $savvy->render($context->output,'UNL/TourMap/MarkerList.tpl.php'); ?>
    </Document>
</kml>