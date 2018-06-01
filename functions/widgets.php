<?php

function b4st_widgets_init() {

  /*
  Sidebar (one widget area)
   */
  register_sidebar( array(
    'name'            => __( 'Sidebar', 'b4st' ),
    'id'              => 'sidebar-widget-area',
    'description'     => __( 'The sidebar widget area', 'b4st' ),
    'before_widget'   => '<section class="%1$s %2$s">',
    'after_widget'    => '</section>',
    'before_title'    => '<h4>',
    'after_title'     => '</h4>',
  ) );

  /*
  Footer (three widget areas)
   */
  register_sidebar( array(
    'name'            => __( 'Footer', 'b4st' ),
    'id'              => 'footer-widget-area',
    'description'     => __( 'The footer widget area', 'b4st' ),
    'before_widget'   => '<div class="%1$s %2$s">',
    'after_widget'    => '</div>',
    'before_title'    => '<h4>',
    'after_title'     => '</h4>',
  ) );
  
      /*
  Top (three widget areas)
   */
  register_sidebar( array(
    'name'            => __( 'Top', 'b4st' ),
    'id'              => 'top-widget-area',
    'description'     => __( 'The top widget area', 'b4st' ),
    'before_widget'   => '<div class="%1$s %2$s col-12">',
    'after_widget'    => '</div>',
    'before_title'    => '<h4>',
    'after_title'     => '</h4>',
  ) );
  
    /*
  Footer (three widget areas)
   */
  register_sidebar( array(
    'name'            => __( 'Caroussel', 'b4st' ),
    'id'              => 'caroussel-widget-area',
    'description'     => __( 'The caroussel widget area', 'b4st' ),
    'before_widget'   => '<div class="%1$s %2$s col-12">',
    'after_widget'    => '</div>',
    'before_title'    => '<h4>',
    'after_title'     => '</h4>',
  ) );

}
add_action( 'widgets_init', 'b4st_widgets_init' );
