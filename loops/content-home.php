<?php
/*
The Page Loop
=============
*/
?>

<?php if(have_posts()): while(have_posts()): the_post(); ?>
  <article role="article" id="post_<?php the_ID()?>" <?php post_class()?>>
<div class="container">
<div class="row align-items-center justify-content-center">
    <div class="col-4">
<?php if ( has_post_thumbnail() ){ ?><br><br><br><center><img class="d-block w-100 img-fluid rounded" src="<?php the_post_thumbnail_url(); ?>" alt="Third slide"></center><br><?php } ?> 
    </div>
</div>
</div> 
    <?php the_content()?>
    <?php wp_link_pages(); ?>
  </article>
<?php endwhile; else: ?>
<?php wp_redirect(get_bloginfo('url').'/404', 404); ?>
<?php exit; ?>
<?php endif; ?>
