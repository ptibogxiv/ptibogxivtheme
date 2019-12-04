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
 
	wp_enqueue_style( 'bootstrap-css', get_stylesheet_directory_uri() . '/theme/css/'.$css.'bootstrap.min.css', array(), $version);

	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/theme/js/scripts.min.js', array('jquery'), ' ', true);
	
  wp_register_script( 'font-awesome', '//use.fontawesome.com/releases/v5.11.2/js/all.js', array(), '5.11.2' );
	wp_enqueue_script( 'font-awesome' );
   
	wp_enqueue_style( 'ptibogxivtheme-css', get_template_directory_uri() . '/theme/css/ptibogxivtheme.css', false, $version);

	//wp_register_script('ptibogxivtheme-js', get_template_directory_uri() . '/theme/js/ptibogxivtheme.js', false, null, true);
	//wp_enqueue_script('ptibogxivtheme-js');

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'ptibogxivtheme_enqueues', 10);
