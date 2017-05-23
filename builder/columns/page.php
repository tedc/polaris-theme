<?php 
	$page = get_sub_field('page');
 $mv = ($col%2==0) ? '"80"' : '"-80"'; ?>
<div class="section__content section__content--grow-lg section__content--shrink section__content--shrink<?php echo ($col%2==0) ? '-right-double' : '-left-double'; ?>"<?php scrollmagic('"tween":{"y":'. $mv . '},"triggerElement":"#col_'.$col.'_'.$row.'", "triggerHook":1,"duration":"150vh"'); ?>>
	<h4 class="section__title--huge-upper"><strong><?php echo get_the_title($page->ID); ?></strong></h4>
	<?php echo '<p>'.$page->post_excerpt.'</p>'; ?>
	<div class="section__button section__button--grow-md-top">
		<a href="<?php echo get_permalink($page->ID); ?>" class="button">
			<span class="button__label"><?php _e('Scopri di più', 'polaris'); ?></span>
			<i class="icon-arrow-big"></i>
		</a>
	</div>
</div>