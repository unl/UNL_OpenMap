<h3>Search Results for '<?php echo $context->options['q']; ?>'</h3>
<ul>
<?php

foreach ($context as $marker) {
    echo $savvy->render($marker);
}
?>
</ul>