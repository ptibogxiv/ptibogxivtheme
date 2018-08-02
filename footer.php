<FOOTER class="bg-dark text-white">
<DIV class="container">
<BR>
<DIV class="row">
<DIV class="col-6 col-md-3">
<STRONG><?php _e('Payment modes', 'ptibogxivtheme'); ?></STRONG><CENTER><I class="fab fa-cc-visa fa-fw fa-3x"></I><I class="fab fa-cc-mastercard fa-fw fa-3x"></I><I class="fab fa-cc-amex fa-fw fa-3x"></I><I class="fab fa-cc-apple-pay fa-fw fa-3x"></I></CENTER>
<BR></DIV><DIV class="col-6 col-md-3">
<STRONG><?php _e('Social networks', 'ptibogxivtheme'); ?></STRONG><CENTER>
<?php if (get_option('doliconnect_social_facebook')) { ?><A href="https://www.facebook.com/<?php echo get_option('doliconnect_social_facebook');?>" class="btn btn-facebook btn-circle btn-lg"target="_blank"><I class="fab fa-facebook-f fa-fw"></I></A> <?php } ?>
<?php if (get_option('doliconnect_social_twitter')) { ?><A href="https://www.twitter.com/<?php echo get_option('doliconnect_social_twitter');?>" class="btn btn-twitter btn-circle btn-lg" target="_blank"><I class="fab fa-twitter fa-fw"></I></A> <?php } ?>
<?php if (get_option('doliconnect_social_googleplus')) { ?><A href="https://plus.google.com/<?php echo get_option('doliconnect_social_googleplus');?>" class="btn btn-google btn-circle btn-lg" target="_blank"><I class="fab fa-google-plus-g fa-fw"></I></A> <?php } ?>
<?php if (get_option('doliconnect_social_instagram')) { ?><A href="https://www.instagram.com/<?php echo get_option('doliconnect_social_instagram');?>" class="btn btn-instagram btn-circle btn-lg" target="_blank"><I class="fab fa-instagram fa-fw"></I></A> <?php } ?>
<?php if (get_option('doliconnect_social_youtube')) { ?><A href="https://www.youtube.com/<?php echo get_option('doliconnect_social_youtube');?>" class="btn btn-google btn-circle btn-lg" target="_blank"><I class="fab fa-youtube fa-fw"></I></A> <?php } ?>
<?php if (get_option('doliconnect_social_github')) { ?><A href="https://github.com/<?php echo get_option('doliconnect_social_github');?>" class="btn btn-github btn-circle btn-lg" target="_blank"><I class="fab fa-github fa-fw"></I></A> <?php } ?>
<?php if (get_option('doliconnect_social_linkedin')) { ?><A href="https://www.linkedin.com/<?php echo get_option('doliconnect_social_linkedin');?>" class="btn btn-linkedin btn-circle btn-lg" target="_blank"><I class="fab fa-linkedin fa-fw"></I></A> <?php } ?>
<?php if (get_option('doliconnect_social_skype')) { ?><DIV class="skype-button bubble" data-contact-id="<?php echo get_option('doliconnect_social_skype');?>"></DIV><SCRIPT src="https://swc.cdn.skype.com/sdk/v1/sdk.min.js"></SCRIPT><?php } ?>
<?php if (get_option('doliconnect_social_whatsapp')) { ?><A href="https://www.facebook.com/<?php echo get_option('doliconnect_social_whatsapp');?>" class="btn btn-whatsapp btn-circle btn-lg"target="_blank"><I class="fab fa-whatsapp fa-fw"></I></A> <?php } ?>
</CENTER><BR></DIV><DIV class="col-12 col-md-6">
<STRONG><?php bloginfo('description'); ?></STRONG>
<DIV class="row"><DIV class="col-6">
<?php if(! is_active_sidebar('footer-widget-area') && function_exists('doliconst')){
doliconst(MAIN_INFO_SOCIETE_ADDRESS);
echo "<BR />";
doliconst(MAIN_INFO_SOCIETE_ZIP);
echo " ";
doliconst(MAIN_INFO_SOCIETE_TOWN);
} else { 
dynamic_sidebar('footer-widget-area'); }?></DIV>
<DIV class="col-6"><UL class="fa-ul">
<LI><SPAN class="fa-li"><I class="fas fa-lock"></I></SPAN><?php if (current_user_can( 'administrator' ) or current_user_can( 'editor' )) { ?><A href="https://dolibarr.ptibogxiv.net/?entity=<?php echo get_current_blog_id(); ?>&username=<?php echo wp_get_current_user()->user_email; ?>" class="text-info" target="_blank"><?php } ?>Dolibarr<?php if (current_user_can( 'administrator' )) { ?></A><?php } ?></LI>
<LI><SPAN class="fa-li"><I class="fas fa-lock"></I></SPAN><?php if (current_user_can( 'administrator' ) or current_user_can( 'editor' )) { ?><A href="https://webmail.ptibogxiv.net" class="text-info" target="_blank"><?php } ?>Webmail<?php if (current_user_can( 'administrator' )) { ?></A><?php } ?></LI>
<LI><SPAN class="fa-li"><I class="fas fa-lock"></I></SPAN><?php if (current_user_can( 'administrator' ) or current_user_can( 'editor' )) { ?><A href="https://my.ptibogxiv.net" class="text-info" target="_blank"><?php } ?>Serveur/Cloud<?php if (current_user_can( 'administrator' )) { ?></A><?php } ?></LI>
<LI><SPAN class="fa-li"><I class="fas fa-info-circle"></I></SPAN><A href="#" class="text-info" data-toggle="modal" data-target="#legacymention"><?php _e('Privacy Policy', 'ptibogxivtheme'); ?></A></LI>
<LI><SPAN class="fa-li"><I class="fas fa-info-circle"></I></SPAN><A href="#" class="text-info" data-toggle="modal" data-target="#cgvumention">C.G.U.</A></LI>
</UL><BR></DIV></DIV></DIV>
<DIV class="col-6">
<?php
if (function_exists('pll_the_languages')) {       
?><A href="#" data-toggle="modal" data-target="#SelectLang" data-dismiss="modal" title="<?php _e('Choose language', 'ptibogxivtheme'); ?>"><I class='fas fa-language fa-fw fa-2x'></I> <?php echo pll_current_language('name');?></A><?php
}
?>
</DIV></DIV>
<DIV class="row">
<DIV class="col"><P class="text-center"><SPAN class="fas fa-copyright"></SPAN> <?php echo date('Y'); ?> <?php echo bloginfo('name'); ?> - <?php _e('All rights reserved', 'ptibogxivtheme'); ?><BR><SMALL><?php 
if (PTIBOGXIV_NET==1) {
_e('Hosting & Theme by', 'ptibogxivtheme');
} else {
_e('Theme by', 'ptibogxivtheme');
} ?> <A href="https://www.ptibogxiv.net" class="text-info">ptibogxiv.net</A></SMALL></P></DIV>
</DIV></DIV></FOOTER>
<?php wp_footer();
if(function_exists('doliconst')){ ?>
<DIV class="modal fade" id="legacymention" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true"><DIV class="modal-dialog modal-dialog-centered modal-lg" role="document"><DIV class="modal-content"><DIV class="modal-header">
<H5 class="modal-title" id="exampleModalLongTitle"><?php _e('Privacy Policy', 'ptibogxivtheme'); ?></H5>
<BUTTON type="button" class="close" data-dismiss="modal" aria-label="Close"><SPAN aria-hidden="true">&times;</SPAN></BUTTON></DIV>
<DIV class="modal-body">
<P class="text-justify">En vertu de l'article 6 de la loi n° 2004-575 du 21 juin 2004 pour la confiance dans l'économie numérique, il est précisé, aux utilisateurs du présent site, l'identité des différents intervenants.</P>
<P><STRONG>Editeur</STRONG><BR />
<?php doliconst(MAIN_INFO_SOCIETE_NOM); ?><BR />
<?php doliconst(MAIN_INFO_SOCIETE_ADDRESS); ?><BR />
<?php doliconst(MAIN_INFO_SOCIETE_ZIP); ?> <?php doliconst(MAIN_INFO_SOCIETE_TOWN); ?>
<?php if (!empty(doliconst2(MAIN_INFO_SIRET))) {?><BR />SIRET: <?php doliconst(MAIN_INFO_SIRET); ?> - APE<?php doliconst(MAIN_INFO_APE); ?><?php }?>
<?php if (!empty(doliconst2(MAIN_INFO_RCS))) {?><BR />RCS: <?php doliconst(MAIN_INFO_RCS); ?><?php }?>
<?php if (!empty(doliconst2(MAIN_INFO_TVAINTRA))) {?><BR />TVA: <?php doliconst(MAIN_INFO_TVAINTRA); ?><?php }?>
<?php if (!empty(doliconst2(MAIN_INFO_SOCIETE_NOTE))) {?><BR /><?php doliconst(MAIN_INFO_SOCIETE_NOTE); ?><?php }?></P>
<P>Responsable de la publication : <?php doliconst(MAIN_INFO_SOCIETE_MANAGERS); ?></P>
<P><STRONG>Conception et Hébergement</STRONG><BR />ptibogxiv.net<BR />1 rue de la grande brasserie, 59000 LILLE<BR />www.ptibogxiv.net<BR />SIRET: 83802482600011 - APE6201Z</P>
</DIV></DIV></DIV></DIV>
<?php }
if (function_exists('pll_the_languages')) {       
?> 
<DIV class="modal fade" id="SelectLang" tabindex="-1" role="dialog" aria-labelledby="SelectLangLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
<DIV class="modal-dialog modal-sm modal-dialog-centered" role="document">
<DIV class="modal-content border-0"><DIV class="modal-header border-0">
<H5 class="modal-title" id="SelectLangLabel"><?php _e('Change language', 'ptibogxivtheme'); ?></H5><BUTTON id="closemodalSelectLang" type="button" class="close" data-dismiss="modal" aria-label="Close">
<SPAN aria-hidden="true">&times;</SPAN></BUTTON></DIV> 
<SCRIPT>
function loadingSelectLangModal() {
jQuery('#closemodalSelectLang').hide();
jQuery('#SelectLangmodal-form').hide();
jQuery('#loadingSelectLang').show();  
}
</SCRIPT>
<DIV class="modal-body"><DIV class="card" id="SelectLangmodal-form"><UL class="list-group list-group-flush">
<?php  
$translations = pll_the_languages( array( 'raw' => 1 ) );
foreach ($translations as $key => $value) {
?>
<A href='<?php echo $value[url]; ?>' onclick='loadingSelectLangModal()' class='list-group-item list-group-item-action list-group-item-light'>
<IMG src='<?php echo $value[flag]; ?>' class='img-fluid' alt='<?php echo $value[name]; ?>'> <?php echo $value[name]; ?> <?php if ($value[current_lang] == true) {?><I class='fas fa-language fa-fw'></I><?php } ?>
</A>
<?php
}      
?>
</UL></DIV>
<DIV id="loadingSelectLang" style="display:none"><BR><BR><BR><BR><CENTER><DIV class="align-middle"><I class="fas fa-spinner fa-pulse fa-3x fa-fw"></I><H4><?php _e('Loading', 'ptibogxivtheme'); ?></H4></DIV></CENTER><BR><BR><BR><BR></DIV>
</DIV></DIV></DIV></DIV>
<?php
}      
?> 
</BODY>
</HTML>