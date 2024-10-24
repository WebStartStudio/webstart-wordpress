<?php
class eduvert_import_dummy_data {

	private static $instance;

	public static function init( ) {
		if ( ! isset( self::$instance ) && ! ( self::$instance instanceof eduvert_import_dummy_data ) ) {
			self::$instance = new eduvert_import_dummy_data;
			self::$instance->eduvert_setup_actions();
		}

	}

	/**
	 * Setup the class props based on the config array.
	 */
	

	/**
	 * Setup the actions used for this class.
	 */
	public function eduvert_setup_actions() {

		// Enqueue scripts
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'eduvert_import_customize_scripts' ), 0 );

	}
	
	

	public function eduvert_import_customize_scripts() {

	wp_enqueue_script( 'eduvert-import-customizer-js', get_template_directory_uri() . '/assets/js/eduvert-import-customizer.js', array( 'customize-controls' ) );
	}
}

$eduvert_import_customizers = array(

		'import_data' => array(
			'recommended' => true,
			
		),
);
eduvert_import_dummy_data::init( apply_filters( 'eduvert_import_customizer', $eduvert_import_customizers ) );