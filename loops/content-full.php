<?php
/*
The Page Loop
=============
*/
?>

<?php if(have_posts()): while(have_posts()): the_post(); ?>
<ARTICLE role="article" id="post_<?php the_ID()?>" <?php post_class()?>>
<?php if ( has_post_thumbnail() ){ ?><CENTER><IMG class="d-block w-100 img-fluid rounded" src="<?php the_post_thumbnail_url(); ?>" alt="Third slide"></CENTER><BR><?php } ?> 
<DIV class="card border-light <?php if(!get_theme_mod( 'ptibogxivtheme_shadowcontent' )): ?>shadow-lg<?php endif; ?>" style="background-color: rgba(256, 256, 256, 0.8)"><DIV class="card-body">
<HEADER><H1><?php the_title()?> <?php edit_post_link('<I class="fas fa-edit"></I>', '<span class="edit-link">', '</SPAN>' ); ?></H1></HEADER> 
<?php the_content()?>
<?php wp_link_pages(); ?>
</DIV></DIV></ARTICLE>
<?php comments_template('/loops/comments.php'); ?>
<?php endwhile; else: ?>
<?php wp_redirect(get_bloginfo('url').'/404', 404); ?>
<?php exit; ?>
<?php endif; ?>