<?php

function ptibogxivtheme_enqueues() {

/* Styles */
if ( empty(get_theme_mod( 'ptibogxivtheme_css')) || get_theme_mod( 'ptibogxivtheme_css') == 'css' ) {
$css='css';
$versionbase = '5.2.2'; 
$version=$versionbase; 
} else {
$css='bootswatch/'.get_theme_mod( 'ptibogxivtheme_css');
$version='5.2.2'; 
$versionbase=$version; 
}

if (!empty(get_theme_mod( 'ptibogxivtheme_css')) && $version != $versionbase && empty(get_option('doliconnectbeta'))) {
$css='';
$version=$versionbase;
}

	wp_register_style( 'bootstrap.min', get_template_directory_uri() . '/theme/' .$css.'/bootstrap.min.css', array(), $version);
	wp_enqueue_style( 'bootstrap.min');
	wp_register_script( 'bootstrap.bundle.min', get_template_directory_uri() . '/theme/js/bootstrap.bundle.min.js', array('jquery'), $version);
  	wp_enqueue_script( 'bootstrap.bundle.min');
  	wp_register_script( 'font-awesome', 'https://use.fontawesome.com/releases/v6.2.0/js/all.js', array(), '6.2.0');
	wp_enqueue_script( 'font-awesome');
	wp_register_style( 'ptibogxivtheme', get_template_directory_uri() . '/theme/css/ptibogxivtheme.css', false, $version);
	wp_enqueue_style( 'ptibogxivtheme');
	//wp_register_script('ptibogxivtheme-js', get_template_directory_uri() . '/theme/js/ptibogxivtheme.js', false, null, true);
	//wp_enqueue_script('ptibogxivtheme-js');

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'ptibogxivtheme_enqueues', 10);
