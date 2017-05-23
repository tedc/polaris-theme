<?php 
	$linee = new WP_Query(array('post_type'=>'linee', 'posts_per_page'=>-1, 'orderby'=>'title', 'order'=>'ASC')); 	
	if(get_sub_field('linee_kind') > 0) :
?>
<section class="linee linee--grow-lg-top" id="linee_slider_<?php echo $row; ?>">
	<div class="linee__slider" data-slick='{"fade":true,"speed":1000, "dots":false,"infinite":true,"prevArrow":"#linee_slider_<?php echo $row; ?> .arrows__prev","nextArrow":"#linee_slider_<?php echo $row; ?> .arrows__next"}'>
	<?php $count=0; while($linee->have_posts()) : $linee->the_post(); ?>
	<div class="linee__item linee--grid">
		<figure class="linee__cell linee__cell--s7 linee__cell--figure" style="background-image:url(<?php the_post_thumbnail_url('large'); ?>)"<?php scrollmagic('"tween":{"backgroundPosition" : "50% 10%"}, "duration" : "200vh", "triggerHook" : "onEnter", "triggerElement" : "#linee_slider_'.$row.'"'); ?>>
			<?php the_post_thumbnail('large', array('class'=>'thumb--hidden')); ?>
		</figure>
		<div class="linee__cell linee__cell--grow-lg-top linee__cell--shrink linee__cell--s5 linee__cell--text">
			<h3 class="linee__title linee__title--huge linee__title--huge-upper"><strong><?php the_title(); ?></strong></h3>
			<div class="linee__content linee__content--grow">
				<?php the_field('description_text'); ?>
			</div>
			<a href="<?php the_permalink(); ?>" class="button">
				<span class="button__label"><?php _e('Scopri di più', 'polaris'); ?></span>
				<i class="icon-arrow-big"></i>
			</a>
		</div>
	</div>
	<?php $count++; endwhile; wp_reset_query(); ?>

	</div>
	
	<nav class="arrows">
		<i class="icon-arrow arrows__prev"></i>
		<i class="icon-arrow arrows__next"></i>
	</nav>
</section>
<?php
	else : 
?>
<?php if($linee->have_posts()) : ?>
<section class="linee linee--grow-lg linee--menu" id="linee_list_<?php echo $row; ?>">
	<style>
	
	<?php 
		while($linee->have_posts()) : $linee->the_post(); ?>
		#linee_<?php the_ID(); ?> {
			background-image: url(<?php the_post_thumbnail_url('medium'); ?>);
		}
		@media screen and (min-width: <?php echo 640/16; ?>em) {
			#linee_<?php the_ID(); ?> {
				background-image: url(<?php the_post_thumbnail_url('large'); ?>);
			}
		}
		@media screen and (min-width: <?php echo 850/16; ?>em) {
			#linee_<?php the_ID(); ?> {
				background-image: url(<?php the_post_thumbnail_url('full'); ?>);
			}
		}
	<?php endwhile; wp_reset_query(); ?>

	</style>
	<?php 
		while($linee->have_posts()) : $linee->the_post(); ?>
	
	<div class="linee__item linee__item--border linee__item--shrink linee__item--grow-lg" id="linee_<?php the_ID(); ?>"<?php scrollmagic('"tween":[{"backgroundPosition":"50% 80%"},{"backgroundPosition":"50% 20%"}],"triggerHook":1,"duration":"200vh","triggerElement":"#linee_'.get_the_ID().'"'); ?>>
		<div class="linee__content linee__content--shrink linee__content--grow-lg">
		<header class="linee__header">
			<h2 class="linee__title linee__title--big-upper"><strong><?php the_title(); ?></strong></h2>
		</header>
		<?php the_field('description_text'); ?>
		</div>
		<a href="<?php the_permalink(  ); ?>" class="linee__permalink"><?php the_title(); ?></a>
	</div>
	<?php endwhile; wp_reset_query(); ?>
</section>
<?php 
	endif;
	endif;
?>

	