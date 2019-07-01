<?php

function ptibogxivtheme_setup() {
	add_editor_style('theme/css/editor-style.css');
	add_theme_support('post-thumbnails');
  add_image_size('ptibogxiv_small', 200, 250, true );
  add_image_size('ptibogxiv', 380, 200, true );
  add_image_size('ptibogxiv_square', 512, 512, true );
  add_image_size('ptibogxiv_large', 1200, 400, true );
	update_option('thumbnail_size_w', 170);
	update_option('medium_size_w', 380);
  update_option('medium_size_h', 200);
  update_option('large_size_w', 760);
  update_option('large_size_h', 400);   
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
      'default'     => 'container',
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
					'label'       => __( 'Css scheme', 'ptibogxivtheme' ),
					'description' => __( "Choose between scheme", 'ptibogxivtheme' ),
					'section'     => 'ptibogxivtheme_theme_layout_options',
					'settings'    => 'ptibogxivtheme_css',
					'type'        => 'select',
					'choices'     => array(
						'css' => __( 'Default', 'ptibogxivtheme' ),
						'cerulean' => __( 'Cerulean', 'ptibogxivtheme' ),
						'cosmo' => __( 'Cosmo', 'ptibogxivtheme' ),
            'cyborg' => __( 'Cyborg', 'ptibogxivtheme' ),
            'darkly' => __( 'Darkly', 'ptibogxivtheme' ),
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
			'default'           => 'navbar-dark bg-dark',
			'type'              => 'theme_mod',
			'sanitize_callback' => 'esc_textarea',
			'capability'        => 'edit_theme_options',
		) ); 
      
   	$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'ptibogxivtheme_navbar_color', array(
					'label'       => __( 'Navbar Color scheme', 'ptibogxivtheme' ),
					'description' => __( "Choose between scheme", 'ptibogxivtheme' ),
					'section'     => 'ptibogxivtheme_theme_layout_options',
					'settings'    => 'ptibogxivtheme_navbar_color',
					'type'        => 'select',
          'default'     => 'navbar-dark bg-dark',
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
					'description' => __( "Choose between style of home button", 'ptibogxivtheme' ),
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
					'label'       => __( 'Sidebar Positioning', 'ptibogxivtheme' ),
					'description' => __( "Set sidebar's default position. Can either be: right, left, both or none.", 'ptibogxivtheme' ),
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
      
    $wp_customize->add_setting( 'ptibogxivtheme_carousel', array(
			'default'           => '0',
			'type'              => 'theme_mod',
			'sanitize_callback' => 'esc_textarea',
			'capability'        => 'edit_theme_options',
		) );

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'ptibogxivtheme_carousel', array(
					'label'       => __( 'Carousel / Favorite image', 'ptibogxivtheme' ),
					'description' => __( "Set carousel / image", 'ptibogxivtheme' ),
					'section'     => 'ptibogxivtheme_theme_layout_options',
					'settings'    => 'ptibogxivtheme_carousel',
					'type'        => 'select',
					'choices'     => array(
						'3' => __( 'Carousel and images on every pages', 'ptibogxivtheme' ),
						'2'  => __( 'Only image on pages', 'ptibogxivtheme' ),
						'1'  => __( 'Only carousel and images on posts', 'ptibogxivtheme' ),
						'0'  => __( 'No carousel or images', 'ptibogxivtheme' ),
					),
					'priority'    => '50',
				)
			) );      
      
    $wp_customize->add_setting( 'ptibogxivtheme_adminbar', array(
    'default'        => false,
    'capability'     => 'edit_theme_options'
    ) );

    $wp_customize->add_control( 'ptibogxivtheme_adminbar', array(
    'settings' => 'ptibogxivtheme_adminbar',
    'label'    => __( 'Restore the native admin bar', 'ptibogxivtheme' ),
    'section'  => 'ptibogxivtheme_theme_layout_options',
    'type'     => 'checkbox',
    'priority'    => '60',
) );

    $wp_customize->add_setting( 'ptibogxivtheme_shadowcontent', array(
    'default'        => false,
    'capability'     => 'edit_theme_options'
    ) );

    $wp_customize->add_control( 'ptibogxivtheme_shadowcontent', array(
    'settings' => 'ptibogxivtheme_shadowcontent',
    'label'    => __( 'Remove the shadow of content box', 'ptibogxivtheme' ),
    'section'  => 'ptibogxivtheme_theme_layout_options',
    'type'     => 'checkbox',
    'priority'    => '70',
) );
 
if (is_multisite()) {
    $wp_customize->add_setting( 'ptibogxivtheme_networkbar_color', array(
			'default'           => 'navbar-dark bg-dark',
			'type'              => 'theme_mod',
			'sanitize_callback' => 'esc_textarea',
			'capability'        => 'edit_theme_options',
		) ); 
      
   	$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'ptibogxivtheme_networkbar_color', array(
					'label'       => __( 'Networkbar Color scheme', 'ptibogxivtheme' ),
					'description' => __( "Choose between scheme", 'ptibogxivtheme' ),
					'section'     => 'ptibogxivtheme_theme_layout_options',
					'settings'    => 'ptibogxivtheme_networkbar_color',
					'type'        => 'select',
          'default'     => 'navbar-dark bg-dark',
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
					'priority'    => '100',
				)
			) );    
}

	}
} // endif function_exists( 'understrap_theme_customize_register' ).
add_action( 'customize_register', 'ptibogxivtheme_theme_customize_register' );

function ptibogxivtheme_admin_page() {
add_menu_page(__( 'ptibogxivtheme', 'ptibogxivtheme' ), __( 'ptibogxivtheme', 'ptibogxivtheme' ), 'manage_options', 'ptibogxivtheme_network_page', 'ptibogxivtheme_network_page', 'dashicons-admin-appearance');
add_submenu_page('ptibogxivtheme_network_page', "Management", "Management", 'manage_options', 'ptibogxivtheme_network_page', 'ptibogxivtheme_network_page');
}

if ( is_multisite() ) {
add_action( 'network_admin_menu', 'ptibogxivtheme_admin_page' );
}
function ptibogxivtheme_network_page() {
    echo '<DIV class="wrap">';
    echo '<H2>Customization network ptibogxivtheme</H2>';
/*** License activate button was clicked ***/
if (isset($_REQUEST['activate_ptibogxivtheme'])) {     
if ( add_site_option( 'ptibogxivtheme_networkbar', $_REQUEST['ptibogxivtheme_networkbar']) ) {
} else {
delete_site_option('ptibogxivtheme_networkbar');
}
    }    
    /*** End of sample license deactivation ***/    
		?>       
<DIV id="<?php echo $id; ?>" class="postbox">
<DIV class="inside">
    <P>Force some customization for the network</P>
    <FORM action="" method="post">
        <TABLE class="form-table" width="100%">
            <TR>
                <TH style="width:150px;"><LABEL for="ptibogxivtheme_networkbar">ptibogxivtheme_networkbar</LABEL></TH>
                <TD ><INPUT name="ptibogxivtheme_networkbar" type="checkbox" id="ptibogxivtheme_networkbar" value="1" <?php checked('1', get_site_option('ptibogxivtheme_networkbar')); ?> /> ptibogxivtheme_networkbar</TD>
            </TR>            
        </TABLE>
        <P class="submit">
            <INPUT type="submit" name="activate_ptibogxivtheme" value="Activate" class="button-primary" />
        </P>
    </FORM>     				
    </DIV>
</DIV>
<?php    
}