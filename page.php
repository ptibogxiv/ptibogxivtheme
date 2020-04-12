<?php get_header(); ?>

<div class="<?php echo esc_attr(get_theme_mod( 'ptibogxivtheme_container_type')); ?> site-content">

<?php echo ptibogxiv_alert(); ?> 

<div class="row">
<?php dynamic_sidebar('top-widget-area');?>
 </div>
 <div class="row">
<?php if(is_active_sidebar('sidebar-left-widget-area') && (get_theme_mod( 'ptibogxivtheme_sidebar_position' )=='left' or get_theme_mod( 'ptibogxivtheme_sidebar_position' )=='both')){ ?>    
    <div class="order-2 order-md-1 <?php if(get_theme_mod( 'ptibogxivtheme_sidebar_position' )=='both'): ?>col-12 col-md-3<?php
    else: ?>col-12 col-md-4<?php endif; ?>" id="leftsidebar" role="navigation">
<br><div class="card border-light <?php if(!get_theme_mod( 'ptibogxivtheme_shadowcontent' )): ?>shadow-lg<?php endif; ?>" style="-webkit-backdrop-filter: blur(6px);backdrop-filter: blur(6px);background-color: rgba(255, 255, 255, 0.6);"><div class="card-body"><?php dynamic_sidebar('sidebar-left-widget-area'); ?></div></div><br>
    </div>
<?php } ?>  
    <div class="order-1 order-md-2 <?php if(get_theme_mod( 'ptibogxivtheme_sidebar_position' )=='none'): ?>col-12<?php
    elseif(get_theme_mod( 'ptibogxivtheme_sidebar_position' )=='both'): ?>col-12 col-md-6<?php
    elseif(is_active_sidebar('sidebar-left-widget-area') OR is_active_sidebar('sidebar-right-widget-area')): ?>col-12 col-md-8<?php 
    else: ?>col-12<?php endif; ?>">
      <div id="content" role="main">
        <?php get_template_part('loops/content', 'page'); ?>
      </div><!-- /#content -->
    </div>
<?php if(is_active_sidebar('sidebar-right-widget-area') && (get_theme_mod( 'ptibogxivtheme_sidebar_position' )=='right' or get_theme_mod( 'ptibogxivtheme_sidebar_position' )=='both')){ ?>    
    <div class="order-3 <?php if(get_theme_mod( 'ptibogxivtheme_sidebar_position' )=='both'): ?>col-12 col-md-3<?php
    else: ?>col-12 col-md-4<?php endif; ?>" id="rightsidebar" role="navigation">
<br><div class="card border-light <?php if(!get_theme_mod( 'ptibogxivtheme_shadowcontent' )): ?>shadow-lg<?php endif; ?>" style="-webkit-backdrop-filter: blur(6px);backdrop-filter: blur(6px);background-color: rgba(255, 255, 255, 0.6);"><div class="card-body"><?php dynamic_sidebar('sidebar-right-widget-area'); ?></div></div><br>
    </div>
<?php } ?>   
  </div><!-- /.row -->
</div><!-- /.container -->

<?php get_footer(); ?>
