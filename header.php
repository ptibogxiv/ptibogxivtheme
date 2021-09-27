<!DOCTYPE html> 
<html class="no-js">
<html <?php language_attributes(); ?>>
<head>
<title><?php wp_title('•', true, 'right'); bloginfo('name'); ?></title>
<meta name="description" content="<?php if ( is_single() ) {
single_post_title('', true); 
} else {
bloginfo('name'); echo " - "; bloginfo('description');
}
?>" />
  <meta charset="utf-8">
  <meta name="theme-color" content="#<? echo get_background_color(); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="language" content="French">
  <meta http-equiv="Cache-control" content="public">
  <link rel="icon" href="<?php echo get_site_icon_url(); ?>" type="image/x-icon">
  <link rel="shortcut icon" href="<?php echo get_site_icon_url(); ?>" type="image/x-icon">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
</head>

<body <?php echo body_class(); ?>>
<?php
if ( function_exists( 'wp_body_open' ) ) {
    wp_body_open();
} else {
    do_action( 'wp_body_open' );
}
if ( ! empty(get_theme_mod( 'ptibogxivtheme_carousel'))) { //! empty(get_theme_mod( 'ptibogxivtheme_header')) ?>
<div class="h-auto align-middle <?php echo esc_attr(get_theme_mod('ptibogxivtheme_container_type')); ?>" <?php if(get_theme_mod( 'ptibogxivtheme_cardcontent' )): ?>style="<?php echo ptibogxivtheme_gradient(); ?>"<?php endif; ?>>
<div class="text-dark d-none d-md-block" style="height:15vh;background:url('<?php header_image(); ?>')">
<div class="mh-100 float-right"><p><?php if ( function_exists('doliconnecturl') && doliconnectid('dolicontact') > 0 ) { 
?>
<a class="text-white" href="<?php echo doliconnecturl('dolicontact'); ?>" title="<?php _e('Contact us', 'ptibogxivtheme'); ?>"><?php _e('Contact us', 'ptibogxivtheme'); ?></a> 
<?php
} ?></p></div><br>
<div class="mh-100"><table class="mh-100"><tr><td class="align-middle"><?php the_custom_logo(); ?></td></tr></table></div>
</div></div>
<?php } elseif (get_header_image()) { ?> 
<img class="d-block w-100 img-fluid" src="<?php header_image(); ?>" alt="banner logo">
<?php } ?>
<nav class="navbar sticky-top navbar-expand-md <?php echo esc_attr(get_theme_mod( 'ptibogxivtheme_navbar_color' )); ?>"> 
<div class="<?php echo esc_attr(get_theme_mod('ptibogxivtheme_container_type')); ?>"><?php
if (get_theme_mod( 'ptibogxivtheme_brand_style') == 'home_mode' && (! empty(get_theme_mod( 'ptibogxivtheme_carousel')) || get_header_image())) {
?><a class="navbar-brand" href="<?php echo esc_url( home_url('/') ); ?>"><div class='d-block d-sm-block d-xs-block d-md-none'><?php bloginfo('name'); ?></div><div class='d-none d-md-block'><i class='fas fa-home'></i></div></a> 
<?php } 
elseif (get_theme_mod( 'ptibogxivtheme_brand_style') == 'dual_mode' && !get_header_image()) {
$image_attributes = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full', false); 
if ( $image_attributes ) : ?>
<a class="navbar-brand" href="<?php echo esc_url( home_url('/') ); ?>"><img src="<?php echo $image_attributes[0]; ?>" height="30px" alt="<?php bloginfo('name'); ?>"/></a>
<?php endif; ?>&nbsp;<a class="navbar-brand" href="<?php echo esc_url( home_url('/') ); ?>"><?php bloginfo('name'); ?></a> 
<?php }
elseif (get_theme_mod( 'ptibogxivtheme_brand_style') == 'logo_mode' && !get_header_image()) {
$image_attributes = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full', false); 
if ( $image_attributes ) : ?>
<a class="navbar-brand" href="<?php echo esc_url( home_url('/') ); ?>"><img src="<?php echo $image_attributes[0]; ?>" height="30px" alt="<?php bloginfo('name'); ?>"/></a>
<?php endif; ?>
<?php } else {
?><a class="navbar-brand" href="<?php echo esc_url( home_url('/') ); ?>"><?php bloginfo('name'); ?></a><?php
} ?>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <?php
      wp_nav_menu( array(
        'theme_location'	=> 'navbar',
        'container'       => false,
        'menu_class'		  => '',
        'fallback_cb'		  => '__return_false',
      	'items_wrap'		  => '<ul id="%1$s" class="navbar-nav mr-auto mt-2 mt-lg-0 %2$s">%3$s</ul>',
        'depth'			      => 2,
	      'walker'  	      => new ptibogxivtheme_walker_nav_menu()
      ) );
?>
</div><div class="w-25 d-none d-md-block d-flex"><ul class="nav justify-content-end"><?php
if ( function_exists('pll_the_languages') && function_exists('doliconnect_langs') && !(is_multisite() && !empty(get_theme_mod( 'ptibogxivtheme_networkbar_color'))) ) {       
?><li class="nav-item"><a class="nav-item" href="#" data-bs-toggle="modal" data-bs-target="#DoliconnectSelectLang" data-bs-dismiss="modal" title="<?php _e('Choose language', 'ptibogxivtheme'); ?>"><i class='fas fa-language fa-fw fa-2x'></i></a></li><?php
}
if ( get_site_option('doliconnect_mode') == 'one' && is_multisite() ) {
switch_to_blog(1);
}  
if ( is_user_logged_in() ) { 
if ( function_exists('doliconnecturl') && doliconnectid('doliaccount') > 0 ) { ?><li class="nav-item"><a class="nav-item" href="<?php echo doliconnecturl('doliaccount'); ?>" title="<?php _e('My account', 'ptibogxivtheme'); ?>"><i class="fas fa-user-circle fa-fw fa-2x"></i></a></li>
<?php } 
if ( function_exists('doliconnecturl') && doliconnectid('dolicart') > 0 ) { ?>
<li class="nav-item"><a class="nav-item" <? if ( function_exists('dolicart_modal') ) { ?> data-bs-toggle="offcanvas" href="#offcanvasDolicart" role="button" aria-controls="offcanvasDolicart" <? } else { ?> href="<?php echo doliconnecturl('dolicart'); ?>" <? } ?> title="<?php _e('Basket', 'ptibogxivtheme'); ?>"><span class="fa-layers fa-fw fa-2x"><i class="fas fa-shopping-bag"></i><span class="fa-layers-counter fa-lg" id="DoliHeaderCartItems" style="background:Tomato"><?php echo (!empty(doliconnector( null, 'fk_order_nb_item'))?doliconnector( null, 'fk_order_nb_item'):'0'); ?></span></span></a></li>
<?php } 
if ( ( empty(get_theme_mod( 'ptibogxivtheme_adminbar')) && current_user_can( 'edit_posts' )) || ( empty(get_theme_mod( 'ptibogxivtheme_adminbar')) && ( wp_get_current_user()->show_admin_bar_front != true)) ) { ?><li class="nav-item"><a class="nav-item" href="<?php echo admin_url('index.php'); ?>" title="Zone admin"><i class="fas fa-cogs fa-fw fa-2x"></i></a></li><?php } ?>
<?php if ( get_site_option('doliconnect_mode')=='one' && is_multisite() && is_multisite() ) { restore_current_blog(); } ?>
<li class="nav-item"><a class="nav-item" href="<?php echo wp_logout_url( get_permalink() ); ?>" title="<?php _e('Sign out', 'ptibogxivtheme'); ?>"><i class="fas fa-sign-out-alt fa-fw fa-2x"></i></a></li><?php } else {
if ( get_site_option('doliconnect_mode') =='one' && is_multisite() ) {
restore_current_blog();
}
if ( function_exists('doliconnect_modalform') && get_option('doliloginmodal') == '1' ) {      
?>
<li class="nav-item"><a class="nav-item btn btn-primary my-2 my-sm-0" href="#" id="login-<?php echo current_time('timestamp'); ?>" data-bs-toggle="modal" data-bs-target="#DoliconnectLogin" data-bs-dismiss="modal" title="<?php _e('Sign in', 'ptibogxivtheme'); ?>" role="button"><?php _e('Sign in', 'ptibogxivtheme'); ?></a></li>
<?php } else { ?>
<li class="nav-item"><a class="nav-item btn btn-primary my-2 my-sm-0" href="<?php echo wp_login_url( get_permalink() ); ?>" title="<?php _e('Sign in', 'ptibogxivtheme'); ?>"><?php _e('Sign in', 'ptibogxivtheme'); ?></a></li>
<?php
} } ?>    
<!--  //get_template_part('navbar-search'); --> 
</ul></div>
  </div>
</nav>
<?php if ( ! empty(get_theme_mod('ptibogxivtheme_carousel')) ) { ?>
<div class="bd-example">
<?php if ( get_theme_mod('ptibogxivtheme_carousel') != '2' && (is_home() || is_front_page()) ) {
$args = array( 
            'posts_per_page' => 5,
            'post_status'    => 'publish',
            'meta_key'       => '_thumbnail_id',
            'meta_value'     => ' ',
            'meta_compare'   => '!=',
            'meta_query' => array()
);
$myposts = get_posts( $args );

echo '<div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-interval="4000" data-ride="carousel"><ol class="carousel-indicators">';
$count=-1;
foreach ( $myposts as $post ) {
setup_postdata( $post );
$count = $count+1;
echo '<li data-target="#carouselExampleIndicators" data-slide-to="'.$count.'"';
if ($count=='0') {echo 'class="active"';}
echo '></li>'; 
}
echo '</ol>';
echo '<div class="carousel-inner">';
$count=0;
foreach ( $myposts as $post ) {

setup_postdata( $post );
$count = $count+1;
echo '<div class="carousel-item ';
if ( $count == '1' ) { echo 'active'; }
echo '" data-interval="5000" ><a href="'.get_permalink($post->ID).'" ><img class="d-block w-100 img-fluid" src="'.wp_get_attachment_image_url(get_post_thumbnail_id( $post ), 'ptibogxiv_large' ).'" alt="'.$post->post_title.'"></a>
  <div class="carousel-caption"  style="background-color: rgba(0, 0, 0, 0.5)">
    <h4><a href="'.get_permalink($post->ID).'" class="text-white">'.$post->post_title.'</a></h4>
    <small class="text-white"><i class="fas fa-calendar fa-fw"></i> '.__('Post on', 'ptibogxivtheme').' '.get_the_date( '', $post->ID).'</small>
  </div></div>'; 
}
wp_reset_postdata();    
echo '</div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>';

echo '</div>';
} elseif ( has_post_thumbnail() && get_theme_mod('ptibogxivtheme_carousel') >= '2' ) {
echo '<img class="d-block w-100 img-fluid" src="'.wp_get_attachment_image_url(get_post_thumbnail_id( $post ), 'ptibogxiv_large' ).'" alt="'.$post->post_title.'">';
}?>
</div>
<?php } ?>