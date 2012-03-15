<?php if (!empty($context->url)) { ?>
<video height="529" width="940" autoplay src="<?php echo $context->url; ?>" controls poster="http://itunes.unl.edu/thumbnails.php?url=<?php echo $context->url; ?>">
  <object type="application/x-shockwave-flash" style="width:940px;height:529px" data="/wdn/templates_3.0/includes/swf/player4.3.swf">
  <param name="movie" value="/wdn/templates_3.0/includes/swf/player4.3.swf" />
  <param name="allowfullscreen" value="true" />
  <param name="allowscriptaccess" value="always" />
  <param name="wmode" value="transparent" />
  <param name="flashvars" value="file=<?php echo urlencode($context->url); ?>&amp;image=http%3A%2F%2Fitunes.unl.edu%2Fthumbnails.php%3Furl%3D<?php echo urlencode($context->url); ?>&amp;volume=100&amp;controlbar=over&amp;autostart=true&amp;skin=/wdn/templates_3.0/includes/swf/UNLVideoSkin.swf" />
  </object>
</video>
<script type="text/javascript">
if (typeof(WDN) == "undefined") {
  if (typeof(jQuery) == "undefined"){var j=document.createElement("script"); j.setAttribute("type","text/javascript"); j.setAttribute("src", "http://www.unl.edu/wdn/templates_3.0/scripts/jquery.js"); document.getElementsByTagName("head")[0].appendChild(j);}
  var s=document.createElement("script"); s.setAttribute("type","text/javascript"); s.setAttribute("src", "http://www.unl.edu/wdn/templates_3.0/scripts/wdn.js"); var c=document.createElement("link"); c.setAttribute("type", "text/css"); c.setAttribute("rel", "stylesheet"); c.setAttribute("href", "http://www.unl.edu/wdn/templates_3.0/css/content/videoPlayer.css"); document.getElementsByTagName("head")[0].appendChild(c); document.getElementsByTagName("head")[0].appendChild(s);
  window.onload=function(){WDN.jQuery=jQuery.noConflict(true); WDN.template_path="http://www.unl.edu/"; WDN.initializePlugin("videoPlayer"); WDN.initializePlugin("analytics");};
} else {WDN.initializePlugin("videoPlayer");}
</script>
<?php } else {
    echo $savvy->render($context, 'UNL/TourMap/Marker/Info/Missing.tpl.php');
}