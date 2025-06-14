<!DOCTYPE html> 
<html <?php language_attributes(); ?> class="no-js" data-bs-theme="light">
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
?>

<nav class="navbar navbar-expand-lg sticky-top <?php echo esc_attr(get_theme_mod( 'ptibogxivtheme_navbar_color' )); ?>">
  <div class="<?php echo esc_attr(get_theme_mod('ptibogxivtheme_container_type')); ?>">
    <?php if (get_theme_mod( 'ptibogxivtheme_brand_style') == 'home_mode' && (! empty(get_theme_mod( 'ptibogxivtheme_carousel')) || get_header_image())) { ?>
    <a class="navbar-brand" href="<?php echo esc_url( home_url('/') ); ?>"><div class='d-block d-sm-block d-xs-block d-md-none'><?php bloginfo('name'); ?></div><div class='d-none d-md-block'><i class='fas fa-home'></i></div></a> 
    <?php } elseif (get_theme_mod( 'ptibogxivtheme_brand_style') == 'dual_mode' && !get_header_image()) {
    $image_attributes = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full', false); 
    if ( $image_attributes ) : ?>
    <a class="navbar-brand" href="<?php echo esc_url( home_url('/') ); ?>"><img src="<?php echo $image_attributes[0]; ?>" height="30px" alt="<?php bloginfo('name'); ?>"/></a>
    <?php endif; ?>&nbsp;<a class="navbar-brand" href="<?php echo esc_url( home_url('/') ); ?>"><?php bloginfo('name'); ?></a> 
    <?php } elseif (get_theme_mod( 'ptibogxivtheme_brand_style') == 'logo_mode' && !get_header_image()) {
    $image_attributes = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full', false); 
    if ( $image_attributes ) : ?>
    <a class="navbar-brand" href="<?php echo esc_url( home_url('/') ); ?>"><img src="<?php echo $image_attributes[0]; ?>" height="30px" alt="<?php bloginfo('name'); ?>"/></a>
    <?php endif; ?>
    <?php } else {
    ?><a class="navbar-brand" href="<?php echo esc_url( home_url('/') ); ?>"><?php bloginfo('name'); ?></a><?php
    } ?>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel"><?php _e('Menu', 'ptibogxivtheme'); ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body <?php echo esc_attr(get_theme_mod( 'ptibogxivtheme_navbar_color' )); ?>">
        <?php
          wp_nav_menu( array(
            'theme_location'	=> 'navbar',
            'container'       => false,
            'menu_class'		  => '',
            'fallback_cb'		  => '__return_false',
            'items_wrap'		  => '<ul id="%1$s" class="navbar-nav flex-grow-1 pe-3 %2$s">%3$s</ul>',
            'depth'			      => 2,
            'walker'  	      => new ptibogxivtheme_walker_nav_menu()
          ) );
        ?>
<ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
<?php if ( get_site_option('doliconnect_mode') == 'one' && is_multisite() ) {
  switch_to_blog(1);
} 
if ( function_exists('dolikiosk') && ! empty(dolikiosk()) ) {
  $redirect_to=doliconnecturl('doliaccount');
} elseif (is_front_page()) {
  $redirect_to=home_url();
} else {
  $redirect_to=get_permalink();
} ?>
<?php if ( ( function_exists('doliModalButton') && function_exists('doliListLang') && !empty(doliListLang(array( 'raw' => 1 ))) ) && !(is_multisite() && !empty(get_theme_mod( 'ptibogxivtheme_networkbar_color'))) ) { ?>
<li class="nav-item"><?php echo doliModalButton('doliSelectlang', 'doliSelectlangHeader', "<i class='fas fa-language fa'></i>", 'a' , 'nav-link', get_the_ID(), $_SERVER["QUERY_STRING"]); ?></li>
<?php } ?>
<?php if ( is_user_logged_in() ) { 
if ( function_exists('doliconnecturl') && doliconnectid('dolicart') > 0 ) { ?>
        <?php } ?>
        <? if ( function_exists('doliconnecturl') && doliconnectid('doliaccount') > 0 ) { ?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" title="<?php _e('My account', 'ptibogxivtheme'); ?>">
            <i class="fa-solid fa-circle-user fa-2x"></i>
          </a>
          <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="<?php echo doliconnecturl('doliaccount'); ?>" title="<?php _e('My account', 'ptibogxivtheme'); ?>"><?php _e('My account', 'ptibogxivtheme'); ?>
            </a></li>
            <?php if ( !isset(doliConnect('user', wp_get_current_user())->error) && doliConnect('user', wp_get_current_user()) != null ) { ?>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="<?php echo get_site_option('dolibarr_public_url'); ?>/?entity=<?php echo dolibarr_entity(); ?>&username=<?php echo wp_get_current_user()->user_email; ?>" rel="noopener" title="<?php _e('Dolibarr', 'ptibogxivtheme'); ?>" target="_dolibarr"><i class="fas fa-cogs fa-fw"></i> <?php _e('Dolibarr', 'ptibogxivtheme'); ?></a></li>
            <?php } ?>
            <?php if ( ( empty(get_theme_mod( 'ptibogxivtheme_adminbar')) && current_user_can( 'edit_posts' )) || ( empty(get_theme_mod( 'ptibogxivtheme_adminbar')) && ( wp_get_current_user()->show_admin_bar_front != true)) ) { ?>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="<?php echo admin_url('index.php'); ?>" title="<?php _e('Administration', 'ptibogxivtheme'); ?>"><i class="fas fa-cogs fa-fw"></i> <?php _e('Administration', 'ptibogxivtheme'); ?></a></li>
            <?php } ?>
            <li><hr class="dropdown-divider"></li>
            <li>
              <a class="dropdown-item" href="<?php echo wp_logout_url( $redirect_to ); ?>" title="<?php _e('Sign out', 'ptibogxivtheme'); ?>"><i class="fas fa-sign-out-alt fa-fw"></i> <?php _e('Sign out', 'ptibogxivtheme'); ?></a>
            </li>
          </ul>
        </li>
        <?php } ?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" title="<?php _e('Cart', 'doliconnect'); ?>">
          <span class="fa-layers fa-2x"><i class="fas fa-shopping-bag"></i><span class="fa-layers-counter bg-danger" id="DoliHeaderCartItems"><? echo doliconnect_countitems(doliConnect('order', wp_get_current_user())); ?></span></span>
          </a>
          <ul class="dropdown-menu dropdown-menu-end">
          <?php
          $lines = doliConnect('order', wp_get_current_user())->lines; ?>
          <?php foreach ($lines as $line) { ?>
            <li><a class="dropdown-item" href="#"><?php echo doliproduct($line, 'product_label'); ?> x<?php echo $line->qty; ?></a></li>
          <?php } ?>
            <li><hr class="dropdown-divider"></li>
            <li>
              <a class="dropdown-item" href="<?php echo esc_url(doliconnecturl('dolicart')); ?>" title="<?php _e( 'Finalize the order', 'doliconnect'); ?>"><?php _e( 'Finalize the order', 'doliconnect'); ?></a>
            </li>
          </ul>
        </li>
<?php if ( get_site_option('doliconnect_mode')=='one' && is_multisite() && is_multisite() ) { restore_current_blog(); } ?>
<?php } else {
if ( get_site_option('doliconnect_mode') =='one' && is_multisite() ) {
restore_current_blog();
} ?>
<li class="nav-item"><a class="nav-link btn btn-primary my-2 my-sm-0" href="<?php echo wp_login_url( $redirect_to ); ?>" title="<?php _e('Sign in', 'ptibogxivtheme'); ?>"><?php _e('Sign in', 'ptibogxivtheme'); ?></a></li>
<?php
} ?>
</ul>
      </div>
    </div>
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