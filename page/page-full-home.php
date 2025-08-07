<?php
/**
 * Template part for displaying full page content in page.php
Template Name: PleinePageAccueil
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package StrapPress
 */

get_header(); ?>

<div class="<?php echo (!empty(esc_attr(get_theme_mod( 'ptibogxivtheme_container_type')))?esc_attr(get_theme_mod( 'ptibogxivtheme_container_type')):'container'); ?> site-content">
<div class="row">
<?php dynamic_sidebar('caroussel-widget-area');?>
</div>
  <div class="row"> 
    <div class="col-12">
      <div id="content" role="main">
        <?php get_template_part('loops/content', 'home'); ?>
      </div><!-- /#content -->
    </div>
    
  </div><!-- /.row -->
</div><!-- /.container -->

<?php get_footer(); ?>
