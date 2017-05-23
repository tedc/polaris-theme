<div class="slider" data-slick='{"fade":true,"dots":true,"arrows":false,"infinite":true,"autoplay":true,"autoplaySpeed":5000}'>
	<?php $images = get_field('slider');
		foreach ($images as $image):
			$full = is_mobile() ? $image['sizes']['large'] : $image['url'];
			$large = wp_get_attachment_image( $image['ID'], 'large', false, array('class' => 'thumb--hidden'));
		?>
	<div class="slider__item" style="background-image: url(<?php echo $full; ?>);"<?php scrollmagic('"tween":{"backgroundPosition": "50% 0%"},"triggerHook":0,"offeset":-80,"triggerElement":"#header","duration":"100vh"'); ?>>
		<?php echo $large; ?>
	</div>
	<?php endforeach; ?>
</div>