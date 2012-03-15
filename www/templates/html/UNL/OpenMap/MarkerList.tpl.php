<?php
$list_items = array();
foreach ($context as $marker) {
    $list_items[] = $savvy->render($marker);
}

$limit = ceil(count($list_items)/4);
$item = 0;
$col_number = 0;

while($item < count($list_items)) {

    $col_limit = 0;
?>
    <div class="col<?php echo $col_number==0 ? ' left' : ''?><?php echo $col_number==3 ? ' right' : ''?>">
        <ul>
            <?php
            while ($col_limit < $limit
                   && $item < count($list_items)) {
                echo $list_items[$item].PHP_EOL;
                $col_limit++;
                $item++;
            }
            ?>
        </ul>
    </div>
<?php
    $col_number++;
}
?>
