<?php use Roots\Sage\Titles; $title = Titles\title(); $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; ?>
<div class="news news--shrink news--grow-lg news--grid" id="news">
<?php $count = 0; while (have_posts()) : the_post(); 
if($count == 0) : ?><header id="header" class="header header--shrink"><h1 class="news__title news__title--huge-upper"><?php echo $title; ?></h1></header><?php endif; 
include(locate_template('templates/content.php', false, false));
if($count==0) : echo '<hr id="down"/>'; endif;
if($count == 2) : echo '<div class="instagram instagram--grow-lg instagram--"><header class="instagram__header instagramm__header--shrink"><h3 class="instagram__title instagram__title--big-upper">'.__('@Polaris.life', 'polaris').'</h3></header>'.do_shortcode('[instagram-feed]').'</div>'; endif; ?>
<?php if($count == 4) : 
	acf_set_language_to_default();
	$header = '<style>.cff__header {background-image:url('.get_field('fb_cover', 'options').')}</style><figure class="cff__picture"><img src="'.get_field('fb_profile', 'options').'" /><h4 class="cff__title cff__title--normal"><a href="'.get_field('fb_link', 'options').'">'.get_bloginfo('name').'</a></h4></figure>';
	acf_unset_language_to_default();
	echo '<div class="cff cff--grow-lg cff--grid"><header class="cff__top cff__top--shrink"><h2 class="cff__title cff__title--big-upper">Facebook</h2></header><div class="cff__header cff__header--shrink cff__header--grow-md">'.$header.'</div>'.do_shortcode('[custom-facebook-feed]').'</div>'; endif; ?>

<?php $count++; endwhile; ?>
</div>
<?php if(get_next_posts_link()) : ?>
<nav class="news__nav">
<?php echo get_next_posts_link(); ?>
</nav>
<?php endif; ?>
