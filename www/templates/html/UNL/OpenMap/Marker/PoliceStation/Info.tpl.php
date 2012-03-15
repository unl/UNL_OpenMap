<?php
if (gettype($context->getRaw('description')) == 'string') {
    echo $context->getRaw('description');
} else {
    echo $context->description;
}
?>