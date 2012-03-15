<?php
if (isset($context->options['nugget'])
    && !($context->output->getRawObject() instanceof Exception)) {
    switch ($context->options['nugget']) {
        case 'info':
            echo $savvy->render($context->output->info,'UNL/TourMap/Marker/Info.tpl.php');
            break;
        case 'image':
            if (is_object($context->output->info->images)
                && $context->output->info->images->getRawObject() instanceof Exception) {
                echo $savvy->render($context->output->info->images);
                break;
            }
            $number = 0;
            if (isset($context->options['parameters'][0])) {
                $number = $context->options['parameters'][0];
            }

            foreach ($context->output->info->images as $image) {
                if ($image instanceof UNL_TourMap_Marker_Image_Missing) {
                    echo $savvy->render($context->output->info,'UNL/TourMap/Marker/Image/Missing.tpl.php');
                    break;
                }

                if (intval($image->number) == $number) {
                    echo $savvy->render($image, 'UNL/TourMap/Marker/Image.tpl.php');
                    break;
                }
            }

            echo $savvy->render($context->output->info,'UNL/TourMap/Marker/Image/Missing.tpl.php');
            break;
        case 'video':
            if (is_object($context->output->info->videos)
                && $context->output->info->videos->getRawObject() instanceof Exception) {
                echo $savvy->render($context->output->info->videos);
                break;
            }
            $number = 0;
            if (isset($context->options['parameters'][0])) {
                $number = $context->options['parameters'][0] - 1;
            }
            if (!isset($context->output->info->videos[$number]) ||
                $context->output->info->videos[$number] instanceof UNL_TourMap_Marker_Image_Missing) {
                echo $savvy->render($context->output->info,'UNL/TourMap/Marker/Info/Missing.tpl.php');
            } else {
                echo $savvy->render($context->output->info->videos[$number],'UNL/TourMap/Marker/Video.tpl.php');
            }
            break;
        default:
            break;
    }
} elseif ($context instanceof Savvy_ObjectProxy
          && $context->output->getRawObject() instanceof UNL_TourMap_GoogleMap) {
    echo $savvy->render($context->output, 'UNL/TourMap/GoogleMap.tpl.php');
} else {
    echo $savvy->render($context->output);
}