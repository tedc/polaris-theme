<?php
	function ng_app($html) {
		$html =  $html . ' class="no-js" ng-app="polaris"';
		return $html;
	}

	add_filter( 'language_attributes', 'ng_app', 100 );
	function theme_setup() {
		add_theme_support( 'custom-logo' );
		register_nav_menus([
			'products_navigation' => __('Menu Cucine', 'polaris')
		]);
		add_image_size('news', 1000, 500, true);
	}
	
	add_action('after_setup_theme', 'theme_setup');
	// ADD BUILDER TO CONTENT
	function builder_shortcode($attr) {
		ob_start();
		get_template_part('builder/init');
		return ob_get_clean();
	}
	add_shortcode( 'builder', 'builder_shortcode' );

	function add_builder_shortcode($post_id) {
		$field = get_field_object('layout');
		if( empty($_POST['acf'][$field['key']]) ) {
			return;
		}
		$args = array(
			'ID' => $post_id,
			'post_content' => '[builder]'
		);
		wp_update_post($args);
	}
	add_action( 'acf/save_post', 'add_builder_shortcode' );

	// CHANGE WRAPPER

	add_filter('sage/wrap_base', 'my_sage_wrap');
	
	function my_sage_wrap($templates) {
		array_unshift($templates, 'extras/base.php');
		return $templates;
	}

	function na_remove_slug( $post_link, $post, $leavename ) {

	    if ( ('linee' != $post->post_type ) || 'publish' != $post->post_status ) {
	        return $post_link;
	    }
	    $uri = '';
	    foreach ( $post->ancestors as $parent ) {
	        $uri = get_post( $parent )->post_name . "/" . $uri;
	    }

	    $post_link = str_replace( $uri, '', $post_link );
	    $post_link = str_replace( '/' . $post->post_type . '/', '/', $post_link );

	    return $post_link;
	}
	add_filter( 'post_type_link', 'na_remove_slug', 10, 3 );


	function gp_parse_request_trick( $query ) {
	 
	    // Only noop the main query
	    if ( ! $query->is_main_query() )
	        return;
	 
	    // Only noop our very specific rewrite rule match
	    if ( 2 != count( $query->query ) || ! isset( $query->query['page'] ) ) {
	        return;
	    }
	 
	    // 'name' will be set if post permalinks are just post_name, otherwise the page rule will match
	    if ( ! empty( $query->query['name'] ) ) {
	        $query->set( 'post_type', array( 'post', 'page', 'linee' ) );
	    }
	}
	add_action( 'pre_get_posts', 'gp_parse_request_trick' );

	// Allow SVG
	add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {

		global $wp_version;
		if ( $wp_version < '4.7.1' ) {
		return $data;
		}

		$filetype = wp_check_filetype( $filename, $mimes );

		return [
		'ext'             => $filetype['ext'],
		'type'            => $filetype['type'],
		'proper_filename' => $data['proper_filename']
		];

	}, 10, 4 );

	function cc_mime_types( $mimes ){
		$mimes['svg'] = 'image/svg+xml';
		return $mimes;
	}
	add_filter( 'upload_mimes', 'cc_mime_types' );

	function fix_svg() {
		echo '<style type="text/css">.attachment-266x266, .thumbnail img { width: 100% !important; height: auto !important; }</style>';
	}
	add_action( 'admin_head', 'fix_svg' );

	if( function_exists('acf_add_options_page') ) {	
		acf_add_options_sub_page(array(
			'page_title' 	=> 'Footer',
			'menu_title'	=> 'Footer Settings',
			'parent_slug' => 'themes.php'
		));
		// acf_add_options_page(array(
		// 	'page_title' 	=> 'Cookie law',
		// 	'menu_title'	=> 'Cookie law',
		// 	'menu_slug' => 'cookie-law'
		// ));
		// acf_add_options_page(array(
		// 	'page_title' 	=> 'Instagram Settings',
		// 	'menu_title'	=> 'Instagram',
		// 	'menu_slug' => 'instagram',
		// 	'icon_url' => get_stylesheet_directory_uri() . '/assets/images/instagram.png'
		// ));
		acf_add_options_sub_page(array(
			'page_title' 	=> 'Campi comuni',
			'menu_title'	=> 'Campi comuni',
			'parent_slug' => 'themes.php'
		));
		acf_add_options_sub_page(array(
			'page_title' 	=> 'Facebook',
			'menu_title'	=> 'Facebook',
			'parent_slug' => 'themes.php'
		));
	}

	add_action('admin_head', 'my_custom_fonts');

	function my_custom_fonts() {
	  echo '<style>
	    .toplevel_page_instagram img {
	    	height: 20px;
	    }
	  </style>';
	}

	add_filter('deprecated_constructor_trigger_error', '__return_false');
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_action( 'wp_head', 'cff_custom_css', 100 );

	add_filter('excerpt_more','__return_false');

	function my_acf_init() {	
		acf_update_setting('google_api_key', 'AIzaSyDPjHDg5-EGUjQ_zDjltstiGMJ-aVkHuU0');
	}

	add_action('acf/init', 'my_acf_init');

	add_action( 'init', 'my_add_excerpts_to_pages' );
	function my_add_excerpts_to_pages() {
		add_post_type_support( 'page', 'excerpt' );
	}

	function removeSocialCSS() {
		wp_dequeue_style('sb_instagram_styles');
		wp_dequeue_style( 'cff' );
		wp_dequeue_style( 'cff-font-awesome' );
		wp_deregister_style( 'contact-form-7' );
	}
	add_action( 'wp_print_styles', 'removeSocialCSS', 100);
	
	function my_gallery_shortcode( $output = '', $attrs ) {
		$row = str_replace(',', '', $attrs['ids']);
		$ids = explode(',', $attrs['ids']);
		$images = array();
		foreach ($ids as $id) {
			array_push($images, array('ID' => $id, 'url' => wp_get_attachment_image_src( $id, 'full')[0]));
		}
		ob_start();
		include(locate_template('builder/commons/gallery.php', false, false));
		$output = '<div class="post__gallery" id="slider_'.$row.'">'.ob_get_clean().'</div>';
		return $output;
	}

	add_filter( 'post_gallery', 'my_gallery_shortcode', 10, 2 );

	function filter_images($content){
	    return preg_replace('/<img (.*) \/>\s*/iU', '<figure class="post__content-figure"><span><img \1 /></span></figure>', $content);
	}
	add_filter('the_content', 'filter_images');
	// add_filter('wpcf7_form_elements', function($content) {
	//     $content = preg_replace('/<(span).*?class="\s*(?:.*\s)?acceptance(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);

	//     return $content;
	// });
