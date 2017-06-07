<footer class="footer footer--grow-md footer--shrink">
	<div class="footer__content footer__content--grid footer__content--shrink">
		<div class="footer__item">
			<a class="footer__logo" href="<?= esc_url(home_url('/')); ?>" title="<?php bloginfo('name'); ?>">
	        <?php 
	            $custom_logo_id = get_theme_mod( 'custom_logo' );
	            $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
	            echo print_svg(get_bloginfo('url') . $image[0]);

	        ?>
	        </a>
			<?php the_field('footer_text', 'options'); ?>
		</div>
		<div class="footer__item">
			<em><?php _e('Design & Development by', 'polaris'); ?></em><br/>
			<a class="icon-credits" href="http://www.bspkn.it" rel="nofollow" target="_blank"></a>
		</div>
	</div>
</footer>
