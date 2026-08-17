<?php
/*
The Single Posts Loop
=====================
*/
?>
  <?php if(have_posts()): while(have_posts()): the_post(); ?>
<article role="article" id="post_<?php the_ID()?>" <?php post_class()?>>
<?php if(!get_theme_mod( 'ptibogxivtheme_cardcontent' )): ?><div class="card border-light <?php if(!get_theme_mod( 'ptibogxivtheme_shadowcontent' )): ?>shadow-lg<?php endif; ?>" style="<?php echo ptibogxivtheme_gradient(); ?>"><?php endif; ?>
<?php if ( has_post_thumbnail() ){ ?><img src="<?php echo wp_get_attachment_image_url(get_post_thumbnail_id( $post ), 'ptibogxiv_large' ); ?>" class="card-img-top" alt="<?php the_title()?>"><?php } ?>
<div class="card-body">
<header><table width="100%"><tr><td><h1><?php the_title()?> <?php if ( ( empty(get_theme_mod( 'ptibogxivtheme_adminbar')) && current_user_can( 'edit_posts' )) || ( empty(get_theme_mod( 'ptibogxivtheme_adminbar')) && ( wp_get_current_user()->show_admin_bar_front != true)) ) { edit_post_link('<I class="fas fa-edit"></i>', '<span class="edit-link">', '</span>' ); } ?></h1>
<h6><em><span class="text-muted author"><?php _e('By', 'ptibogxivtheme'); echo " "; the_author() ?>, </span>
<time class="text-muted" datetime="<?php the_time()?>"> <?php the_time('d F Y') ?></time>
</em></h6></td><td align="right"><div class="fa-4x text-muted"><span class="fa-layers fa-fw"><i class="fas fa-comment"></i><span class="fa-layers-text fa-inverse" data-fa-transform="shrink-8" style="font-weight:900"><?php comments_number('0', '1', '%'); ?></span></span></div></p>
</td></tr></table>
<hr><p class="text-muted" style="margin-bottom: 30px;">
        <i class="fas fa-folder"></i>&nbsp;
        <?php the_category(', ') ?></p>
        <?php echo ptibogxivtheme_social(); ?>    
</header>
    <section>
      <?php the_content()?>
      <?php wp_link_pages(); ?>
    </section>
<?php the_terms( $post->ID, 'post_tag', '<hr><i class="fas fa-tags"></i> ', ' ', '<br><br>'); ?>
<?php echo ptibogxivtheme_social()."<br>"; ?> 
<div class="card bg-light mb-3"><div class="card-body"><div class="row">
<div class="col-3 col-md-2 text-center"><?php echo get_avatar(get_the_author_meta('ID'),80);?></div><div class="col-9 col-md-10"><h5><?php echo get_the_author(); ?></h5><h6><?php the_author_meta( 'description' ); ?></h6></div>
</div></div></div>
<?php if(!get_theme_mod( 'ptibogxivtheme_cardcontent' )): ?></div></div><?php endif; ?>
</article>
  <?php comments_template('/loops/comments.php'); ?>
<?php endwhile; else: ?>
<?php wp_redirect(get_bloginfo('url').'/404', 404); ?>
<?php exit; ?>
<?php endif; ?>
