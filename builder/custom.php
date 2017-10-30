<?php $lang = (ICL_LAGUAGE_CODE != 'it') ? '_'.ICL_LAGUAGE_CODE : ''; ?>
<?php acf_set_language_to_default(); if(have_rows('items'.$lang, 'options')) : 
$responsive = ', "responsive":[{"breakpoint" : 850,"settings" :{"slidesToShow": 2}},{"breakpoint" : 480,"settings" :{"slidesToShow": 2}}]';
?>
<div class="custom custom--grow-lg custom--shrink">
	<h3 class="custom__title custom__title--medium-upper"><?php _e('Personalizzazioni', 'polaris'); ?></h3>
	<nav class="custom__nav custom__nav--grow-lg-top">
	<!-- <?php while(have_rows('items')) : the_row(); ?>
		<h4 class="custom__title custom__title--upper"><span><?php the_sub_field('item_title'); ?></span></h4>
	<?php endwhile; ?> -->
	</nav>
	<div class="custom__for custom__for--grid">
	<?php $item = 0; while(have_rows('items_en', 'options')) : the_row('items', 'options'); 


		$count = (count(get_sub_field('item_images')) > 2) ? 3 : 2;
		$center = (count(get_sub_field('item_images')) > 3) ? '"centerMode" : true,' : '';
	?>
		<div class="custom__cell" data-title="<?php the_sub_field('item_title'); ?>" id="<?php echo sanitize_title(get_sub_field('item_title')); ?>_<?php echo $item; ?>">
		<div class="custom__content custom__content--shrink custom__content--grow-md">
			<?php the_sub_field('item_text'); ?>
		</div>
	<div class="custom__bottom">
	<div class="custom__carousel<?php echo (count(get_sub_field('item_images')) > 3) ? ' custom__carousel--centered' : ''; ?>" data-slick='{"slidesToShow": <?php echo $count; ?>, "slidesToScroll": 1,<?php echo $center; ?>"infinite":true, "speed" : 300, "cssEase" : "linear","prevArrow":"#<?php echo sanitize_title(get_sub_field('item_title')); ?>_<?php echo $item; ?> .custom__arrow--prev","nextArrow":"#<?php echo sanitize_title(get_sub_field('item_title')); ?>_<?php echo $item; ?>  .custom__arrow--next", "responsive":[{"breakpoint" : 640,"settings" :{"slidesToShow": 1}}]}'>
	<?php foreach(get_sub_field('item_images') as $img) : ?>
		<figure class="custom__figure custom__figure--shrink custom__figure--grow">
			<div class="custom__figure-wrapper">
			<?php echo wp_get_attachment_image($img['ID'], 'large'); ?>
			</div>
			<!-- <figcaption>
				<?php echo $img['alt']; ?>
			</figcaption> -->
		</figure>
	<?php endforeach; ?>
	</div>
	<i class="icon-arrow custom__arrow custom__arrow--prev"></i>
	<i class="icon-arrow custom__arrow custom__arrow--next"></i>
	</div>
	</div>
	<?php $item++; endwhile; ?>
	</div>
	</div>
</div>
<?php endif; 
acf_unset_language_to_default(); ?>
<?php /* else : if(have_rows('items', 'options')) : 
$responsive = ', "responsive":[{"breakpoint" : 850,"settings" :{"slidesToShow": 2}},{"breakpoint" : 480,"settings" :{"slidesToShow": 2}}]';
?>
<div class="custom custom--grow-lg custom--shrink">
	<h3 class="custom__title custom__title--medium-upper"><?php _e('Personalizzazioni', 'polaris'); ?></h3>
	<nav class="custom__nav custom__nav--grow-lg-top">
	<!-- <?php while(have_rows('items')) : the_row(); ?>
		<h4 class="custom__title custom__title--upper"><span><?php the_sub_field('item_title'); ?></span></h4>
	<?php endwhile; ?> -->
	</nav>
	<div class="custom__for custom__for--grid">
	<?php $item = 0; while(have_rows('items', 'options')) : the_row('items', 'options'); 


		$count = (count(get_sub_field('item_images')) > 2) ? 3 : 2;
		$center = (count(get_sub_field('item_images')) > 3) ? '"centerMode" : true,' : '';
	?>
		<div class="custom__cell" data-title="<?php the_sub_field('item_title'); ?>" id="<?php echo sanitize_title(get_sub_field('item_title')); ?>_<?php echo $item; ?>">
		<div class="custom__content custom__content--shrink custom__content--grow-md">
			<?php the_sub_field('item_text'); ?>
		</div>
	<div class="custom__bottom">
	<div class="custom__carousel<?php echo (count(get_sub_field('item_images')) > 3) ? ' custom__carousel--centered' : ''; ?>" data-slick='{"slidesToShow": <?php echo $count; ?>, "slidesToScroll": 1,<?php echo $center; ?>"infinite":true, "speed" : 300, "cssEase" : "linear","prevArrow":"#<?php echo sanitize_title(get_sub_field('item_title')); ?>_<?php echo $item; ?> .custom__arrow--prev","nextArrow":"#<?php echo sanitize_title(get_sub_field('item_title')); ?>_<?php echo $item; ?>  .custom__arrow--next", "responsive":[{"breakpoint" : 640,"settings" :{"slidesToShow": 1}}]}'>
	<?php foreach(get_sub_field('item_images') as $img) : ?>
		<figure class="custom__figure custom__figure--shrink custom__figure--grow">
			<div class="custom__figure-wrapper">
			<?php echo wp_get_attachment_image($img['ID'], 'large'); ?>
			</div>
			<figcaption>
				<?php echo $img['alt']; ?>
			</figcaption>
		</figure>
	<?php endforeach; ?>
	</div>
	<i class="icon-arrow custom__arrow custom__arrow--prev"></i>
	<i class="icon-arrow custom__arrow custom__arrow--next"></i>
	</div>
	</div>
	<?php $item++; endwhile; ?>
	</div>
	</div>
</div>
<?php endif; endif; */?>