<!DOCTYPE html>
<HTML class="no-js">
<HEAD>
<TITLE><?php wp_title('•', true, 'right'); bloginfo('name'); ?></TITLE>
<META name="description" content="<?php if ( is_single() ) {
single_post_title('', true); 
} else {
bloginfo('name'); echo " - "; bloginfo('description');
}
?>" />
  <META charset="utf-8">
  <META name="theme-color" content="#<? echo get_background_color(); ?>">
	<META http-equiv="X-UA-Compatible" content="IE=edge">
  <LINK rel="icon" href="<?php echo get_site_icon_url(); ?>" type="image/x-icon" />
  <LINK rel="shortcut icon" href="<?php echo get_site_icon_url(); ?>" type="image/x-icon" />
 
  <META name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
</HEAD>

<BODY <?php body_class();?>><?php if (is_multisite() && get_current_blog_id()=='1') { ?>
<DIV class="bg-dark">
<DIV class="container d-none d-md-block"><ul class="nav nav-pills">
<li class="nav-item"><a class="nav-link disabled" href="#"><i class="fas fa-globe fa-fw"></i> <?php _e('Our websites', 'ptibogxivtheme'); ?></a></li><?php
$defaults = array(
//'site__not_in'=>get_current_blog_id(),
'public'=>'1'
	);
$subsites = get_sites($defaults);
foreach( $subsites as $subsite ) {
  $subsite_id = get_object_vars($subsite)["blog_id"];
  $subsite_name = get_blog_details($subsite_id)->blogname;
  $subsite_url = get_blog_details($subsite_id)->siteurl; ?>
<li class="nav-item"><a class="nav-link <?php if (get_current_blog_id()==$subsite_id){ echo "active"; } ?>" href="<?php echo $subsite_url; ?>"><?php echo $subsite_name; ?></a></li>
<?php } ?>
</ul>
</DIV>
</DIV><?php } ?>
<?php if (get_header_image()){ ?> 
<IMG class="d-block w-100 img-fluid" src="<?php header_image(); ?>" alt="banner logo">
<?php } ?>
<NAV class="navbar sticky-top navbar-expand-md <?php echo esc_attr(get_theme_mod( 'ptibogxivtheme_navbar_color' )); ?>"> 
  <DIV class="container"><?php
  if (get_theme_mod( 'ptibogxivtheme_brand_style') == 'home_mode') {
?><A class="navbar-brand" href="<?php echo esc_url( home_url('/') ); ?>"><SPAN class="fas fa-home fa-fw fa-1x"></SPAN></A> 
<?php } 
elseif (get_theme_mod( 'ptibogxivtheme_brand_style') == 'dual_mode') {
the_custom_logo(); ?> <A class="navbar-brand" href="<?php echo esc_url( home_url('/') ); ?>"><?php bloginfo('name'); ?></A> 
<?php }
elseif (get_theme_mod( 'ptibogxivtheme_brand_style') == 'logo_mode') {
the_custom_logo(); ?>
<?php } else {
?><A class="navbar-brand" href="<?php echo esc_url( home_url('/') ); ?>"><?php bloginfo('name'); ?></A><?php
} ?>
  <BUTTON class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <SPAN class="navbar-toggler-icon"></SPAN>
  </BUTTON>

  <DIV class="collapse navbar-collapse" id="navbarNavDropdown">
    <?php
      wp_nav_menu( array(
        'theme_location'	=> 'navbar',
        'container'       => false,
        'menu_class'		  => '',
        'fallback_cb'		  => '__return_false',
      	'items_wrap'		  => '<UL id="%1$s" class="navbar-nav mr-auto mt-2 mt-lg-0 %2$s">%3$s</UL>',
        'depth'			      => 2,
	      'walker'  	      => new ptibogxivtheme_walker_nav_menu()
      ) );
if (function_exists('pll_the_languages')) {       
?><A href="#" data-toggle="modal" data-target="#SelectLang" data-dismiss="modal" title="<?php _e('Choose language', 'ptibogxivtheme'); ?>"><I class='fas fa-language fa-fw fa-2x'></I></A>&nbsp;|&nbsp;<?php
}
if (function_exists('doliconnecturl')) { 
if (get_site_option('doliconnect_mode')=='one') {
switch_to_blog(1);
}  
if ( is_user_logged_in() ) { ?><A href="<?php echo doliconnecturl('doliaccount'); ?>" title="<?php _e('My account', 'ptibogxivtheme'); ?>"><I class="fas fa-user-circle fa-fw fa-2x"></I></A>&nbsp;<A href="<?php echo doliconnecturl('dolicart'); ?>" title="<?php _e('Basket', 'ptibogxivtheme'); ?>"><SPAN class="fa-layers fa-fw fa-2x">
<I class="fas fa-shopping-basket"></I>
<?php if (basket_count()>0) { ?><SPAN class="fa-layers-counter fa-lg" style="background:Tomato"><?php echo basket_count(); ?></SPAN></SPAN><?php } ?></A>&nbsp;  
<?php 
if (get_site_option('doliconnect_mode')=='one') {
restore_current_blog();
}
if (current_user_can( 'edit_posts' ) &&  !get_theme_mod( 'ptibogxivtheme_adminbar') ) { ?><A href="<?php echo admin_url(); ?>" title="Zone admin"><I class="fas fa-cogs fa-fw fa-2x"></I></A>&nbsp;<?php } ?><A href="<?php echo wp_logout_url( get_permalink() ); ?>" title="<?php _e('Logout', 'ptibogxivtheme'); ?>"><I class="fas fa-sign-out-alt fa-fw fa-2x"></I></A> 
<?php } else {
if (get_site_option('doliconnect_mode')=='one') {
restore_current_blog();
} 
if (get_option('doliloginmodal')=='1') {       
?><A href="#" data-toggle="modal" data-target="#DoliconnectLogin" data-dismiss="modal" title="<?php _e('Login', 'ptibogxivtheme'); ?>"><?php _e('Login', 'ptibogxivtheme'); ?></A><?php //<I class="fas fa-sign-in-alt fa-fw fa-2x"></I>
} else {?>
<A href="<?php echo wp_login_url( get_permalink() ); ?>?redirect_to=<?php echo get_permalink(); ?>" title="<?php _e('Login', 'ptibogxivtheme'); ?>"><?php _e('Login', 'ptibogxivtheme'); ?></A>
<?php  } 
if (((!is_multisite() && get_option( 'users_can_register' )) or (get_option('users_can_register')=='1' && (get_site_option( 'registration' ) == 'user' or get_site_option( 'registration' ) == 'all')))) 
{ ?>&nbsp;|&nbsp;<A href="<?php echo wp_registration_url(get_permalink()); ?>" title="<?php _e('Signup', 'ptibogxivtheme'); ?>"><?php _e('Signup', 'ptibogxivtheme'); ?></A>
<?php } //<i class="fas fa-sign-in-alt fa-fw"></I>
} 
}     ?>      
<!--  <?php get_template_part('navbar-search'); ?> -->
  </DIV>
  </DIV>
</NAV>
