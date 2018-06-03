<?php

function ptibogxivtheme_setup() {
	add_editor_style('theme/css/editor-style.css');
	add_theme_support('post-thumbnails');
	update_option('thumbnail_size_w', 170);
	update_option('medium_size_w', 470);
	update_option('large_size_w', 1024);
  update_option('large_size_h', 256);
  update_option('large_crop', 1);
}
add_action('init', 'ptibogxivtheme_setup');

if (! isset($content_width))
	$content_width = 600;

function ptibogxivtheme_excerpt_readmore() {
	return '&nbsp; <a href="'. get_permalink() . '">' . '&hellip; ' . __('Read more', 'ptibogxivtheme') . ' <i class="fa fa-arrow-right"></i>' . '</a></p>';
}
add_filter('excerpt_more', 'ptibogxivtheme_excerpt_readmore');

// Add post formats support. See http://codex.wordpress.org/Post_Formats
add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat'));

if ( ! function_exists( 'ptibogxivtheme_theme_customize_register' ) ) {
	/**
	 * Register individual settings through customizer's API.
	 *
	 * @param WP_Customize_Manager $wp_customize Customizer reference.
	 */
	function ptibogxivtheme_theme_customize_register( $wp_customize ) {

		// Theme layout settings.
		$wp_customize->add_section( 'ptibogxivtheme_theme_layout_options', array(
			'title'       => __( 'Theme Layout Settings', 'ptibogxivtheme' ),
			'capability'  => 'edit_theme_options',
			'description' => __( 'Container width and sidebar defaults', 'ptibogxivtheme' ),
			'priority'    => 160,
		) );

		$wp_customize->add_setting( 'ptibogxivtheme_container_type', array(
			'default'           => 'container',
			'type'              => 'theme_mod',
			'sanitize_callback' => 'esc_textarea',
			'capability'        => 'edit_theme_options',
		) );

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'ptibogxivtheme_container_type', array(
					'label'       => __( 'Container Width', 'ptibogxivtheme' ),
					'description' => __( "Choose between Bootstrap's container and container-fluid", 'ptibogxivtheme' ),
					'section'     => 'ptibogxivtheme_theme_layout_options',
					'settings'    => 'ptibogxivtheme_container_type',
					'type'        => 'select',
					'choices'     => array(
						'container'       => __( 'Fixed width container', 'ptibogxivtheme' ),
						'container-fluid' => __( 'Full width container', 'ptibogxivtheme' ),
					),
					'priority'    => '10',
				)
			) );
      
     $wp_customize->add_setting( 'ptibogxivtheme_css', array(
			'default'           => 'css',
			'type'              => 'theme_mod',
			'sanitize_callback' => 'esc_textarea',
			'capability'        => 'edit_theme_options',
		) );   
    
    $wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'ptibogxivtheme_css', array(
					'label'       => __( 'Navbar Css scheme', 'ptibogxivtheme' ),
					'description' => __( "Choose between css scheme", 'ptibogxivtheme' ),
					'section'     => 'ptibogxivtheme_theme_layout_options',
					'settings'    => 'ptibogxivtheme_css',
					'type'        => 'select',
					'choices'     => array(
						'css' => __( 'Default', 'ptibogxivtheme' ),
						'cerulean' => __( 'Cerulean', 'ptibogxivtheme' ),
						'cosmo' => __( 'Cosmo', 'ptibogxivtheme' ),
            'cyborg' => __( 'Cyborg', 'ptibogxivtheme' ),
            'darky' => __( 'Darkly', 'ptibogxivtheme' ),
            'flatly' => __( 'Flatly', 'ptibogxivtheme' ),
						'journal' => __( 'Journal', 'ptibogxivtheme' ),
            'litera' => __( 'Litera', 'ptibogxivtheme' ),
            'lumen' => __( 'Lumen', 'ptibogxivtheme' ),
            'lux' => __( 'Lux', 'ptibogxivtheme' ), 
            'materia' => __( 'Materia', 'ptibogxivtheme' ),
            'minty' => __( 'Minty', 'ptibogxivtheme' ), 
            'pulse' => __( 'Pulse', 'ptibogxivtheme' ),
            'sandstone' => __( 'Sandstone', 'ptibogxivtheme' ),
            'simplex' => __( 'Simplex', 'ptibogxivtheme' ),
            'sketchy' => __( 'Sketchy', 'ptibogxivtheme' ), 
            'slate' => __( 'Slate', 'ptibogxivtheme' ),
            'solar' => __( 'Solar', 'ptibogxivtheme' ),
            'spacelab' => __( 'Spacelab', 'ptibogxivtheme' ),
            'superhero' => __( 'Superhero', 'ptibogxivtheme' ), 
            'united' => __( 'United', 'ptibogxivtheme' ),
            'yeti' => __( 'Yeti', 'ptibogxivtheme' ),              
					),
					'priority'    => '15',
				)
			) ); 
      
    $wp_customize->add_setting( 'ptibogxivtheme_navbar_color', array(
			'default'           => 'navbar-light bg-light',
			'type'              => 'theme_mod',
			'sanitize_callback' => 'esc_textarea',
			'capability'        => 'edit_theme_options',
		) ); 
      
   	$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'ptibogxivtheme_navbar_color', array(
					'label'       => __( 'Navbar Color scheme', 'ptibogxivtheme' ),
					'description' => __( "Choose between color scheme", 'ptibogxivtheme' ),
					'section'     => 'ptibogxivtheme_theme_layout_options',
					'settings'    => 'ptibogxivtheme_navbar_color',
					'type'        => 'select',
					'choices'     => array(
						'navbar-light bg-light' => __( 'Light scheme', 'ptibogxivtheme' ),
						'navbar-dark bg-dark' => __( 'Dark scheme', 'ptibogxivtheme' ),
						'navbar-dark bg-primary' => __( 'Primary scheme', 'ptibogxivtheme' ),
            'navbar-dark bg-secondary' => __( 'Secondary scheme', 'ptibogxivtheme' ),
            'navbar-dark bg-info' => __( 'Info scheme', 'ptibogxivtheme' ),
            'navbar-dark bg-success' => __( 'Success scheme', 'ptibogxivtheme' ),
						'navbar-dark bg-warning' => __( 'Warning scheme', 'ptibogxivtheme' ),
            'navbar-dark bg-danger' => __( 'Danger scheme', 'ptibogxivtheme' ),            
					),
					'priority'    => '20',
				)
			) );
      
    $wp_customize->add_setting( 'ptibogxivtheme_brand_style', array(
			'default'           => 'brand_mode',
			'type'              => 'theme_mod',
			'sanitize_callback' => 'esc_textarea',
			'capability'        => 'edit_theme_options',
		) );

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'ptibogxivtheme_brand_style', array(
					'label'       => __( 'Home brand style', 'ptibogxivtheme' ),
					'description' => __( "Style of brand home button in navbar", 'ptibogxivtheme' ),
					'section'     => 'ptibogxivtheme_theme_layout_options',
					'settings'    => 'ptibogxivtheme_brand_style',
					'type'        => 'select',
					'choices'     => array(
						'brand_mode' => __( 'Brand only', 'ptibogxivtheme' ),
						'logo_mode'  => __( 'Logo only', 'ptibogxivtheme' ),
						'dual_mode'  => __( 'Brand & logo', 'ptibogxivtheme' ),
            'home_mode'  => __( 'Generic Home', 'ptibogxivtheme' ),
					),
					'priority'    => '30',
				)
			) );       
      
    $wp_customize->add_setting( 'ptibogxivtheme_sidebar_position', array(
			'default'           => 'right',
			'type'              => 'theme_mod',
			'sanitize_callback' => 'esc_textarea',
			'capability'        => 'edit_theme_options',
		) );

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'ptibogxivtheme_sidebar_position', array(
					'label'       => __( 'Sidebar Positioning', 'understrap' ),
					'description' => __( "Set sidebar's default position. Can either be: right, left, both or none. Note: this can be overridden on individual pages.",
					'understrap' ),
					'section'     => 'ptibogxivtheme_theme_layout_options',
					'settings'    => 'ptibogxivtheme_sidebar_position',
					'type'        => 'select',
					'choices'     => array(
						'right' => __( 'Right sidebar', 'ptibogxivtheme' ),
						'left'  => __( 'Left sidebar', 'ptibogxivtheme' ),
						'both'  => __( 'Left & Right sidebars', 'ptibogxivtheme' ),
						'none'  => __( 'No sidebar', 'ptibogxivtheme' ),
					),
					'priority'    => '40',
				)
			) );    

	}
} // endif function_exists( 'understrap_theme_customize_register' ).
add_action( 'customize_register', 'ptibogxivtheme_theme_customize_register' );