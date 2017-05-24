<div class="container container--grow-lg container--grow-lg-shrink container<?php the_sub_field('background_color'); ?>" id="container_<?php echo $row; ?>">
	<div class="container__content container__content--mw"<?php scrollmagic('"tween":{"y":-80},"triggerHook":0.5,"triggerElement":"#container_'.$row.'","offset":"80","duration":"150vh"'); ?>>
	<?php the_sub_field('testo'); ?>
	</div>
</div>