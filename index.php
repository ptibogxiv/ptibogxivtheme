<?php get_header(); ?>

<div class="<?php echo (!empty(esc_attr(get_theme_mod( 'ptibogxivtheme_container_type')))?esc_attr(get_theme_mod( 'ptibogxivtheme_container_type')):'container'); ?> site-content">
<div class="row">
<?php dynamic_sidebar('top-widget-area');?>
 </div>
 <div class="row" <?php if(get_theme_mod( 'ptibogxivtheme_cardcontent' )): ?>style="<?php echo ptibogxivtheme_gradient(); ?>"<?php endif; ?>>
<?php if(is_active_sidebar('sidebar-left-widget-area') && (get_theme_mod( 'ptibogxivtheme_sidebar_position' )=='left' or get_theme_mod( 'ptibogxivtheme_sidebar_position' )=='both')){ ?>    
    <div class="order-2 order-md-1 <?php if(get_theme_mod( 'ptibogxivtheme_sidebar_position' )=='both'): ?>col-12 col-md-3<?php
    else: ?>col-12 col-md-3<?php endif; ?>" id="leftsidebar" role="navigation"><br>
<?php if(!get_theme_mod( 'ptibogxivtheme_cardcontent' )): ?><div class="card border-light <?php if(!get_theme_mod( 'ptibogxivtheme_shadowcontent' )): ?>shadow-lg<?php endif; ?>" style="<?php echo ptibogxivtheme_gradient(); ?>"><div class="card-body"><?php endif; ?>
<?php dynamic_sidebar('sidebar-left-widget-area'); ?>
<?php if(!get_theme_mod( 'ptibogxivtheme_cardcontent' )): ?></div></div><?php endif; ?>
<br></div>
<?php } ?>  
    <div class="order-1 order-md-2 <?php if(get_theme_mod( 'ptibogxivtheme_sidebar_position' )=='none'): ?>col-12<?php
    elseif(get_theme_mod( 'ptibogxivtheme_sidebar_position' )=='both'): ?>col-12 col-md-6<?php
    elseif(is_active_sidebar('sidebar-left-widget-area') OR is_active_sidebar('sidebar-right-widget-area')): ?>col-12 col-md-9<?php 
    else: ?>col-12<?php endif; ?>">
      <div id="content" role="main">
        <?php get_template_part('loops/content', get_post_format()); ?>
      </div><!-- /#content -->
    </div>
<?php if(is_active_sidebar('sidebar-right-widget-area') && (get_theme_mod( 'ptibogxivtheme_sidebar_position' )=='right' or get_theme_mod( 'ptibogxivtheme_sidebar_position' )=='both')){ ?>    
    <div class="order-3 <?php if(get_theme_mod( 'ptibogxivtheme_sidebar_position' )=='both'): ?>col-12 col-md-3<?php
    else: ?>col-12 col-md-3<?php endif; ?>" id="rightsidebar" role="navigation"><br>
<?php if(!get_theme_mod( 'ptibogxivtheme_cardcontent' )): ?><div class="card border-light <?php if(!get_theme_mod( 'ptibogxivtheme_shadowcontent' )): ?>shadow-lg<?php endif; ?>" style="<?php echo ptibogxivtheme_gradient(); ?>"><div class="card-body"><?php endif; ?>
<?php dynamic_sidebar('sidebar-right-widget-area'); ?>
<?php if(!get_theme_mod( 'ptibogxivtheme_cardcontent' )): ?></div></div><?php endif; ?>
<br></div>
<?php } ?>   
  </div><!-- /.row -->
</div><!-- /.container -->

<?php get_footer(); ?>
