<?php
class spabiz_import_dummy_data {

	private static $instance;

	public static function init( ) {
		if ( ! isset( self::$instance ) && ! ( self::$instance instanceof spabiz_import_dummy_data ) ) {
			self::$instance = new spabiz_import_dummy_data;
			self::$instance->spabiz_setup_actions();
		}

	}

	/**
	 * Setup the class props based on the config array.
	 */
	

	/**
	 * Setup the actions used for this class.
	 */
	public function spabiz_setup_actions() {

		// Enqueue scripts
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'spabiz_import_customize_scripts' ), 0 );

	}
	
	

	public function spabiz_import_customize_scripts() {

	wp_enqueue_script( 'spabiz-import-customizer-js', SPABIZ_PARENT_INC_URI . '/customizer/customizer-notify/js/spabiz-import-customizer-options.js', array( 'customize-controls' ) );
	}
}

$spabiz_import_customizers = array(

		'import_data' => array(
			'recommended' => true,
			
		),
);
spabiz_import_dummy_data::init( apply_filters( 'spabiz_import_customizer', $spabiz_import_customizers ) );