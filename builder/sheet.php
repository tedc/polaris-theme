<?php $sm = '"tween":[{"opacity":0,"y":20},{"opacity":1,"y":0}],"triggerHook":0.85,"duration":0'; ?>
<section class="sheet sheet--grow-lg sheet--shrink">
	<h2 class="sheet__title sheet__title--huge-upper"><?php the_title(); ?></h2>
	<?php if(get_sub_field('designers')) : ?>
		<em>Design by <?php if(get_sub_field('designers_url')) : ?><a href="<?php the_sub_field('designers_url'); ?>" target="_blank"><?php the_sub_field('designers'); ?></a><?php else : ?><?php the_sub_field('designers'); ?><?php endif; ?></em>
	<?php endif; ?>
	<?php if(have_rows('circles')) : ?>
	<div class="sheet__figures sheet__figures--grid sheet__figures--mw">
		<?php $c = 0; while(have_rows('circles')) : the_row('circles'); ?>
		<figure class="sheet__cell sheet__cell--grow-md sheet__cell--image sheet__cell--s6 sheet__cell<?php echo ($c%2==0) ? '--odd' : '--even'; ?><?php echo (!get_sub_field('cerchiato')) ? ' sheet__cell--nocircle' : ''; ?>" id="sheet_figure_<?php echo $c; ?>">
			<img src="<?php echo get_sub_field('circle_image')['sizes']['large']; ?>" alt="<?php the_sub_field('circle_text'); ?>">
			<figcaption class="sheet__element sheet__element--upper"<?php 
			$y = ($c%2==0) ? 100 : -100;
			scrollmagic('"tween":[{"y":"'.$y.'%"},{"y":"'.($y*-1).'%"}],"class":"sheet__element--active","triggerHook":1,"triggerElement":"#sheet_figure_'.$c.'","duration":"200vh"'); ?>>
				<span><?php the_sub_field('circle_text'); ?></span>
			</figcaption>
		</figure>
		<?php $c++; endwhile; ?>
	</div>
	<?php endif; ?>
	<?php  $tot = count(get_sub_field('details')) - 1; if(have_rows('details')) : ?>
	<div class="sheet__details sheet__details--mw sheet__details--grow-lg">
		<?php $d= 0;while(have_rows('details')) : the_row('details'); ?>
		<div class="sheet__detail<?php echo ($d<$tot) ? ' sheet__detail--grow-md-bottom' : ''; ?>">
			<h3 class="sheet__title sheet__title--medium-upper"<?php scrollmagic($sm); ?>><?php the_sub_field('details_title'); ?></h3>
			<div class="sheet__content sheet__content--shrink sheet__content--grow-top">
				<?php 
					$p = get_sub_field('details_text');
					$p = str_replace('<p>', '<p data-scrollmagic=\'{'.$sm.'}\'>', $p);
					echo $p;
				?>
				<?php if(have_rows('details_materals')) : ?>
				<div class="sheet__materials sheet__materials--grid">
				<?php $m = 1;while(have_rows('details_materals')) : the_row('details_materals'); ?>
				<figure class="sheet__cell sheet__cell--image sheet__cell--grow-md-top"<?php 
				$hook = 1 - (($m/10)/2);
				scrollmagic('"tween":[{"opacity":0},{"opacity":1,"delay":0.25}],"triggerHook":'.$hook.',"duration":0'); ?>>
					<img src="<?php echo get_sub_field('materiale')['sizes']['medium']; ?>" alt="<?php the_sub_field('descrizione'); ?>">
					<figcaption>
					<?php the_sub_field('descrizione'); ?>
					</figcaption>
				</figure>
				<?php $m++; endwhile; ?>
				</div>
				<?php endif; ?>
			</div>
		</div>
		<?php endwhile; ?>
	</div>
	<?php endif; ?>
</section>