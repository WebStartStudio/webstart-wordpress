<?php
function eduvert_footer( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	// Footer Panel // 
	$wp_customize->add_panel( 
		'footer_section', 
		array(
			'priority'      => 34,
			'capability'    => 'edit_theme_options',
			'title'			=> __('Footer', 'eduvert'),
		) 
	);
	
	// Footer Setting Section // 
	$wp_customize->add_section(
        'footer_copy_Section',
        array(
            'title' 		=> __('Below Footer','eduvert'),
			'panel'  		=> 'footer_section',
			'priority'      => 4,
		)
    );
	// footer first text // 
	$eduvert_footer_copyright = esc_html__('Copyright &copy; [current_year] [site_title] | Powered by [theme_author]', 'eduvert' );
	$wp_customize->add_setting(
    	'footer_copyright',
    	array(
			'default' => $eduvert_footer_copyright,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
		)
	);	

	$wp_customize->add_control( 
		'footer_copyright',
		array(
		    'label'   		=> __('Copyright','eduvert'),
		    'section'		=> 'footer_copy_Section',
			'type' 			=> 'textarea',
			'priority'      => 4,
			'transport'         => $selective_refresh,
		)  
	);	
	
	
	// Footer Background // 
	$wp_customize->add_section(
        'footer_background',
        array(
            'title' 		=> __('Footer Background','eduvert'),
			'panel'  		=> 'footer_section',
			'priority'      => 4,
		)
    );
	
	
	//  Color
	$wp_customize->add_setting(
	'footer_bg_color', 
	array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'default' => '#231f40'
    ));
	
	$wp_customize->add_control( 
		new WP_Customize_Color_Control
		($wp_customize, 
			'footer_bg_color', 
			array(
				'label'      => __( 'Background Color', 'eduvert' ),
				'section'    => 'footer_background',
			) 
		) 
	);
}
add_action( 'customize_register', 'eduvert_footer' );
// Footer selective refresh
function eduvert_footer_partials( $wp_customize ){	
	// footer_copyright
	$wp_customize->selective_refresh->add_partial( 'footer_copyright', array(
		'selector'            => '.copyright-text',
		'settings'            => 'footer_copyright',
		'render_callback'  => 'eduvert_footer_copyright_render_callback',
	) );
	}
add_action( 'customize_register', 'eduvert_footer_partials' );


// footer_copyright
function eduvert_footer_copyright_render_callback() {
	return get_theme_mod( 'footer_copyright' );
}