<footer class="bg-dark text-white">
<div class="container">
<br>
<div class="row">
<div class="col-6 col-md-3">
<?php if (! is_active_sidebar('payment-footer-widget-area') && function_exists('callDoliApi') && !empty(doliconnectid('dolicart'))) { ?>
<strong><?php _e('Payment modes', 'ptibogxivtheme'); ?></strong><center>
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
</center>
<?php } else { 
dynamic_sidebar('payment-footer-widget-area'); } ?>
<br></div><div class="col-6 col-md-3">
<?php if (! is_active_sidebar('social-footer-widget-area') && function_exists('callDoliApi')) {
$company = callDoliApi("GET", "/setup/company", null, dolidelay('constante', esc_attr(isset($_GET["refresh"]) ? $_GET["refresh"] : null)));
?><strong><?php _e('Social networks', 'ptibogxivtheme'); ?><br></strong>
<?php if ( !isset( $company->socialnetworks->error ) && $company->socialnetworks != null ) { foreach ($company->socialnetworks as $social => $url) { ?>
<a href="<?php echo $url; ?>" rel="noopener" class="btn btn-<?php echo $social; ?> btn-circle btn-lg" target="_blank"><i class="fab fa-<?php echo $social; ?> fa-fw"></i></a>   
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
<?php if (get_site_option('dolibarr_public_url') && (current_user_can( 'administrator' ) or current_user_can( 'editor' ))) { ?><br><a href="<?php echo get_site_option('dolibarr_public_url'); ?>/?entity=<?php echo dolibarr_entity(); ?>&username=<?php echo wp_get_current_user()->user_email; ?>" rel="noopener" class="text-reset" target="_dolibarr">Dolibarr</a><?php } ?>
<?php if ((current_user_can( 'administrator' ) or current_user_can( 'editor' )) && defined('PTIBOGXIV_NET_WEBMAIL')) { ?><br><a href="<?php echo constant('PTIBOGXIV_NET_WEBMAIL'); ?>" rel="noopener" class="text-reset" target="_webmail">Webmail</a><?php } ?>
<?php if ((current_user_can( 'administrator' ) or current_user_can( 'editor' )) && defined('PTIBOGXIV_NET_CLOUD')) { ?><br><a href="<?php echo constant('PTIBOGXIV_NET_CLOUD'); ?>" rel="noopener" class="text-reset" target="_cloud">Serveur/Cloud</a><?php } ?>
<?php if (function_exists('doliModalButton')) { ?><br><?php echo doliModalButton('legacy', 'legacyfooter', __('Legal notice', 'ptibogxivtheme'), 'a' , 'text-reset'); } ?>
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
<div class="col"><p class="text-center"><small><i class="fas fa-copyright"></i> <?php echo date('Y'); ?> <?php echo bloginfo('name'); ?> - <?php _e('All rights reserved', 'ptibogxivtheme'); ?><br><small><?php 
if ( defined('PTIBOGXIV_NET') ) {
echo sprintf( __('Designed with <i class="fas fa-heart text-danger"></i> by <b>%s</b> and hosted with <i class="fas fa-leaf text-success"></i> by <b>%s</b>', 'ptibogxivtheme'), "<a href='https://www.ptibogxiv.eu' rel='noopener' class='text-reset'>ptibogxiv.eu</a>", "<a href='https://www.infomaniak.com/goto/fr/home?utm_term=5de6793fdf41b' class='text-reset'>Infomaniak</a>");
} else {
echo sprintf( __('Designed with <i class="fas fa-heart text-danger"></i> by <b>%s</b>', 'ptibogxivtheme'), "<a href='https://www.ptibogxiv.eu' rel='noopener' class='text-reset'>ptibogxiv.eu</a>");
} ?></small></small></p></div>
</div></div>
<?php //if (get_theme_mod( 'ptibogxivtheme_mobileapp')) { ?>
<div class="d-block d-md-none"><br/><br/><nav class="fixed-bottom navbar-light bg-light">
<div class="btn-group d-flex" role="group" aria-label="Basic example">
<?php if ( function_exists('pll_current_language') && function_exists('doliModalButton') ) { ?>
<?php echo doliModalButton('doliSelectlang', 'doliSelectlangFooter', "<i class='fas fa-language fa-fw fa-2x'></i>", 'a' , 'btn btn-light w-100', get_the_ID(), $_SERVER["QUERY_STRING"]); ?>
<?php } ?>
<a href="<?php echo esc_url( home_url('/') ); ?>" class="btn btn-light w-100" ><i class='fas fa-home fa-2x fa-fw'></i></a> 
<?php 
if ( !is_user_logged_in() && function_exists('doliModalButton') && get_option('doliloginmodal') == '1' ) {      
?>
<? echo doliModalButton('login', 'loginfooter', '<i class="fa-solid fa-circle-user fa-2x"></i>', 'a', 'btn btn-light w-100'); ?>
<?php } elseif ( !is_user_logged_in() ) {      
?>
<<a href="<?php echo doliconnecturl('doliaccount'); ?>" title="<?php _e('My account', 'ptibogxivtheme'); ?>" class="btn btn-light w-100"><i class="fa-solid fa-circle-user fa-2x"></i></a>
<?php } elseif ( is_user_logged_in() ) { ?>
  <? if ( function_exists('doliconnecturl') && doliconnectid('dolicart') > 0 ) { ?>
<? echo doliModalButton('doliCart', 'cartFooter', '<span class="fa-layers fa-2x fa-fw"><i class="fas fa-shopping-bag"></i><span class="fa-layers-counter" id="DoliFooterCartItems" style="background:Tomato">'.doliconnect_countitems(doliConnect('order', wp_get_current_user())).'</span></span>', 'a', 'btn btn-light w-100'); ?>
<?php } ?>
<a href="<?php echo doliconnecturl('doliaccount'); ?>" title="<?php _e('My account', 'ptibogxivtheme'); ?>" class="btn btn-light w-100"><i class="fa-solid fa-circle-user fa-2x"></i></a>
<?php 

if ( function_exists('dolikiosk') && ! empty(dolikiosk()) ) {
    $redirect_to=doliconnecturl('doliaccount');
  } elseif (is_front_page()) {
    $redirect_to=home_url();
  } else {
    $redirect_to=get_permalink();
  }

if ( ( empty(get_theme_mod( 'ptibogxivtheme_adminbar')) && current_user_can( 'edit_posts' )) || ( empty(get_theme_mod( 'ptibogxivtheme_adminbar')) && ( wp_get_current_user()->show_admin_bar_front != true)) ) { ?><a href="<?php echo admin_url('index.php'); ?>" class="btn btn-light w-100" title="Zone admin"><i class="fas fa-cogs fa-fw fa-2x"></i></a><?php } ?>
<a href="<?php echo wp_logout_url( $redirect_to ); ?>" class="btn btn-light w-100" title="<?php _e('Sign out', 'ptibogxivtheme'); ?>"><i class="fas fa-sign-out-alt fa-2x"></i></a>
<?php } ?></div><br>
</nav></div>
<?php //} ?>
</footer>
<?php wp_footer(); ?>
</body>
</html>
