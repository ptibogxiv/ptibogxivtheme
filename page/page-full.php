<?php
/**
 * Template part for displaying full page content in page.php
Template Name: PleinePage
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package StrapPress
 */

get_header(); ?>

<div class="<?php echo esc_attr(get_theme_mod( 'ptibogxivtheme_container_type')); ?> site-content">

<?php echo ptibogxiv_alert(); ?> 

  <div class="row" <?php if(get_theme_mod( 'ptibogxivtheme_cardcontent' )): ?>style="-webkit-backdrop-filter: blur(5px);backdrop-filter: blur(5px);background-color: rgba(255, 255, 255, 0.5);"<?php endif; ?>>
    <div class="col-12">
      <div id="content" role="main">
        <?php get_template_part('loops/content', 'full'); ?>
      </div><!-- /#content -->
    </div>
  </div><!-- /.row -->
</div><!-- /.container -->

<?php get_footer(); ?>
