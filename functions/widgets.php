<?php

function ptibogxivtheme_widgets_init() {

  /*
  Sidebar (one widget area)
   */
  register_sidebar( array(
    'name'            => __( 'Sidebar', 'ptibogxivtheme' ),
    'id'              => 'sidebar-widget-area',
    'description'     => __( 'The sidebar widget area', 'ptibogxivtheme' ),
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
