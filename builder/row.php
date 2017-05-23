<style>
#row_<?php echo $row; ?> {
	background-image: url(<?php echo get_sub_field('row_image')['sizes']['large']; ?>);
}
@media screen and (min-width: <?php echo (850/16); ?>em) {
	#row_<?php echo $row; ?> {
		background-image: url(<?php echo get_sub_field('row_image')['url']; ?>);
	}
}
</style>
<div id="trigger_<?php echo $row; ?>"></div>
<div class="row row--grow-lg row--grow--shrink" id="row_<?php echo $row; ?>"<?php scrollmagic('"tween":[{"backgroundPosition": "50% 50%"},{"backgroundPosition": "50% 35%"}],"duration":"200vh","triggerHook":1,"triggerElement":"#trigger_'.$row.'"'); ?>>
	<div class="row__content row__content--shrink row__content--grow-md"<?php scrollmagic('"class":"row__content--active","triggerHook":0.68,"duration":0'); ?>>
	<?php if(get_sub_field('row_title')) : ?>
	<h3 class="row__title row__title--big-upper">
		<strong><?php the_sub_field('row_title'); ?></strong>
	</h3>
	<?php endif; ?>
	<?php the_sub_field('row_text'); ?>
	<?php if(get_sub_field('row_link')) : ?>
	<a class="row__permalink" href="<?php the_sub_field('row_link'); ?>">
		<?php the_sub_field('row_link_text'); ?></span>
	</a>
	<?php endif; ?>
	</div>
</div>