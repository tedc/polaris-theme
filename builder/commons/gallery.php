<div class="slider" data-slick='{"fade":true,"speed":1000, "dots":false,"infinite":true,"prevArrow":"#slider_<?php echo $row; ?> .arrows__prev","nextArrow":"#slider_<?php echo $row; ?> .arrows__next"}'>
	<?php foreach ($images as $image) : ?>
	<div class="slider__item" style="background-image:url(<?php echo $image['url']; ?>)"<?php //scrollmagic('"tween":{"backgroundPosition" : "50% 30%"}, "duration" : "200vh", "triggerHook" : "onEnter", "triggerElement" : "#slider_'.$row.'"'); ?>>
		<?php echo wp_get_attachment_image( $image['ID'], 'large',false, array('class'=>'thumb--hidden')); ?>
	</div>
	<?php endforeach; ?>
</div>
<nav class="arrows">
	<i class="icon-arrow arrows__prev"></i>
	<i class="icon-arrow arrows__next"></i>
</nav>