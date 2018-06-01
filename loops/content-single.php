<?php
/*
The Single Posts Loop
=====================
*/
?>
  <?php if(have_posts()): while(have_posts()): the_post(); ?>
<ARTICLE role="article" id="post_<?php the_ID()?>" <?php post_class()?>>
<DIV class="card border-light">
<?php if ( has_post_thumbnail() ){ ?><CENTER><IMG class="card-img-top" src="<?php echo wp_get_attachment_image_url(get_post_thumbnail_id( $post ), 'large' ); ?>" alt="<?php the_title()?>"></CENTER><?php } ?>
<DIV class="card-body">
<HEADER><H1><?php the_title()?> <?php edit_post_link('<I class="fas fa-edit"></I>', '<SPAN class="edit-link">', '</SPAN>' ); ?></H1>
<H5><EM>
<SPAN class="text-muted author"><?php _e('By', 'ptibogxivtheme'); echo get_avatar(get_the_author_meta('ID'),30); echo " "; the_author() ?>, </SPAN>
<TIME  class="text-muted" datetime="<?php the_time('d-m-Y')?>"><?php _e('Post on', 'ptibogxivtheme'); ?> <?php the_time('d F Y') ?></TIME>
</EM></H5>
      <P class="text-muted" style="margin-bottom: 30px;">
        <I class="fas fa-folder"></I>&nbsp;
        <?php _e('Filed under', 'ptibogxivtheme'); ?>:
        <?php the_category(', ') ?><br/>
        <I class="fas fa-comment"></I>&nbsp;
        <?php _e('Comments', 'ptibogxivtheme'); ?>:
        <?php comments_popup_link( 'No comments yet', '1 comment', '% comments', 'comments-link', 'Comments are off'); ?>
      </P>
<DIV class="btn-group mr-2" role="group" aria-label="First group">
<A href="#" class="btn btn-outline-dark disabled" role="button" aria-disabled="true"><?php _e('Share', 'ptibogxivtheme'); ?></A>
<A href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_permalink($post->ID);?>&t=<?php the_title()?>" type="button" class="btn btn-facebook" target="_blank"><I class="fab fa-facebook-f fa-fw"></I></A>
<A href="https://twitter.com/intent/tweet?text=<?php the_title()?>&url=<?php echo get_permalink($post->ID);?>&via=<?php echo get_option('doliconnect_social_twitter');?>" type="button" class="btn btn-twitter" target="_blank"><I class="fab fa-twitter fa-fw"></I></A>
<A href="https://www.linkedin.com/shareArticle?mini=true&url=url=<?php echo get_permalink($post->ID);?>&title=<?php the_title()?>&source=<?php echo get_option('doliconnect_social_linkedin');?>" type="button" class="btn btn-linkedin" target="_blank"><I class="fab fa-linkedin-in fa-fw"></I></A>
<SCRIPT>if (navigator.userAgent.match(/iPhone|Android/i)) {
document.write('<A href="whatsapp://send?text=<?php echo get_permalink($post->ID);?>" data-action="share/whatsapp/share" type="button" class="btn btn-whatsapp" target="_blank"><I class="fab fa-whatsapp fa-fw"></I></A>');
}</script>
<A href="mailto:?subject=[<?php bloginfo('name'); ?>] Informations intéressante&body=Bonjour,<?php echo get_permalink($post->ID);?>" type="button" class="btn btn-light" target="_blank"><I class="fas fa-envelope fa-fw"></I></A> 
</DIV>     
    </HEADER>
    <SECTION>
      <?php the_content()?>
      <?php wp_link_pages(); ?>
    </SECTION>
</DIV></DIV></ARTICLE>
  <?php comments_template('/loops/comments.php'); ?>
  <?php endwhile; ?>
  <?php else: ?>
  <?php wp_redirect(get_bloginfo('url').'/404', 404); exit; ?>
  <?php endif; ?>