<?php 
	$mv = ($col%2==0) ? -100 : 100;
	$sm = '"tween":[{"x":'.$mv.',"opacity":0},{"x":0,"opacity":1}],"duration":0,"triggerHook":0.25';
?>
<div class="section__content<?php echo (get_sub_field('move_text')) ? ' section__content--move' : ''; ?><?php if(!$anim) : ?> section__content--anim<?php endif; ?> section__content--grow-lg section__content--shrink"<?php $mv = ($col%2==0) ? '"80"' : '"-80"'; ?>>
	<div <?php if(!$anim) {scrollmagic('"tween":{"y":'. $mv . '},"triggerElement":"#col_'.$col.'_'.$row.'", "triggerHook":0.28,"duration":"150vh"');} ?>>
	<?php if(get_sub_field('title_text')) { ?>
		<h4 class="section__title <?php the_sub_field('title_size'); echo (get_sub_field('red_square')) ? ' section__title--square' : ''; echo (get_sub_field('uppercase')) ? ' section__title--upper' : ''; ?>"<?php 
		$classTo = (get_sub_field('red_square')) ? '"class":"section__title--active"' : ''; 
			if(get_sub_field('red_square')):scrollmagic('"duration":0,"triggerHook":1,'.$classTo);endif; ?>>
			<strong><?php the_sub_field('title_text') ?></strong>
		</h4>
	<?php }?>
	<div class="section__text">
	<?php the_sub_field('text'); ?>
	</div>
	<?php if(get_sub_field('citazione')) : ?>
	<div class="section__quote section__quote--grow-md-top">
		<?php the_sub_field('citazione'); ?>
	</div>
	<?php endif; ?>
	</div>
</div>