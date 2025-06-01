<?php
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

require_once get_stylesheet_directory() . '/lib/plugin-update-checker/plugin-update-checker.php';
use YahnisElsts\PluginUpdateChecker\v5\PucFactory;
$myUpdateChecker = PucFactory::buildUpdateChecker(
	'https://github.com/ptibogxiv/ptibogxivtheme/',
	__FILE__,
	'ptibogxivtheme'
);

$myUpdateChecker->setBranch('master');
$myUpdateChecker->getVcsApi()->enableReleaseAssets();
//$myUpdateChecker->setAuthentication('your-token-here');

add_filter( 'superpwa_add_theme_color', '__return_false' );

function ptibogxivtheme_load_theme_textdomain() {
	load_theme_textdomain( 'ptibogxivtheme', get_template_directory() . '/languages/' );
}
add_action( 'after_setup_theme', 'ptibogxivtheme_load_theme_textdomain' );

function ptibogxivtheme_slug_setup() {
    add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'ptibogxivtheme_slug_setup' );

add_theme_support( 'custom-background',array(
	'default-color'          => '',
	'default-image'          => '',
	'default-repeat'         => '',
	'default-position-x'     => '',
	'default-attachment'     => '',
	'wp-head-callback'       => '_custom_background_cb',
	'admin-head-callback'    => '',
	'admin-preview-callback' => ''
) );

add_theme_support( 'custom-header', array(
    'default-image' => '',
    'random-default' => false,
    'width' => 0,
    'height' => 0,
    'flex-height' => false,
    'flex-width' => false,
    'default-text-color' => '',
    'header-text' => true,
    'uploads' => true,
    'wp-head-callback' => '',
    'admin-head-callback' => '',
    'admin-preview-callback' => '',
    'video' => true,
    'video-active-callback' => 'is_front_page',
) );

add_theme_support( 'custom-logo', array(
	'height'      => 80,
	'width'       => 200,
	'flex-width'  => true,
	'header-text' => array( 'site-title', 'site-description' ),
) );

function theme_prefix_setup() {
	
add_theme_support( 'custom-logo', array(
	'height'      => 80,
	'width'       => 200,
	'flex-width'  => true,
	) );

}
add_action( 'after_setup_theme', 'theme_prefix_setup' );

function custom_excerpt_length( $length ) {
	return 25;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
 
function wpc_show_admin_bar() { 
global $current_user;
if ( current_user_can( 'edit_posts' ) && !get_theme_mod( 'ptibogxivtheme_adminbar') ) {  
return false;
} elseif ( current_user_can( 'edit_posts' ) && is_user_logged_in() && $current_user->show_admin_bar_front == 'true' ) {
return true;
}
else {
return false;
}
 }
add_filter('show_admin_bar' , 'wpc_show_admin_bar');

function ptibogxivtheme_social() {
global $post;
$return = "<div class='btn-group d-flex' role='group' aria-label='First group'>
<a href='#' class='btn btn-light disabled w-100' role='button' aria-disabled='true'><i class='fas fa-share-alt fa-fw'></i></a>
<a href='mailto:?subject=[".get_bloginfo('name')."] Informations intéressante&body=Bonjour, ".get_permalink($post->ID)."' role='button' class='btn btn-dark w-100' target='_blank'><i class='fas fa-envelope fa-fw'></i></a>"; 
//<script>//if (navigator.userAgent.match(/iPhone|Android/i)) {
//document.write('<a href='whatsapp://send?text=<?php echo get_permalink($post->ID);' data-action='share/whatsapp/share' role='button' class='btn btn-whatsapp' target='_blank'><i class='fab fa-whatsapp fa-fw'></i></a>');
//}</script>
$return .= "<a href='https://www.facebook.com/sharer/sharer.php?u=".get_permalink($post->ID)."&t=".get_the_title()."' role='button' class='btn btn-facebook w-100' target='_blank'><i class='fab fa-facebook-f fa-fw'></i></a>
<a href='https://twitter.com/intent/tweet?text=".get_the_title()."&url=".get_permalink($post->ID)."&via=".get_option('doliconnect_social_twitter')."' role='button' class='btn btn-twitter w-100' target='_blank'><i class='fab fa-twitter fa-fw'></i></a>
<a href='https://www.linkedin.com/shareArticle?mini=true&url=url=".get_permalink($post->ID)."&title=".get_the_title()."&source=".get_option('doliconnect_social_linkedin')."' role='button' class='btn btn-linkedin w-100' target='_blank'><i class='fab fa-linkedin-in fa-fw'></i></a>
<a href='https://pinterest.com/pin/create/button/?url=".get_permalink($post->ID)."&media=&description=".get_the_title()."' role='button' class='btn btn-pinterest w-100' target='_blank'><i class='fab fa-pinterest fa-fw'></i></a>
</div>";
return $return;
}

function ptibogxivtheme_gradient() {

return "backdrop-filter: blur(5px);-webkit-backdrop-filter: blur(5px);background-color: rgba(255, 255, 255, 0.55);";
}

add_action('add_meta_boxes','caroussel_metabox');
function caroussel_metabox(){
  add_meta_box('url_crea', 'Caroussel', 'url_crea', 'post', 'side');
}

function url_crea($post){
  $url = get_post_meta($post->ID,'_displaycaroussel',true);
  echo '<label for="url_meta">Afficher dans le carrousel</label>';
  echo '<input id="url_meta" type="text" name="url_site" value="'.$url.'" />';
}

add_action('save_post','save_metabox');

function save_metabox($post_id){
if(isset($_POST['url_site']))
update_post_meta($post_id, '_url_crea', esc_url($_POST['url_site']));
}

function ptibogxivtheme_time_ago() {
global $post;
	
	$date = get_post_time('G', true, $post);
	
if ($post->post_type == 'post') {
	
	// Array of time period chunks
	$chunks = array(
		array( 60 * 60 * 24 * 365 , __( 'year', 'ptibogxivtheme' ), __( 'years', 'ptibogxivtheme' ) ),
		array( 60 * 60 * 24 * 30 , __( 'month', 'ptibogxivtheme' ), __( 'months', 'ptibogxivtheme' ) ),
		array( 60 * 60 * 24 * 7, __( 'week', 'ptibogxivtheme' ), __( 'weeks', 'ptibogxivtheme' ) ),
		array( 60 * 60 * 24 , __( 'day', 'ptibogxivtheme' ), __( 'days', 'ptibogxivtheme' ) ),
		array( 60 * 60 , __( 'hour', 'ptibogxivtheme' ), __( 'hours', 'ptibogxivtheme' ) ),
		array( 60 , __( 'minute', 'ptibogxivtheme' ), __( 'minutes', 'ptibogxivtheme' ) ),
		array( 1, __( 'second', 'ptibogxivtheme' ), __( 'seconds', 'ptibogxivtheme' ) )
	);

	if ( !is_numeric( $date ) ) {
		$time_chunks = explode( ':', str_replace( ' ', ':', $date ) );
		$date_chunks = explode( '-', str_replace( ' ', '-', $date ) );
		$date = gmmktime( (int)$time_chunks[1], (int)$time_chunks[2], (int)$time_chunks[3], (int)$date_chunks[1], (int)$date_chunks[2], (int)$date_chunks[0] );
	}
	
	$current_time = current_time( 'mysql', $gmt = 0 );
	$newer_date = strtotime( $current_time );

	// Difference in seconds
	$since = $newer_date - $date;

	// Something went wrong with date calculation and we ended up with a negative date.
	if ( 0 > $since )
		return __( 'sometime', 'ptibogxivtheme' );

	/**
	 * We only want to output one chunks of time here, eg:
	 * x years
	 * xx months
	 * so there's only one bit of calculation below:
	 */

	//Step one: the first chunk
	for ( $i = 0, $j = count($chunks); $i < $j; $i++) {
		$seconds = $chunks[$i][0];

		// Finding the biggest chunk (if the chunk fits, break)
		if ( ( $count = floor($since / $seconds) ) != 0 )
			break;
	}

	// Set output var
	$duration = ( 1 == $count ) ? '1 '. $chunks[$i][1] : $count . ' ' . $chunks[$i][2];
	

	if ( !(int)trim($duration) ){
		$duration = '0 ' . __( 'seconds', 'ptibogxivtheme' );
	}

	return sprintf( esc_html__( '%s ago', 'ptibogxivtheme' ), $duration);
}
}

// Filter our ptibogxivtheme_time_ago() function into WP's the_time() function
add_filter('the_time', 'ptibogxivtheme_time_ago');

