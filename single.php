<?php get_header(); ?>

<DIV class="<?php echo esc_attr(get_theme_mod( 'ptibogxivtheme_container_type')); ?> site-content">
<DIV class="row"> 
    <DIV class="<?php if(is_active_sidebar('sidebar-right-widget-area') && (get_theme_mod( 'ptibogxivtheme_sidebar_position' )=='right' or get_theme_mod( 'ptibogxivtheme_sidebar_position' )=='both')): ?>col-12 col-md-8<?php else: ?>col-12<?php endif; ?>">
      <DIV id="content" role="main">
        <?php get_template_part('loops/content', 'single'); ?>
      </DIV><!-- /#content -->
    </DIV>   
<?php if(is_active_sidebar('sidebar-right-widget-area') && (get_theme_mod( 'ptibogxivtheme_sidebar_position' )=='right' or get_theme_mod( 'ptibogxivtheme_sidebar_position' )=='both')){ ?>    
    <DIV class="<?php if(get_theme_mod( 'ptibogxivtheme_sidebar_position' )=='both'): ?>col-12 col-md-3<?php
    else: ?>col-12 col-md-4<?php endif; ?>" id="sidebar" role="navigation">
<BR><DIV class="card border-light <?php if(!get_theme_mod( 'ptibogxivtheme_shadowcontent' )): ?>shadow-lg<?php endif; ?>" style="background-color: rgba(256, 256, 256, 0.8)"><DIV class="card-body"><?php dynamic_sidebar('sidebar-right-widget-area'); ?></DIV></DIV><BR>
    </DIV>
<?php } ?>   
  </DIV><!-- /.row -->
</DIV><!-- /.container -->

<?php get_footer(); ?>
