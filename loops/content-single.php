<?php
/*
The Single Posts Loop
=====================
*/
?>
  <?php if(have_posts()): while(have_posts()): the_post(); ?>
<ARTICLE role="article" id="post_<?php the_ID()?>" <?php post_class()?>>
<DIV class="card border-light shadow-lg" style="background-color: rgba(256, 256, 256, 0.8)">
<?php if ( has_post_thumbnail() ){ ?><CENTER><IMG class="card-img-top" src="<?php echo wp_get_attachment_image_url(get_post_thumbnail_id( $post ), 'ptibogxiv_large' ); ?>" alt="<?php the_title()?>"></CENTER><?php } ?>
<DIV class="card-body">
<HEADER><TABLE width="100%"><TR><TD><H1><?php the_title()?> <?php edit_post_link('<I class="fas fa-edit"></I>', '<SPAN class="edit-link">', '</SPAN>' ); ?></H1>
<H5><EM>
<SPAN class="text-muted author"><?php _e('By', 'ptibogxivtheme'); echo " "; the_author() ?>, </SPAN>
<TIME class="text-muted" datetime="<?php the_time()?>"><?php _e('on', 'ptibogxivtheme'); ?> <?php the_time('d F Y') ?></TIME>
</EM></H5></TD><TD align="right"><DIV class="fa-4x text-muted"><SPAN class="fa-layers fa-fw"><I class="fas fa-comment"></I><SPAN class="fa-layers-text fa-inverse" data-fa-transform="shrink-8" style="font-weight:900"><?php comments_number('0', '1', '%'); ?></SPAN></SPAN></DIV></P>
</TD></TR></TABLE>
<HR>
      <P class="text-muted" style="margin-bottom: 30px;">
        <I class="fas fa-folder"></I>&nbsp;
        <?php the_category(', ') ?></P>
        <DIV class="btn-group" role="group" aria-label="First group">
<A href="#" class="btn btn-outline-dark disabled" role="button" aria-disabled="true"><I class="fas fa-share-alt fa-fw"></I></A>
<A href="mailto:?subject=[<?php bloginfo('name'); ?>] Informations intéressante&body=Bonjour,<?php echo get_permalink($post->ID);?>" role="button" class="btn btn-dark" target="_blank"><I class="fas fa-envelope fa-fw"></I></A> 
<A href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_permalink($post->ID);?>&t=<?php the_title()?>" role="button" class="btn btn-facebook" target="_blank"><I class="fab fa-facebook-f fa-fw"></I></A>
<A href="https://twitter.com/intent/tweet?text=<?php the_title()?>&url=<?php echo get_permalink($post->ID);?>&via=<?php echo get_option('doliconnect_social_twitter');?>" role="button" class="btn btn-twitter" target="_blank"><I class="fab fa-twitter fa-fw"></I></A>
<A href="https://www.linkedin.com/shareArticle?mini=true&url=url=<?php echo get_permalink($post->ID);?>&title=<?php the_title()?>&source=<?php echo get_option('doliconnect_social_linkedin');?>" role="button" class="btn btn-linkedin" target="_blank"><I class="fab fa-linkedin-in fa-fw"></I></A>
<A href="https://plus.google.com/share?url=<?php echo get_permalink($post->ID);?>&t=<?php the_title()?>" role="button" class="btn btn-google" target="_blank"><I class="fab fa-google-plus-g fa-fw"></I></A>
<A href="https://pinterest.com/pin/create/button/?url=<?php echo get_permalink($post->ID);?>&media=&description=s<?php the_title()?>" role="button" class="btn btn-pinterest" target="_blank"><I class="fab fa-pinterest fa-fw"></I></A>
<SCRIPT>if (navigator.userAgent.match(/iPhone|Android/i)) {
document.write('<A href="whatsapp://send?text=<?php echo get_permalink($post->ID);?>" data-action="share/whatsapp/share" role="button" class="btn btn-whatsapp" target="_blank"><I class="fab fa-whatsapp fa-fw"></I></A>');
}</SCRIPT>
</DIV>     
    </HEADER>
    <SECTION>
      <?php the_content()?>
      <?php wp_link_pages(); ?>
    </SECTION>
<?php the_terms( $post->ID, 'post_tag', '<HR><i class="fas fa-tags"></i> ', ' / ' ); ?>
<HR>
<TABLE><TR><TD with="90" align="center"><?php echo get_avatar(get_the_author_meta('ID'),80);?></TD><TD valign="top"><H5><?php echo _e('About', 'ptibogxivtheme'); echo " "; the_author() ?></H5><H6><?php the_author_meta( 'description' ); ?></H6></TD></TR></TABLE>
</DIV></DIV></ARTICLE>
  <?php comments_template('/loops/comments.php'); ?>
  <?php endwhile; ?>
  <?php else: ?>
  <?php wp_redirect(get_bloginfo('url').'/404', 404); exit; ?>
  <?php endif; ?>
