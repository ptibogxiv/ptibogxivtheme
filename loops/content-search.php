<?php
/*
The Search Loop
===============
*/
?>

<?php if(have_posts()): while(have_posts()): the_post(); ?>
<article role="article" id="post_<?php the_ID()?>" <?php post_class()?>>
<DIV class="card border-light shadow-lg" style="background-color: rgba(256, 256, 256, 0.8)"><DIV class="card-body">
<header>
      <h4><a href="<?php the_permalink(); ?>"><?php the_title()?></a></h4>
    </header>
    <?php the_excerpt(); ?>
</DIV></DIV></ARTICLE>
<?php endwhile; else: ?>
  <div class="alert alert-warning">
    <i class="fa fa-exclamation-triangle"></i> <?php _e('Sorry, your search yielded no results.', 'ptibogxivtheme'); ?>
  </div>
<?php endif; ?>
