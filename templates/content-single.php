<?php while (have_posts()) : the_post(); ?>
<article <?php post_class(); ?>>
    <header class="post__header">
        <figure class="post__thumbnail post__thumbnail--shrink">
            <?php the_post_thumbnail('full', array('class'=>'wp-post-image--mw')); ?>    
        </figure>
        <div class="post__header-content post__header-content--shrink post__header-content--mw post__header-content--grow-lg-bottom">
            <?php get_template_part('templates/entry-meta'); ?>
            <h1 class="post__title post__title--big"><span><?php the_title(); ?></span></h1>
        </div>
    </header>
    <div class="post__content post__content--shrink post__content--mw">
        <?php the_content(); ?>
    </div>
</article>
<?php endwhile; ?>

<?php 
    $posts__in = array();
    if(get_previous_post()) {
        array_push($posts__in, get_previous_post()->ID);
    }
    if(get_next_post()) {
        array_push($posts__in, get_next_post()->ID);
    }

    $query = new WP_Query(
        array(
            'post__in' => array($posts__in),
            'posts_per_page' => 2
        )
    ); 
    if($query->have_posts()) : 
?>
<div class="related related--shrink related--grid related--grow-lg">
<?php while($query->have_posts()) : $query->the_post(); 
$related = true; include(locate_template( 'templates/content.php', false, false )); $related = false;
endwhile; wp_reset_query(); ?>
</div>
<?php endif; ?>
