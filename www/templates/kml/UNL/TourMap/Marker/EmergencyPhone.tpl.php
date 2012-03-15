<Placemark>
    <name><?php echo $context->title; ?></name>
    <styleUrl>#emergencyphonePlacemark</styleUrl>
    <description>
        <![CDATA[
        <strong>Dial 2 for Blue...</strong>
        ]]>
    </description>
    <Point>
        <coordinates><?php echo $context->position->lng; ?>,<?php echo $context->position->lat; ?>,0</coordinates>
    </Point>
</Placemark>