<?php
/**
 * Eduvert Theme Customizer.
 *
 * @package Eduvert
 */

 if ( ! class_exists( 'Eduvert_Customizer' ) ) {

	/**
	 * Customizer Loader
	 *
	 * @since 1.0.0
	 */
	class Eduvert_Customizer {

		/**
		 * Instance
		 *
		 * @access private
		 * @var object
		 */
		private static $instance;

		/**
		 * Initiator
		 */
		public static function get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self;
			}
			return self::$instance;
		}

		/**
		 * Constructor
		 */
		public function __construct() {
			/**
			 * Customizer
			 */
			add_action( 'customize_preview_init',                  array( $this, 'eduvert_customize_preview_js' ) );
			add_action( 'customize_controls_enqueue_scripts', 	   array( $this, 'eduvert_customizer_script' ) );
			add_action( 'customize_register',                      array( $this, 'eduvert_customizer_register' ) );
			add_action( 'after_setup_theme',                       array( $this, 'eduvert_customizer_settings' ) );
		}
		
		/**
		 * Add postMessage support for site title and description for the Theme Customizer.
		 *
		 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
		 */
		function eduvert_customizer_register( $wp_customize ) {
			
			$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
			$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
			$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
			$wp_customize->get_setting( 'background_color' )->transport = 'postMessage';
			$wp_customize->get_setting('custom_logo')->transport = 'refresh';
			
			/**
			 * Helper files
			 */
			require EDUVERT_PARENT_INC_DIR . '/sanitization.php';
		}

		/**
		 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
		 */
		function eduvert_customize_preview_js() {
			wp_enqueue_script( 'eduvert-customizer',get_template_directory_uri() . '/assets/js/customizer-preview.js', array( 'customize-preview' ), '20151215', true );
		}
		
		function eduvert_customizer_script() {
			 wp_enqueue_script( 'eduvert-customizer-section', get_template_directory_uri() . '/assets/js/customizer-section.js', array("jquery"),'', true  );	
		}

		// Include customizer customizer settings.
			
		function eduvert_customizer_settings() {
			 require EDUVERT_PARENT_INC_DIR . '/customize/eduvert-header.php';
			 require EDUVERT_PARENT_INC_DIR . '/customize/eduvert-blog.php';
			 require EDUVERT_PARENT_INC_DIR . '/customize/eduvert-footer.php';
			 require EDUVERT_PARENT_INC_DIR . '/customize/eduvert-general.php';
			 require EDUVERT_PARENT_INC_DIR . '/customize/eduvert-premium.php';
			 require EDUVERT_PARENT_INC_DIR . '/customize/customizer_recommended_plugin.php';
			 require EDUVERT_PARENT_INC_DIR . '/customize/customizer_import_data.php';
		}

	}
}// End if().

/**
 *  Kicking this off by calling 'get_instance()' method
 */
Eduvert_Customizer::get_instance();