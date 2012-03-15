<?php
echo '<?xml version="1.0" encoding="utf-8"?>';
?>

<feed xmlns="http://www.w3.org/2005/Atom"
      xmlns:geo="http://www.w3.org/2003/01/geo/wgs84_pos#"
      xmlns:georss="http://www.georss.org/georss"
      xmlns:dc="http://purl.org/dc/elements/1.1/">

  <title><?php echo $context->output->title; ?></title>
  <link rel="self" href="<?php echo UNL_TourMap::getURL().'?view='.$context->options['view'].'&amp;format=georss'; ?>" />
  <link rel="alternate" type="text/html" href="<?php echo UNL_TourMap::getURL(); ?>"/>
  <updated><?php echo date ("c", filemtime(UNL_TourMap::getDataDir().'/locations.inc.php')); ?></updated>
  <generator uri="<?php echo UNL_TourMap::getURL(); ?>">UNL Campus Maps</generator>

<?php echo $savvy->render($context->output, 'UNL/TourMap/MarkerList/AllMarkers.tpl.php'); ?>


</feed>