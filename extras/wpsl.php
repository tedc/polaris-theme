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
	    
	    $store_meta['etichetta'] = get_field('etichetta', $store_id);
	    
	    return $store_meta;
	}

	add_filter( 'wpsl_frontend_meta_fields', 'custom_frontend_meta_fields' );

	function custom_frontend_meta_fields( $store_fields ) {

	    $store_fields['etichetta'] = array( 
	        'name' => 'etichetta' 
	    );
	    
	    return $store_fields;
	}
	add_filter( 'wpsl_listing_template', 'my_listing_template' );
	function my_listing_template() {
		global $wpsl, $wpsl_settings;
		$listing_template = '<li data-store-id="<%= id %>">' . "\r\n";
        $listing_template .= "\t\t" . '<div class="wpsl-store-location">' . "\r\n";
        $listing_template .= "\t\t\t" . '<% if ( etichetta ) { %>' . "\r\n";
        $listing_template .= "\t\t\t" . '<div class="wpsl-label"><%= etichetta %></div>' . "\r\n";
        $listing_template .= "\t\t\t" . '<% } %>' . "\r\n";
        $listing_template .= "\t\t\t" . '<p><%= thumb %>' . "\r\n";
        $listing_template .= "\t\t\t\t" . wpsl_store_header_template( 'listing' ) . "\r\n"; // Check which header format we use
        $listing_template .= "\t\t\t\t" . '<span class="wpsl-street"><%= address %></span>' . "\r\n";
        $listing_template .= "\t\t\t\t" . '<% if ( address2 ) { %>' . "\r\n";
        $listing_template .= "\t\t\t\t" . '<span class="wpsl-street"><%= address2 %></span>' . "\r\n";
        $listing_template .= "\t\t\t\t" . '<% } %>' . "\r\n";
        $listing_template .= "\t\t\t\t" . '<span>' . wpsl_address_format_placeholders() . '</span>' . "\r\n"; // Use the correct address format

        if ( !$wpsl_settings['hide_country'] ) {
            $listing_template .= "\t\t\t\t" . '<span class="wpsl-country"><%= country %></span>' . "\r\n";
        }
        
        $listing_template .= "\t\t\t" . '</p>' . "\r\n";
        
        // Show the phone, fax or email data if they exist.
        if ( $wpsl_settings['show_contact_details'] ) {
            $listing_template .= "\t\t\t" . '<p class="wpsl-contact-details">' . "\r\n";
            $listing_template .= "\t\t\t" . '<% if ( phone ) { %>' . "\r\n";
            $listing_template .= "\t\t\t" . '<span><strong>' . esc_html( $wpsl->i18n->get_translation( 'phone_label', __( 'Phone', 'wpsl' ) ) ) . '</strong>: <%= formatPhoneNumber( phone ) %></span>' . "\r\n";
            $listing_template .= "\t\t\t" . '<% } %>' . "\r\n";
            $listing_template .= "\t\t\t" . '<% if ( fax ) { %>' . "\r\n";
            $listing_template .= "\t\t\t" . '<span><strong>' . esc_html( $wpsl->i18n->get_translation( 'fax_label', __( 'Fax', 'wpsl' ) ) ) . '</strong>: <%= fax %></span>' . "\r\n";
            $listing_template .= "\t\t\t" . '<% } %>' . "\r\n";
            $listing_template .= "\t\t\t" . '<% if ( email ) { %>' . "\r\n";
            $listing_template .= "\t\t\t" . '<span><strong>' . esc_html( $wpsl->i18n->get_translation( 'email_label', __( 'Email', 'wpsl' ) ) ) . '</strong>: <%= email %></span>' . "\r\n";
            $listing_template .= "\t\t\t" . '<% } %>' . "\r\n";
            $listing_template .= "\t\t\t" . '</p>' . "\r\n";
        }
        
        $listing_template .= "\t\t\t" . wpsl_more_info_template() . "\r\n"; // Check if we need to show the 'More Info' link and info
        $listing_template .= "\t\t" . '</div>' . "\r\n";
        $listing_template .= "\t\t" . '<div class="wpsl-direction-wrap">' . "\r\n";
        
        if ( !$wpsl_settings['hide_distance'] ) {
            $listing_template .= "\t\t\t" . '<%= distance %> ' . esc_html( wpsl_get_distance_unit() ) . '' . "\r\n";
        }
        
        $listing_template .= "\t\t\t" . '<%= createDirectionUrl() %>' . "\r\n"; 
        $listing_template .= "\t\t" . '</div>' . "\r\n";
        $listing_template .= "\t" . '</li>';
	}