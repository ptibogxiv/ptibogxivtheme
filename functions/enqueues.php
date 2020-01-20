<?php

function ptibogxivtheme_enqueues() {

/* Styles */
if ( empty(get_theme_mod( 'ptibogxivtheme_css')) || get_theme_mod( 'ptibogxivtheme_css') == 'css' ) {
$css='';
$version='4.4.1'; 
} else {
$css='bootswatch/'.get_theme_mod( 'ptibogxivtheme_css').'/';
$version='4.4.1';  
}
 
	wp_register_style( 'bootstrap.min.css', get_stylesheet_directory_uri() . '/theme/css/'.$css.'bootstrap.min.css', array(), $version);
	wp_enqueue_style( 'bootstrap.min.css');
  wp_register_script( 'popper.min.js', get_template_directory_uri() . '/theme/js/popper.min.js', array('jquery'), '1.16', true);
  wp_enqueue_script( 'bootstrap.min.js');
  wp_register_script( 'bootstrap.min.js', get_template_directory_uri() . '/theme/js/bootstrap.min.js', array('jquery'), $version, true);
  wp_enqueue_script( 'bootstrap.min.js');
  wp_register_script( 'font-awesome', '//use.fontawesome.com/releases/v5.12.0/js/all.js', array(), '5.12.0');
	wp_enqueue_script( 'font-awesome');
  wp_register_script( 'ptibogxivtheme-css', get_template_directory_uri() . '/theme/css/ptibogxivtheme.css', false, $version);
	wp_enqueue_script( 'font-awesome');
  wp_register_style( 'bootstrap-social', get_template_directory_uri() . '/theme/css/bootstrap-social.css', array(), $version);
	wp_enqueue_style( 'bootstrap-social');
	//wp_register_script('ptibogxivtheme-js', get_template_directory_uri() . '/theme/js/ptibogxivtheme.js', false, null, true);
	//wp_enqueue_script('ptibogxivtheme-js');

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'ptibogxivtheme_enqueues', 10);
