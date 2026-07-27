<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
* WARNING - READ FIRST:
*
* Before deploying the plugin or theme, make sure to change the value of `server` in updatepulse.json
* with the URL of the server where UpdatePulse Server is installed.
*
* Also change $prefix_updater below - replace "prefix" in this variable's name with a unique prefix
*
* If the plugin or theme requires a license, change the header `Require License` to either `yes`, `true`, or `1`
* in the main plugin file or the `style.css` file.
*
* If the plugin or theme uses the license of another plugin or theme, add the header `Licensed With`
* with the slug of the plugin or theme that provides the license in the main plugin file or the `style.css` file.
*
* @see https://github.com/anyape/updatepulse-server/tree/main/integration/dummy-theme/lib/updatepulse-updater
**/

use Anyape\UpdatePulse\Updater\v2_0\UpdatePulse_Updater;
require_once plugin_dir_path( __FILE__ ) . 'lib/updatepulse-updater/class-updatepulse-updater.php';

/** Enable plugin updates**/
$ptibogxivtheme_updater = new UpdatePulse_Updater(
	wp_normalize_path( __FILE__ ),
	0 === strpos( __DIR__, WP_PLUGIN_DIR ) ? wp_normalize_path( __DIR__ ) : get_stylesheet_directory()
);

add_action( 'after_setup_theme', 'ptibogxivtheme_init' );
function ptibogxivtheme_init() {
	load_theme_textdomain( 'ptibogxivtheme', get_template_directory() . '/languages' );

	add_theme_support( 'title-tag' );

	add_theme_support( 'custom-background', array(
		'default-color'          => '',
		'default-image'          => '',
		'default-repeat'         => '',
		'default-position-x'     => '',
		'default-attachment'     => '',
		'wp-head-callback'       => '_custom_background_cb',
		'admin-head-callback'    => '',
		'admin-preview-callback' => '',
	) );

	add_theme_support( 'custom-header', array(
		'default-image'          => '',
		'random-default'         => false,
		'width'                  => 0,
		'height'                 => 0,
		'flex-height'            => false,
		'flex-width'             => false,
		'default-text-color'    => '',
		'header-text'            => true,
		'uploads'                => true,
		'wp-head-callback'       => '',
		'admin-head-callback'    => '',
		'admin-preview-callback' => '',
		'video'                  => true,
		'video-active-callback'  => 'is_front_page',
	) );

	add_theme_support( 'custom-logo', array(
		'height'      => 80,
		'width'       => 200,
		'flex-width'  => true,
		'header-text' => array( 'site-title', 'site-description' ),
	) );
}

require_once get_stylesheet_directory() . '/lib/updatepulse-updater/class-updatepulse-updater.php';
if ( class_exists( UpdatePulse_Updater::class ) ) {
	$ptibogxivtheme_updater = new UpdatePulse_Updater(
		wp_normalize_path( __FILE__ ),
		0 === strpos( __DIR__, WP_PLUGIN_DIR ) ? wp_normalize_path( __DIR__ ) : get_stylesheet_directory()
	);
}

/*
All the functions are in the PHP pages in the `functions/` folder.
*/
require_once get_stylesheet_directory() . '/functions/cleanup.php';
require_once get_stylesheet_directory() . '/functions/setup.php';
require_once get_stylesheet_directory() . '/functions/enqueues.php';
require_once get_stylesheet_directory() . '/functions/navbar.php';
require_once get_stylesheet_directory() . '/functions/widgets.php';
require_once get_stylesheet_directory() . '/functions/search-widget.php';
require_once get_stylesheet_directory() . '/functions/index-pagination.php';
require_once get_stylesheet_directory() . '/functions/split-post-pagination.php';
require_once get_stylesheet_directory() . '/functions/feedback.php';
require_once get_stylesheet_directory() . '/functions/remove-query-string.php';

add_filter( 'superpwa_add_theme_color', '__return_false' );

function custom_excerpt_length( $length ) {
	return 25;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function ptibogxivtheme_show_admin_bar( $show ) {
	if ( ! is_user_logged_in() ) {
		return false;
	}

	if ( current_user_can( 'edit_posts' ) && ! get_theme_mod( 'ptibogxivtheme_adminbar', false ) ) {
		return false;
	}

	if ( current_user_can( 'edit_posts' ) && get_user_meta( get_current_user_id(), 'show_admin_bar_front', true ) === 'true' ) {
		return true;
	}

	return $show;
}
add_filter( 'show_admin_bar', 'ptibogxivtheme_show_admin_bar' );

function ptibogxivtheme_social() {
	if ( ! is_singular() ) {
		return '';
	}

	$post_id      = get_the_ID();
	$post_title   = get_the_title( $post_id );
	$permalink    = get_permalink( $post_id );
	$site_name    = get_bloginfo( 'name' );
	$twitter_via  = ltrim( get_option( 'doliconnect_social_twitter', '' ), '@' );
	$linkedin_src = get_option( 'doliconnect_social_linkedin', '' );

	$mailto_subject = rawurlencode( sprintf( '[%s] Informations intéressante', $site_name ) );
	$mailto_body    = rawurlencode( sprintf( 'Bonjour, %s', $permalink ) );

	$facebook_url = add_query_arg(
		array(
			'u' => $permalink,
			't' => $post_title,
		),
		'https://www.facebook.com/sharer/sharer.php'
	);

	$twitter_url = add_query_arg(
		array(
			'text' => $post_title,
			'url'  => $permalink,
			'via'  => $twitter_via,
		),
		'https://x.com/intent/tweet'
	);

	$linkedin_url = add_query_arg(
		array(
			'mini'   => 'true',
			'url'    => $permalink,
			'title'  => $post_title,
			'source' => $linkedin_src,
		),
		'https://www.linkedin.com/shareArticle'
	);

	$pinterest_url = add_query_arg(
		array(
			'url'         => $permalink,
			'description' => $post_title,
		),
		'https://pinterest.com/pin/create/button/'
	);

	$html  = '<div class="btn-group d-flex" role="group" aria-label="' . esc_attr__( 'Social sharing', 'ptibogxivtheme' ) . '">';
	$html .= '<a href="#" class="btn btn-light disabled w-100" role="button" aria-disabled="true"><i class="fas fa-share-alt fa-fw"></i></a>';
	$html .= '<a href="mailto:?subject=' . $mailto_subject . '&body=' . $mailto_body . '" class="btn btn-dark w-100" role="button" target="_blank" rel="noopener noreferrer"><i class="fas fa-envelope fa-fw"></i></a>';
	$html .= '<a href="' . esc_url( $facebook_url ) . '" class="btn btn-facebook w-100" role="button" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-facebook-f fa-fw"></i></a>';
	$html .= '<a href="' . esc_url( $twitter_url ) . '" class="btn btn-twitter w-100" role="button" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-x-twitter fa-fw"></i></a>';
	$html .= '<a href="' . esc_url( $linkedin_url ) . '" class="btn btn-linkedin w-100" role="button" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-linkedin-in fa-fw"></i></a>';
	$html .= '<a href="' . esc_url( $pinterest_url ) . '" class="btn btn-pinterest w-100" role="button" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-pinterest fa-fw"></i></a>';
	$html .= '</div>';

	return $html;
}

function ptibogxivtheme_gradient() {
	return 'backdrop-filter: blur(5px); -webkit-backdrop-filter: blur(5px); background-color: rgba(255, 255, 255, 0.55);';
}

function ptibogxivtheme_time_ago( $time, $format = '' ) {
	$post_id = get_the_ID();

	if ( ! $post_id || get_post_type( $post_id ) !== 'post' ) {
		return $time;
	}

	$post_time    = get_post_time( 'U', true, $post_id );
	$current_time = current_time( 'timestamp', true );
	$since        = $current_time - $post_time;

	if ( $since < 0 ) {
		return esc_html__( 'sometime', 'ptibogxivtheme' );
	}

	$duration = human_time_diff( $post_time, $current_time );
	return sprintf( esc_html__( '%s ago', 'ptibogxivtheme' ), $duration );
}
add_filter( 'the_time', 'ptibogxivtheme_time_ago', 10, 2 );
