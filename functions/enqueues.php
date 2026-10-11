<?php

function ptibogxivtheme_enqueues() {
	$version = '6.0.0-alpha.1';
	wp_register_style( 'bootstrap.min', get_template_directory_uri().'/lib/bootstrap/css/bootstrap.min.css', array(), $version );
	wp_enqueue_style( 'bootstrap.min');
	wp_enqueue_script_module( 'bootstrap', get_template_directory_uri().'/lib/bootstrap/js/bootstrap.bundle.min.js', array(), $version );
  	wp_register_script( 'font-awesome', 'https://use.fontawesome.com/releases/v7.3.1/js/all.js', array(), '7.3.1');
	wp_enqueue_script( 'font-awesome');
	wp_enqueue_script( 'jquery-masonry' );
	wp_register_style( 'ptibogxivtheme', get_template_directory_uri().'/lib/custom/css/ptibogxivtheme.css', false, $version);
	wp_enqueue_style( 'ptibogxivtheme');
	//wp_register_script('ptibogxivtheme-js', get_template_directory_uri().'/lib/custom/js/ptibogxivtheme.js', false, null, true);
	//wp_enqueue_script('ptibogxivtheme-js');
	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'ptibogxivtheme_enqueues', 10);
