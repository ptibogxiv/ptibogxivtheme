<!DOCTYPE html>
<html class="no-js">
<html lang="fr">
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
  <link rel="icon" href="<?php echo get_site_icon_url(); ?>" type="image/x-icon" />
  <link rel="shortcut icon" href="<?php echo get_site_icon_url(); ?>" type="image/x-icon" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
</head>

<body <?php body_class();?>><?php if (is_multisite() && get_site_option('ptibogxivtheme_networkbar')=='1') { ?>
<div class="text-dark bg-<?php echo "dark"; //echo esc_attr(get_theme_mod( 'ptibogxivtheme_networkbar_color' )); ?>">
<div class="<?php echo esc_attr(get_theme_mod('ptibogxivtheme_container_type')); ?> d-none d-md-block"><ul class="nav nav-pills">
<li class="nav-item"><small> <?php   
echo '<div class="nav-link text-white disabled"><i class="fas fa-globe fa-fw"></i>';
echo esc_attr( get_network()->site_name ); 
?></div></small></li><?php
$defaults = array(
//'site__in'=>(1),
'public'=>'1'
	);
$subsites = get_sites($defaults);
foreach( $subsites as $subsite ) {
  $subsite_id = get_object_vars($subsite)["blog_id"];
  $subsite_name = get_blog_details($subsite_id)->blogname;
  $subsite_url = get_blog_details($subsite_id)->siteurl; ?>
<li class="nav-item"><small><a class="nav-link text-white <?php if (get_current_blog_id()==$subsite_id){ echo "active"; } ?>" href="<?php echo $subsite_url; ?>"><?php echo $subsite_name; ?></a></small></li>
<?php } ?>
</ul>
</div>
</div><?php } ?>
<?php if (get_header_image()){ ?> 
<img class="d-block w-100 img-fluid" src="<?php header_image(); ?>" alt="banner logo">
<?php } ?>
<nav class="navbar sticky-top navbar-expand-md <?php echo esc_attr(get_theme_mod( 'ptibogxivtheme_navbar_color' )); ?>"> 
<div class="<?php echo esc_attr(get_theme_mod('ptibogxivtheme_container_type')); ?>"><?php
  if (get_theme_mod( 'ptibogxivtheme_brand_style') == 'home_mode') {
?><a class="navbar-brand" href="<?php echo esc_url( home_url('/') ); ?>"><span class="fas fa-home fa-fw fa-1x"></span></a> 
<?php } 
elseif (get_theme_mod( 'ptibogxivtheme_brand_style') == 'dual_mode') {
the_custom_logo(); ?>&nbsp;<a class="navbar-brand" href="<?php echo esc_url( home_url('/') ); ?>"><?php bloginfo('name'); ?></a> 
<?php }
elseif (get_theme_mod( 'ptibogxivtheme_brand_style') == 'logo_mode') {
the_custom_logo(); ?>
<?php } else {
?><a class="navbar-brand" href="<?php echo esc_url( home_url('/') ); ?>"><?php bloginfo('name'); ?></a><?php
} ?>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
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
if ( function_exists('pll_the_languages') ) {       
?><a href="#" data-toggle="modal" data-target="#SelectLang" data-dismiss="modal" title="<?php _e('Choose language', 'ptibogxivtheme'); ?>"><i class='fas fa-language fa-fw fa-2x'></i></a>&nbsp;<?php
}
if ( function_exists('doliconnecturl') ) { 
if ( get_site_option('doliconnect_mode') == 'one' && is_multisite() ) {
switch_to_blog(1);
}  
if ( is_user_logged_in() ) { ?><a href="<?php echo doliconnecturl('doliaccount'); ?>" title="<?php _e('My account', 'ptibogxivtheme'); ?>"><i class="fas fa-user-circle fa-fw fa-2x"></i></a>&nbsp;
<?php
if ( function_exists('dolicart_shortcode') ) { 
?>
<a href="<?php echo doliconnecturl('dolicart'); ?>" title="<?php _e('Basket', 'ptibogxivtheme'); ?>"><span class="fa-layers fa-fw fa-2x">
<i class="fas fa-shopping-bag"></i><span class="fa-layers-counter fa-lg" style="background:Tomato"><?php echo doliconnector( null, 'fk_order_nb_item'); ?></span></span></a>&nbsp;  
<?php
} 
if ( get_site_option('doliconnect_mode')=='one' && is_multisite() && is_multisite() ) {
restore_current_blog();
}
if ( current_user_can( 'edit_posts' ) || ( null !== get_theme_mod( 'ptibogxivtheme_adminbar') && ( wp_get_current_user()->show_admin_bar_front != true)) ) { ?><a href="<?php echo admin_url('index.php'); ?>" title="Zone admin"><i class="fas fa-cogs fa-fw fa-2x"></i></a>&nbsp;<?php } ?><a href="<?php echo wp_logout_url( get_permalink() ); ?>" title="<?php _e('Logout', 'ptibogxivtheme'); ?>"><i class="fas fa-sign-out-alt fa-fw fa-2x"></i></a> 
<?php } else {
if ( get_site_option('doliconnect_mode') =='one' && is_multisite() ) {
restore_current_blog();
} 
if ( (!is_multisite() && get_option( 'users_can_register' )) or (get_option('users_can_register')=='1' && (get_site_option( 'registration' ) == 'user' or get_site_option( 'registration' ) == 'all')) ) 
{     
?>
<a href="<?php echo wp_registration_url(get_permalink()); ?>" id="signup" title="<?php _e('Sign up', 'ptibogxivtheme'); ?>" class="btn btn-primary my-2 my-sm-0" role="button"><?php _e('Sign up', 'ptibogxivtheme'); ?></a>&nbsp;
<?php }
if ( function_exists('doliconnect_modal') && get_option('doliloginmodal') == '1' ) {      
?>
<a href="#" id="login-<?php echo current_time('timestamp'); ?>" data-toggle="modal" data-target="#DoliconnectLogin" data-dismiss="modal" title="<?php _e('Sign in', 'ptibogxivtheme'); ?>" class="btn btn-primary my-2 my-sm-0" role="button"><?php _e('Sign in', 'ptibogxivtheme'); ?></a>
<?php } else {?>
<a href="<?php echo wp_login_url( get_permalink() ); ?>?redirect_to=<?php echo get_permalink(); ?>" class="btn btn-primary my-2 my-sm-0" title="<?php _e('Sign in', 'ptibogxivtheme'); ?>"><?php _e('Sign in', 'ptibogxivtheme'); ?></a>
<?php
  } 
}
} ?>      
<!-- <?php //get_template_part('navbar-search'); ?> --> 
  </div>
  </div>
</nav>