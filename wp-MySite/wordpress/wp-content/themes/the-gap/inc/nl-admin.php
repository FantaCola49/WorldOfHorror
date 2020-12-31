<?php

/**
 * Admin Class.
 *
 * 
 * @package the-gap
 * 
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'The_Gap_Admin' ) ) :



class The_Gap_Admin {

	/**
	 * Constructor.
	 */
	public function __construct() {
		add_action( 'admin_menu', array( $this, 'nl_admin_menu' ) );
		
		add_action('admin_notices', array($this, 'the_gap_activation_admin_notice'));
		
	}

	/**
	 * Add admin menu.
	 **/
	 
	public function nl_admin_menu() {
		
		add_theme_page(__('The Gap Admin Page','the-gap'),__('Started with The Gap','the-gap'), 'edit_theme_options', 
	'nl-welcome', array($this,'nl_admin_tab' ));

	}



	 
	public function nl_admin_message() {
		
		global $themePhp;

		if ( 'themes.php' == $themePhp && isset( $_GET['activated'] ) ) {
			add_action( 'admin_notices', array( $this, 'nl_getting_start' ) );
			update_option( 'nl_admin_notice_welcome', 1 );
		
		} elseif( ! get_option( 'nl_admin_notice_welcome' ) ) {
			add_action( 'admin_notices', array( $this, 'nl_getting_start' ) );
		}
		
	}

public function the_gap_activation_admin_notice() {
            
		global $pagenow;
		
		if ( ! current_user_can( 'publish_posts' ) ) {
				wp_die( __( 'Cheatin&#8217; huh?', 'the-gap' ) ); // WPCS: xss ok.
		}
             ?>
			
                <div class="notice notice-success is-dismissible"> 
				
				  <div class="tg-welcome-screenshot">
                            <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/screenshot.png'); ?>" alt="<?php echo esc_attr_e('The Gap Demo', 'the-gap'); ?>">
                   </div>
				<div class="tg-welcome-cta">
				   <p class="tg-welcome"><?php echo esc_html__('Welcome! Thank you for choosing The Gap.', 'the-gap'); ?></p>
           
					<p><a class="button button-primary" href="<?php echo esc_url(admin_url('/themes.php?page=nl-welcome')); ?>"><?php echo esc_html__('Get Started with The Gap', 'the-gap'); ?></a></p>
				 </div>
				</div>
				
                <?php
           
    }
	
	public function nl_getting_start() {
	    
		?>
		<div id="message" class="updated nl-message">
	
			<p class="submit">
				<a class="button-secondary" href="<?php echo esc_url( admin_url( 'themes.php?page=nl-welcome' ) ); ?>"><?php esc_html_e( 'Get Started with NextLevel', 'the-gap' ); ?></a>
			</p>
		</div>
		<?php
		
	}


	private function nl_first_phase() {
		$theme = wp_get_theme( get_template() );
		
		$theme_version = $theme->get( 'Version' );
		?>
		<div class="nl-theme-info clear">
			<h1>
				<?php esc_html_e( 'About', 'the-gap' ); ?>
				<?php echo esc_html($theme->display( 'Name' )); ?>
				<?php printf( '%s', esc_html($theme_version) ); ?>
			</h1>
	
			
			
		</div> <?php
    }


 private function nl_third_phase() { 
	
	if ( ! current_user_can( 'publish_posts' ) ) {
				wp_die( __( 'Cheatin&#8217; huh?', 'the-gap' ) ); // WPCS: xss ok.
	}
	
	$theme = wp_get_theme( get_template() );
		$theme_versions = $theme['Version']; 
		
		?>
		
		<h2 class="nav-tab-wrapper">
		    
			<a class="nav-tab <?php if ( isset( $_GET['tab'] ) && $_GET['tab'] == 'nl_first_tab' ) echo 'nav-tab-active'; ?>" href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'nl-welcome', 'tab' => 'nl_first_tab' ), 'themes.php' ) ) ); ?>">
				<?php echo esc_html($theme->display( 'Name' )); ?>
			</a>
			
			<a class="nav-tab <?php if ( isset( $_GET['tab'] ) && $_GET['tab'] == 'show_recommended_plugins' ) echo 'nav-tab-active'; ?>" href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'nl-welcome', 'tab' => 'show_recommended_plugins' ), 'themes.php' ) ) ); ?>">
				<?php esc_html_e( 'Recommended Plugins', 'the-gap' ); ?>
			</a>
			
			<a class="nav-tab <?php if ( isset( $_GET['tab'] ) && $_GET['tab'] == 'show_pro_vs_free' ) echo 'nav-tab-active'; ?>" href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'nl-welcome', 'tab' => 'show_pro_vs_free' ), 'themes.php' ) ) ); ?>">
				<?php esc_html_e( 'The Gap Pro vs Free', 'the-gap' ); ?>
			</a>
		
		</h2>
		
		<?php
}

	
	public function nl_admin_tab() {
		
		if ( ! current_user_can( 'publish_posts' ) ) {
				wp_die( __( 'Cheatin&#8217; huh?', 'the-gap' ) ); // WPCS: xss ok.
		}
		
		$active_tab = empty($_GET['tab']) ? 'about' : sanitize_title( wp_unslash($_GET['tab'] ));

		
		if ( is_callable( array( $this, $active_tab ) ) ) {
			return $this->{ $active_tab }();
		}

		return $this->nl_first_tab();
	}

	/**
	 * NextLevel First Tab.
	 */
	public function nl_first_tab() {
		$theme = wp_get_theme( get_template() );
		?>
		 <div class="wrap about-wrap">

			<?php $this->nl_first_phase(); ?>
				
					<?php $this->nl_third_phase(); ?>

			
				<div class="nl_grid_row col_gap_30">
					<div class="first-row clear">
					<div class="no_of_col_1 item1 col_padd_margin">
						<h3><?php esc_html_e( 'Installation & How to start', 'the-gap' ); ?></h3>
						<p><?php esc_html_e( 'Installation detail of theme & plugins are available. Also detail instructions are
						available how to start blog, e-commerce or company website.', 'the-gap' ) ?></p>
						<p><a href="<?php echo esc_url( 'https://the-gap-docs.themenextlevel.com/' ); ?>"  target="_blank" class="button"><?php esc_html_e( 'Install & Start', 'the-gap' ); ?></a></p>
					</div>
					
					<div class="no_of_col_2 item2 col_padd_margin">
						<h3><?php esc_html_e( 'Theme Demos', 'the-gap' ); ?></h3>
						<p><?php esc_html_e( '30 Demos are avaible right now.', 'the-gap' ) ?></p>
						<p><a href="<?php echo esc_url( 'https://themenextlevel.com/the-gap/' ); ?>"  target="_blank" class="button"><?php esc_html_e( 'Theme Demos', 'the-gap' ); ?></a></p>
					</div>
					</div>
					
					<div class="second-row clear">
					<div class="no_of_col_3 item3 col_padd_margin">
						<h3><?php esc_html_e( 'Documentation', 'the-gap' ); ?></h3>
						<p><?php esc_html_e( 'Please view our documentation page to setup the theme.', 'the-gap' ) ?></p>
						<p><a href="<?php echo esc_url( 'https://the-gap-docs.themenextlevel.com/'); ?>" target="_blank" class="button button-secondary"><?php esc_html_e( 'Documentation', 'the-gap' ); ?></a></p>
					</div>

					<div class="no_of_col_4 item4 col_padd_margin">
						<h3><?php esc_html_e( 'Theme Support', 'the-gap' ); ?></h3>
						<p><?php esc_html_e( 'Please put it in our dedicated support forum.', 'the-gap' ) ?></p>
						<p><a href="<?php echo esc_url( 'https://themenextlevel.com/support/' ); ?>"  target="_blank" class="button"><?php esc_html_e( 'Theme Support', 'the-gap' ); ?></a></p>
					</div>
					</div>
					
		
				</div>
						<div class="welcome-footer-content clear" style="overflow:hidden;">
							<?php the_gap_demo_preview(); ?>
						</div>
		 
		</div>


		<?php
		
		
	}




	/**
	 * Output the supported plugins screen.
	 */
	 
	
	public function show_recommended_plugins() {
		?>
		<div class="wrap about-wrap">
			
			<?php $this->nl_first_phase(); ?>
				
					<?php $this->nl_third_phase(); ?>
			<div class="recommended_plugins">
			<p class="about-description"><?php esc_html_e( 'The Gap recommends following plugins.', 'the-gap' ); ?></p>
			<ul>
				<li><?php esc_html_e( 'Elementor Page Builder', 'the-gap' ); ?></li>
				
				<li><?php esc_html_e( 'Definitive Addons for Elementor', 'the-gap' ); ?></li>
				
			</ul>
			<p class="about-description"><?php esc_html_e( 'The Gap recommends additional plugins for shop or store users.', 'the-gap' ); ?></p>
			<ul>
			
				<li><?php esc_html_e( 'WooCommerce', 'the-gap' ); ?></li>
				<li><?php esc_html_e( 'YITH WooCommerce Quick View', 'the-gap' ); ?></li>
				<li><?php esc_html_e( 'YITH WooCommerce Wishlist', 'the-gap' ); ?></li>
				
			</ul>
			</div>
			
				<div class="welcome-demo-containers clear">
                    <?php the_gap_demo_preview(); ?>
				</div>

		</div>
		
		<?php
	}
	
	public function show_pro_vs_free() {
		?>
		<div class="wrap about-wrap">

			<?php $this->nl_first_phase(); ?>
				
			<?php $this->nl_third_phase(); ?>
			<?php the_gap_free_vs_pro(); ?>

			


		<div class="welcome-demo-containers clear">
             <?php the_gap_demo_preview(); ?>
        </div>
		<?php
		
	}
	
	
}

endif;

return new The_Gap_Admin();
