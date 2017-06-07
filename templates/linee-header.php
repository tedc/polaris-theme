<?php 
	use Roots\Sage\Titles; 
	$kind = get_field('header_kind');
?>
<header id="header" class="linee-header linee-header--full linee-header--grid"<?php scrollmagic('"class":"linee-header--active","triggerHook":0.75,"duration":0,"reverse":false'); ?>>
	<style>
		.linee-header__cell--figure {
			background-image: url(<?php the_post_thumbnail_url('large'); ?>);
		}
		@media screen and (min-width: <?php echo 850/16; ?>em) {
			.linee-header__cell--figure {
				background-image: url(<?php the_post_thumbnail_url('full'); ?>);
			}
		}
	</style>
	<figure class="linee-header__cell linee-header__cell--s8 linee-header__cell--figure"<?php scrollmagic('"tween":{"backgroundPosition":"50% 0%"},"triggerElement":"#header","triggerHook":0,"duration":"100vh","offset":"-80"'); ?>>
		<?php the_post_thumbnail('large'); ?>
	</figure>
	<div class="linee-header__cell linee-header__cell--grow-md linee-header__cell--s4 linee-header__cell--shrink linee-header__cell--content">
		<h1 class="linee-header__title linee-header__title--huge-upper<?php echo (get_field('long_title')) ? ' linee-header__title--dm' : ''; ?>"><strong<?php scrollmagic('"tween":{"y":-80},"triggerElement":"#header","triggerHook":0,"duration":"100vh","offset":"-80"'); ?>><?php echo Titles\title(); ?></strong></h1>
		<?php the_field('description_text'); ?>
	</div>
	<div class="linee-header__mask"></div>
</header>
<hr id="down" />