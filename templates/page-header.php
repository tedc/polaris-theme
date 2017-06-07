<?php 
	use Roots\Sage\Titles; 
	$kind = get_field('header_kind');
?>
<header id="header" class="page__header<?php echo ($kind == 3) ? ' page__header--full' : ''; ?> <?php the_field('header_background'); ?>">
<?php 
	if($kind == 3 ) {
			include(locate_template( 'templates/header-gallery.php', false, false ) );
	}
	if($kind == 2) { ?>
	<div class="page__header-content page__header-content--shrink page__header-content--grow-lg">
		<h1 class="page__title page__title--huge-upper"><strong><?php echo Titles\title(); ?></strong></h1>
	</div>
<?php 
	}
	if($kind < 2) {
		?>
	<style>
		.page__header-figure {
			background-image: url(<?php the_post_thumbnail_url('large'); ?>);
		}
		@media screen and (min-width: <?php echo 850/16; ?>em) {
			.page__header-figure {
				background-image: url(<?php the_post_thumbnail_url('full'); ?>);
			}
		}
	</style>
	<?php 
	}
	if($kind == 1) { ?>
	<figure class="page__header-figure page__header-figure--top">
		<?php the_post_thumbnail('large'); ?>
	</figure>
	<div class="page__header-content page__header-content--shrink"<?php scrollmagic('"tween":{"y":-80},"triggerHook":0,"triggerElement":"#header","offset":"-40","duration":"150vh"'); ?>>
		<h1 class="page__title page__title--huge-upper"><strong><?php echo Titles\title(); ?></strong></h1>
	</div>
<?php
	}
	if($kind == 0) { ?>
	<div class="page__header-content page__header-content--shrink"<?php scrollmagic('"tween":{"y":80},"triggerHook":0,"triggerElement":"#header","offset":"-40","duration":"150vh"'); ?>>
		<h1 class="page__title page__title--huge-upper"><strong><?php echo Titles\title(); ?></strong></h1>
	</div>
	<figure class="page__header-figure page__header-figure--bottom">
		<?php the_post_thumbnail('large'); ?>
	</figure>
<?php
	}
?>
</header>
<hr id="down" />