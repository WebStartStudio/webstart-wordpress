<?php
/**
 * Theme functions and definitions
 *
 * @package Corvita
 */

/**
 * After setup theme hook
 */
function corvita_theme_setup(){
    /*
     * Make child theme available for translation.
     * Translations can be filed in the /languages/ directory.
     */
    load_child_theme_textdomain( 'corvita' );	
}
add_action( 'after_setup_theme', 'corvita_theme_setup' );

/**
 * Load assets.
 */

function corvita_theme_css() {
	wp_enqueue_style( 'corvita-parent-theme-style', get_template_directory_uri() . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'corvita_theme_css', 99);

require get_stylesheet_directory() . '/theme-functions/controls/class-customize.php';

/**
 * Import Options From Parent Theme
 *
 */
function corvita_parent_theme_options() {
	$corpiva_mods = get_option( 'theme_mods_corpiva' );
	if ( ! empty( $corpiva_mods ) ) {
		foreach ( $corpiva_mods as $corpiva_mod_k => $corpiva_mod_v ) {
			set_theme_mod( $corpiva_mod_k, $corpiva_mod_v );
		}
	}
}
add_action( 'after_switch_theme', 'corvita_parent_theme_options' );