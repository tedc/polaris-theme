<div class="full-slider" id="slider_<?php echo $row; ?>">
	<div class="full-slider__container">
	<?php 
	$images = get_sub_field('full_slider');
include(locate_template( 'builder/commons/gallery.php', false, true )); ?>
</div>
</div>