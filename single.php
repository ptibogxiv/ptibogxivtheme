<?php get_header(); ?>

<div class="container site-content">
  <div class="row">
    
    <div class="<?php if(is_active_sidebar('sidebar-widget-area')): ?>col-12 col-md-8<?php else: ?>col-12<?php endif; ?>">
      <div id="content" role="main">
        <?php get_template_part('loops/content', 'single'); ?>
      </div><!-- /#content -->
    </div>
    
    <div class="col-12 col-md-4" id="sidebar" role="navigation">
<BR><DIV class="card border-light"><DIV class="card-body"><?php echo $sidebar_pos; get_sidebar(); ?></DIV></DIV>
<BR></div>
    
  </div><!-- /.row -->
</div><!-- /.container -->

<?php get_footer(); ?>
