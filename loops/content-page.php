<?php
/*
The Page Loop
=============
*/
?>

<?php if(have_posts()): while(have_posts()): the_post(); ?>
<ARTICLE role="article" id="post_<?php the_ID()?>" <?php post_class()?>>
<DIV class="card border-light <?php if(!get_theme_mod( 'ptibogxivtheme_shadowcontent' )): ?>shadow-lg<?php endif; ?>" style="background-color: rgba(256, 256, 256, 0.8)"><DIV class="card-body">
<HEADER><H1><?php the_title()?> <?php edit_post_link('<I class="fas fa-edit fa-fw"></I>', '<span class="edit-link">', '</SPAN>' ); ?></H1></HEADER>
<?php the_content()?>
<?php wp_link_pages(); ?></DIV></DIV>
<?php comments_template(); ?>
</ARTICLE>
<?php endwhile; else: ?>
<?php wp_redirect(get_bloginfo('url').'/404', 404); ?>
<?php exit; ?>
<?php endif; ?>