<?php get_header(); ?>

<DIV class="<?php echo esc_attr(get_theme_mod( 'ptibogxivtheme_container_type')); ?> site-content">
<DIV class="row">
<?php dynamic_sidebar('top-widget-area');?>
 </DIV>
 <DIV class="row">
    <div class="<?php if(is_active_sidebar('sidebar-right-widget-area')): ?>col-sm-8<?php else: ?>col-sm-12<?php endif; ?>">
      <div id="content" role="main">
        <header>
          <h1><?php _e('Search Results for', 'ptibogxivtheme'); ?> &ldquo;<?php the_search_query(); ?>&rdquo;</h1>
        </header>
        <hr/>
        <?php get_template_part('loops/content', 'search'); ?>
      </div><!-- /#content -->
    </div>
    
<?php if(is_active_sidebar('sidebar-right-widget-area') && (get_theme_mod( 'ptibogxivtheme_sidebar_position' )=='right' or get_theme_mod( 'ptibogxivtheme_sidebar_position' )=='both')){ ?>    
    <DIV class="<?php if(get_theme_mod( 'ptibogxivtheme_sidebar_position' )=='both'): ?>col-12 col-md-3<?php
    else: ?>col-12 col-md-4<?php endif; ?>" id="rightsidebar" role="navigation">
<BR><DIV class="card border-light <?php if(!get_theme_mod( 'ptibogxivtheme_shadowcontent' )): ?>shadow-lg<?php endif; ?>" style="background-color: rgba(256, 256, 256, 0.8)"><DIV class="card-body"><?php dynamic_sidebar('sidebar-right-widget-area'); ?></DIV></DIV><BR>
    </DIV>
<?php } ?> 
    
  </div><!-- /.row -->
</div><!-- /.container -->

<?php get_footer(); ?>
