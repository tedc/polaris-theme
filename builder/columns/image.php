<?php 
	$image = get_sub_field('immagine');
	if($image) :		
	$p = ( $image['height'] * 100 ) / $image['width'];
	$mv = ($col%2==0) ? '80' : '-80';
?>
<?php if(!get_sub_field('full')) : ?>
<figure class="section__figure">
	<div class="section__figure-container"<?php //scrollmagic('"tween":{"y" : "'. $mv . '"}, "duration" : "200vh", "triggerHook" : "onEnter", "triggerElement" : "#col_'.$col.'_'.$row.'"'); ?>><img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>"></div>

	<div class="section__mask section__mask--<?php echo ($col%2==0) ? 'left' : 'right'; ?>"></div>
</figure>
<?php else : ?>
<figure class="section__figure section__figure--full" style="background-image: url(<?php echo $image['url']; ?>)"<?php //scrollmagic('"tween":{"backgroundPosition" : "50% 10%"}, "duration" : "200vh", "triggerHook" : "onEnter", "triggerElement" : "#col_'.$col.'_'.$row.'"'); ?>>
	<div class="section__figure-container"><img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>"></div>
	<div class="section__mask section__mask--<?php echo ($col%2==0) ? 'left' : 'right'; ?>"></div>
</figure>
<?php endif;  endif; ?>