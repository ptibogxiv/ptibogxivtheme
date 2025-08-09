<!DOCTYPE html> 
<html <?php language_attributes(); ?> class="no-js" data-bs-theme="light">
<head>
<?php
if ( is_single() ) {
    $desc = get_the_title();
} else {
    $desc = get_bloginfo('name') . ' - ' . get_bloginfo('description');
}
?>
<meta name="description" content="<?php echo esc_attr($desc); ?>" />
  <meta charset="utf-8">
  <meta name="theme-color" content="#<?php echo get_background_color(); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="language" content="French">
  <meta http-equiv="Cache-control" content="public">
  <link rel="icon" href="<?php echo get_site_icon_url(); ?>" type="image/x-icon">
  <link rel="shortcut icon" href="<?php echo get_site_icon_url(); ?>" type="image/x-icon">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php
if ( function_exists( 'wp_body_open' ) ) {
    wp_body_open();
} else {
    do_action( 'wp_body_open' );
}
?>
<nav class="navbar navbar-expand-lg sticky-top <?php echo (!empty(esc_attr(get_theme_mod( 'ptibogxivtheme_navbar_color' )))?esc_attr(get_theme_mod( 'ptibogxivtheme_navbar_color' )):'navbar-light bg-light'); ?>">
  <div class="<?php echo (!empty(esc_attr(get_theme_mod('ptibogxivtheme_container_type')))?esc_attr(get_theme_mod('ptibogxivtheme_container_type')):'container'); ?>">
    <?php if (get_theme_mod( 'ptibogxivtheme_brand_style') == 'home_mode' && (! empty(get_theme_mod( 'ptibogxivtheme_carousel')) || get_header_image())) { ?>
    <a class="navbar-brand" href="<?php echo esc_url( home_url('/') ); ?>"><div class='d-block d-sm-block d-xs-block d-md-none'><?php bloginfo('name'); ?></div><div class='d-none d-md-block'><i class='fas fa-home'></i></div></a> 
    <?php } elseif (get_theme_mod( 'ptibogxivtheme_brand_style') == 'dual_mode' && !get_header_image()) {
    $image_attributes = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full', false); 
    if ( $image_attributes ) : ?>
    <a class="navbar-brand" href="<?php echo esc_url( home_url('/') ); ?>"><img src="<?php echo esc_url($image_attributes[0]); ?>" height="30px" alt="<?php echo esc_attr(get_bloginfo('name')); ?>"/></a>
    <?php endif; ?>&nbsp;<a class="navbar-brand" href="<?php echo esc_url( home_url('/') ); ?>"><?php bloginfo('name'); ?></a> 
    <?php } elseif (get_theme_mod( 'ptibogxivtheme_brand_style') == 'logo_mode' && !get_header_image()) {
    $image_attributes = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full', false); 
    if ( $image_attributes ) : ?>
    <a class="navbar-brand" href="<?php echo esc_url( home_url('/') ); ?>"><img src="<?php echo esc_url($image_attributes[0]); ?>" height="30px" alt="<?php echo esc_attr(get_bloginfo('name')); ?>"/></a>
    <?php endif; ?>
    <?php } else {
    ?><a class="navbar-brand" href="<?php echo esc_url( home_url('/') ); ?>"><?php bloginfo('name'); ?></a><?php
    } ?>
    <?php if ( function_exists('dolikiosk') && ! empty(dolikiosk()) ) {
       $redirect_to=doliconnecturl('doliaccount');
    } elseif (is_front_page()) {
      $redirect_to=home_url();
    } else {
      $redirect_to=get_permalink();
    } ?>
    <button class="navbar-toggler" type="button" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <?php if ( !is_user_logged_in() ) { ?>
        <a class="nav-link" href="<?php echo wp_login_url( $redirect_to ); ?>" title="<?php _e('My account', 'ptibogxivtheme'); ?>"><i class="fa-solid fa-circle-user fa-fw fa-2x"></i></a>
      <?php } else { ?>
        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" title="<?php _e('My account', 'ptibogxivtheme'); ?>">
          <i class="fa-solid fa-circle-user fa-fw fa-2x"></i>
        </a>
        <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="<?php echo doliconnecturl('doliaccount'); ?>" title="<?php _e('My account', 'ptibogxivtheme'); ?>"><?php _e('My account', 'ptibogxivtheme'); ?></a></li>
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
      <?php } ?>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <?php
        wp_nav_menu( array(
          'theme_location'	=> 'navbar',
          'container'       => false,
          'menu_class'		  => '',
          'fallback_cb'		  => '__return_false',
          'items_wrap'		  => '<ul id="%1$s" class="navbar-nav me-auto mb-2 mb-lg-0 %2$s">%3$s</ul>',
          'depth'			      => 2,
          'walker'  	      => new ptibogxivtheme_walker_nav_menu()
        ) );
      ?>
      <form class="d-flex navbar-nav" role="search">
        <?php if ( !empty(get_option('doliconnectbeta')) ) { ?>
          <input class="form-control me-2" type="search" placeholder="<?php echo esc_attr__('Name, Ref., Description or Barcode', 'doliconnect'); ?>" aria-label="Search"/>
          <button class="btn btn-outline-success" type="submit">Search</button>
        <?php } ?>
        <?php if ( ( function_exists('doliModalButton') && function_exists('doliListLang') && !empty(doliListLang(array( 'raw' => 1 ))) ) && !(is_multisite() && !empty(get_theme_mod( 'ptibogxivtheme_networkbar_color'))) ) { ?>
          <a class="nav-item"><?php echo doliModalButton('doliSelectlang', 'doliSelectlangHeader', "<i class='fas fa-language fa-fw fa-2x'></i>", 'a' , 'nav-link', get_the_ID(), $_SERVER["QUERY_STRING"]); ?></a>
        <?php } ?>
        <?php if ( function_exists('doliconnecturl') && doliconnectid('dolicart') > 0 ) { ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" title="<?php _e('Cart', 'doliconnect'); ?>">
              <span class="fa-layers fa-fw fa-2x"><i class="fas fa-shopping-bag"></i><span class="fa-layers-counter bg-danger" id="DoliHeaderCartItems"><?php echo doliconnect_countitems(doliConnect('order', wp_get_current_user())); ?></span></span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <?php $lines = doliConnect('order', wp_get_current_user())->lines; ?>
              <?php foreach ($lines as $line) { ?>
                <li><a class="dropdown-item" href="#"><?php echo doliproduct($line, 'product_label'); ?> x<?php echo $line->qty; ?></a></li>
              <?php } ?>
              <li><hr class="dropdown-divider"></li>
              <li>
                <a class="dropdown-item" href="<?php echo esc_url(doliconnecturl('dolicart')); ?>" title="<?php _e( 'Finalize the order', 'doliconnect'); ?>"><?php _e( 'Finalize the order', 'doliconnect'); ?></a>
              </li>
            </ul>
          </li>
        <?php } ?>
        <li class="nav-item">
          <?php if ( !is_user_logged_in() ) { ?>
            <a class="nav-link border border-0" href="<?php echo wp_login_url( $redirect_to ); ?>" title="<?php _e('My account', 'ptibogxivtheme'); ?>"><i class="fa-solid fa-circle-user fa-fw fa-2x"></i></a>
          <?php } else { ?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle border border-0" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" title="<?php _e('My account', 'ptibogxivtheme'); ?>">
                <i class="fa-solid fa-circle-user fa-2x"></i>
              </a>
              <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="<?php echo doliconnecturl('doliaccount'); ?>" title="<?php _e('My account', 'ptibogxivtheme'); ?>"><?php _e('My account', 'ptibogxivtheme'); ?></a></li>
                  <?php if ( !isset(doliConnect('user', wp_get_current_user())->error) && doliConnect('user', wp_get_current_user()) != null ) { ?>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="<?php echo get_site_option('dolibarr_public_url'); ?>/?entity=<?php echo dolibarr_entity(); ?>&username=<?php echo wp_get_current_user()->user_email; ?>" rel="noopener" title="<?php _e('Dolibarr', 'ptibogxivtheme'); ?>" target="_dolibarr"><i class="fas fa-cogs fa-fw"></i> <?php _e('Dolibarr', 'ptibogxivtheme'); ?></a></li>
                  <?php } ?>
                  <?php if ( ( empty(get_theme_mod( 'ptibogxivtheme_adminbar')) && current_user_can( 'edit_posts' )) || ( empty(get_theme_mod( 'ptibogxivtheme_adminbar')) && ( wp_get_current_user()->show_admin_bar_front != true)) ) { ?>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="<?php echo admin_url('index.php'); ?>" title="<?php _e('Administration', 'ptibogxivtheme'); ?>"><i class="fas fa-cogs fa-fw"></i> <?php _e('Administration', 'ptibogxivtheme'); ?></a></li>
                  <?php } ?>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="<?php echo wp_logout_url( $redirect_to ); ?>" title="<?php _e('Logout', 'ptibogxivtheme'); ?>"><?php _e('Logout', 'ptibogxivtheme'); ?></a></li>
              </ul>
            </li>
            <?php } ?>
        </li>
      </form>
    </div>
  </div>
</nav>