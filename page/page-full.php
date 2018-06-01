<?php
/**
 * Template part for displaying full page content in page.php
Template Name: PleinePage
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package StrapPress
 */

get_header(); ?>

<div class="container site-content">
  <div class="row">
    
    <div class="col-12">
      <div id="content" role="main">
        <?php get_template_part('loops/content', 'full'); ?>
      </div><!-- /#content -->
    </div>
    
  </div><!-- /.row -->
</div><!-- /.container -->

<?php get_footer(); ?>
