<style>
<?php 
	while(have_rows('anni')) : the_row('anni'); ?>
		#story_<?php the_sub_field('anno'); ?> .story__cell--figure {
		background-image: url(<?php echo get_sub_field('foto')['sizes']['medium']; ?>);
	}
	@media screen and (min-width: <?php echo 640/16; ?>em) {
		#story_<?php the_sub_field('anno'); ?> .story__cell--figure {
			background-image: url(<?php echo get_sub_field('foto')['sizes']['large']; ?>);
		}
	}
	@media screen and (min-width: <?php echo 850/16; ?>em) {
		#story_<?php the_sub_field('anno'); ?> .story__cell--figure {
			background-image: url(<?php echo get_sub_field('foto')['url']; ?>);
		}
	}
<?php endwhile; ?>
</style>
<section class="story story--grow-lg story<?php the_sub_field('background_color'); ?>">
	<div class="story__for">	
		<?php while(have_rows('anni')) : the_row('anni'); ?>
			<div class="story__item story__item--grid" id="story_<?php the_sub_field('anno'); ?>" data-title="<?php the_sub_field('anno'); ?>">
				<figure class="story__cell story__cell--s7 story__cell--figure">
					<img src="<?php echo get_sub_field('foto')['sizes']['large']; ?>" alt="<?php echo get_sub_field('foto')['alt']; ?>">
				</figure>
				<div class="story__cell story__cell--grow-lg story__cell--shrink story__cell--s5 story__cell--text">
					<div class="story__header story__header--shrink-right-only">
						<h3 class="story__title story__title--huge story__title--huge-upper">
							<!-- <strong><?php the_sub_field('anno'); ?></strong> -->
						<?php foreach (str_split(get_sub_field('anno')) as $strong) {
							echo '<strong>'.$strong.'</strong>';
						} ?>
						</h3>
					</div>
					<div class="story__content story__content--shrink story__content--grow-md-top">
						<?php the_sub_field('testo'); ?>
					</div>
				</div>
			</div>
		<?php endwhile; ?>
	</div>
	<nav class="arrows">
		<i class="icon-arrow arrows__prev"></i>
		<i class="icon-arrow arrows__next"></i>
	</nav>
	<nav class="story__nav"></nav>
</section>