var marker = new google.maps.Marker({
      position: new google.maps.LatLng(<?php echo (float)$context->position->lat; ?>,<?php echo (float)$context->position->lng; ?>),
      map: map,
      title: "<?php echo $context->title; ?>"
  });
  
google.maps.event.addListener(marker, "click", function() {
    if (infowindow) infowindow.close();
    infowindow = new google.maps.InfoWindow({content: "<?php echo $context->title; ?>"});
    infowindow.open(map, marker);
});