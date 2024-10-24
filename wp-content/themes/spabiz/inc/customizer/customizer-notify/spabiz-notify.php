<?php

class Spabiz_Customizer_Notify {

	private $recommended_actions;

	
	private $recommended_plugins;

	
	private static $instance;

	
	private $recommended_actions_title;

	
	private $recommended_plugins_title;

	
	private $dismiss_button;

	
	private $install_button_label;

	
	private $activate_button_label;

	
	private $spabiz_deactivate_button_label;

	
	public static function init( $config ) {
		if ( ! isset( self::$instance ) && ! ( self::$instance instanceof Spabiz_Customizer_Notify ) ) {
			self::$instance = new Spabiz_Customizer_Notify;
			if ( ! empty( $config ) && is_array( $config ) ) {
				self::$instance->config = $config;
				self::$instance->setup_config();
				self::$instance->setup_actions();
			}
		}

	}

	
	public function setup_config() {

		global $spabiz_customizer_notify_recommended_plugins;
		global $spabiz_customizer_notify_recommended_actions;

		global $install_button_label;
		global $activate_button_label;
		global $spabiz_deactivate_button_label;

		$this->recommended_actions = isset( $this->config['recommended_actions'] ) ? $this->config['recommended_actions'] : array();
		$this->recommended_plugins = isset( $this->config['recommended_plugins'] ) ? $this->config['recommended_plugins'] : array();

		$this->recommended_actions_title = isset( $this->config['recommended_actions_title'] ) ? $this->config['recommended_actions_title'] : '';
		$this->recommended_plugins_title = isset( $this->config['recommended_plugins_title'] ) ? $this->config['recommended_plugins_title'] : '';
		$this->dismiss_button            = isset( $this->config['dismiss_button'] ) ? $this->config['dismiss_button'] : '';

		$spabiz_customizer_notify_recommended_plugins = array();
		$spabiz_customizer_notify_recommended_actions = array();

		if ( isset( $this->recommended_plugins ) ) {
			$spabiz_customizer_notify_recommended_plugins = $this->recommended_plugins;
		}

		if ( isset( $this->recommended_actions ) ) {
			$spabiz_customizer_notify_recommended_actions = $this->recommended_actions;
		}

		$install_button_label    = isset( $this->config['install_button_label'] ) ? $this->config['install_button_label'] : '';
		$activate_button_label   = isset( $this->config['activate_button_label'] ) ? $this->config['activate_button_label'] : '';
		$spabiz_deactivate_button_label = isset( $this->config['spabiz_deactivate_button_label'] ) ? $this->config['spabiz_deactivate_button_label'] : '';

	}

	
	public function setup_actions() {

		// Register the section
		add_action( 'customize_register', array( $this, 'spabiz_plugin_notification_customize_register' ) );

		// Enqueue scripts and styles
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'spabiz_customizer_notify_scripts_for_customizer' ), 0 );

		/* ajax callback for dismissable recommended actions */
		add_action( 'wp_ajax_quality_customizer_notify_dismiss_action', array( $this, 'spabiz_customizer_notify_dismiss_recommended_action_callback' ) );

		add_action( 'wp_ajax_ti_customizer_notify_dismiss_recommended_plugins', array( $this, 'spabiz_customizer_notify_dismiss_recommended_plugins_callback' ) );

	}

	
	public function spabiz_customizer_notify_scripts_for_customizer() {

		wp_enqueue_style( 'spabiz-customizer-notify-css', SPABIZ_PARENT_INC_URI . '/customizer/customizer-notify/css/spabiz-customizer-notify.css', array());

		wp_enqueue_style( 'spabiz-plugin-install' );
		wp_enqueue_script( 'spabiz-plugin-install' );
		wp_add_inline_script( 'spabiz-plugin-install', 'var pagenow = "customizer";' );

		wp_enqueue_script( 'spabiz-updates' );

		wp_enqueue_script( 'spabiz-customizer-notify-js', SPABIZ_PARENT_INC_URI . '/customizer/customizer-notify/js/spabiz-notify.js', array( 'customize-controls' ));
		wp_localize_script(
			'spabiz-customizer-notify-js', 'SpabizCustomizercompanionObject', array(
				'spabiz_ajaxurl'            => esc_url(admin_url( 'admin-ajax.php' )),
				'spabiz_template_directory' => esc_url(get_template_directory_uri()),
				'spabiz_base_path'          => esc_url(admin_url()),
				'spabiz_activating_string'  => __( 'Activating', 'spabiz' ),
			)
		);

	}

	
	public function spabiz_plugin_notification_customize_register( $wp_customize ) {

		
		require SPABIZ_PARENT_INC_DIR . '/customizer/customizer-notify/spabiz-notify-section.php';

		$wp_customize->register_section_type( 'Spabiz_Customizer_Notify_Section' );

		$wp_customize->add_section(
			new Spabiz_Customizer_Notify_Section(
				$wp_customize,
				'Spabiz-customizer-notify-section',
				array(
					'title'          => $this->recommended_actions_title,
					'plugin_text'    => $this->recommended_plugins_title,
					'dismiss_button' => $this->dismiss_button,
					'priority'       => 0,
				)
			)
		);

	}

	
	public function spabiz_customizer_notify_dismiss_recommended_action_callback() {

		global $spabiz_customizer_notify_recommended_actions;

		$action_id = ( isset( $_GET['id'] ) ) ? $_GET['id'] : 0;

		echo esc_html($action_id); 

		if ( ! empty( $action_id ) ) {

			
			if ( get_theme_mod( 'spabiz_customizer_notify_show' ) ) {

				$spabiz_customizer_notify_show_recommended_actions = get_theme_mod( 'spabiz_customizer_notify_show' );
				switch ( $_GET['todo'] ) {
					case 'add':
						$spabiz_customizer_notify_show_recommended_actions[ $action_id ] = true;
						break;
					case 'dismiss':
						$spabiz_customizer_notify_show_recommended_actions[ $action_id ] = false;
						break;
				}
				echo esc_html($spabiz_customizer_notify_show_recommended_actions);
				
			} else {
				$spabiz_customizer_notify_show_recommended_actions = array();
				if ( ! empty( $spabiz_customizer_notify_recommended_actions ) ) {
					foreach ( $spabiz_customizer_notify_recommended_actions as $spabiz_lite_customizer_notify_recommended_action ) {
						if ( $spabiz_lite_customizer_notify_recommended_action['id'] == $action_id ) {
							$spabiz_customizer_notify_show_recommended_actions[ $spabiz_lite_customizer_notify_recommended_action['id'] ] = false;
						} else {
							$spabiz_customizer_notify_show_recommended_actions[ $spabiz_lite_customizer_notify_recommended_action['id'] ] = true;
						}
					}
					echo esc_html($spabiz_customizer_notify_show_recommended_actions);
				}
			}
		}
		die(); 
	}

	
	public function spabiz_customizer_notify_dismiss_recommended_plugins_callback() {

		$action_id = ( isset( $_GET['id'] ) ) ? $_GET['id'] : 0;

		echo esc_html($action_id); 

		if ( ! empty( $action_id ) ) {

			$spabiz_lite_customizer_notify_show_recommended_plugins = get_theme_mod( 'spabiz_customizer_notify_show_recommended_plugins' );

			switch ( $_GET['todo'] ) {
				case 'add':
					$spabiz_lite_customizer_notify_show_recommended_plugins[ $action_id ] = false;
					break;
				case 'dismiss':
					$spabiz_lite_customizer_notify_show_recommended_plugins[ $action_id ] = true;
					break;
			}
			echo esc_html($spabiz_customizer_notify_show_recommended_actions);
		}
		die(); 
	}

}
