<?php

function ptibogxivtheme_widgets_init() {

  /*
  Left sidebar (one widget area)
   */
  register_sidebar( array(
    'name'            => __( 'Left sidebar', 'ptibogxivtheme' ),
    'id'              => 'sidebar-left-widget-area',
    'description'     => __( 'The left sidebar widget area', 'ptibogxivtheme' ),
    'before_widget'   => '<section class="%1$s %2$s">',
    'after_widget'    => '</section>',
    'before_title'    => '<h4>',
    'after_title'     => '</h4>',
  ) );

  /*
  Right sidebar (one widget area)
   */
  register_sidebar( array(
    'name'            => __( 'Right sidebar', 'ptibogxivtheme' ),
    'id'              => 'sidebar-right-widget-area',
    'description'     => __( 'The right sidebar widget area', 'ptibogxivtheme' ),
    'before_widget'   => '<section class="%1$s %2$s">',
    'after_widget'    => '</section>',
    'before_title'    => '<h4>',
    'after_title'     => '</h4>',
  ) );

  /*
  Footer (three widget areas)
   */
  register_sidebar( array(
    'name'            => __( 'Footer', 'ptibogxivtheme' ),
    'id'              => 'footer-widget-area',
    'description'     => __( 'The footer widget area', 'ptibogxivtheme' ),
    'before_widget'   => '<div class="%1$s %2$s">',
    'after_widget'    => '</div>',
    'before_title'    => '<h4>',
    'after_title'     => '</h4>',
  ) );
  
      /*
  Top (three widget areas)
   */
  register_sidebar( array(
    'name'            => __( 'Top', 'ptibogxivtheme' ),
    'id'              => 'top-widget-area',
    'description'     => __( 'The top widget area', 'ptibogxivtheme' ),
    'before_widget'   => '<div class="%1$s %2$s col-12">',
    'after_widget'    => '</div>',
    'before_title'    => '<h4>',
    'after_title'     => '</h4>',
  ) );
  
    /*
  Footer (three widget areas)
   */
  register_sidebar( array(
    'name'            => __( 'Caroussel', 'ptibogxivtheme' ),
    'id'              => 'caroussel-widget-area',
    'description'     => __( 'The caroussel widget area', 'ptibogxivtheme' ),
    'before_widget'   => '<div class="%1$s %2$s col-12">',
    'after_widget'    => '</div>',
    'before_title'    => '<h4>',
    'after_title'     => '</h4>',
  ) );

}
add_action( 'widgets_init', 'ptibogxivtheme_widgets_init' );
