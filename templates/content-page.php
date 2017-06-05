<?php if(is_page_template( 'template-custom.php' )) : ?>
<?php the_content(); ?>
<?php else : ?>

<header class="page__header">
	<h1 class="page__title page__title--normal"><?php the_title(); ?></h1>
</header>
<div class="page__content page__content--mw page__content--grow-lg">
<?php the_content(); ?>
</div>
<?php endif ; ?>
