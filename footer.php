<footer class="bg-dark text-white">
<div class="container">
<br>
<div class="row">
<div class="col-6 col-md-3">
<?php if (! is_active_sidebar('payment-footer-widget-area') && function_exists('doliconst')) { ?>
<strong><?php _e('Payment modes', 'ptibogxivtheme'); ?></strong><center><i class="fab fa-cc-visa fa-fw fa-3x"></i><i class="fab fa-cc-mastercard fa-fw fa-3x"></i><i class="fab fa-cc-amex fa-fw fa-3x"></i><i class="fab fa-cc-apple-pay fa-fw fa-3x"></i></center>
<?php } else { 
dynamic_sidebar('payment-footer-widget-area'); } ?>
<br></div><div class="col-6 col-md-3">
<strong><?php _e('Social networks', 'ptibogxivtheme'); ?></strong><center>
<?php if (get_option('doliconnect_social_facebook')) { ?><a href="https://www.facebook.com/<?php echo get_option('doliconnect_social_facebook');?>" class="btn btn-facebook btn-circle btn-lg" target="_blank"><i class="fab fa-facebook-f fa-fw"></i></a> <?php } ?>
<?php if (get_option('doliconnect_social_twitter')) { ?><a href="https://www.twitter.com/<?php echo get_option('doliconnect_social_twitter');?>" class="btn btn-twitter btn-circle btn-lg" target="_blank"><i class="fab fa-twitter fa-fw"></i></a> <?php } ?>
<?php if (get_option('doliconnect_social_googleplus')) { ?><a href="https://plus.google.com/<?php echo get_option('doliconnect_social_googleplus');?>" class="btn btn-google btn-circle btn-lg" target="_blank"><i class="fab fa-google-plus-g fa-fw"></i></a> <?php } ?>
<?php if (get_option('doliconnect_social_instagram')) { ?><a href="https://www.instagram.com/<?php echo get_option('doliconnect_social_instagram');?>" class="btn btn-instagram btn-circle btn-lg" target="_blank"><i class="fab fa-instagram fa-fw"></i></a> <?php } ?>
<?php if (get_option('doliconnect_social_youtube')) { ?><a href="https://www.youtube.com/<?php echo get_option('doliconnect_social_youtube');?>" class="btn btn-google btn-circle btn-lg" target="_blank"><i class="fab fa-youtube fa-fw"></i></a> <?php } ?>
<?php if (get_option('doliconnect_social_github')) { ?><a href="https://github.com/<?php echo get_option('doliconnect_social_github');?>" class="btn btn-github btn-circle btn-lg" target="_blank"><i class="fab fa-github fa-fw"></i></a> <?php } ?>
<?php if (get_option('doliconnect_social_linkedin')) { ?><a href="https://www.linkedin.com/<?php echo get_option('doliconnect_social_linkedin');?>" class="btn btn-linkedin btn-circle btn-lg" target="_blank"><i class="fab fa-linkedin fa-fw"></i></a> <?php } ?>
<?php if (get_option('doliconnect_social_skype')) { ?><div class="skype-button bubble" data-contact-id="<?php echo get_option('doliconnect_social_skype');?>"></div><script src="https://swc.cdn.skype.com/sdk/v1/sdk.min.js"></script><?php } ?>
<?php if (get_option('doliconnect_social_whatsapp')) { ?><a href="https://www.facebook.com/<?php echo get_option('doliconnect_social_whatsapp');?>" class="btn btn-whatsapp btn-circle btn-lg" target="_blank"><i class="fab fa-whatsapp fa-fw"></i></a> <?php } ?>
</center><br></div><div class="col-12 col-md-6">
<strong><?php bloginfo('description'); ?></strong>
<div class="row"><div class="col-6">
<?php if(! is_active_sidebar('address-footer-widget-area') && function_exists('doliconst')){
echo doliconst('MAIN_INFO_SOCIETE_ADDRESS');
echo "<BR />";
echo doliconst('MAIN_INFO_SOCIETE_ZIP');
echo " ";
echo doliconst('MAIN_INFO_SOCIETE_TOWN');
} else { 
dynamic_sidebar('address-footer-widget-area'); }?></div>
<div class="col-6"><ul class="fa-ul">
<?php if (get_site_option('dolibarr_public_url')) { ?><li><span class="fa-li"><i class="fas fa-lock"></i></span><?php if (current_user_can( 'administrator' ) or current_user_can( 'editor' )) { ?><a href="<?php echo get_site_option('dolibarr_public_url'); ?>/?entity=<?php echo get_current_blog_id(); ?>&username=<?php echo wp_get_current_user()->user_email; ?>" class="text-info" target="_dolibarr"><?php } ?>Dolibarr<?php if (current_user_can( 'administrator' )) { ?></a><?php } ?></li><?php } ?>
<li><span class="fa-li"><i class="fas fa-lock"></i></span><?php if (current_user_can( 'administrator' ) or current_user_can( 'editor' )) { ?><a href="https://webmail.ptibogxiv.net" class="text-info" target="_webmail"><?php } ?>Webmail<?php if (current_user_can( 'administrator' )) { ?></a><?php } ?></li>
<li><span class="fa-li"><i class="fas fa-lock"></i></span><?php if (current_user_can( 'administrator' ) or current_user_can( 'editor' )) { ?><a href="https://my.ptibogxiv.net" class="text-info" target="_cloud"><?php } ?>Serveur/Cloud<?php if (current_user_can( 'administrator' )) { ?></a><?php } ?></li>
<li><span class="fa-li"><i class="fas fa-info-circle"></i></span><a href="#" class="text-info" data-toggle="modal" data-target="#legacymention"><?php _e('Privacy Policy', 'ptibogxivtheme'); ?></a></li>
<li><span class="fa-li"><i class="fas fa-info-circle"></i></span><a href="#" class="text-info" data-toggle="modal" data-target="#cgvumention">C.G.U.</a></li>
</ul></div></div></div><div class="col-6">
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
</div></div>
<div class="row">
<div class="col"><p class="text-center"><span class="fas fa-copyright"></span> <?php echo date('Y'); ?> <?php echo bloginfo('name'); ?> - <?php _e('All rights reserved', 'ptibogxivtheme'); ?><br><small><?php 
if ( defined('PTIBOGXIV_NET') ) {
_e('Hosting & Theme by', 'ptibogxivtheme');
} else {
_e('Theme by', 'ptibogxivtheme');
} ?> <a href="https://www.ptibogxiv.net" class="text-info">ptibogxiv.net</a></small></p></div>
</div></div>
<?php //if (get_theme_mod( 'ptibogxivtheme_mobileapp')) { ?>
<div class="d-block d-md-none"><br /><br /><nav class="fixed-bottom navbar-light bg-light">
<div class="btn-group d-flex" role="group" aria-label="Basic example">
<?php if ( function_exists('pll_the_languages') && function_exists('doliconnect_langs') ) { ?>
  <a href="#" data-toggle="modal" data-target="#DoliconnectSelectLang" data-dismiss="modal" class="btn btn-light w-100" title="<?php _e('Choose language', 'ptibogxivtheme'); ?>"><i class='fas fa-language fa-fw fa-2x'></i></a>
<?php }
if ( !is_user_logged_in() && function_exists('doliconnect_modal') && get_option('doliloginmodal') == '1' ) {      
?>
<A href="#" id="login-<?php echo current_time('timestamp'); ?>" data-toggle="modal" data-target="#DoliconnectLogin" data-dismiss="modal" title="<?php _e('Sign in', 'ptibogxivtheme'); ?>" class="btn btn-light w-100" role="button"><i class="fas fa-user-circle fa-fw fa-2x"></i></A>
<?php } else { ?>
<a href="<?php echo doliconnecturl('doliaccount'); ?>" title="<?php _e('My account', 'ptibogxivtheme'); ?>" class="btn btn-light w-100"><i class="fas fa-user-circle fa-fw fa-2x"></i></a>
<?php } ?>
  <a href="<?php echo doliconnecturl('dolicart'); ?>" title="<?php _e('Basket', 'ptibogxivtheme'); ?>" class="btn btn-light w-100"><span class="fa-layers fa-fw fa-2x"><i class="fas fa-shopping-bag"></i><span class="fa-layers-counter fa-lg" style="background:Tomato"><?php echo (!empty(doliconnector( null, 'fk_order_nb_item'))?doliconnector( null, 'fk_order_nb_item'):'0'); ?></span></span></a>
  <a href="#" class="btn btn-light w-100"><i class="fas fa-info-circle fa-fw fa-2x"></i></a>
</div>
</nav></div>
<?php //} ?>
</footer>
<?php wp_footer();
if ( function_exists('callDoliApi') ) { 
$company = callDoliApi("GET", "/setup/company", null, dolidelay('constante', esc_attr(isset($_GET["refresh"]) ? $_GET["refresh"] : null)))
?>
<div class="modal fade" id="legacymention" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true"><div class="modal-dialog modal-dialog-centered modal-lg" role="document"><div class="modal-content"><div class="modal-header">
<h5 class="modal-title" id="exampleModalLongTitle"><?php _e('Legacy', 'ptibogxivtheme'); ?></h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
<div class="modal-body">
<p class="text-justify">En vertu de l'article 6 de la loi n° 2004-575 du 21 juin 2004 pour la confiance dans l'économie numérique, il est précisé, aux utilisateurs du présent site, l'identité des différents intervenants.</p>
<p><strong>Editeur</strong><br />
<?php echo $company->name; ?><br />
<?php echo $company->address; ?><br />
<?php echo $company->zip; ?> <?php echo $company->town; ?>
<?php echo $company->country; ?><br />
<?php if (!empty($company->idprof2)) {?><br />SIRET: <?php echo $company->idprof2; ?> - APE<?php echo $company->idprof3; ?><?php }?>
<?php if (!empty($company->idprof4)) {?><br />RCS: <?php echo $company->idprof4; ?><?php }?>
<?php if (!empty($company->tva_assuj)) {?><br />TVA: <?php echo $company->tva_intra; ?><?php }?>
<?php if (!empty($company->note_private)) {?><br /><?php echo $company->note_private; ?><?php }?></p>
<p>Responsable de la publication : <?php echo $company->managers; ?></p>
<p><strong>Conception et Hébergement</strong><br />ptibogxiv.net<br />1 rue de la grande brasserie, 59000 LILLE<br />www.ptibogxiv.net<br />SIRET: 83802482600011 - APE6201Z</p>
</div></div></div></div>
<?php } ?> 
</body>
</html>
