<?php $query = new WP_Query(
	array(
		'post_type' => 'servizi',
		'posts_per_page' => -1,
		'orderby' => 'menu_order',
		'order' => 'ASC'
	)
); if($query->have_posts()) : ?>
<?php $count = 0; while($query->have_posts()) : $query->the_post(); ?>

<div class="section section--grid-align-center section--grow-lg">
<div class="section__cell--s6 section__cell--<?php echo ($count%2==0) ? 'even' : 'odd'; ?> section__cell--grow" id="service_<?php echo get_the_ID(); ?>">
	<figure class="section__figure"<?php square('figure'); ?>>
		<div class="section__figure-container"<?php scrollmagic('"tween":[{"y" : -80},{"y" : 80}], "duration" : "200vh", "triggerHook" : "onEnter", "triggerElement" : "#service_'.get_the_ID().'"' ); ?>><?php the_post_thumbnail('large'); ?></div>
	</figure>
</div>
<div class="section__cell--s6 section__cell--<?php echo ($count%2==0) ? 'odd' : 'even'; ?> section__cell--grow section__cell--shrink<?php echo ($count%2==0) ? '-right-double' : '-double'; ?>">
	<?php if(get_field('icon')) { echo '<figure class="svg svg--grow-md-bottom">'. print_svg(get_bloginfo('url') . get_field('icon')) .'</figure>'; } ?>
	<h3 class="section__title section__title--big-upper"><strong><?php the_title(); ?></strong></h3>
	<?php if(get_field('subtitle')) : ?><h4 class="section__title section__title--small"><em><?php the_field('subtitle'); ?></em></h4><?php endif; ?>
	<div class="section__content section__content--grow">
	<?php the_content(); ?>
	</div>
</div>
</div>
<?php $count++; endwhile; wp_reset_query(); ?>
<?php endif; ?>