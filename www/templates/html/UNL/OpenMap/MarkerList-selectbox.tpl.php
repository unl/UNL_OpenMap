<form id="marker_list">
<select name="marker_select">
<?php foreach ($context as $marker) : ?>
    <?php echo $savvy->render($marker); ?>
<?php endforeach; ?>
</select>
<input type="submit" value="Go" />
</form>
