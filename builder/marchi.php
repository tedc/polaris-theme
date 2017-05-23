<?php 
	$brands = get_posts(array('post_type'=>'marchi', 'posts_per_page' =>-1));
	$array = '';
	$max = count($brands);
	$count = 0; 
	foreach ($brands as $brand) {
		$img_id = get_post_thumbnail_id($brand->ID);
		$src = wp_get_attachment_image_src( $img_id, 'full' );
		$comma = ($count>0) ? ',' : '';
		$array .= $comma . '{url :\''.$src[0].'\', title : \''.get_the_title($brand->ID).'\'}';
		$count++;
	}
?>
<section class="brands brands--grid brands--grid-shrink" style="background-image: url(<?php the_field('brands_bg', 'options'); ?>)"<?php scrollmagic('"tween":[{"backgroundPosition":"50% 20%"},{"backgroundPosition":"50% 80%"}],"duration":"200vh", "triggerElement":"#brands_header","triggerHook":1'); ?>>
	<header class="brands__cell brands__cell--grow-lg brands__cell--s3 brands--grow-lg brands__cell--header" id="brands_header">
		<h4 class="brands__title brands__title--small"><strong><?php _e('I nostri marchi', 'polaris'); ?></strong></h4>
	</header>
	<div class="brands__cell brands__cell--s9" ng-carousel per-page="<?php the_sub_field('brands_cols'); ?>" max="<?php echo $max; ?>" items="[<?php echo $array; ?>]"></div>
</section>