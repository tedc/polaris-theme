<ul class="menu menu--linee menu--shrink menu--grow-lg">
	<li class="menu__item menu__item--title"><h3 class="menu__title menu__title--small"><?php _e('Collezione', 'polaris'); ?></h3></li>
	<?php foreach (get_posts(array('post_type'=>'linee', 'posts_per_page'=>-1,'orderby'=>'menu_order')) as $linea) {
	$current = (is_singular('linee') && $post->ID == $linea->ID) ? ' menu__item--active' : ''; 
	echo '<li class="menu__item menu__item--'.$linea->post_name.$current.'"><a href="'.get_permalink($linea->ID).'">'.get_the_title($linea->ID).'</a></li>';
	} ?>
</ul>