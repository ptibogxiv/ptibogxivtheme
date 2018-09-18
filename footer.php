<footer class="bg-dark text-white">
<div class="container">
<br>
<div class="row">
<div class="col-6 col-md-3">
<strong><?php _e('Payment modes', 'ptibogxivtheme'); ?></strong><center><i class="fab fa-cc-visa fa-fw fa-3x"></i><i class="fab fa-cc-mastercard fa-fw fa-3x"></i><i class="fab fa-cc-amex fa-fw fa-3x"></i><i class="fab fa-cc-apple-pay fa-fw fa-3x"></i></center>
<br></div><div class="col-6 col-md-3">
<strong><?php _e('Social networks', 'ptibogxivtheme'); ?></strong><center>
<?php if (get_option('doliconnect_social_facebook')) { ?><a href="https://www.facebook.com/<?php echo get_option('doliconnect_social_facebook');?>" class="btn btn-facebook btn-circle btn-lg"target="_blank"><i class="fab fa-facebook-f fa-fw"></i></a> <?php } ?>
<?php if (get_option('doliconnect_social_twitter')) { ?><a href="https://www.twitter.com/<?php echo get_option('doliconnect_social_twitter');?>" class="btn btn-twitter btn-circle btn-lg" target="_blank"><i class="fab fa-twitter fa-fw"></i></a> <?php } ?>
<?php if (get_option('doliconnect_social_googleplus')) { ?><a href="https://plus.google.com/<?php echo get_option('doliconnect_social_googleplus');?>" class="btn btn-google btn-circle btn-lg" target="_blank"><i class="fab fa-google-plus-g fa-fw"></i></a> <?php } ?>
<?php if (get_option('doliconnect_social_instagram')) { ?><a href="https://www.instagram.com/<?php echo get_option('doliconnect_social_instagram');?>" class="btn btn-instagram btn-circle btn-lg" target="_blank"><i class="fab fa-instagram fa-fw"></i></a> <?php } ?>
<?php if (get_option('doliconnect_social_youtube')) { ?><a href="https://www.youtube.com/<?php echo get_option('doliconnect_social_youtube');?>" class="btn btn-google btn-circle btn-lg" target="_blank"><i class="fab fa-youtube fa-fw"></i></a> <?php } ?>
<?php if (get_option('doliconnect_social_github')) { ?><a href="https://github.com/<?php echo get_option('doliconnect_social_github');?>" class="btn btn-github btn-circle btn-lg" target="_blank"><i class="fab fa-github fa-fw"></i></a> <?php } ?>
<?php if (get_option('doliconnect_social_linkedin')) { ?><a href="https://www.linkedin.com/<?php echo get_option('doliconnect_social_linkedin');?>" class="btn btn-linkedin btn-circle btn-lg" target="_blank"><i class="fab fa-linkedin fa-fw"></i></a> <?php } ?>
<?php if (get_option('doliconnect_social_skype')) { ?><div class="skype-button bubble" data-contact-id="<?php echo get_option('doliconnect_social_skype');?>"></div><script src="https://swc.cdn.skype.com/sdk/v1/sdk.min.js"></script><?php } ?>
<?php if (get_option('doliconnect_social_whatsapp')) { ?><a href="https://www.facebook.com/<?php echo get_option('doliconnect_social_whatsapp');?>" class="btn btn-whatsapp btn-circle btn-lg"target="_blank"><i class="fab fa-whatsapp fa-fw"></i></a> <?php } ?>
</center><br></div><div class="col-12 col-md-6">
<strong><?php bloginfo('description'); ?></strong>
<div class="row"><div class="col-6">
<?php if(! is_active_sidebar('footer-widget-area') && function_exists('doliconst')){
doliconst(MAIN_INFO_SOCIETE_ADDRESS);
echo "<BR />";
doliconst(MAIN_INFO_SOCIETE_ZIP);
echo " ";
doliconst(MAIN_INFO_SOCIETE_TOWN);
} else { 
dynamic_sidebar('footer-widget-area'); }?></div>
<div class="col-6"><ul class="fa-ul">
<li><span class="fa-li"><i class="fas fa-lock"></i></span><?php if (current_user_can( 'administrator' ) or current_user_can( 'editor' )) { ?><a href="<?php echo get_site_option('dolibarr_public_url'); ?>/?entity=<?php echo get_current_blog_id(); ?>&username=<?php echo wp_get_current_user()->user_email; ?>" class="text-info" target="_blank"><?php } ?>Dolibarr<?php if (current_user_can( 'administrator' )) { ?></a><?php } ?></li>
<li><span class="fa-li"><i class="fas fa-lock"></i></span><?php if (current_user_can( 'administrator' ) or current_user_can( 'editor' )) { ?><a href="https://webmail.ptibogxiv.net" class="text-info" target="_blank"><?php } ?>Webmail<?php if (current_user_can( 'administrator' )) { ?></a><?php } ?></li>
<li><span class="fa-li"><i class="fas fa-lock"></i></span><?php if (current_user_can( 'administrator' ) or current_user_can( 'editor' )) { ?><a href="https://my.ptibogxiv.net" class="text-info" target="_blank"><?php } ?>Serveur/Cloud<?php if (current_user_can( 'administrator' )) { ?></a><?php } ?></li>
<li><span class="fa-li"><i class="fas fa-info-circle"></i></span><a href="#" class="text-info" data-toggle="modal" data-target="#legacymention"><?php _e('Privacy Policy', 'ptibogxivtheme'); ?></a></li>
<li><span class="fa-li"><i class="fas fa-info-circle"></i></span><a href="#" class="text-info" data-toggle="modal" data-target="#cgvumention">C.G.U.</a></li>
</ul></div></div></div><div class="col-6">
<?php if (function_exists('pll_the_languages')) { ?>       
<a href="#" data-toggle="modal" data-target="#SelectLang" data-dismiss="modal" title="<?php _e('Choose language', 'ptibogxivtheme'); ?>"><?php echo pll_current_language('flag');?> <?php echo pll_current_language('name');?></a>
<?php } ?>
</div><div class="col-6">
<?php if (get_option('doliconnect_ipkiosk')==$_SERVER['REMOTE_ADDR']) { ?>       
<div class="text-right">Mode kiosque activé <i class="fas fa-desktop"></i></div>
<?php } ?>
</div></div>
<div class="row">
<div class="col"><p class="text-center"><span class="fas fa-copyright"></span> <?php echo date('Y'); ?> <?php echo bloginfo('name'); ?> - <?php _e('All rights reserved', 'ptibogxivtheme'); ?><br><small><?php 
if (PTIBOGXIV_NET==1) {
_e('Hosting & Theme by', 'ptibogxivtheme');
} else {
_e('Theme by', 'ptibogxivtheme');
} ?> <a href="https://www.ptibogxiv.net" class="text-info">ptibogxiv.net</a></small></p></div>
</div></div>
<?php if (get_theme_mod( 'ptibogxivtheme_mobileapp')) { ?>
<div class="d-block d-md-none"><br /><br /><nav class="fixed-bottom navbar-light bg-light">
<div class="btn-group d-flex" role="group" aria-label="Basic example">
<?php if (function_exists('pll_the_languages')) { ?>
  <a href="#" data-toggle="modal" data-target="#SelectLang" data-dismiss="modal" class="btn btn-light w-100" title="<?php _e('Choose language', 'ptibogxivtheme'); ?>"><i class='fas fa-language fa-fw fa-2x'></i></a>
<?php } ?>
  <a href="<?php echo doliconnecturl('doliaccount'); ?>" title="<?php _e('My account', 'ptibogxivtheme'); ?>" class="btn btn-light w-100"><i class="fas fa-user-circle fa-fw fa-2x"></i></a>
  <a href="<?php echo doliconnecturl('dolicart'); ?>" title="<?php _e('Basket', 'ptibogxivtheme'); ?>" class="btn btn-light w-100"><span class="fa-layers fa-fw fa-2x"><i class="fas fa-shopping-bag"></i><span class="fa-layers-counter fa-lg" style="background:Tomato"><?php echo constant("DOLICONNECT_CART_ITEM"); ?></span></span></a>
  <a href="#" class="btn btn-light w-100"><i class="fas fa-info-circle fa-fw fa-2x"></i></a>
</div>
</nav></div>
<?php } ?>
</footer>
<?php wp_footer();
if(function_exists('doliconst')){ ?>
<div class="modal fade" id="legacymention" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true"><div class="modal-dialog modal-dialog-centered modal-lg" role="document"><div class="modal-content"><div class="modal-header">
<h5 class="modal-title" id="exampleModalLongTitle"><?php _e('Privacy Policy', 'ptibogxivtheme'); ?></h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
<div class="modal-body">
<p class="text-justify">En vertu de l'article 6 de la loi n° 2004-575 du 21 juin 2004 pour la confiance dans l'économie numérique, il est précisé, aux utilisateurs du présent site, l'identité des différents intervenants.</p>
<p><strong>Editeur</strong><br />
<?php doliconst(MAIN_INFO_SOCIETE_NOM); ?><br />
<?php doliconst(MAIN_INFO_SOCIETE_ADDRESS); ?><br />
<?php doliconst(MAIN_INFO_SOCIETE_ZIP); ?> <?php doliconst(MAIN_INFO_SOCIETE_TOWN); ?>
<?php if (!empty(doliconst2(MAIN_INFO_SIRET))) {?><br />SIRET: <?php doliconst(MAIN_INFO_SIRET); ?> - APE<?php doliconst(MAIN_INFO_APE); ?><?php }?>
<?php if (!empty(doliconst2(MAIN_INFO_RCS))) {?><br />RCS: <?php doliconst(MAIN_INFO_RCS); ?><?php }?>
<?php if (!empty(doliconst2(MAIN_INFO_TVAINTRA))) {?><br />TVA: <?php doliconst(MAIN_INFO_TVAINTRA); ?><?php }?>
<?php if (!empty(doliconst2(MAIN_INFO_SOCIETE_NOTE))) {?><br /><?php doliconst(MAIN_INFO_SOCIETE_NOTE); ?><?php }?></p>
<p>Responsable de la publication : <?php doliconst(MAIN_INFO_SOCIETE_MANAGERS); ?></p>
<p><strong>Conception et Hébergement</strong><br />ptibogxiv.net<br />1 rue de la grande brasserie, 59000 LILLE<br />www.ptibogxiv.net<br />SIRET: 83802482600011 - APE6201Z</p>
</div></div></div></div>
<?php }
if (function_exists('pll_the_languages')) {       
?> 
<div class="modal fade" id="SelectLang" tabindex="-1" role="dialog" aria-labelledby="SelectLangLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
<div class="modal-dialog modal-sm modal-dialog-centered" role="document">
<div class="modal-content border-0"><div class="modal-header border-0">
<h5 class="modal-title" id="SelectLangLabel"><?php _e('Change language', 'ptibogxivtheme'); ?></h5><button id="closemodalSelectLang" type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span></button></div> 
<script>
function loadingSelectLangModal() {
jQuery('#closemodalSelectLang').hide();
jQuery('#SelectLangmodal-form').hide();
jQuery('#loadingSelectLang').show();  
}
</script>
<div class="modal-body"><div class="card" id="SelectLangmodal-form"><ul class="list-group list-group-flush">
<?php  
$translations = pll_the_languages( array( 'raw' => 1 ) );
foreach ($translations as $key => $value) {
?>
<a href='<?php echo $value[url]; ?>' onclick='loadingSelectLangModal()' class='list-group-item list-group-item-action list-group-item-light'>
<img src='<?php echo $value[flag]; ?>' class='img-fluid' alt='<?php echo $value[name]; ?>'> <?php echo $value[name]; ?> <?php if ($value[current_lang] == true) {?><i class='fas fa-language fa-fw'></i><?php } ?>
</a>
<?php
}      
?>
</ul></div>
<div id="loadingSelectLang" style="display:none"><br><br><br><br><center><div class="align-middle"><i class="fas fa-spinner fa-pulse fa-3x fa-fw"></i><h4><?php _e('Loading', 'ptibogxivtheme'); ?></h4></div></center><br><br><br><br></div>
</div></div></div></div>
<?php
}      
?> 
</body>
</html>
