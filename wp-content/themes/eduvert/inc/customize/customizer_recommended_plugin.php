<?php
/* Notifications in customizer */
require get_template_directory() . '/inc/customizer-notify/eduvert-customizer-notify.php';
$eduvert_config_customizer = array(
	'recommended_plugins'       => array(
		'clever-fox' => array(
			'recommended' => true,
			'description' => sprintf(__('Install and activate <strong>Cleverfox</strong> plugin for taking full advantage of all the features this theme has to offer.', 'eduvert')),
		),
	),
	'recommended_actions'       => array(),
	'recommended_actions_title' => esc_html__( 'Recommended Actions', 'eduvert' ),
	'recommended_plugins_title' => esc_html__( 'Recommended Plugin', 'eduvert' ),
	'install_button_label'      => esc_html__( 'Install and Activate', 'eduvert' ),
	'activate_button_label'     => esc_html__( 'Activate', 'eduvert' ),
	'eduvert_deactivate_button_label'   => esc_html__( 'Deactivate', 'eduvert' ),
);
Eduvert_Customizer_Notify::init( apply_filters( 'eduvert_customizer_notify_array', $eduvert_config_customizer ) );
?>