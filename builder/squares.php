<?php 
	$blocks = array('prima_riga' => 'line-first', 'seconda_riga' => 'line-second', 'terza_riga' => 'line-third'); 
	$sm = '"tween":[{"y" : 120},{"y" : -120}],"triggerElement":"#block_'. $row.'","triggerHook":1,"duration":"200vh"';?>
<section class="blocks blocks--shrink blocks--grow-lg blocks--<?php echo get_sub_field('version'); ?>" id="block_<?php echo $row; ?>" ng-blocks ng-swipe-left="move(true)" ng-swipe-right="move(false)")>
	<?php if(get_sub_field('squares_title') && get_sub_field('version') == 'home') :
		
	 ?>
	<h2 class="blocks__title blocks__title--big-upper"<?php scrollmagic($sm); ?>>
		<?php the_sub_field('squares_title'); ?>
	</h2>
	<?php endif; ?>
	<div class="blocks__container"<?php square('blocks'); ?><?php scrollmagic($sm); ?>>
	<?php 
		$b = 0; foreach ($blocks as $block => $line) :
		if(get_sub_field($block.'_immagine') || get_sub_field($block.'_titolo') || get_sub_field($block.'_testo')) : 
	?>
	<div class="blocks__row blocks__row--<?php echo $line; ?>">
		<figure class="blocks__cell blocks__cell--s3 blocks__cell--figure">
			<div class="blocks__image">
			<?php echo wp_get_attachment_image(get_sub_field($block.'_immagine')['ID'], array(1000, 1000)); ?>
			</div>
		</figure>
		<div class="blocks__cell blocks__cell--s3 blocks__cell--content blocks__cell--grow-md"<?php scrollmagic('"tween":[{"opacity" : 0},{"opacity" : 1}],"triggerHook":0.7,"offeset":80');?>>
			<?php if(get_sub_field($block.'_titolo')): ?><h3 class="blocks__title"><strong><?php the_sub_field($block.'_titolo'); ?></strong></h3><?php endif; ?>
			<?php the_sub_field($block.'_testo'); ?>
		</div>
		<?php if(get_sub_field($block.'_immagine_2')) : 

		?>
		<figure class="blocks__cell blocks__cell--s3 blocks__cell--figure blocks__cell--figure-alt">
			<div class="blocks__image">
				<?php echo wp_get_attachment_image(get_sub_field($block.'_immagine')['ID'], array(1000, 1000)); ?>
			</div>
		</figure>
		<?php endif; ?>
	</div> 
	<?php $b++; endif;  endforeach; ?>
	</div>
	<?php if($b>0) : ?>
	<nav class="blocks__nav blocks__nav--grow">
		<?php for($i=0; $i< $b; $i++) : ?>
		<span ng-click="slideTo(<?php echo $i; ?>)" class="blocks__page" ng-class="{'blocks__page--active': current == <?php echo $i; ?>}"></span>
		<?php endfor; ?>
	</nav>
	<?php 
		endif;
		if(get_sub_field('squares_button')  && get_sub_field('version') == 'home') : 
	?>
	<nav class="blocks__button blocks__button--grid">
		<div class="blocks__cell blocks__cell--s3">
			<a href="<?php echo get_permalink(get_sub_field('squares_button')); ?>" class="button">
				<span class="button__label"><?php echo get_the_title(get_sub_field('squares_button')); ?></span>
			</a>
		</div>
	</nav>
	<?php endif; ?>
</section>