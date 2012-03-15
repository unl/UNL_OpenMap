<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<!--
    Membership and regular participation in the UNL Web Developer Network
    is required to use the UNL templates. Visit the WDN site at
    http://wdn.unl.edu/. Click the WDN Registry link to log in and
    register your unl.edu site.
    All UNL template code is the property of the UNL Web Developer Network.
    The code seen in a source code view is not, and may not be used as, a
    template. You may not use this code, a reverse-engineered version of
    this code, or its associated visual presentation in whole or in part to
    create a derivative work.
    This message may not be removed from any pages based on the UNL site template.

    $Id: php.fixed.dwt.php 536 2009-07-23 15:47:30Z bbieber2 $
-->
<link rel="stylesheet" type="text/css" media="screen" href="/wdn/templates_3.0/css/all.css" />
<link rel="stylesheet" type="text/css" media="print" href="/wdn/templates_3.0/css/print.css" />
<script type="text/javascript" src="/wdn/templates_3.0/scripts/all.js"></script>
<?php include $_SERVER['DOCUMENT_ROOT'].'/wdn/templates_3.0/includes/browserspecifics.html'; ?>
<?php include $_SERVER['DOCUMENT_ROOT'].'/wdn/templates_3.0/includes/metanfavico.html'; ?>
<!-- TemplateBeginEditable name="doctitle" -->
<title>UNL | Campus Maps</title>
<!-- TemplateEndEditable --><!-- TemplateBeginEditable name="head" -->
<!-- Place optional header elements here -->
<link rel="events" href="http://events.unl.edu/" title="UNL" />
<link rel="home" href="http://www.unl.edu/" title="UNL" />
<style type="text/css">
@import url(<?php echo UNL_TourMap::getURL() ?>css/map.css);
</style>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?v=3.3&amp;sensor=false"></script>
<script type="text/javascript" src="/wdn/templates_3.0/scripts/plugins/ui/jQuery.ui.js"></script>
<script type="text/javascript" src="/wdn/templates_3.0/scripts/plugins/hashchange/jQuery.hashchange.1-3.min.js"></script>
<script type="text/javascript">var UNL_TOUR_URL = "<?php echo UNL_TourMap::getURL(); ?>"; var mobile = false;</script>
<script type="text/javascript" src="<?php echo UNL_TourMap::getURL() ?>js/map.js"></script>

<!-- TemplateEndEditable -->
</head>
<body class="fixed">
<p class="skipnav"> <a class="skipnav" href="#maincontent">Skip Navigation</a> </p>
<div id="wdn_wrapper">
    <div id="header"> <a href="http://www.unl.edu/" title="UNL website"><img src="/wdn/templates_3.0/images/logo.png" alt="UNL graphic identifier" id="logo" /></a>
        <h1>University of Nebraska&ndash;Lincoln</h1>
        <?php include $_SERVER['DOCUMENT_ROOT'].'/wdn/templates_3.0/includes/wdnTools.html'; ?>
    </div>
    <div id="wdn_navigation_bar">
        <div id="breadcrumbs">
            <!-- WDN: see glossary item 'breadcrumbs' -->
            <!-- TemplateBeginEditable name="breadcrumbs" -->
            <ul>
                <li><a href="http://www.unl.edu/">UNL</a></li>
                <li>Campus Maps</li>
            </ul>
            <!-- TemplateEndEditable --></div>
        <div id="wdn_navigation_wrapper">
            <div id="navigation"><!-- TemplateBeginEditable name="navlinks" -->
                <?php echo file_get_contents('http://www.unl.edu/ucomm/sharedcode/navigation.html'); ?>
                <!-- TemplateEndEditable --></div>
        </div>
    </div>
    <div id="wdn_content_wrapper">
        <div id="titlegraphic"><!-- TemplateBeginEditable name="titlegraphic" -->
            <h1>Campus Maps</h1>
            <!-- TemplateEndEditable --></div>
        <div id="pagetitle"><!-- TemplateBeginEditable name="pagetitle" --> <!-- TemplateEndEditable --></div>
        <div id="maincontent">
            <!--THIS IS THE MAIN CONTENT AREA; WDN: see glossary item 'main content area' -->
            <!-- TemplateBeginEditable name="maincontentarea" -->
            <?php include 'TourMap-partial.tpl.php'; ?>
            <div class="clear"></div>

            <div id="mapExternalActions" class="zenbox">
                <ul>
                    <li class="download"><a href="<?php echo UNL_TourMap::getURL() ?>images/unl_campusmaps.pdf" id="iconMap">Download Map</a></li>
                    <li class="schedule"><a href="http://admissions.unl.edu/visit/" id="iconVisit">Schedule a Visit</a></li>
                </ul>
            </div>

            <div class="clear"></div>

            <?php if ($context->output->getRawObject() instanceof UNL_TourMap_GoogleMap) : ?>
            <div id="mapLegend"><!-- This is the map Legend overlay -->
                <form id="mapSearch" name="mapSearch" action="">
                    <label for="txt1">Search buildings</label>
                    <input type="text" id="txt1" size="30" value="" name="q" />
                    <input type="button" id="listAll" value="" name="list" />
                </form>
                <ul id="selectMarkers">
                    <li id="check_buildings" <?php if(in_array('buildings', $context->getRawObject()->options['markers'])) { echo "class='on'"; }?>><a href="buildings">Buildings</a></li>
                    <li id="check_policestations" <?php if(in_array('policestations', $context->getRawObject()->options['markers'])) { echo "class='on'"; }?>><a href="policestations">Police Stations</a></li>
                    <li id="check_emergencyphones" <?php if(in_array('emergencyphones', $context->getRawObject()->options['markers'])) { echo "class='on'"; }?>><a href="emergencyphones">Emergency Phones</a></li>
                    <li id="check_sculptures" <?php if(in_array('sculptures', $context->getRawObject()->options['markers'])) { echo "class='on'"; }?>><a href="sculptures">Sculptures</a></li>
                    <li id="check_bikeracks" <?php if(in_array('bikeracks', $context->getRawObject()->options['markers'])) { echo "class='on'"; }?>><a href="bikeracks">Bike Racks</a></li>
                </ul>
                <?php
                    $east_center = new UNL_TourMap_LatLng_EastCampusCenter();
                    $city_center = new UNL_TourMap_LatLng_CityCampusCenter();
                ?>
                <ul id="campusSelectors">
                   <li>
                       <a href="#city" onclick="UNLTourMap.panTo(<?php echo $city_center->lat.','.$city_center->lng; ?>); return false;">City Campus</a>
                   </li>
                   <li>
                       <a href="#east" onclick="UNLTourMap.panTo(<?php echo $east_center->lat.','.$east_center->lng; ?>); return false;">East Campus</a>
                   </li>
                </ul>
            </div>
            <?php if (isset($context->output->markers)) : ?>
            <div id="mapnav" style="margin-top:15px;">
                <div id="pointlist">
                <h3 class="sec_header">All Buildings</h3>
                    <?php echo $savvy->render($context->output->markers, 'UNL/TourMap/MarkerList.tpl.php'); ?>
                </div>
            </div>
            <?php endif; ?>
            <div class="clear"></div>
            <?php endif; ?>

            <div id="content_canvas"></div>

            <!-- TemplateEndEditable -->
            <div class="clear"></div>
            <?php include $_SERVER['DOCUMENT_ROOT'].'/wdn/templates_3.0/includes/noscript.html'; ?>
            <!--THIS IS THE END OF THE MAIN CONTENT AREA.-->
        </div>
        <div id="footer">
            <div id="footer_floater"></div>
            <div class="footer_col">
                <?php include $_SERVER['DOCUMENT_ROOT'].'/wdn/templates_3.0/includes/feedback.html'; ?>
            </div>
            <div class="footer_col"><!-- TemplateBeginEditable name="leftcollinks" -->
                <h3>Related Links</h3>
                <ul>
                    <li><a href="http://www.unl.edu/ucomm/visitor/">Visitors Info</a></li>
                    <li><a href="http://admissions.unl.edu/">Undergraduate Office of Admissions</a></li>
                    <li><a href="http://parking.unl.edu/">Parking &amp; Transit Services</a></li>
                </ul>
                <!-- TemplateEndEditable --></div>
            <div class="footer_col"><!-- TemplateBeginEditable name="contactinfo" -->
            <?php echo file_get_contents('http://www.unl.edu/ucomm/sharedcode/footerContactInfo.html'); ?>
                <!-- TemplateEndEditable --></div>
            <div class="footer_col">
                <?php include $_SERVER['DOCUMENT_ROOT'].'/wdn/templates_3.0/includes/socialmediashare.html'; ?>
            </div>
            <!-- TemplateBeginEditable name="optionalfooter" --> <!-- TemplateEndEditable -->
            <div id="wdn_copyright"><!-- TemplateBeginEditable name="footercontent" -->
            <?php echo file_get_contents('http://www.unl.edu/ucomm/sharedcode/footer.html'); ?>
                <!-- TemplateEndEditable -->
                <?php include $_SERVER['DOCUMENT_ROOT'].'/wdn/templates_3.0/includes/wdn.html'; ?>
                | <a href="http://validator.unl.edu/check/referer">W3C</a> | <a href="http://jigsaw.w3.org/css-validator/check/referer?profile=css3">CSS</a> <a href="http://www.unl.edu/" title="UNL Home" id="wdn_unl_wordmark"><img src="/wdn/templates_3.0/css/footer/images/wordmark.png" alt="UNL's wordmark" /></a> </div>
        </div>
    </div>
    <div id="wdn_wrapper_footer"> </div>
</div>
</body>
</html>
