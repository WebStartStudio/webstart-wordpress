<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Eduvert
 */

if ( ! function_exists( 'eduvert_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function eduvert_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		esc_html_x( 'Posted on %s', 'post date', 'eduvert' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		esc_html_x( 'by %s', 'post author', 'eduvert' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);
	echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.
}
endif;

if ( ! function_exists( 'eduvert_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function eduvert_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'eduvert' ) );
		if ( $categories_list && eduvert_categorized_blog() ) {
			printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'eduvert' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'eduvert' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'eduvert' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		/* translators: %s: post title */
		comments_popup_link( sprintf( wp_kses( __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'eduvert' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
		echo '</span>';
	}

	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'eduvert' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function eduvert_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'eduvert_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'eduvert_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so eduvert_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so eduvert_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in eduvert_categorized_blog.
 */
function eduvert_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'eduvert_categories' );
}
add_action( 'edit_category', 'eduvert_category_transient_flusher' );
add_action( 'save_post',     'eduvert_category_transient_flusher' );

/**
 * Function that returns if the menu is sticky
 */
if (!function_exists('eduvert_sticky_menu')):
    function eduvert_sticky_menu()
    {
        $is_sticky = get_theme_mod('hide_show_sticky','1');

        if ($is_sticky == '1'):
            return 'sticky-nav ';
        else:
            return 'not-sticky';
        endif;
    }
endif;


/**
 * Register Google fonts for eduvert.
 */
function eduvert_google_font() {
	
	$font_families = array('Montserrat:wght@300;400;500;600;700;800;900');

	$fonts_url = add_query_arg( array(
		'family' => implode( '&family=', $font_families ),
		'display' => 'swap',
	), 'https://fonts.googleapis.com/css2' );

	require_once get_theme_file_path( 'inc/wptt-webfont-loader.php' );

	return wptt_get_webfont_url( esc_url_raw( $fonts_url ) );
}

function eduvert_scripts_styles() {
    wp_enqueue_style( 'eduvert-fonts', eduvert_google_font(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'eduvert_scripts_styles' );


/**
 * Register Breadcrumb for Multiple Variation
 */
function eduvert_breadcrumbs_style() {
	get_template_part('./template-parts/sections/section','breadcrumb');			
}

/**
 * This Function Check whether Sidebar active or Not
 */
if(!function_exists( 'eduvert_post_layout' )) :
function eduvert_post_layout(){
	if(is_active_sidebar('eduvert-sidebar-primary'))
		{ echo 'nt-column-8 nt-md-column-6 mb-4 mb-nt-0'; } 
	else 
		{ echo 'nt-column-12 nt-md-column-12 mb-4 mb-nt-0'; }  
} endif;

/**
 * Dynamic Styles
 */
 
if( ! function_exists( 'eduvert_dynamic_style' ) ):
    function eduvert_dynamic_style() {

		$output_css = '';
		
			
		 /**
		 *  Breadcrumb Style
		 */
		$breadcrumb_min_height			= get_theme_mod('breadcrumb_min_height','350');	
		
		if($breadcrumb_min_height !== '') { 
				$output_css .=".breadcrumb-area {
					min-height: " .esc_attr($breadcrumb_min_height). "px;
				}\n";
			}
			
		 /**
		 *  Footer
		 */
		$footer_bg_color			= get_theme_mod('footer_bg_color','#231f40');	
		
		if($footer_bg_color !== '') { 
				$output_css .=".section-footer {
					background: " .esc_attr($footer_bg_color). ";
				}\n";
			}	
        wp_add_inline_style( 'eduvert-style', $output_css );
    }
endif;
add_action( 'wp_enqueue_scripts', 'eduvert_dynamic_style' );