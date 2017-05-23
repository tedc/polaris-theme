<?php
	function font() {
		wp_enqueue_style('karla', 'https://fonts.googleapis.com/css?family=Karla', false, null);
	}
	add_action('wp_enqueue_scripts', 'font', 100);
