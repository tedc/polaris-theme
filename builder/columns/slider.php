<?php 
$images = get_sub_field('slider');
$full = false;
$row = $row .'_'.$col;
echo '<div id="slider_'.$row.'">';
include(locate_template( 'builder/commons/gallery.php', false, true )); 
echo '</div>';
?>