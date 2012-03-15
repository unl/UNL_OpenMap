<?php
require_once 'UNL/Common/Artists_sculptures.php';
if (isset($_GET['id']) && $context->get($_GET['id'])) {
    echo '<h2>'.$context->title.'</h2>';
    $artists_sculptures = new UNL_Common_Artists_Sculptures();
    $artists_sculptures->sculpture_id = $sculptures->id;
    if ($artists_sculptures->find()) {
        while ($artists_sculptures->fetch()) {
            $artist = $artists_sculptures->getLink('artist_id');
            echo "<div><em>{$artist->first_name} {$artist->last_name}</em></div>";
        }
    }
    echo '<p>'.$context->info.'</p>';
    echo '<a href="http://www1.unl.edu/tour/?tour=sculptures&amp;sculpture='.$_GET['id'].'&amp;lat='.$context->lat.'&amp;lon='.$context->lon.'" class="permalink">Link</a>';
} else {
    header('HTTP/1.0 404 Not Found');
}
