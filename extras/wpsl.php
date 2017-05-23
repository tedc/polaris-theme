<?php
	add_filter( 'wpsl_admin_marker_dir', 'custom_admin_marker_dir' );

	function custom_admin_marker_dir() {

	    $admin_marker_dir = get_stylesheet_directory() . '/assets/images/wpsl-markers/';
	    
	    return $admin_marker_dir;
	}

	define( 'WPSL_MARKER_URI', dirname( get_bloginfo( 'stylesheet_url') ) . '/assets/images/wpsl-markers/' );

	add_filter( 'wpsl_marker_props', 'custom_marker_props' );

	function custom_marker_props( $marker_props ) {
	            
	    $marker_props['scaledSize'] = '30,21'; // Set this to 50% of the original size
	    $marker_props['origin'] = '0,0';
	    $marker_props['anchor'] = '15,21';
	    
	    return $marker_props;
	}