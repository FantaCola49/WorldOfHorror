<?php 
/**
* Main Class
*/
class NA_HOVER_EFFECTS
{
	
	function __construct()
	{
		add_action( 'init', array($this, 'na_register_hover_effect'));
		add_action( 'admin_menu', array($this, 'adding_submenu'));
		add_action( 'add_meta_boxes', array($this, 'image_hover_data_box' ));
		add_action( 'save_post', array($this, 'saving_image_hover_effect' ));
		add_action('admin_enqueue_scripts', array($this, 'na_admin_script'));
		add_shortcode('hover-effect', array($this, 'render_gallery_shortcode') );
		add_filter( 'manage_image_hover_effect_posts_columns', array($this, 'my_edit_image_hover_effect_columns') ) ;
		add_action( 'manage_posts_custom_column' , array($this, 'insert_col_heading'), 10, 2 );
	}

	function my_edit_image_hover_effect_columns($columns){
		$shortcode_arr = array('shortcode' => 'Shortcode');
		return array_merge($columns, $shortcode_arr);	
	}

	function insert_col_heading($column, $id){
		global $post;

		if ($post->post_type == 'image_hover_effect') {
			echo '[hover-effect id="'.$id.'"]';
		}

	}

	function na_admin_script($check) {
		if ($check == 'post-new.php' || $check == 'post.php' || 'edit.php') {
			wp_enqueue_media();
			wp_enqueue_style( 'wp-color-picker' );
			wp_enqueue_script( 'na-admin-script', plugin_dir_url( __FILE__ ). '/lib/admin.js', array('jquery', 'wp-color-picker', 'jquery-ui-sortable', 'jquery-ui-accordion'));
			// wp_enqueue_style( 'na-admin-style', plugin_dir_url( __FILE__ ). '/css/jquery-ui.theme.min.css');
			wp_enqueue_style( 'na-admin-style-ui', plugin_dir_url( __FILE__ ). '/css/jquery-ui.css');
		}
	}

	function na_register_hover_effect() {
	
		$custom_labels = array(
			'name'                => __( 'Image Hover Effects', 'image-hover-effect' ),
			'singular_name'       => __( 'Hover Effect', 'image-hover-effect' ),
			'add_new'             => _x( 'Add New Hover Effect', 'image-hover-effect', 'image-hover-effect' ),
			'add_new_item'        => __( 'Add New Hover Effect', 'image-hover-effect' ),
			'edit_item'           => __( 'Edit Hover Effect', 'image-hover-effect' ),
			'new_item'            => __( 'New Hover Effect', 'image-hover-effect' ),
			'view_item'           => __( 'View Hover Effect', 'image-hover-effect' ),
			'search_items'        => __( 'Search Hover Effects', 'image-hover-effect' ),
			'not_found'           => __( 'No Hover Effects found', 'image-hover-effect' ),
			'not_found_in_trash'  => __( 'No Hover Effects found in Trash', 'image-hover-effect' ),
			'parent_item_colon'   => __( 'Parent Hover Effect:', 'image-hover-effect' ),
			'menu_name'           => __( 'Hover Effects', 'image-hover-effect' ),
		);
	
		$effect_args = array(
			'labels'                   => $custom_labels,
			'hierarchical'        => false,
			'description'         => 'Image Hover Effects',
			'taxonomies'          => array(),
			'public'              => false,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => null,
			'menu_icon'           => 'dashicons-format-gallery',
			'show_in_nav_menus'   => false,
			'publicly_queryable'  => true,
			'exclude_from_search' => true,
			'has_archive'         => false,
			'query_var'           => true,
			'can_export'          => true,
			'rewrite'             => true,
			'capability_type'     => 'post',
			'supports'            => array(
			'title'
			)
		);
	
		register_post_type( 'image_hover_effect', $effect_args );
	}

	function render_gallery_shortcode($atts) {
		wp_enqueue_style( 'na-bootstrap-style', plugin_dir_url( __FILE__ ). 'css/simplegrid.css');	
		wp_enqueue_style( 'na-hover-style', plugin_dir_url( __FILE__ ). 'css/ihover.css');	
		wp_enqueue_style( 'na-pp', plugin_dir_url( __FILE__ ). 'css/prettyPhoto.css');	
		wp_enqueue_script( 'na-pp', plugin_dir_url( __FILE__ ). 'js/jquery.prettyPhoto.js', array('jquery'));
		wp_enqueue_script( 'na-gallery-script', plugin_dir_url( __FILE__ ). 'js/script.js', array('jquery', 'jquery-masonry'));

		ob_start();
		include 'render_shortcode.php';
		return ob_get_clean();
	}

	function image_hover_data_box() {
	    add_meta_box('na_hover_options', 'Settings', array($this, 'render_metabox'), 'image_hover_effect');
	    add_meta_box('na_hover_shortcode', 'Shortcode', array($this, 'render_metabox_shortcode_display'), 'image_hover_effect', 'side');
	    add_meta_box('na_hover_colorpicker', 'Color Picker', array($this, 'render_metabox_colorpicker_display'), 'image_hover_effect', 'side');
	}

	function adding_submenu() {
	    add_submenu_page( 'edit.php?post_type=image_hover_effect', 'More Plugins', 'More Plugins', 'manage_options', 'na_more_plugins', array($this, 'render_more_page'));
	}

	function render_more_page(){
		include 'more_plugins.php';
	}
	// for shortcode
	function render_metabox_shortcode_display() {
		global $post;
		if (isset($post->ID)) {
			echo '<p style="text-align:center;">[hover-effect id="'.$post->ID.'"]</p>';
		}
		?>
	<h2 style="text-align:center;"><strong>Pro Features</strong></h2>
	<hr>
	<ol>
		<li>Popup</li>
		<li>Popup Slider</li>
		<li>Play Video</li>
		<li>Image Over Another Image</li>
		<li>Custom Width</li>
		<li>Custom Height</li>
		<li>Masonry Grid</li>
		<li>Custom Border Colors</li>
		<li>24 Hours Support</li>
		<li><a href="http://www.topdigitaltrends.net/image-hover-effects-css3-pro/" target="_blank">Pro Demo</a></li>
	</ol>
	<p style="text-align:center;">
		<a target="_blank" href="http://www.topdigitaltrends.net/image-hover-effects-css3-pro/" class="button button-primary button-hero">Unlock Pro Features</a>
	</p>
	<?php
	}

	function render_metabox_colorpicker_display(){
		echo '<input type="text" class="colorpicker">';
	}

	function render_metabox() {
		// Use nonce for verification
	    wp_nonce_field( plugin_basename( __FILE__ ), 'ihe_nonce' );
	    include 'render_metabox.php';
	}
	function saving_image_hover_effect( $post_id ) {
	    // verify if this is an auto save routine. 
	    // If it is our form has not been submitted, so we dont want to do anything
	    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
	        return;

	    // verify this came from the our screen and with proper authorization,
	    // because save_post can be triggered at other times
	    if ( !isset( $_POST['ihe_nonce'] ) )
	        return;

	    if ( !wp_verify_nonce( $_POST['ihe_nonce'], plugin_basename( __FILE__ ) ) )
	        return;

	    // OK, we're authenticated: we need to find and save the data

	    $saved_options = $_POST['wcpop'];
	    $item_cols = $_POST['masonry_columns'];
	    $custom_css = $_POST['custom_css'];
	    $saved_options_masonry = (isset($_POST['enablemasonry'])) ? 'yes' : 'no' ;

	    update_post_meta($post_id,'wcpop',$saved_options);
	    update_post_meta($post_id,'masonry', $saved_options_masonry);
	    update_post_meta($post_id,'grid_cols', $item_cols);
	    update_post_meta($post_id,'custom_css', $custom_css);
	}

    function get_ihover_effects(){
        $hoverEffects = array(
        	'NoEffect',
            'circle effect2 left_to_right',
            'circle effect2 right_to_left',
            'circle effect2 top_to_bottom',
            'circle effect2 bottom_to_top',
            'circle effect3 left_to_right',
            'circle effect3 right_to_left',
            'circle effect3 bottom_to_top',
            'circle effect3 top_to_bottom',
            'circle effect4 left_to_right',
            'circle effect4 right_to_left',
            'circle effect4 top_to_bottom',
            'circle effect4 bottom_to_top',
            'circle effect5',
            'circle effect6 scale_up',
            'circle effect6 scale_down',
            'circle effect6 scale_down_up',
            'circle effect7 left_to_right',
            'circle effect7 right_to_left',
            'circle effect7 top_to_bottom',
            'circle effect7 bottom_to_top',
            'circle effect8 left_to_right',
            'circle effect8 right_to_left',
            'circle effect8 top_to_bottom',
            'circle effect8 bottom_to_top',
            'circle effect9 left_to_right',
            'circle effect9 right_to_left',
            'circle effect9 top_to_bottom',
            'circle effect9 bottom_to_top',
            'circle effect10 top_to_bottom',
            'circle effect10 bottom_to_top',
            'circle effect11 left_to_right',
            'circle effect11 right_to_left',
            'circle effect11 top_to_bottom',
            'circle effect11 bottom_to_top',
            'circle effect12 left_to_right',
            'circle effect12 right_to_left',
            'circle effect12 top_to_bottom',
            'circle effect12 bottom_to_top',
            'circle effect13 from_left_and_right',
            'circle effect13 top_to_bottom',
            'circle effect13 bottom_to_top',
            'circle effect14 left_to_right',
            'circle effect14 right_to_left',
            'circle effect14 top_to_bottom',
            'circle effect14 bottom_to_top',
            'circle effect15 left_to_right',
            'circle effect16 left_to_right',
            'circle effect16 right_to_left',
            'circle effect17',
            'circle effect18 bottom_to_top',
            'circle effect18 left_to_right',
            'circle effect18 right_to_left',
            'circle effect18 top_to_bottom',
            'circle effect19',
            'circle effect20 top_to_bottom',
            'circle effect20 bottom_to_top',

            'square effect1 left_and_right',
            'square effect1 top_to_bottom',
            'square effect1 bottom_to_top',
            'square effect2',
            'square effect3 bottom_to_top',
            'square effect3 top_to_bottom',
            'square effect4',
            'square effect5 left_to_right',
            'square effect5 right_to_left',
            'square effect6 from_top_and_bottom',
            'square effect6 from_left_and_right',
            'square effect6 top_to_bottom',
            'square effect6 bottom_to_top',
            'square effect7',
            'square effect8 scale_up',
            'square effect8 scale_down',
            'square effect9 bottom_to_top',
            'square effect9 left_to_right',
            'square effect9 right_to_left',
            'square effect9 top_to_bottom',
            'square effect10 left_to_right',
            'square effect10 right_to_left',
            'square effect10 top_to_bottom',
            'square effect10 bottom_to_top',
            'square effect11 left_to_right',
            'square effect11 right_to_left',
            'square effect11 top_to_bottom',
            'square effect11 bottom_to_top',
            'square effect12 left_to_right',
            'square effect12 right_to_left',
            'square effect12 top_to_bottom',
            'square effect12 bottom_to_top',
            'square effect13 left_to_right',
            'square effect13 right_to_left',
            'square effect13 top_to_bottom',
            'square effect13 bottom_to_top',
            'square effect14 left_to_right',
            'square effect14 right_to_left',
            'square effect14 top_to_bottom',
            'square effect14 bottom_to_top',
            'square effect15 left_to_right',
            'square effect15 right_to_left',
            'square effect15 top_to_bottom',
            'square effect15 bottom_to_top',

            // 'square overlay_visible slide_up',
        );

        return $hoverEffects;
    }					

}

$na_object = new NA_HOVER_EFFECTS;
 ?>