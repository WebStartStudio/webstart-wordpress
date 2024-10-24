<?php
/* Notifications in customizer */


require SPABIZ_PARENT_INC_DIR . '/customizer/customizer-notify/spabiz-notify.php';
$spabiz_config_customizer = array(
	'recommended_plugins'       => array(
		'burger-companion' => array(
			'recommended' => true,
			'description' => sprintf(__('Install and activate <strong>Burger Companion</strong> plugin for taking full advantage of all the features this theme has to offer SpaBiz.', 'spabiz')),
		),
	),
	'recommended_actions'       => array(),
	'recommended_actions_title' => esc_html__( 'Recommended Actions', 'spabiz' ),
	'recommended_plugins_title' => esc_html__( 'Recommended Plugin', 'spabiz' ),
	'install_button_label'      => esc_html__( 'Install and Activate', 'spabiz' ),
	'activate_button_label'     => esc_html__( 'Activate', 'spabiz' ),
	'spabiz_deactivate_button_label'   => esc_html__( 'Deactivate', 'spabiz' ),
);
Spabiz_Customizer_Notify::init( apply_filters( 'spabiz_customizer_notify_array', $spabiz_config_customizer ) );
