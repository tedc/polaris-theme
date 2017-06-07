<?php
	$args = array(
		'posts_per_page' => 2,
		'post__in' => get_sub_field('news')
	);
	$q = new WP_Query($args);
	$blog = true;
	if($q->have_posts()) : ?>
<div class="news news--shrink news--grow-lg news--grid">
<header class="news__cell news__cell--shrink news__cell--s12">
	<h2 class="news__title news__title--big-upper"><a href="<?php echo get_permalink( get_option( 'page_for_posts' )); ?>"><?php _e('Life', 'polaris'); ?></a></h2>
</header>
<?php 
	while($q->have_posts()) : $q->the_post();
		include(locate_template( 'templates/content.php', false, false ) );
	endwhile; wp_reset_query(); ?>
</div>
<?php endif; 
	$blog = false;
?>
