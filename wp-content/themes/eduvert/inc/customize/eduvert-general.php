<?php
function eduvert_general_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	$wp_customize->add_panel(
		'eduvert_general', array(
			'priority' => 31,
			'title' => esc_html__( 'General', 'eduvert' ),
		)
	);

	/*=========================================
	Scroller
	=========================================*/
	$wp_customize->add_section(
		'top_scroller', array(
			'title' => esc_html__( 'Top Scroller', 'eduvert' ),
			'priority' => 4,
			'panel' => 'eduvert_general',
		)
	);
	
	$wp_customize->add_setting( 
		'hs_scroller' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'eduvert_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 1,
		) 
	);
	
	$wp_customize->add_control(
	'hs_scroller', 
		array(
			'label'	      => esc_html__( 'Hide / Show Scroller', 'eduvert' ),
			'section'     => 'top_scroller',
			'type'        => 'checkbox'
		) 
	);
	
	/*=========================================
	Breadcrumb  Section
	=========================================*/
	$wp_customize->add_section(
		'breadcrumb_setting', array(
			'title' => esc_html__( 'Breadcrumb', 'eduvert' ),
			'priority' => 12,
			'panel' => 'eduvert_general',
		)
	);
	
	// Settings
	$wp_customize->add_setting(
		'breadcrumb_settings'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'eduvert_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'breadcrumb_settings',
		array(
			'type' => 'hidden',
			'label' => __('Settings','eduvert'),
			'section' => 'breadcrumb_setting',
		)
	);
	
	// Breadcrumb Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'hs_breadcrumb' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'eduvert_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'hs_breadcrumb', 
		array(
			'label'	      => esc_html__( 'Hide / Show Section', 'eduvert' ),
			'section'     => 'breadcrumb_setting',
			'type'        => 'checkbox'
		) 
	);
	
	// enable Element
	$wp_customize->add_setting(
		'breadcrumb_bg_element_enable'
			,array(
			'default' => '1',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'eduvert_sanitize_checkbox',
			'priority' => 4,
		)
	);

	$wp_customize->add_control(
	'breadcrumb_bg_element_enable',
		array(
			'type' => 'checkbox',
			'label' => __('Enable Background Element?','eduvert'),
			'section' => 'breadcrumb_setting',
		)
	);
	
	// Breadcrumb Content Section // 
	$wp_customize->add_setting(
		'breadcrumb_contents'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'eduvert_sanitize_text',
			'priority' => 5,
		)
	);

	$wp_customize->add_control(
	'breadcrumb_contents',
		array(
			'type' => 'hidden',
			'label' => __('Content','eduvert'),
			'section' => 'breadcrumb_setting',
		)
	);
	
	// Content size // 
	if ( class_exists( 'Cleverfox_Customizer_Range_Slider_Control' ) ) {
	$wp_customize->add_setting(
    	'breadcrumb_min_height',
    	array(
			'default' => 350,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'eduvert_sanitize_range_value',
			'priority' => 8,
		)
	);
	$wp_customize->add_control( 
		new Cleverfox_Customizer_Range_Slider_Control( $wp_customize, 'breadcrumb_min_height', 
			array(
				'label'      => __( 'Min Height', 'eduvert'),
				'section'  => 'breadcrumb_setting',
				'media_query'   => true,
				'input_attrs' => array(
					'min'    => 1,
					'max'    => 1000,
					'step'   => 1,
					//'suffix' => 'px', //optional suffix
				),
			) ) 
		);
	}	
}

add_action( 'customize_register', 'eduvert_general_setting' );