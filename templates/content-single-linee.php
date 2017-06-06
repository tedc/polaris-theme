<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/'. get_post_type(), 'header'); ?>
  <?php get_template_part('templates/content', 'linee'); ?>
<?php endwhile; ?>