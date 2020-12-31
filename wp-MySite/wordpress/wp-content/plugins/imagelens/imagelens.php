<?php
/*
Plugin Name: Imagelens
Plugin URI: http://www.mattcromwell.com/image-lens
Description: A simple plugin with one simple purpose: ZOOM!
Version: 2.0.2
Author: webdevmattcrom
Author URI: http://www.mattcromwell.com/image-lens
Text Domain: mc-imagelens
*/

// Install
//definitions
define( 'MCIL_PATH', plugin_dir_path( __FILE__ ));
define( 'MCIL_URL', plugins_url( '/' , __FILE__ ));

//include FooBase
require_once MCIL_PATH . "includes/foopluginbase/bootstrapper.php";

// Include custom media fields file
require_once(MCIL_PATH . 'admin/custom_media_fields.php' );

class mattcrom_imagelens extends Foo_Plugin_Base_v2_3 {	
	
	function __construct() {
			$this->init( __FILE__, 'mc-imagelens', '0.9', 'ImageLens' );
	
		if (is_admin()){
			add_filter( 'mc-imagelens_admin_settings', array( $this, 'create_settings' ), 10, 2 );
			}
	}
		
	function newintrohtml(){
		ob_start();
		include(MCIL_PATH . 'admin/settings/faqs.php');
		return ob_get_clean();	
	}
	
	
	function create_settings() {
		
		$newintro = $this->newintrohtml();
		
		$settings[0] = array(
			 'id' => 'faq',
			 'title' => __('Frequently Asked Questions', 'mc-imagelens'),
			 'desc' => $newintro,
			 'type' => 'html',
			 // 'tab' => 'intro'
			 );
		
		return array(
			// 'tabs' => $tabs,
			'settings' => $settings
		);	
	}//End create_settings
	
}//End class

new mattcrom_imagelens();

if (is_admin()){
    require_once(MCIL_PATH . 'meta-box-class/metabox.class.php');

    $prefix = 'mcil_';
    /* 
     * configure meta boxes
     */
	
	$post_types = get_post_types( array( 'public' => true ) );
	
    $config = array(
        'id' => 'enable_imagelens',                    // meta box id, unique per meta box
        'title' => 'Enable ImageLens for this Content Area?',                 // meta box title
        'pages' => array($post_types, 'post', 'page'),           // post types, accept custom post types as well, default is array('post'); optional
        'context' => 'advanced',                      // where the meta box appear: normal (default), advanced, side; optional
        'priority' => 'default',                       // order of meta box: high (default), low; optional
        'fields' => array(),                        // list of meta fields (can be added by field arrays)
        'local_images' => false,                    // Use local or hosted images (meta box images for add/remove)
        'use_with_theme' => false                   //change path if used with theme set to true, false for a plugin or anything else for a custom path(default false).
    );
    /*
     * Initiate meta boxes
     */
    $mcil_meta =  new AT_Meta_Box($config);


    $Conditional_fields[] = $mcil_meta->addRadio($prefix.'enable_imagelens',array('enable_all'=>'Enable for all Images in this Content area','enable_selectively'=>'I\'ll Use the Media Library Field to pick which images I want', 'disable'=>'Disable ImageLens on this page/post'),array('name'=> 'Enable ImageLens Conditionally?', 'std'=>'disable'), true);
	
	$Conditional_fields[] = $mcil_meta->addColor($prefix.'imagelens_border_color',array('name'=> 'Lens Border Color '), true);
	
	$Conditional_fields[] = $mcil_meta->addNumber($prefix.'imagelens_lens_size',array('name'=> 'Lens Size ', 'step'=>'10', 'min'=>'150', 'max'=>'500', 'std'=>'150'), true);
	
	$Conditional_fields[] = $mcil_meta->addNumber($prefix.'imagelens_border_width',array('name'=> 'Lens Border Size ', 'step'=>'1', 'min'=>'0', 'max'=>'25'), true);
	
	$Conditional_fields[] = $mcil_meta->addRadio($prefix.'enable_shadow',array('shadow_none'=>'No shadow, thanks.','enable_drop'=>'Yes, add a dropshadow to the lens, please.', 'enable_inset'=>'Yes, add an inset shadow to the lens, please.'),array('name'=> 'Add Inset/Drop Shadow to the Lens?', 'std'=>'shadow_none'), true);

	
	$mcil_meta->addCondition('conditional_fields',
      array(
        'name'   => __('Enable ImageLens for this page/post? ','mc-imagelens'),
        'desc'   => __('<small>Check here to enable ImageLens and customize it\'s appearance.</small>','mc-imagelens'),
        'fields' => $Conditional_fields,
        'std'    => false
      ));
	
    //Finish Meta Box Decleration
    $mcil_meta->Finish();
}

function enqueue_imagelens_scripts() {
			global $post;
			$cond = get_post_meta( $post->ID, 'conditional_fields', true );
			
			if ((isset($cond['mcil_enable_imagelens'])) && (($cond['mcil_enable_imagelens'] == 'enable_all') || ($cond['mcil_enable_imagelens'] == 'enable_selectively'))) { 
				wp_enqueue_script( 'imagelens-js', MCIL_URL . '/js/imagelens.js', array(), '1.0.0', false );
				
			} else return false; 
		}
add_action( 'wp_enqueue_scripts', 'enqueue_imagelens_scripts', 99 );

function enqueue_imagelens_init() {
		global $post;
		$cond = get_post_meta( $post->ID, 'conditional_fields', true );
		
		//Enqueue imagelens init script IF enabled on this page and "enable_all" is selected
		if ((isset($cond['mcil_enable_imagelens'])) && ($cond['mcil_enable_imagelens'] == 'enable_all')) {
			$lensize = $cond['mcil_imagelens_lens_size'];
			$bdrcolor = $cond['mcil_imagelens_border_color'];
			$bdrsize = $cond['mcil_imagelens_border_width'];
			
			if ($cond['mcil_enable_shadow'] == 'enable_drop') {$drop = 'true';} else {$drop = 'false';}
			if ($cond['mcil_enable_shadow'] == 'enable_inset') {$inset = 'true';} else {$inset = 'false';}
		?>
			<script type="text/javascript">
				jQuery(function ($) {
					$('.imagelens-content img').imageLens({ 
						lensSize: <?php echo $lensize; ?>, 
						borderColor: '<?php echo $bdrcolor; ?>',
						borderSize: '<?php echo $bdrsize; ?>',
						addInset: <?php echo $inset; ?>,
						addShadow: <?php echo $drop; ?>
						});
				});
			</script>
		<?php
		  }
		}
	
add_action( 'wp_footer', 'enqueue_imagelens_init' );

//Adds a wrapper inside of the content loop with a custom class 
// for imagelens.js to find the images with.
// only triggers when "enable_all" is selected
add_filter('the_content', 'imagelens_custom_class');

function imagelens_custom_class($content) {
	global $post;
	$cond = get_post_meta( $post->ID, 'conditional_fields', true );
	
	if ((isset($cond['mcil_enable_imagelens'])) && ($cond['mcil_enable_imagelens'] == 'enable_all')) {
	$mcil_class = '<div class="imagelens-content">';
    $mcil_class .= do_shortcode($content);
    $mcil_class .= '</div>';

    $filteredcontent = $mcil_class;

    return $filteredcontent;
	} else {
	echo do_shortcode($content);
	}
}

// function to enable imagelens only on images
// that have the "Enable ImageLens" option set to "Yes"
// in the Insert Media field.

function enable_lens_on_single() {

		global $post;
		$cond = get_post_meta( $post->ID, 'conditional_fields', true );
	
		if ((isset($cond['mcil_enable_imagelens'])) && ($cond['mcil_enable_imagelens'] == 'enable_selectively')) {
			$lensize = $cond['mcil_imagelens_lens_size'];
			$bdrcolor = $cond['mcil_imagelens_border_color'];
			$bdrsize = $cond['mcil_imagelens_border_width'];
			
			if ($cond['mcil_enable_shadow'] == 'enable_drop') {$drop = 'true';} else {$drop = 'false';}
			if ($cond['mcil_enable_shadow'] == 'enable_inset') {$inset = 'true';} else {$inset = 'false';}
		 ?>
			<script type="text/javascript">
				jQuery(function ($) {
					$('img.imagelens-single').imageLens({ 
						lensSize: <?php echo $lensize; ?>, 
						borderColor: '<?php echo $bdrcolor; ?>',
						borderSize: '<?php echo $bdrsize; ?>',
						addInset: <?php echo $inset; ?>,
						addShadow: <?php echo $drop; ?>
						});
				});
			</script>
		<?php
		}
}
add_action( 'wp_footer', 'enable_lens_on_single' );

// Adds the custom class to the image
// if "Enable ImageLens is selected 
// in the Add Media field
// $singlelens = get_post_meta( $attachment->ID, '_enable_lens', true );

add_filter('get_image_tag_class', 'add_imagelens_frames', 0, 4);

function add_imagelens_frames($classes, $id) {
	
	$singlelens = get_post_meta( $id, '_enable_lens', true );
	if ($singlelens === 'imagelens-single') {
	return $classes . ' ' . $singlelens;
	} else {
	return $classes;
	}
}