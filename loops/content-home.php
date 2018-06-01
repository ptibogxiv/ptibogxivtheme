<?php
/*
The Page Loop
=============
*/
?>

<?php if(have_posts()): while(have_posts()): the_post(); ?>
  <ARTICLE role="article" id="post_<?php the_ID()?>" <?php post_class()?>>
<DIV class="container">
<DIV class="row align-items-center justify-content-center">
    <DIV class="col-4">
<?php if ( has_post_thumbnail() ){ ?><BR><BR><BR><CENTER><IMG class="d-block w-100 img-fluid rounded" src="<?php the_post_thumbnail_url(); ?>" alt="Third slide"></CENTER><BR><?php } ?> 
    </DIV>
</DIV>
</DIV> 
    <?php the_content()?>
    <?php wp_link_pages(); ?>
  </ARTICLE>
<?php endwhile; else: ?>
<?php wp_redirect(get_bloginfo('url').'/404', 404); ?>
<?php exit; ?>
<?php endif; ?>