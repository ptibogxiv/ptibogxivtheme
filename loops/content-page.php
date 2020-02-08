<?php
/*
The Page Loop
=============
*/
?>

<?php if(have_posts()): while(have_posts()): the_post(); ?>
<article role="article" id="post_<?php the_ID()?>" <?php post_class()?>>
<div class="card border-light <?php if(!get_theme_mod( 'ptibogxivtheme_shadowcontent' )): ?>shadow-lg<?php endif; ?>" style="background-color: rgba(256, 256, 256, 0.8)"><div class="card-body">
<header><h1><?php the_title()?> <?php if ( ( empty(get_theme_mod( 'ptibogxivtheme_adminbar')) && current_user_can( 'edit_posts' )) || ( empty(get_theme_mod( 'ptibogxivtheme_adminbar')) && ( wp_get_current_user()->show_admin_bar_front != true)) ) { edit_post_link('<i class="fas fa-edit fa-fw"></i>', '<span class="edit-link">', '</span>' ); } ?></h1></header>
<?php the_content()?>
<?php wp_link_pages(); ?></div></div></article>
<?php comments_template('/loops/comments.php'); ?>
<?php endwhile; else: ?>
<?php wp_redirect(get_bloginfo('url').'/404', 404); ?>
<?php exit; ?>
<?php endif; ?>
