<?php
 /**
 * Enqueue scripts and styles.
 */
function eduvert_scripts() {
	
	// Styles	
	wp_enqueue_style('owl-carousel-min',get_template_directory_uri().'/assets/css/owl.carousel.css');
	
	wp_enqueue_style('bootstrap',get_template_directory_uri().'/assets/css/bootstrap.css');
	
	wp_enqueue_style('font-awesome',get_template_directory_uri().'/assets/css/fonts/font-awesome/css/font-awesome.min.css');

	wp_enqueue_style('eduvert-editor-style',get_template_directory_uri().'/assets/css/editor-style.css');

	wp_enqueue_style('eduvert-default', get_template_directory_uri() . '/assets/css/color.css');

	wp_enqueue_style('eduvert-theme-css',get_template_directory_uri().'/assets/css/theme.css');

	wp_enqueue_style('eduvert-main', get_template_directory_uri() . '/assets/css/main.css');
	
	wp_enqueue_style('eduvert-media-query', get_template_directory_uri() . '/assets/css/responsive.css');
	
	wp_enqueue_style( 'eduvert-style', get_stylesheet_uri() );
	
	// Scripts
	wp_enqueue_script( 'jquery' );
	
	wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.js', array('jquery'), true);
	
	wp_enqueue_script('owl-carousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array('jquery'), true);
	
	wp_enqueue_script('wow-min', get_template_directory_uri() . '/assets/js/wow.min.js', array('jquery'), false, true);

	wp_enqueue_script('eduvert-custom-js', get_template_directory_uri() . '/assets/js/custom.js', array('jquery'), false, true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'eduvert_scripts' );

//Admin Enqueue for Admin
function eduvert_admin_enqueue_scripts(){
	wp_enqueue_style('eduvert-admin-style', get_template_directory_uri() . '/assets/css/admin.css');
	wp_enqueue_script( 'eduvert-admin-script', get_template_directory_uri() . '/assets/js/eduvert-admin-script.js', array( 'jquery' ), '', true );
    wp_localize_script( 'eduvert-admin-script', 'eduvert_ajax_object',
        array( 'ajax_url' => admin_url( 'admin-ajax.php' ) )
    );
}
add_action( 'admin_enqueue_scripts', 'eduvert_admin_enqueue_scripts' );