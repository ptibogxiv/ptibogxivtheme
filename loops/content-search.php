<?php
/*
The Search Loop
===============
*/
?>

<?php if(have_posts()): while(have_posts()): the_post(); ?>
<article role="article" id="post_<?php the_ID()?>" <?php post_class()?>>
<div class="card border-light <?php if(!get_theme_mod( 'ptibogxivtheme_shadowcontent' )): ?>shadow-lg<?php endif; ?>" style="background-color: rgba(256, 256, 256, 0.8)"><div class="card-body">
<header>
      <h4><a href="<?php the_permalink(); ?>"><?php the_title()?></a></h4>
    </header>
    <?php the_excerpt(); ?>
</div></div></article>
<?php endwhile; else: ?>
  <div class="alert alert-warning">
    <i class="fa fa-exclamation-triangle"></i> <?php _e('Sorry, your search yielded no results.', 'ptibogxivtheme'); ?>
  </div>
<?php endif; ?>
