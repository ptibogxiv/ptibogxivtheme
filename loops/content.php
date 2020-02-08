<?php
/*
The Default Loop (used by index.php and category.php)
=====================================================

If you require only post excerpts to be shown in index and category pages, then use the [---more---] line within blog posts.

If you require different templates for different post types, then simply duplicate this template, save the copy as, e.g. "content-aside.php", and modify it the way you like it. (The function-call "get_post_format()" within index.php, category.php and single.php will redirect WordPress to use your custom content template.)

Alternatively, notice that index.php, category.php and single.php have a post_class() function-call that inserts different classes for different post types into the section tag (e.g. <section id="" class="format-aside">). Therefore you can simply use e.g. .format-aside {your styles} in css/ptibogxivtheme.css style the different formats in different ways.
*/
?>

<?php if(have_posts()): while(have_posts()): the_post();?><article role="article" id="post_<?php the_ID()?>">
<div class="card flex-md-row mb-4 h-md-250 border-light <?php if(!get_theme_mod( 'ptibogxivtheme_shadowcontent' )): ?>shadow-lg<?php endif; ?>" style="background-color: rgba(256, 256, 256, 0.8)">
            <?php if ( has_post_thumbnail() ){ ?><a href="<?php the_permalink(); ?>"><img  class="card-img-left flex-auto d-none d-md-block rounded-left" src="<?php echo wp_get_attachment_image_url(get_post_thumbnail_id( $post ), 'ptibogxiv_small' ); ?>" alt="<?php the_title()?>"></a><?php } ?><div class="card-body d-flex flex-column align-items-start">
              <strong class="d-inline-block mb-2 text-primary small"><?php the_category(', ') ?></strong>
              <h4 class="mb-0"><a href="<?php the_permalink(); ?>"><?php the_title()?></a></h4>
              <div class="mb-1 text-muted small"><i class="fas fa-calendar fa-fw"></i> <?php _e('Post', 'ptibogxivtheme'); ?> <?php the_time('d F Y') ?> <i class="fas fa-comment fa-fw"></i> <?php comments_popup_link( __('No comments yet', 'ptibogxivtheme'), __('1 comment', 'ptibogxivtheme'), '% comments', 'comments-link', __('Comments are off', 'ptibogxivtheme')); ?></div>
              <p class="text-justify"><?php the_excerpt(); ?></p>
            </div>
          </div>
</article><?php endwhile; ?>

  <?php if ( function_exists('ptibogxivtheme_pagination') ) { ptibogxivtheme_pagination(); } else if ( is_paged() ) { ?>
  <ul class="pagination">
    <li class="page-item older">
      <?php next_posts_link('<i class="fa fa-arrow-left"></i> ' . __('Previous', 'ptibogxivtheme')) ?></li>
    <li class="page-item newer">
      <?php previous_posts_link(__('Next', 'ptibogxivtheme') . ' <i class="fa fa-arrow-right"></i>') ?></li>
  </ul>
  <?php } ?>

  <?php else: wp_redirect(get_bloginfo('url').'/404', 404); exit; endif; ?>
