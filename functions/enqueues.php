<?php

function ptibogxivtheme_enqueues() {

/* Styles */
if ( empty(get_theme_mod( 'ptibogxivtheme_css')) || get_theme_mod( 'ptibogxivtheme_css') == 'css' ) {
$css='';
$version='5.0.0-beta1'; 
} else {
$css='bootswatch/'.get_theme_mod( 'ptibogxivtheme_css').'/';
$version='4.5.2';  
}

	wp_register_style( 'bootstrap.min.css', get_stylesheet_directory_uri() . '/theme/css/'.$css.'bootstrap.min.css', array(), $version);
  //wp_register_style( 'bootstrap.min.css', 'https://cdn.jsdelivr.net/npm/bootstrap@'.$version.'/dist/css/bootstrap.min.css', array(), $version);
	wp_enqueue_style( 'bootstrap.min.css');
	wp_register_script( 'bootstrap.bundle.min.js', get_template_directory_uri() . '/theme/js/bootstrap.bundle.min.js', array('jquery'), $version, true);
  //wp_register_script( 'bootstrap.bundle.min.js', 'https://cdn.jsdelivr.net/npm/bootstrap@'.$version.'/dist/js/bootstrap.bundle.min.js', array(), $version);
  wp_enqueue_script( 'bootstrap.bundle.min.js');
  wp_register_script( 'font-awesome', 'https://use.fontawesome.com/releases/v5.15.1/js/all.js', array(), '5.15.1' );
	wp_enqueue_script( 'font-awesome');
	wp_register_style( 'ptibogxivtheme-css', get_template_directory_uri() . '/theme/css/ptibogxivtheme.css', false, $version);
	wp_enqueue_style( 'ptibogxivtheme-css');
	//wp_register_script('ptibogxivtheme-js', get_template_directory_uri() . '/theme/js/ptibogxivtheme.js', false, null, true);
	//wp_enqueue_script('ptibogxivtheme-js');

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'ptibogxivtheme_enqueues', 10);
