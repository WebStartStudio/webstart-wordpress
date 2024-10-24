<?php	
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package eduvert
 */
function eduvert_widgets_init() {	
	register_sidebar( array(
		'name' => __( 'Sidebar Widget Area', 'eduvert' ),
		'id' => 'eduvert-sidebar-primary',
		'description' => __( 'The Primary Widget Area', 'eduvert' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h5 class="widget-title"><span></span>',
		'after_title' => '</h5>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer Widget Area', 'eduvert' ),
		'id' => 'eduvert-footer-widget-area',
		'description' => __( 'The Footer Widget Area', 'eduvert' ),
		'before_widget' => '<div class="nt-column-3 mb-xl-0 mb-4"><aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside></div>',
		'before_title' => '<h5 class="widget-title">',
		'after_title' => '</h5>',
	) );
}
add_action( 'widgets_init', 'eduvert_widgets_init' );
?>