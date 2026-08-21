<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
add_editor_style( 'theme/css/editor-style.css' );

add_theme_support( 'post-thumbnails' );
add_image_size( 'ptibogxiv_small', 200, 250, true );
add_image_size( 'ptibogxiv', 380, 200, true );
add_image_size( 'ptibogxiv_square', 512, 512, true );
add_image_size( 'ptibogxiv_large', 1200, 400, true );

add_theme_support( 'post-formats', array(
	'aside',
	'gallery',
	'link',
	'image',
	'quote',
	'status',
	'video',
	'audio',
	'chat',
) );

if ( ! isset( $content_width ) ) {
	$content_width = 600;
}

function ptibogxivtheme_excerpt_readmore() {
	return '&nbsp; <a href="' . esc_url( get_permalink() ) . '">' . '&hellip; ' . esc_html__( 'Read more', 'ptibogxivtheme' ) . ' <i class="fa fa-arrow-right"></i>' . '</a></p>';
}
add_filter( 'excerpt_more', 'ptibogxivtheme_excerpt_readmore' );

if ( ! function_exists( 'ptibogxivtheme_sanitize_select' ) ) {
	/**
	 * Sanitize select values for the customizer.
	 */
	function ptibogxivtheme_sanitize_select( $input, $setting ) {
		$input = sanitize_text_field( $input );
		$choices = $setting->manager->get_control( $setting->id )->choices;

		return array_key_exists( $input, $choices ) ? $input : $setting->default;
	}
}

if ( ! function_exists( 'ptibogxivtheme_sanitize_checkbox' ) ) {
	/**
	 * Sanitize checkbox values for the customizer.
	 */
	function ptibogxivtheme_sanitize_checkbox( $checked ) {
		return ( ( isset( $checked ) && true === $checked ) || '1' === $checked ) ? true : false;
	}
}

if ( ! function_exists( 'ptibogxivtheme_theme_customize_register' ) ) {
	/**
	 * Register customizer settings.
	 */
	function ptibogxivtheme_theme_customize_register( $wp_customize ) {
		$wp_customize->add_section( 'ptibogxivtheme_theme_layout_options', array(
			'title'       => __( 'Theme Layout Settings', 'ptibogxivtheme' ),
			'capability'  => 'edit_theme_options',
			'description' => __( 'Container width and sidebar defaults', 'ptibogxivtheme' ),
			'priority'    => 160,
		) );

		$select_settings = array(
			'ptibogxivtheme_container_type' => array(
				'label'    => __( 'Container Width', 'ptibogxivtheme' ),
				'description' => __( "Choose between Bootstrap's container and container-fluid", 'ptibogxivtheme' ),
				'default'  => 'container',
				'priority' => 10,
				'choices'  => array(
					'container'       => __( 'Fixed width container', 'ptibogxivtheme' ),
					'container-fluid' => __( 'Full width container', 'ptibogxivtheme' ),
				),
			),
			'ptibogxivtheme_css' => array(
				'label'    => __( 'Css scheme', 'ptibogxivtheme' ),
				'description' => __( 'Choose between scheme', 'ptibogxivtheme' ),
				'default'  => 'css',
				'priority' => 15,
				'choices'  => array(
					'css'       => 'Default',
					'brite'     => 'Brite',
					'cerulean'  => 'Cerulean',
					'cosmo'     => 'Cosmo',
					'cyborg'    => 'Cyborg',
					'darkly'    => 'Darkly',
					'flatly'    => 'Flatly',
					'journal'   => 'Journal',
					'litera'    => 'Litera',
					'lumen'     => 'Lumen',
					'lux'       => 'Lux',
					'materia'   => 'Materia',
					'minty'     => 'Minty',
					'morph'     => 'Morph',
					'pulse'     => 'Pulse',
					'quartz'    => 'Quartz',
					'sandstone' => 'Sandstone',
					'simplex'   => 'Simplex',
					'sketchy'   => 'Sketchy',
					'slate'     => 'Slate',
					'solar'     => 'Solar',
					'spacelab'  => 'Spacelab',
					'superhero' => 'Superhero',
					'united'    => 'United',
					'vapor'     => 'Vapor',
					'yeti'      => 'Yeti', 
					'zephyr'    => 'Zephyr',
				),
			),
			'ptibogxivtheme_navbar_color' => array(
				'label'    => __( 'Navbar Color scheme', 'ptibogxivtheme' ),
				'description' => __( 'Choose between scheme', 'ptibogxivtheme' ),
				'default'  => 'bg-light',
				'priority' => 20,
				'choices'  => array(
					'bg-light'    => __( 'Light scheme', 'ptibogxivtheme' ),
					'bg-dark'      => __( 'Dark scheme', 'ptibogxivtheme' ),
					'bg-primary'   => __( 'Primary scheme', 'ptibogxivtheme' ),
					'bg-secondary' => __( 'Secondary scheme', 'ptibogxivtheme' ),
					'bg-info'      => __( 'Info scheme', 'ptibogxivtheme' ),
					'bg-success'   => __( 'Success scheme', 'ptibogxivtheme' ),
					'bg-warning'   => __( 'Warning scheme', 'ptibogxivtheme' ),
					'bg-danger'    => __( 'Danger scheme', 'ptibogxivtheme' ),
				),
			),
			'ptibogxivtheme_brand_style' => array(
				'label'    => __( 'Home brand style', 'ptibogxivtheme' ),
				'description' => __( 'Choose between style of home button', 'ptibogxivtheme' ),
				'default'  => 'brand_mode',
				'priority' => 30,
				'choices'  => array(
					'brand_mode' => __( 'Brand only', 'ptibogxivtheme' ),
					'logo_mode'  => __( 'Logo only', 'ptibogxivtheme' ),
					'dual_mode'  => __( 'Brand & logo', 'ptibogxivtheme' ),
					'home_mode'  => __( 'Generic Home', 'ptibogxivtheme' ),
				),
			),
			'ptibogxivtheme_sidebar_position' => array(
				'label'    => __( 'Sidebar Positioning', 'ptibogxivtheme' ),
				'description' => __( "Set sidebar's default position. Can either be: right, left, both or none.", 'ptibogxivtheme' ),
				'default'  => 'right',
				'priority' => 40,
				'choices'  => array(
					'right' => __( 'Right sidebar', 'ptibogxivtheme' ),
					'left'  => __( 'Left sidebar', 'ptibogxivtheme' ),
					'both'  => __( 'Left & Right sidebars', 'ptibogxivtheme' ),
					'none'  => __( 'No sidebar', 'ptibogxivtheme' ),
				),
			),
			'ptibogxivtheme_carousel' => array(
				'label'    => __( 'Carousel / Favorite image', 'ptibogxivtheme' ),
				'description' => __( 'Set carousel / image', 'ptibogxivtheme' ),
				'default'  => '0',
				'priority' => 50,
				'choices'  => array(
					'3' => __( 'Carousel and images on every pages', 'ptibogxivtheme' ),
					'2' => __( 'Only image on pages', 'ptibogxivtheme' ),
					'1' => __( 'Only carousel and images on posts', 'ptibogxivtheme' ),
					'0' => __( 'No carousel or images', 'ptibogxivtheme' ),
				),
			),
		);

		foreach ( $select_settings as $setting_id => $setting_args ) {
			$wp_customize->add_setting( $setting_id, array(
				'default'           => $setting_args['default'],
				'type'              => 'theme_mod',
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'ptibogxivtheme_sanitize_select',
			) );

			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					$setting_id,
					array(
						'label'       => $setting_args['label'],
						'description' => $setting_args['description'],
						'section'     => 'ptibogxivtheme_theme_layout_options',
						'settings'    => $setting_id,
						'type'        => 'select',
						'choices'     => $setting_args['choices'],
						'priority'    => $setting_args['priority'],
					)
				)
			);
		}

		$checkbox_settings = array(
			'ptibogxivtheme_adminbar' => __( 'Restore the native admin bar', 'ptibogxivtheme' ),
			'ptibogxivtheme_shadowcontent' => __( 'Remove the shadow of content box', 'ptibogxivtheme' ),
			'ptibogxivtheme_cardcontent' => __( 'Remove the card of content box', 'ptibogxivtheme' ),
		);

		$priority = 60;
		foreach ( $checkbox_settings as $setting_id => $label ) {
			$wp_customize->add_setting( $setting_id, array(
				'default'           => false,
				'type'              => 'theme_mod',
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'ptibogxivtheme_sanitize_checkbox',
			) );

			$wp_customize->add_control( $setting_id, array(
				'label'    => $label,
				'settings' => $setting_id,
				'section'  => 'ptibogxivtheme_theme_layout_options',
				'type'     => 'checkbox',
				'priority' => $priority,
			) );

			$priority += 10;
		}

		if ( is_multisite() ) {
			$wp_customize->add_setting( 'ptibogxivtheme_networkbar_color', array(
				'default'           => '0',
				'type'              => 'theme_mod',
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'ptibogxivtheme_sanitize_select',
			) );

			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'ptibogxivtheme_networkbar_color',
					array(
						'label'       => __( 'Networkbar Color scheme', 'ptibogxivtheme' ),
						'description' => __( 'Choose between scheme', 'ptibogxivtheme' ),
						'section'     => 'ptibogxivtheme_theme_layout_options',
						'settings'    => 'ptibogxivtheme_networkbar_color',
						'type'        => 'select',
						'choices'     => array(
							'0'                       => __( 'Not active', 'ptibogxivtheme' ),
							'navbar-light bg-light'    => __( 'Light scheme', 'ptibogxivtheme' ),
							'navbar-dark bg-dark'      => __( 'Dark scheme', 'ptibogxivtheme' ),
							'navbar-dark bg-primary'   => __( 'Primary scheme', 'ptibogxivtheme' ),
							'navbar-dark bg-secondary' => __( 'Secondary scheme', 'ptibogxivtheme' ),
							'navbar-dark bg-info'      => __( 'Info scheme', 'ptibogxivtheme' ),
							'navbar-dark bg-success'   => __( 'Success scheme', 'ptibogxivtheme' ),
							'navbar-dark bg-warning'   => __( 'Warning scheme', 'ptibogxivtheme' ),
							'navbar-dark bg-danger'    => __( 'Danger scheme', 'ptibogxivtheme' ),
						),
						'priority'    => 100,
					)
				)
			);
		}
	}
}
add_action( 'customize_register', 'ptibogxivtheme_theme_customize_register' );
