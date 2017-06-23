<header class="banner" id="banner">
    <div class="banner__container banner__container--shrink">
        <a class="banner__logo" href="<?= esc_url(home_url('/')); ?>" title="<?php bloginfo('name'); ?>">
        <?php 
            $custom_logo_id = get_theme_mod( 'custom_logo' );
            $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
            echo print_svg(get_bloginfo('url') . $image[0]);?>
        </a>
        <?php get_template_part('templates/breadcrumb'); ?>
    </div>
    <div class="banner__container banner__container--shrink">
        <?php lang_nav(); ?>
        <span class="banner__toggle" data-open='{"el":"#banner","class":"banner--active"}'>
            <span class="banner__toggle-label" data-close="<?php _e('Chiudi', 'polaris'); ?>"><?php _e('Menu', 'polaris'); ?></span>
            <span class="banner__toggle-lines">
                <span class="banner__toggle-line banner__toggle-line--top"></span>
                <span class="banner__toggle-line banner__toggle-line--center"></span>
                <span class="banner__toggle-line banner__toggle-line--center-abs"></span>
                <span class="banner__toggle-line banner__toggle-line--bottom"></span>
            </span>
        </span>
    </div>
    <nav class="banner__nav">
        <div class="banner__nav-container banner__nav-container--grid-nowrap" data-ps>
            <div class="banner__scroller banner__scroller--grid">
                <?php
                if (has_nav_menu('primary_navigation')) :
                    bem_menu('primary_navigation', 'menu', 'menu--shrink menu--pages menu--grow-lg', __('Polaris', 'polaris'));
                endif;
                get_template_part( 'templates/linee' );
                
                ?>        
            </div>
        </div>
        <div class="banner__footer banner__footer--grow banner__footer--shrink">
            <a class="banner__download" href="<?php acf_set_language_to_default(); the_field('catalogo', 'options'); acf_unset_language_to_default(); ?>" target="_blank" title="<?php _e('Scarica il catalogo', 'polaris'); ?>" onclick="ga('send', 'event', 'download', 'cataloghi');"><strong><?php _e('Scarica il catalogo', 'polaris'); ?></strong><i class="icon-arrow-big"></i></a>
            <div class="banner__footer-item">
                <?php get_template_part( 'templates/social' ); ?>
            </div>
        </div>
    </nav>
</header>