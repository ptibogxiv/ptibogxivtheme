<?php
/*
All the functions are in the PHP pages in the `functions/` folder.
*/

	require get_template_directory() . '/functions/cleanup.php';
	require get_template_directory() . '/functions/setup.php';
	require get_template_directory() . '/functions/enqueues.php';
	require get_template_directory() . '/functions/navbar.php';
	require get_template_directory() . '/functions/widgets.php';
	require get_template_directory() . '/functions/search-widget.php';
	require get_template_directory() . '/functions/index-pagination.php';
	require get_template_directory() . '/functions/split-post-pagination.php';
	require get_template_directory() . '/functions/feedback.php';
	require get_template_directory() . '/functions/remove-query-string.php';
  

function ptibogxivtheme_load_theme_textdomain() {
load_theme_textdomain( 'ptibogxivtheme', get_template_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'ptibogxivtheme_load_theme_textdomain' );

add_theme_support( 'custom-background',array(
	'default-color'          => '',
	'default-image'          => '',
	'default-repeat'         => '',
	'default-position-x'     => '',
	'default-attachment'     => '',
	'wp-head-callback'       => '_custom_background_cb',
	'admin-head-callback'    => '',
	'admin-preview-callback' => ''
) );

add_theme_support( 'custom-header', array(
    'default-image' => '',
    'random-default' => false,
    'width' => 0,
    'height' => 0,
    'flex-height' => false,
    'flex-width' => false,
    'default-text-color' => '',
    'header-text' => true,
    'uploads' => true,
    'wp-head-callback' => '',
    'admin-head-callback' => '',
    'admin-preview-callback' => '',
    'video' => true,
    'video-active-callback' => 'is_front_page',
) );

add_theme_support( 'custom-logo', array(
	'height'      => 50,
	'width'       => 200,
	'flex-height' => false,
	'flex-width'  => true,
	'header-text' => array( 'site-title', 'site-description' ),
) );

function theme_prefix_setup() {
	
	add_theme_support( 'custom-logo', array(
		'height'      => 50,
		'width'       => 200,
		'flex-width' => true,
	) );

}
add_action( 'after_setup_theme', 'theme_prefix_setup' );
 
function wpc_show_admin_bar() {
return false;
}
add_filter('show_admin_bar' , 'wpc_show_admin_bar');

class My_Caroussel extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		$widget_ops = array( 
			'classname' => 'my_caroussel',                               
			'description' => 'Articles à la une',
      'customize_selective_refresh' => true,
		);
		parent::__construct( 'my_caroussel', 'Caroussel', $widget_ops );
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
global $post,$wpdb;
		// outputs the content of the widget
    
  		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}

echo "<SCRIPT type='text/javascript'>";
 ?>
$('.carousel.').carousel({
  interval: 1000
})
<?php 

$args = array( 'posts_per_page' => 5);
$myposts = get_posts( $args );

echo '</script><div><div id="carouselExampleIndicators" class="carousel slide"><ol class="carousel-indicators">';
$count=-1;
foreach ( $myposts as $post ) {
setup_postdata( $post );
$count = $count+1;
echo '<li data-target="#carouselExampleIndicators" data-slide-to="'.$count.'"';
if ($count=='0') {echo 'class="active"';}
echo '></li>'; 
}
echo '</ol>';
echo '<div class="carousel-inner">';
$count=0;
foreach ( $myposts as $post ) {
setup_postdata( $post );
$count = $count+1;
echo '<div class="carousel-item ';
if ($count =='1') {echo 'active'; }
echo '"><img class="d-block w-100 img-fluid" src="'.wp_get_attachment_image_url(get_post_thumbnail_id( $post ), 'large' ).'" alt="'.$post->post_title.'">
  <div class="carousel-caption d-none d-md-block">
    <h3><a href="'.get_permalink($post->ID).'" class="badge badge-light">'.$post->post_title.'</a></h3>
    <p class="badge badge-light">'.get_the_date( '', $post->ID).'</p>
  </div></div>'; 
}
wp_reset_postdata();    
echo '</div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>';

echo '</div></div>';

echo $args['after_widget'];  
    
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( '', 'text_domain' );
		?>
		<P>
		<LABEL for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'text_domain' ); ?></LABEL> 
		<INPUT class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</P>
		<?php 
	}

	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 *
	 * @return array
	 */
/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

		return $instance;
	}

}

add_action( 'widgets_init', function(){
	register_widget( 'My_Caroussel' );
});

add_action('add_meta_boxes','caroussel_metabox');
function caroussel_metabox(){
  add_meta_box('url_crea', 'Caroussel', 'url_crea', 'post', 'side');
}

function url_crea($post){
  $url = get_post_meta($post->ID,'_displaycaroussel',true);
  echo '<label for="url_meta">Afficher dans le carrousel</label>';
  echo '<input id="url_meta" type="text" name="url_site" value="'.$url.'" />';
}

add_action('save_post','save_metabox');
function save_metabox($post_id){
if(isset($_POST['url_site']))
update_post_meta($post_id, '_url_crea', esc_url($_POST['url_site']));
}


