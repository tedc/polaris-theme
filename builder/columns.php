<div class="section section--grid section--grow-md section<?php the_sub_field('background_color'); ?>"<?php scrollmagic('"class":"section--active","triggerHook":0.75,"duration":0,"reverse":false'); ?>>
<?php $anim = get_sub_field('is_not_animated'); if(get_sub_field('title_columns')) : ?>
<header class="section__cell section__cell--shrink section__cell-grow<?php echo (get_sub_field('title_columns_border_bottom')) ? ' section__cell--border-bottom' : ''; ?>"<?php if(get_sub_field('title_columns_border_bottom')): scrollmagic('"class":"section__cell--border-bottom-active"'); endif; ?>>
	<?php if(get_sub_field('title_columns')) { ?>
		<h3 class="section__title <?php the_sub_field('title_columns_size'); echo (get_sub_field('title_columns_brown')) ? ' section__title--emphasis' : ''; echo (get_sub_field('title_columns_uppercase')) ? ' section__title--upper' : ''; ?>">
			<?php echo (get_sub_field('title_columns_weight')) ? '<strong>' . get_sub_field('title_columns') . '</strong>' : get_sub_field('title_columns'); ?>
		</h3>
	<?php }?>
</header>
<?php 
endif;
$col = 0;
while(have_rows('column')) : the_row('column'); ?>
	<div class="section__cell section__cell--<?php echo get_row_layout(); ?> section__cell--<?php echo ($col%2==0) ? 'even' : 'odd'; ?> section__cell--s<?php the_sub_field('size'); ?><?php if(get_sub_field('align')): echo ' section__cell--s'. get_sub_field('size').'-align-'.get_sub_field('align'); endif;?>" id="col_<?php echo $col; ?>_<?php echo $row; ?>">
	
	<?php 
		include( locate_template( 'builder/columns/'.get_row_layout().'.php', false, true ) );
	?>
	</div>
<?php 
$col++; endwhile; ?>
</div>