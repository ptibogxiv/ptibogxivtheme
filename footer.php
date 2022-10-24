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
<?php foreach ($company->socialnetworks as $social => $url) { ?>
<a href="<?php echo $url; ?>" rel="noopener" class="btn btn-<?php echo $social; ?> btn-circle btn-lg" target="_blank"><i class="fab fa-<?php echo $social; ?> fa-fw"></i></a>   
<?php } ?>
<?php } else { 
    dynamic_sidebar('social-footer-widget-area'); 
}?>
</div><div class="col-12 col-md-6"><div class="row"><div class="col-6">
<?php if (! is_active_sidebar('address-footer-widget-area') && function_exists('callDoliApi')) {
$company = callDoliApi("GET", "/setup/company", null, dolidelay('constante', esc_attr(isset($_GET["refresh"]) ? $_GET["refresh"] : null)));
?><strong><?php bloginfo('blogname'); ?></strong>
<br><?php echo $company->name; ?>
<br><?php echo $company->address; ?>
<br><?php echo $company->zip; ?> <?php echo $company->town; ?>
<br><?php
$current_user = wp_get_current_user();
if ( !empty($company->country_id) ) {  
if ( function_exists('pll_the_languages') ) { 
$lang = pll_current_language('locale');
} else {
$lang = $current_user->locale;
}
$country = callDoliApi("GET", "/setup/dictionary/countries/".$company->country_id."?lang=".$lang, null, dolidelay('constante', esc_attr(isset($_GET["refresh"]) ? $_GET["refresh"] : null)));
echo $country->label;
}
if ( !empty($company->state_id) ) {  
if ( function_exists('pll_the_languages') ) { 
$lang = pll_current_language('locale');
} else {
$lang = $current_user->locale;
}
$state = callDoliApi("GET", "/setup/dictionary/states/".$company->state_id."?lang=".$lang, null, dolidelay('constante', esc_attr(isset($_GET["refresh"]) ? $_GET["refresh"] : null)));
echo ' - '.$state->name;
}
} else { 
    dynamic_sidebar('address-footer-widget-area'); 
}?>
</div><div class="col-6"><strong><?php _e('Resources', 'ptibogxivtheme'); ?></strong>
<?php if (get_site_option('dolibarr_public_url') && (current_user_can( 'administrator' ) or current_user_can( 'editor' ))) { ?><br><a href="<?php echo get_site_option('dolibarr_public_url'); ?>/?entity=<?php echo dolibarr_entity(); ?>&username=<?php echo wp_get_current_user()->user_email; ?>" rel="noopener" class="text-reset" target="_dolibarr">Dolibarr</a><?php } ?>
<?php if ((current_user_can( 'administrator' ) or current_user_can( 'editor' )) && defined('PTIBOGXIV_NET_WEBMAIL')) { ?><br><a href="<?php echo constant('PTIBOGXIV_NET_WEBMAIL'); ?>" rel="noopener" class="text-reset" target="_webmail">Webmail</a><?php } ?>
<?php if ((current_user_can( 'administrator' ) or current_user_can( 'editor' )) && defined('PTIBOGXIV_NET_CLOUD')) { ?><br><a href="<?php echo constant('PTIBOGXIV_NET_CLOUD'); ?>" rel="noopener" class="text-reset" target="_cloud">Serveur/Cloud</a><?php } ?>
<br><a href="#" class="text-reset" data-bs-toggle="modal" data-bs-target="#legacymention"><?php _e('Legal notice', 'ptibogxivtheme'); ?></a>
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
<div class="d-block d-md-none"><br /><br /><nav class="fixed-bottom navbar-light bg-light">
<div class="btn-group d-flex" role="group" aria-label="Basic example">
<?php if ( function_exists('pll_the_languages') && function_exists('doliconnect_langs') ) { ?>
<a href="#" data-bs-toggle="modal" data-bs-target="#DoliconnectSelectLang" data-bs-dismiss="modal" class="btn btn-light w-100" title="<?php _e('Choose language', 'ptibogxivtheme'); ?>"><i class='fas fa-language fa-2x'></i></a>
<?php }
if ( !is_user_logged_in() && function_exists('doliconnect_modalform') && get_option('doliloginmodal') == '1' ) {      
?>
<a href="#" id="login-<?php echo current_time('timestamp'); ?>" data-bs-toggle="modal" data-bs-target="#DoliconnectLogin" data-bs-dismiss="modal" title="<?php _e('Sign in', 'ptibogxivtheme'); ?>" class="btn btn-light w-100" role="button"><i class="fa-solid fa-circle-user fa-2x"></i></a>
<?php } elseif ( !is_user_logged_in() ) {      
?>
<<a href="<?php echo doliconnecturl('doliaccount'); ?>" title="<?php _e('My account', 'ptibogxivtheme'); ?>" class="btn btn-light w-100"><i class="fa-solid fa-circle-user fa-2x"></i></a>
<?php } elseif ( is_user_logged_in() ) { ?>
<a href="<?php echo doliconnecturl('doliaccount'); ?>" title="<?php _e('My account', 'ptibogxivtheme'); ?>" class="btn btn-light w-100"><i class="fa-solid fa-circle-user fa-2x"></i></a>
<? if ( function_exists('doliconnecturl') && doliconnectid('dolicart') > 0 ) { ?>
<a class="btn btn-light w-100" <? if ( function_exists('dolicart_modal') ) { ?> data-bs-toggle="offcanvas" href="#offcanvasDolicart" role="button" aria-controls="offcanvasDolicart" <? } else { ?> href="<?php echo doliconnecturl('dolicart'); ?>" <? } ?> title="<?php _e('Basket', 'ptibogxivtheme'); ?>"><span class="fa-layers fa-2x"><i class="fas fa-shopping-bag"></i><span class="fa-layers-counter" id="DoliFooterCartItems" style="background:Tomato"><?php echo (!empty(doliconnector( null, 'fk_order_nb_item'))?doliconnector( null, 'fk_order_nb_item'):'0'); ?></span></span></a>
<?php } ?>
<?php if ( ( empty(get_theme_mod( 'ptibogxivtheme_adminbar')) && current_user_can( 'edit_posts' )) || ( empty(get_theme_mod( 'ptibogxivtheme_adminbar')) && ( wp_get_current_user()->show_admin_bar_front != true)) ) { ?><a href="<?php echo admin_url('index.php'); ?>" class="btn btn-light w-100" title="Zone admin"><i class="fas fa-cogs fa-fw fa-2x"></i></a><?php } ?>
<a href="<?php echo wp_logout_url( get_permalink() ); ?>" class="btn btn-light w-100" title="<?php _e('Sign out', 'ptibogxivtheme'); ?>"><i class="fas fa-sign-out-alt fa-2x"></i></a>
<?php } ?></div>
</nav></div>
<?php //} ?>
</footer>
<?php wp_footer();
if ( function_exists('callDoliApi') ) { 
$company = callDoliApi("GET", "/setup/company", null, dolidelay('constante', esc_attr(isset($_GET["refresh"]) ? $_GET["refresh"] : null)));
?>
<div class="modal fade" id="legacymention" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true"><div class="modal-dialog modal-fullscreen-md-down modal-dialog-centered modal-dialog-scrollable modal-lg"><div class="modal-content"><div class="modal-header">
<h5 class="modal-title" id="exampleModalLongTitle"><?php _e('Legal notice', 'ptibogxivtheme'); ?></h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div>
<div class="modal-body">
<p><strong><?php _e('Editor', 'ptibogxivtheme'); ?></strong>
<br><?php echo $company->name; ?>
<br><?php echo $company->address; ?>
<br><?php echo $company->zip; ?> <?php echo $company->town; ?>
<br><?php if ( !empty($company->country_id) ) {  
if ( function_exists('pll_the_languages') ) { 
$lang = pll_current_language('locale');
} else {
global $current_user;
$lang = $current_user->locale;
}
$country = callDoliApi("GET", "/setup/dictionary/countries/".$company->country_id."?lang=".$lang, null, dolidelay('constante', esc_attr(isset($_GET["refresh"]) ? $_GET["refresh"] : null)));
echo $country->label;
} ?>
<?php if ( !empty($company->state_id) ) {  
if ( function_exists('pll_the_languages') ) { 
$lang = pll_current_language('locale');
} else {
$lang = $current_user->locale;
}
$state = callDoliApi("GET", "/setup/dictionary/states/".$company->state_id."?lang=".$lang, null, dolidelay('constante', esc_attr(isset($_GET["refresh"]) ? $_GET["refresh"] : null)));
echo ' - '.$state->name;
} ?>
<?php if (!empty($company->idprof2)) {?><br>SIRET: <?php echo $company->idprof2; ?> - APE<?php echo $company->idprof3; ?><?php }?>
<?php if (!empty($company->idprof4)) {?><br>RCS: <?php echo $company->idprof4; ?><?php }?>
<?php if (!empty($company->tva_assuj)) {?><br>N° TVA: <?php echo $company->tva_intra; ?><?php }?>
<?php if (!empty($company->note_private)) {?><br><?php echo $company->note_private; ?><?php }?></p>
<p><strong><?php _e('Responsible for publishing', 'ptibogxivtheme'); ?></strong><br><?php echo $company->managers; ?></p>
<?php if ( defined('PTIBOGXIV_NET') ) { ?>
<p><strong><?php _e('Design', 'ptibogxivtheme'); ?></strong><br>Thibault FOUCART - ptibogxiv.eu<br>
1 rue de la grande brasserie<br>
FR - 59000 LILLE - France<br>
SIRET: 83802482600011 - APE6201Z<br>
Site Internet: <a href="https://www.ptibogxiv.eu">ptibogxiv.eu</a></p>
<p><strong><?php _e('Hosting', 'ptibogxivtheme'); ?></strong><br>Infomaniak Network SA<br>
Rue Eugène-Marziano, 25<br>
CH - 1227 GENEVE - Suisse<br>
N° TVA: CHE - 103.167.648<br>
N° de société: CH - 660 - 0059996 - 1<br>
Site Internet: <a href="https://www.infomaniak.com/goto/fr/home?utm_term=5de6793fdf41b">Infomaniak</a></p>
<?php } ?>
</div></div></div></div><?php } ?>
</body>
</html>
