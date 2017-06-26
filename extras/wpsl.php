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

	add_filter( 'wpsl_templates', 'custom_templates' );

	function custom_templates( $templates ) {

	    /**
	     * The 'id' is for internal use and must be unique ( since 2.0 ).
	     * The 'name' is used in the template dropdown on the settings page.
	     * The 'path' points to the location of the custom template,
	     * in this case the folder of your active theme.
	     */
	    $templates[] = array (
	        'id'   => 'polaris-wpsl',
	        'name' => 'Polaris WPSL',
	        'path' => get_stylesheet_directory() . '/' . 'templates/custom-wpsl.php',
	    );

	    return $templates;
	}

add_filter( 'wpsl_store_meta', 'custom_store_meta', 10, 2 );

function custom_store_meta( $store_meta, $store_id ) {
    
    $meta_fields['etichetta'] = get_field('etichetta', $store_id);

    return $meta_fields;
}
;
