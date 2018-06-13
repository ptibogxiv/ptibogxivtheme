<?php get_header(); ?>

<DIV class="container site-content">
<DIV class="row"> 
    <DIV class="<?php if(is_active_sidebar('sidebar-widget-area')): ?>col-12 col-md-8<?php else: ?>col-12<?php endif; ?>">
      <DIV id="content" role="main">
        <?php get_template_part('loops/content', 'single'); ?>
      </DIV><!-- /#content -->
    </DIV>   
<?php if(is_active_sidebar('sidebar-widget-area')){ ?>    
    <DIV class="col-12 col-md-4" id="sidebar" role="navigation">
<BR><DIV class="card border-light shadow-lg" style="background-color: rgba(256, 256, 256, 0.8)"><DIV class="card-body"><?php echo $sidebar_pos; get_sidebar(); ?></DIV></DIV>
    </DIV>
<?php } ?>     
  </DIV><!-- /.row -->
</DIV><!-- /.container -->

<?php get_footer(); ?>
