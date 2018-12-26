<?php

function ptibogxivtheme_enqueues() {

/* Styles */
if (get_theme_mod( 'ptibogxivtheme_css') == '' or get_theme_mod( 'ptibogxivtheme_css') == 'css') {
$type='bootstrap';
$css='css';
$version='4.2.1'; 
} else {
$type='bootswatch';
$css=get_theme_mod( 'ptibogxivtheme_css');
$version='4.1.3';  
}
 
	wp_register_style('bootstrap-css', 'https://stackpath.bootstrapcdn.com/'.$type.'/'.$version.'/'.$css.'/bootstrap.min.css', false, $version, null);
	wp_enqueue_style('bootstrap-css');
   
  wp_register_script('jquery-slim-min', 'https://code.jquery.com/jquery-3.3.1.slim.min.js', false, '3.3.1', false);
	wp_enqueue_script('jquery-slim-min');
  
	wp_register_script('popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js', false, '1.14.6', false);
	wp_enqueue_script('popper');
   
  wp_register_script('bootstrap-js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js', false, '4.1.3', false);
	wp_enqueue_script('bootstrap-js'); 
  
  wp_register_style('font-awesome', 'https://use.fontawesome.com/releases/v5.6.3/js/all.jss', false, '5.6.3', false);
	wp_enqueue_style('font-awesome'); 
  
  wp_register_style('ptibogxivtheme-css', get_template_directory_uri() . '/theme/css/ptibogxivtheme.css', false, null);
	wp_enqueue_style('ptibogxivtheme-css');

	wp_register_script('ptibogxivtheme-js', get_template_directory_uri() . '/theme/js/ptibogxivtheme.js', false, null, true);
	wp_enqueue_script('ptibogxivtheme-js');

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'ptibogxivtheme_enqueues', 100);
