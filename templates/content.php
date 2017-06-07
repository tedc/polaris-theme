
<?php 
if(!isset($blog)) {
	if(isset($related)) {
		$cell = 'related__cell related__cell--grow-top related__cell--shrink related__cell--s6';
	} else {
		$cell = ($count > 0) ? 'news__cell news__cell--grow-lg news__cell--s6' : 'news__cell';
	}
    
} else {
	$cell = ($blog) ? 'news__cell news__cell--grow-top news__cell--shrink news__cell--s6' : '';
} ?>
<article <?php post_class($cell); ?>>
	<header>
		<?php if(!isset($related)) : ?>
		<figure class="post__thumbnail<?php if($count>0) {
				echo ($count%2==0) ? ' post__thumbnail--shrink-left-half' : ' post__thumbnail--shrink-right-half';
			} ?>">
			<?php 
			$kind = ($count > 0) ? 'news' : 'full';
			the_post_thumbnail($kind); ?>
		</figure>
		<div class="post__header post__header--shrink">
		<?php endif; get_template_part('templates/entry-meta'); ?>
		<h2 class="post__title"><a href="<?php the_permalink(); ?>" class="post__link post__link--normal"><?php the_title(); ?></a></h2>
		</div>
	</header>
	<div class="post__summary post__summary--grow-md<?php echo (!isset($related)) ? ' post__summary--shrink' : ''; ?>">
		<?php the_excerpt(); ?>
	</div>
	<footer class="post__footer post__footer--shrink">
	<a href="<?php the_permalink(  ); ?>" class="button button--more"><strong><?php _e('Scopri di più', 'polaris'); ?></strong></a>
	</footer>
</article>
