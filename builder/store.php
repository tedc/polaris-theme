<?php
	if(get_sub_field('store_kind') == 'fascia') :
	acf_set_language_to_default(); 
		$the_id = get_field('store_page', 'options'); 
	acf_unset_language_to_default();
	$q = new WP_Query(array(
			'post__in' => array($the_id),
			'post_type' => 'any')
	);
	$sm = '"tween":[{"y":40},{"y":-40}],"triggerHook":1.1,"triggerElement":"#store_row_'.$row.'","duration":"200vh"';
	while($q->have_posts()) : $q->the_post();
?>
<style type="text/css">
	#store_row_<?php echo $row; ?> {
		background-image: url(<?php the_post_thumbnail_url('medium'); ?>);
	}
	@media screen and (min-width: <?php echo 480/16; ?>em) {
		#store_row_<?php echo $row; ?> {
			background-image: url(<?php the_post_thumbnail_url('large'); ?>);
		}
	}
	@media screen and (min-width: <?php echo 850/16; ?>em) {
		#store_row_<?php echo $row; ?> {
			background-image: url(<?php the_post_thumbnail_url('full'); ?>);
		}
	}
</style>
<div class="store-row store-row--shrink store-row--grow-lg store-row--grid-center" id="store_row_<?php echo $row; ?>">
	<div class="store-row__cell store-row__cell--grow-md store-row__cell--s6-shrink"<?php scrollmagic($sm); ?>>
	<h3 class="store-row__title store-row__title--big-upper">
		<strong><?php _e('Store', 'polaris'); ?></strong>
	</h3>
	<div class="store-row__content store-row__content--grow-top">
		<p><?php _e('Trova il rivenditore Polaris più vicino a te.', 'polaris'); ?></p>
	</div>
	</div>
	<?php if (is_active_sidebar('map-search-widget')) : dynamic_sidebar('map-search-widget'); endif; ?>
	<form class="store-row__cell store-row__cell--s6-shrink store-row--form store-row--grid" action="<?php the_permalink(  ); ?>">

		<input type="text" name="wpsl-search-input" placeholder="<?php _e('La tua città', 'polaris'); ?>">
		<button class="button button--form"><i class="icon-arrow"></i></button>
	</form>
</div>
<?php endwhile; wp_reset_query();
	else :
 ?>
<?php echo do_shortcode( '[wpsl]' );
endif; ?>