<?php 
$images = get_sub_field('slider');
$full = false;
$row = $row .'_'.$col;
echo '<div id="slider_'.$row.'" class="section__slider section__slider--shrink section__slider--'.get_sub_field('background_size').'">';
include(locate_template( 'builder/commons/gallery.php', false, true )); 
$mask = ($col%2==0) ? 'left' : 'right';
echo '</div>';
echo '<div class="section__mask section__mask--'.$mask.'"></div>';
?>