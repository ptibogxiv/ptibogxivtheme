<footer class="bg-dark text-white">
<div class="container">
<br>
<div class="row">
<div class="col-6 col-md-3">
<?php if (! is_active_sidebar('payment-footer-widget-area') && function_exists('callDoliApi') && !empty(doliconnectid('dolicart'))) { ?>
<strong><?php _e('Payment modes', 'ptibogxivtheme'); ?></strong><div class="text-center">
<?php
$request = "/doliconnector/0/paymentmethods";
$listpaymentmethods = callDoliApi("GET", $request, null, dolidelay('paymentmethods', esc_attr(isset($_GET["refresh"]) ? $_GET["refresh"] : null)));
?>
<?php if ( isset($listpaymentmethods->stripe) && in_array('card', $listpaymentmethods->stripe->types) ) { ?><i class="fab fa-cc-visa fa-3x fa-fw"></i><i class="fab fa-cc-mastercard fa-3x fa-fw"></i><i class="fab fa-cc-amex fa-3x fa-fw"></i><?php } ?>
<?php if ( isset($listpaymentmethods->stripe) && in_array('payment_request_api', $listpaymentmethods->stripe->types) ) { ?><i class="fab fa-cc-apple-pay fa-3x fa-fw"></i><?php } ?>
<?php if ( isset($listpaymentmethods->stripe) && in_array('sepa_debit', $listpaymentmethods->stripe->types) ) { ?><i class="fas fa-university fa-3x fa-fw"></i><?php } ?>
<?php if ( isset($listpaymentmethods->stripe) && in_array('ideal', $listpaymentmethods->stripe->types) ) { ?><i class="fab fa-ideal fa-3x fa-fw"></i><?php } ?>
<?php if ( isset($listpaymentmethods->VIR) ) { ?><i class="fas fa-university fa-3x fa-fw"></i><?php } ?>
<?php if ( isset($listpaymentmethods->CHQ) ) { ?><i class="fas fa-money-check fa-3x fa-fw"></i><?php } ?>
<?php if ( ! empty(dolikiosk()) ) { ?> <i class="fas fa-money-bill-alt fa-3x fa-fw"></i><?php } ?>
</div>
<?php } else { 
dynamic_sidebar('payment-footer-widget-area'); } ?>
<br></div><div class="col-6 col-md-3">
<?php if (! is_active_sidebar('social-footer-widget-area') && function_exists('callDoliApi')) {
$company = callDoliApi("GET", "/setup/company", null, dolidelay('constante', esc_attr(isset($_GET["refresh"]) ? $_GET["refresh"] : null)));
?><strong><?php _e('Social networks', 'ptibogxivtheme'); ?><br></strong>
<?php if ( !isset( $company->socialnetworks->error ) && $company->socialnetworks != null ) { foreach ($company->socialnetworks as $social => $url) { ?>
<a href="<?php esc_url($url); ?>" rel="noopener" class="btn btn-<?php echo $social; ?> btn-circle btn-lg" target="_blank"><i class="fab fa-<?php echo $social; ?> fa-fw"></i></a>   
<?php } } ?>
<?php } else { 
    dynamic_sidebar('social-footer-widget-area'); 
}?>
</div><div class="col-12 col-md-6"><div class="row"><div class="col-6">
<?php if (! is_active_sidebar('address-footer-widget-area') && function_exists('callDoliApi') && function_exists('doliCompanyCard')) {
$company = callDoliApi("GET", "/setup/company", null, dolidelay('constante', esc_attr(isset($_GET["refresh"]) ? $_GET["refresh"] : null)));
?><strong><?php bloginfo('blogname'); ?></strong>
<br><?php echo doliCompanyCard($company); ?>
<?php } else { 
    dynamic_sidebar('address-footer-widget-area'); 
}?>
</div><div class="col-6"><strong><?php _e('Resources', 'ptibogxivtheme'); ?></strong>
<?php if ((current_user_can( 'administrator' ) or current_user_can( 'editor' )) && defined('PTIBOGXIV_NET_WEBMAIL')) { ?><br><a href="<?php echo constant('PTIBOGXIV_NET_WEBMAIL'); ?>" rel="noopener" class="text-reset" target="_webmail">Webmail</a><?php } ?>
<?php if ((current_user_can( 'administrator' ) or current_user_can( 'editor' )) && defined('PTIBOGXIV_NET_CLOUD')) { ?><br><a href="<?php echo constant('PTIBOGXIV_NET_CLOUD'); ?>" rel="noopener" class="text-reset" target="_cloud">Serveur/Cloud</a><?php } ?>
<?php if (!empty(doliconnectid('dolitos'))) { ?><br><a href="<?php echo doliconnecturl('dolitos'); ?>" class="text-reset"><?php _e('Terms of service', 'ptibogxivtheme'); ?></a><?php } ?>
</div></div></div><div class="col-6">
</div><div class="col-6"><div class="text-right" id="dolikiosk" style="display: none"><?php _e('Kiosk mode ON', 'ptibogxivtheme'); ?> <i class="fas fa-desktop"></i></div>
<?php 
if (function_exists('dolikiosk') && ! empty(dolikiosk()) ) {
echo "<script>";
?>
var kioskip = '<?php echo $_SERVER['REMOTE_ADDR']; ?>';
var ipkiosk = ['<?php echo implode("','",get_option('doliconnect_ipkiosk')); ?>'];
var akiosk = ipkiosk.indexOf(kioskip);
if (akiosk >= 0) {
document.getElementById("dolikiosk").style.display = "block";
}
<?php
echo "</script>";
}
?>     
</div></div><br>
<div class="row">
<div class="col"><p class="text-center"><small><i class="fas fa-copyright"></i> <?php echo date('Y'); ?> <?php echo get_bloginfo('name'); ?> - <?php _e('All rights reserved', 'ptibogxivtheme'); ?><?php if (function_exists('doliModalButton')) { ?> - <?php echo doliModalButton('legacy', 'legacyfooter', __('Legal notice', 'ptibogxivtheme'), 'a' , 'text-reset'); } ?>

<br><small><?php 
  if ( function_exists('dolikiosk') && ! empty(dolikiosk()) ) {
    $redirect_to=doliconnecturl('doliaccount');
  } elseif (is_front_page()) {
    $redirect_to=home_url();
  } else {
    $redirect_to=get_permalink();
  }
if ( defined('PTIBOGXIV_NET') ) {
echo sprintf( __('Designed with <i class="fas fa-heart text-danger"></i> by <b>%s</b> and hosted with <i class="fas fa-leaf text-success"></i> by <b>%s</b>', 'ptibogxivtheme'), "<a href='https://www.ptibogxiv.eu' rel='noopener' class='text-reset'>ptibogxiv.eu</a>", "<a href='https://www.infomaniak.com/goto/fr/home?utm_term=5de6793fdf41b' class='text-reset'>Infomaniak</a>");
} else {
echo sprintf( __('Designed with <i class="fas fa-heart text-danger"></i> by <b>%s</b>', 'ptibogxivtheme'), "<a href='https://www.ptibogxiv.eu' rel='noopener' class='text-reset'>ptibogxiv.eu</a>");
} ?></small></small></p></div>
</div></div>
<nav class="bg-body-tertiary fixed-bottom pb-4 d-block d-md-none">
  <div class="container-fluid">
    <div class="btn-group d-flex p-2" role="group" aria-label="Bottom menu">
      <button class="btn btn-light w-100" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDoliNavbarBottom" aria-controls="offcanvasDoliNavbarBottom" aria-label="Togglemenu">
        <i class="fa-solid fa-bars fa-2x fa-fw"></i>
      </button>
      <a href="<?php echo esc_url( home_url('/') ); ?>" class="btn btn-light w-100" ><i class='fas fa-home fa-2x fa-fw'></i></a> 
      <?php if ( function_exists('doliconnecturl') && doliconnectid('dolicart') > 0 ) { ?>
        <?php if (is_page(doliconnectid('dolicart'))) { ?>
          <a href="<?php echo doliconnecturl('dolicart'); ?>" class="btn btn-light w-100" ><span class="fa-layers fa-2x fa-fw"><i class="fas fa-shopping-bag"></i><span class="fa-layers-counter" id="DoliFooterCartItems" style="background:Tomato"><?php echo doliconnect_countitems(doliConnect('order', wp_get_current_user())); ?></span></span></a> 
          <?php } else { ?>
          <button class="btn btn-light w-100" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDoliCartLabel" aria-controls="offcanvasDoliCartLabel" aria-label="<?php _e('My account', 'ptibogxivtheme'); ?>"><span class="fa-layers fa-2x fa-fw"><i class="fas fa-shopping-bag"></i><span class="fa-layers-counter" id="DoliFooterCartItems" style="background:Tomato"><?php echo doliconnect_countitems(doliConnect('order', wp_get_current_user())); ?></span></span></button>
        <?php } ?>
      <?php } ?>
    </div>
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasDoliNavbarBottom" aria-labelledby="offcanvasDoliNavbarBottomLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasDoliNavbarBottomLabel"><?php _e('Menu', 'ptibogxivtheme'); ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
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
      </div>
    </div>
  </div>
</nav>
<?php if (!is_page(doliconnectid('dolicart'))) { ?>
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasDoliCartLabel" aria-labelledby="offcanvasDoliCartLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasDoliCartLabel"><?php _e('Cart', 'ptibogxivtheme'); ?></h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <?php
      echo doliline(doliConnect('order', wp_get_current_user()), esc_attr(isset($_GET["refresh"]) ? $_GET["refresh"] : null), false);
    ?>
  </div>
  <div class="offcanvas-footer m-3">
    <button type="button" class="btn btn-primary w-100" onclick="window.location.href='<?php echo esc_url(doliconnecturl('dolicart')); ?>'">
        <?php _e('Finaliser la commande', 'ptibogxivtheme'); ?>
    </button>
  </div>
</div>
<?php } ?>
</footer>
<?php wp_footer(); ?>
</body>
</html>