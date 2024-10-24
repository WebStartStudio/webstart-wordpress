<?php

class Eduvert_Customizer_Notify {

	private $recommended_actions;

	
	private $recommended_plugins;

	
	private static $instance;

	
	private $recommended_actions_title;

	
	private $recommended_plugins_title;

	
	private $dismiss_button;

	
	private $install_button_label;

	
	private $activate_button_label;

	
	private $eduvert_deactivate_button_label;
	
	
	private $config;

	
	public static function init( $config ) {
		if ( ! isset( self::$instance ) && ! ( self::$instance instanceof Eduvert_Customizer_Notify ) ) {
			self::$instance = new Eduvert_Customizer_Notify;
			if ( ! empty( $config ) && is_array( $config ) ) {
				self::$instance->config = $config;
				self::$instance->setup_config();
				self::$instance->setup_actions();
			}
		}

	}

	
	public function setup_config() {

		global $eduvert_customizer_notify_recommended_plugins;
		global $eduvert_customizer_notify_recommended_actions;

		global $install_button_label;
		global $activate_button_label;
		global $eduvert_deactivate_button_label;

		$this->recommended_actions = isset( $this->config['recommended_actions'] ) ? $this->config['recommended_actions'] : array();
		$this->recommended_plugins = isset( $this->config['recommended_plugins'] ) ? $this->config['recommended_plugins'] : array();

		$this->recommended_actions_title = isset( $this->config['recommended_actions_title'] ) ? $this->config['recommended_actions_title'] : '';
		$this->recommended_plugins_title = isset( $this->config['recommended_plugins_title'] ) ? $this->config['recommended_plugins_title'] : '';
		$this->dismiss_button            = isset( $this->config['dismiss_button'] ) ? $this->config['dismiss_button'] : '';

		$eduvert_customizer_notify_recommended_plugins = array();
		$eduvert_customizer_notify_recommended_actions = array();

		if ( isset( $this->recommended_plugins ) ) {
			$eduvert_customizer_notify_recommended_plugins = $this->recommended_plugins;
		}

		if ( isset( $this->recommended_actions ) ) {
			$eduvert_customizer_notify_recommended_actions = $this->recommended_actions;
		}

		$install_button_label    = isset( $this->config['install_button_label'] ) ? $this->config['install_button_label'] : '';
		$activate_button_label   = isset( $this->config['activate_button_label'] ) ? $this->config['activate_button_label'] : '';
		$eduvert_deactivate_button_label = isset( $this->config['eduvert_deactivate_button_label'] ) ? $this->config['eduvert_deactivate_button_label'] : '';

	}

	
	public function setup_actions() {

		// Register the section
		add_action( 'customize_register', array( $this, 'eduvert_plugin_notification_customize_register' ) );

		// Enqueue scripts and styles
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'eduvert_customizer_notify_scripts_for_customizer' ), 0 );

		/* ajax callback for dismissable recommended actions */
		add_action( 'wp_ajax_quality_customizer_notify_dismiss_action', array( $this, 'eduvert_customizer_notify_dismiss_recommended_action_callback' ) );

		add_action( 'wp_ajax_ti_customizer_notify_dismiss_recommended_plugins', array( $this, 'eduvert_customizer_notify_dismiss_recommended_plugins_callback' ) );

	}

	
	public function eduvert_customizer_notify_scripts_for_customizer() {

		wp_enqueue_style( 'eduvert-customizer-notify-css', get_template_directory_uri() . '/inc/customizer-notify/css/eduvert-customizer-notify.css', array());

		wp_enqueue_style( 'eduvert-plugin-install' );
		wp_enqueue_script( 'eduvert-plugin-install' );
		wp_add_inline_script( 'eduvert-plugin-install', 'var pagenow = "customizer";' );

		wp_enqueue_script( 'eduvert-updates' );

		wp_enqueue_script( 'eduvert-customizer-notify-js', get_template_directory_uri() . '/inc/customizer-notify/js/eduvert-customizer-notify.js', array( 'customize-controls' ));
		wp_localize_script(
			'eduvert-customizer-notify-js', 'EduvertCustomizercompanionObject', array(
				'eduvert_ajaxurl'            => esc_url(admin_url( 'admin-ajax.php' )),
				'eduvert_template_directory' => esc_url(get_template_directory_uri()),
				'eduvert_base_path'          => esc_url(admin_url()),
				'eduvert_activating_string'  => __( 'Activating', 'eduvert' ),
			)
		);

	}

	
	public function eduvert_plugin_notification_customize_register( $wp_customize ) {

		
		require_once get_template_directory() . '/inc/customizer-notify/eduvert-customizer-notify-section.php';

		$wp_customize->register_section_type( 'Eduvert_Customizer_Notify_Section' );

		$wp_customize->add_section(
			new Eduvert_Customizer_Notify_Section(
				$wp_customize,
				'Eduvert-customizer-notify-section',
				array(
					'title'          => $this->recommended_actions_title,
					'plugin_text'    => $this->recommended_plugins_title,
					'dismiss_button' => $this->dismiss_button,
					'priority'       => 0,
				)
			)
		);

	}

	
	public function eduvert_customizer_notify_dismiss_recommended_action_callback() {

		global $eduvert_customizer_notify_recommended_actions;

		$action_id = ( isset( $_GET['id'] ) ) ? $_GET['id'] : 0;

		echo esc_html($action_id); 

		if ( ! empty( $action_id ) ) {

			
			if ( get_theme_mod( 'eduvert_customizer_notify_show' ) ) {

				$eduvert_customizer_notify_show_recommended_actions = get_theme_mod( 'eduvert_customizer_notify_show' );
				switch ( $_GET['todo'] ) {
					case 'add':
						$eduvert_customizer_notify_show_recommended_actions[ $action_id ] = true;
						break;
					case 'dismiss':
						$eduvert_customizer_notify_show_recommended_actions[ $action_id ] = false;
						break;
				}
				echo esc_html($eduvert_customizer_notify_show_recommended_actions);
				
			} else {
				$eduvert_customizer_notify_show_recommended_actions = array();
				if ( ! empty( $eduvert_customizer_notify_recommended_actions ) ) {
					foreach ( $eduvert_customizer_notify_recommended_actions as $eduvert_lite_customizer_notify_recommended_action ) {
						if ( $eduvert_lite_customizer_notify_recommended_action['id'] == $action_id ) {
							$eduvert_customizer_notify_show_recommended_actions[ $eduvert_lite_customizer_notify_recommended_action['id'] ] = false;
						} else {
							$eduvert_customizer_notify_show_recommended_actions[ $eduvert_lite_customizer_notify_recommended_action['id'] ] = true;
						}
					}
					echo esc_html($eduvert_customizer_notify_show_recommended_actions);
				}
			}
		}
		die(); 
	}

	
	public function eduvert_customizer_notify_dismiss_recommended_plugins_callback() {

		$action_id = ( isset( $_GET['id'] ) ) ? $_GET['id'] : 0;

		echo esc_html($action_id); 

		if ( ! empty( $action_id ) ) {

			$eduvert_lite_customizer_notify_show_recommended_plugins = get_theme_mod( 'eduvert_customizer_notify_show_recommended_plugins' );

			switch ( $_GET['todo'] ) {
				case 'add':
					$eduvert_lite_customizer_notify_show_recommended_plugins[ $action_id ] = false;
					break;
				case 'dismiss':
					$eduvert_lite_customizer_notify_show_recommended_plugins[ $action_id ] = true;
					break;
			}
			echo esc_html($eduvert_customizer_notify_show_recommended_actions);
		}
		die(); 
	}

}
