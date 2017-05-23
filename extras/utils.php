<?php
	function print_svg($file) {
		$svg = file_get_contents($file); 
        $svg = preg_replace('/(<[^>]+) id=".*?"/', '$1', $svg);
        $svg = preg_replace('/(<[^>]+) data-name=".*?"/', '$1', $svg);
        $svg = preg_replace('/(w*)?<title>[^>]+<\/title>(w*)?/i', '', $svg);
        return $svg;
	}

	function my_excerpt($length, $excerpt = false) { 
		global $post;
		if ($excerpt) return $excerpt;
	    $text = strip_shortcodes( $post->post_content );
	    $text = apply_filters('the_content', $text);
	    $text = str_replace(']]>', ']]&gt;', $text);
	    $text = strip_tags($text);
	    $excerpt_length = apply_filters('excerpt_length', $length);
	    $words = preg_split("/[\n\r\t ]+/", $text, $excerpt_length + 1, PREG_SPLIT_NO_EMPTY);
	    if ( count($words) > $excerpt_length ) {
	            array_pop($words);
	            $text = implode(' ', $words);
	            $text = $text;
	    } else {
	            $text = implode(' ', $words);
	    }

	    return apply_filters('wp_trim_excerpt', $text);
	}

	function scrollmagic($val) {
		if(!is_handheld()) {
			echo ' data-scrollmagic=\'{'.$val.'}\'';
		}
	}