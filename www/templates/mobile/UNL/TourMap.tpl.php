<!DOCTYPE html>
<html>
	<head>
		<title>UNL | Campus Maps</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
		<link rel="shortcut icon" href="/wdn/templates_3.0/images/favicon.ico" /> 
		<script type="text/javascript" src="/wdn/templates_3.0/scripts/wdn.js"></script>
		<script type="text/javascript" src="/wdn/templates_3.0/scripts/mobile_analytics.js"></script>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
		<script type="text/javascript" src="http://maps.google.com/maps/api/js?v=3.2&amp;sensor=false"></script>
		<script type="text/javascript">
			var UNL_TOUR_URL = "<?php echo UNL_TourMap::getURL(); ?>";
			var mobile = true;
			WDN.jQuery = jQuery;
		</script>
		<script type="text/javascript" src="<?php echo UNL_TourMap::getURL() ?>js/map.js"></script>
		<style type="text/css">
			@import url(<?php echo UNL_TourMap::getURL() ?>css/map_mobile.css);
		</style>
	</head>
<body>
<div id="maincontent">
	<nav>
		<ul>
			<li>
				<select id="buildingList">
					<option value="">Buildings</option>
					<optgroup label="City Campus">
						<?php $city = new UNL_Common_Building_City();
						asort($city->codes);
						foreach ($city->codes as $code=>$building):?>
						<option value="<?php echo $code; ?>"><?php echo $building; ?></option>
						<?php endforeach; ?>
					</optgroup>
					<optgroup label="East Campus">
						<?php $east = new UNL_Common_Building_East();
                        asort($east->codes);
                        foreach ($east->codes as $code=>$building):?>
                        <option value="<?php echo $code; ?>"><?php echo $building; ?></option>
                        <?php endforeach; ?>
					</optgroup>
<!--					<optgroup label="Innovation Campus">-->
<!--						<option value="">Repeat Building List</option>-->
<!--					</optgroup>-->
				</select>
			</li>
			<li id="actionLocation">
				<a href="#" class="action">Geo</a>
			</li>
			<li id="actionLayers">
				<a href="#" class="action">Layers</a>
				<ul id="selectMarkers">
					<li id="check_buildings"><a href="buildings?format=mobile">Buildings</a></li>
					<li id="check_policestations"><a href="policestations?format=mobile">Police Stations</a></li>
					<li id="check_emergencyphones"><a href="emergencyphones?format=mobile">Emergency Phones</a></li>
					<li id="check_sculptures"><a href="sculptures?format=mobile">Sculptures</a></li>
					<li id="check_bikeracks"><a href="bikeracks?format=mobile">Bike Racks</a></li>
				</ul>
			</li>
		</ul>
	</nav>
    <?php echo $savvy->render($context, 'UNL/TourMap-partial.tpl.php'); ?>
	<div id="loading">
		<div class="meter animate">
        	<span style="width: 100%"><span></span></span>
        </div>
	</div>
    <section id="infoBox">
    
    </section>
</div>
<script type="text/javascript" src="<?php echo UNL_TourMap::getURL() ?>js/geoLocation.js"></script>
<script type="text/javascript">
	var iPhoneOrIPod = false;
	if (navigator.userAgent.indexOf('iPod') >= 0 ||navigator.userAgent.indexOf('iPhone') >= 0) {
	    iPhoneOrIPod = true;
	}
	
	function resizeApp() {
	    var height = getWindowHeight();
	    if (iPhoneOrIPod) {
	        var portrait = (typeof window.orientation == "undefined" ||window.orientation == 0 ||window.orientation == 180);
	        height = (portrait ? 416 : 268);
	        document.body.style.minHeight = height + "px";
	        hideUrlBar();
	    }
	    var mapElem = document.getElementById("map_canvas");
	    var map_height = height - calculateOffsetTop(mapElem);
	    mapElem.style.height = Math.max(0, map_height) + "px";
	    //document.getElementById('header_sizedebug').innerHTML = map_height;
	    //document.getElementById('header_width').innerHTML = self.innerWidth;
	}
	
	function calculateOffsetTop(element, opt_top) {
	    var top = opt_top || null;
	    var offset = 0;
	    for (var elem = element; elem && elem != opt_top;elem = elem.offsetParent) {
	        offset += elem.offsetTop;
	    }
	    return offset;
	}
	function getWindowHeight() {
	    if (window.self && self.innerHeight) {
	        return self.innerHeight;
	    }
	    if (document.documentElement && document.documentElement.clientHeight) {
	        return document.documentElement.clientHeight;
	    }
	    return 0;
	}
	function hideUrlBar() {
	    if (iPhoneOrIPod) {
	        window.scrollTo(0, 0);
	    }
	}
	var geo = function() {
		return {

			success_callback : function(loc) {
				UNLTourMap.panTo(loc.coords.latitude, loc.coords.longitude);
				UNLTourMap.map.setZoom(16);
				var marker = new google.maps.Marker({
					position : new google.maps.LatLng(loc.coords.latitude, loc.coords.longitude),
					map      : UNLTourMap.map,
					icon     : UNL_TOUR_URL+'images/markers/google/position.png'
				});
				$('#loading').hide();
			},

			error_callback : function() {
				alert('Unable to determine your location.');
				$('#loading').hide();
			}
		};
	}();
	WDN.jQuery('document').ready(function($){
		resizeApp();
		$('#actionLocation').click(function() {
			if(geo_position_js.init()){
				$('#loading').show();
			   	geo_position_js.getCurrentPosition(geo.success_callback,geo.error_callback);
			}
			else{
			   alert("Functionality not available");
			}
			return false;
		});
		WDN.log(UNLTourMap.markers['buildings']);
		for (var i in UNLTourMap.markers['buildings']) {
			WDN.log(UNLTourMap.markers['buildings'][i].getVisible());
		}
		$('#buildingList').change(function(){
			window.location.hash = $(this).val();
		});
		$('#infoBox a.more').live('click', function(){resizeApp();});
	});
    window.onorientationchange = function() { resizeApp(); };
    window.onresize = function() { resizeApp(); };
</script>
</body>
</html>