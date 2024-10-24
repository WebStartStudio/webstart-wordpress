<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package SpaBiz
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function spabiz_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'spabiz_body_classes' );

if ( ! function_exists( 'wp_body_open' ) ) {
	/**
	 * Backward compatibility for wp_body_open hook.
	 *
	 * @since 1.0.0
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
}

if (!function_exists('spabiz_str_replace_assoc')) {

    /**
     * spabiz_str_replace_assoc
     * @param  array $replace
     * @param  array $subject
     * @return array
     */
    function spabiz_str_replace_assoc(array $replace, $subject) {
        return str_replace(array_keys($replace), array_values($replace), $subject);
    }
}

if ( ! function_exists( 'spabiz_footer_copyright' ) ) {
	function spabiz_footer_copyright() {
		$footer_copyright = get_theme_mod('footer_copyright','Copyright &copy; [current_year] [site_title] | Powered by [theme_author]');
			if ( ! empty( $footer_copyright ) ){ 				
				$spabiz_copyright_allowed_tags = array(
					'[current_year]' => date_i18n('Y'),
					'[site_title]'   => get_bloginfo('name'),
					'[theme_author]' => sprintf(__('<a href="https://burgerthemes.com/">Burger Software</a>', 'spabiz')),
				);
			?>  
				<div class="copyright-text">
					<?php
						echo apply_filters('spabiz_footer_copyright', wp_kses_post(spabiz_str_replace_assoc($spabiz_copyright_allowed_tags, $footer_copyright)));
					?>
				</div>
			<?php }
	}
}



 /**
 * Add WooCommerce Cart Icon With Cart Count (https://isabelcastillo.com/woocommerce-cart-icon-count-theme-header)
 */
function spabiz_add_to_cart_fragment( $fragments ) {
	
    ob_start();
    $count = WC()->cart->cart_contents_count;
    ?> 
	<button type="button" class="cart-icon-wrap header-cart"><i class="fa fa-shopping-cart"></i>
	<?php
    if ( $count > 0 ) { 
	?>
        <span><?php echo esc_html( $count ); ?></span>
	<?php            
    } else {
	?>	
		<span><?php esc_html_e('0','spabiz' ); ?></span>
	<?php
	}
    ?></button><?php
 
    $fragments['.cart-icon-wrap'] = ob_get_clean();
     
    return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'spabiz_add_to_cart_fragment' );


/**
 * Section Seprator
 */
if ( ! function_exists( 'spabiz_section_seprator' ) ) {
	function spabiz_section_seprator() {
	?>
	<span class="hr-line"><span><span></span></span></span>
	<?php	
	}
add_action('spabiz_section_seprator','spabiz_section_seprator');
}	


 /**
 * Breadcrumb Title
 */
 
if ( ! function_exists( 'spabiz_breadcrumb_title' ) ) {
	function spabiz_breadcrumb_title() {
		
		if ( is_home() || is_front_page()):
			
			single_post_title();
			
		elseif ( is_day() ) : 
										
			printf( __( 'Daily Archives: %s', 'spabiz' ), get_the_date() );
		
		elseif ( is_month() ) :
		
			printf( __( 'Monthly Archives: %s', 'spabiz' ), (get_the_date( 'F Y' ) ));
			
		elseif ( is_year() ) :
		
			printf( __( 'Yearly Archives: %s', 'spabiz' ), (get_the_date( 'Y' ) ) );
			
		elseif ( is_category() ) :
		
			printf( __( 'Category Archives: %s', 'spabiz' ), (single_cat_title( '', false ) ));

		elseif ( is_tag() ) :
		
			printf( __( 'Tag Archives: %s', 'spabiz' ), (single_tag_title( '', false ) ));
			
		elseif ( is_404() ) :

			printf( __( 'Error 404', 'spabiz' ));
			
		elseif ( is_author() ) :
		
			printf( __( 'Author: %s', 'spabiz' ), (get_the_author( '', false ) ));	
			
		elseif ( class_exists( 'woocommerce' ) ) : 
			
			if ( is_shop() ) {
				woocommerce_page_title();
			}
			
			elseif ( is_cart() ) {
				the_title();
			}
			
			elseif ( is_checkout() ) {
				the_title();
			}
			
			else {
				the_title();
			}
		else :
				the_title();
				
		endif;
	}
}


 /**
 * Breadcrumb Content
 */
 function spabiz_breadcrumbs() {
	
	$showOnHome	= esc_html__('1','spabiz'); 	// 1 - Show breadcrumbs on the homepage, 0 - don't show
	$delimiter 	= '';   // Delimiter between breadcrumb
	$home 		= esc_html__('Home','spabiz'); 	// Text for the 'Home' link
	$showCurrent= esc_html__('1','spabiz'); // Current post/page title in breadcrumb in use 1, Use 0 for don't show
	$before		= '<li class="active">'; // Tag before the current Breadcrumb
	$after 		= '</li>'; // Tag after the current Breadcrumb
	$breadcrumb_seprator	= get_theme_mod('breadcrumb_seprator','>');
	global $post;
	$homeLink = home_url();

	if (is_home() || is_front_page()) {
 
	if ($showOnHome == 1) echo '<li><a href="' . esc_url($homeLink) . '">' . esc_html($home) . '</a></li>';
 
	} else {
 
    echo '<li><a href="' . esc_url($homeLink) . '">' . esc_html($home) . '</a> ' . '&nbsp' . wp_kses_post($breadcrumb_seprator) . '&nbsp';
 
    if ( is_category() ) 
	{
		$thisCat = get_category(get_query_var('cat'), false);
		if ($thisCat->parent != 0) echo get_category_parents($thisCat->parent, TRUE, ' ' . ' ');
		echo $before . esc_html__('Archive by category','spabiz').' "' . esc_html(single_cat_title('', false)) . '"' .$after;
		
	} 
	
	elseif ( is_search() ) 
	{
		echo $before . esc_html__('Search results for ','spabiz').' "' . esc_html(get_search_query()) . '"' . $after;
	} 
	
	elseif ( is_day() )
	{
		echo '<a href="' . esc_url(get_year_link(get_the_time('Y'))) . '">' . esc_html(get_the_time('Y')) . '</a> ' . '&nbsp' . wp_kses_post($breadcrumb_seprator) . '&nbsp';
		echo '<a href="' . esc_url(get_month_link(get_the_time('Y'),get_the_time('m'))) . '">' . esc_html(get_the_time('F')) . '</a> '. '&nbsp' . wp_kses_post($breadcrumb_seprator) . '&nbsp';
		echo $before . esc_html(get_the_time('d')) . $after;
	} 
	
	elseif ( is_month() )
	{
		echo '<a href="' . esc_url(get_year_link(get_the_time('Y'))) . '">' . esc_html(get_the_time('Y')) . '</a> ' . esc_attr($delimiter) . '&nbsp' . wp_kses_post($breadcrumb_seprator) . '&nbsp';
		echo $before . esc_html(get_the_time('F')) . $after;
	} 
	
	elseif ( is_year() )
	{
		echo $before . esc_html(get_the_time('Y')) . $after;
	} 
	
	elseif ( is_single() && !is_attachment() )
	{
		if ( get_post_type() != 'post' )
		{
			if ( class_exists( 'WooCommerce' ) ) {
				if ($showCurrent == 1) echo ' ' . esc_attr($delimiter) . '&nbsp&nbsp' . $before . wp_kses_post(get_the_title()) . $after;
			}else{	
			$post_type = get_post_type_object(get_post_type());
			$slug = $post_type->rewrite;
			echo '<a href="' . esc_url($homeLink) . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>';
			if ($showCurrent == 1) echo ' ' . esc_attr($delimiter) . '&nbsp' . wp_kses_post($breadcrumb_seprator) . '&nbsp' . $before . wp_kses_post(get_the_title()) . $after;
			}
		}
		else
		{
			$cat = get_the_category(); $cat = $cat[0];
			$cats = get_category_parents($cat, TRUE, ' ' . esc_attr($delimiter) . '&nbsp' . wp_kses_post($breadcrumb_seprator) . '&nbsp');
			if ($showCurrent == 0) $cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);
			echo $cats;
			if ($showCurrent == 1) echo $before . esc_html(get_the_title()) . $after;
		}
 
    }
		
	elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
		if ( class_exists( 'WooCommerce' ) ) {
			if ( is_shop() ) {
				$thisshop = woocommerce_page_title();
			}
		}	
		else  {
			$post_type = get_post_type_object(get_post_type());
			echo $before . $post_type->labels->singular_name . $after;
		}	
	} 
	
	elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) 
	{
		$post_type = get_post_type_object(get_post_type());
		echo $before . $post_type->labels->singular_name . $after;
	} 
	
	elseif ( is_attachment() ) 
	{
		$parent = get_post($post->post_parent);
		$cat = get_the_category($parent->ID); 
		if(!empty($cat)){
		$cat = $cat[0];
		echo get_category_parents($cat, TRUE, ' ' . esc_attr($delimiter) . '&nbsp' . wp_kses_post($breadcrumb_seprator) . '&nbsp');
		}
		echo '<a href="' . esc_url(get_permalink($parent)) . '">' . $parent->post_title . '</a>';
		if ($showCurrent == 1) echo ' ' . esc_attr($delimiter) . ' ' . $before . esc_html(get_the_title()) . $after;
 
    } 
	
	elseif ( is_page() && !$post->post_parent ) 
	{
		if ($showCurrent == 1) echo $before . esc_html(get_the_title()) . $after;
	} 
	
	elseif ( is_page() && $post->post_parent ) 
	{
		$parent_id  = $post->post_parent;
		$breadcrumbs = array();
		while ($parent_id) 
		{
			$page = get_page($parent_id);
			$breadcrumbs[] = '<a href="' . esc_url(get_permalink($page->ID)) . '">' . esc_html(get_the_title($page->ID)) . '</a>' . '&nbsp' . wp_kses_post($breadcrumb_seprator) . '&nbsp';
			$parent_id  = $page->post_parent;
		}
		
		$breadcrumbs = array_reverse($breadcrumbs);
		for ($i = 0; $i < count($breadcrumbs); $i++) 
		{
			echo $breadcrumbs[$i];
			if ($i != count($breadcrumbs)-1) echo ' ' . esc_attr($delimiter) . '&nbsp' . wp_kses_post($breadcrumb_seprator) . '&nbsp';
		}
		if ($showCurrent == 1) echo ' ' . esc_attr($delimiter) . ' ' . $before . esc_html(get_the_title()) . $after;
 
    } 
	elseif ( is_tag() ) 
	{
		echo $before . esc_html__('Posts tagged ','spabiz').' "' . esc_html(single_tag_title('', false)) . '"' . $after;
	} 
	
	elseif ( is_author() ) {
		global $author;
		$userdata = get_userdata($author);
		echo $before . esc_html__('Articles posted by ','spabiz').'' . $userdata->display_name . $after;
	} 
	
	elseif ( is_404() ) {
		echo $before . esc_html__('Error 404 ','spabiz'). $after;
    }
	
    if ( get_query_var('paged') ) {
		if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo '';
		echo ' ( ' . esc_html__('Page','spabiz') . '' . esc_html(get_query_var('paged')). ' )';
		if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo '';
    }
 
    echo '</li>';
 
  }
}


if ( ! function_exists( 'spabiz_logo_site_ttl_description' ) ) {
	function spabiz_logo_site_ttl_description() {
			if(has_custom_logo())
			{	
				the_custom_logo();
			}
			else { 
			?>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<h4 class="site-title">
					<?php 
						echo esc_html(bloginfo('name'));
					?>
				</h4>
			</a>	
		<?php 						
			}
		?>
		<?php
			$spabiz_site_desc = get_bloginfo( 'description');
			if ($spabiz_site_desc) : ?>
				<p class="site-description"><?php echo esc_html($spabiz_site_desc); ?></p>
		<?php endif; 
	}
}

if ( ! function_exists( 'spabiz_header_menu_navigation' ) ) {
	function spabiz_header_menu_navigation() {
			wp_nav_menu( 
				array(  
					'theme_location' => 'primary_menu',
					'container'  => '',
					'menu_class' => 'main-menu',
					'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
					'walker' => new WP_Bootstrap_Navwalker()
					 ) 
				);
	}
}


if ( ! function_exists( 'spabiz_header_search' ) ) {
	function spabiz_header_search() {
		 $spabiz_hs_hdr_search       = get_theme_mod( 'hs_hdr_search','1'); 
			if($spabiz_hs_hdr_search == '1') { ?>
				 <li class="search-button">
					<button type="button" id="header-search-toggle" class="header-search-toggle" aria-expanded="false" aria-label="<?php esc_attr_e('Search Popup','spabiz'); ?>"><i class="fa fa-search"></i></button>
					<!--===// Start: Header Search PopUp
					=================================-->
					<div class="header-search-popup">
						<div class="header-search-flex">
							<form method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php esc_attr_e('Site Search','spabiz'); ?>">
								<input type="search" class="form-control header-search-field" placeholder="<?php esc_attr_e('Type To Search','spabiz'); ?>" name="s" id="search">
								<button type="submit" class="search-submit"><i class="fa fa-search"></i></button>
							</form>
							<button type="button" id="header-search-close" class="close-style header-search-close" aria-label="<?php esc_attr_e('Search Popup Close','spabiz'); ?>"></button>
						</div>
					</div>
					<!--===// End: Header Search PopUp
					=================================-->
				</li>
			<?php }
	}
}


if ( ! function_exists( 'spabiz_header_cart' ) ) {
	function spabiz_header_cart() {
		$spabiz_hs_hdr_cart       = get_theme_mod( 'hs_hdr_cart','1'); 
		if($spabiz_hs_hdr_cart == '1') { 
		 if ( class_exists( 'WooCommerce' ) ) { ?>
			<li class="cart-wrapper">
				<button type="button" class="cart-icon-wrap header-cart">
					<i class="fa fa-shopping-cart"></i>
					<?php 
						$count = WC()->cart->cart_contents_count;
						$cart_url = wc_get_cart_url();
						
						if ( $count > 0 ) {
						?>
							 <span><?php echo esc_html( $count ); ?></span>
						<?php 
						}
						else {
							?>
							<span><?php esc_html_e('0','spabiz'); ?></span>
							<?php 
						}
					?>
				</button>
				<!-- Shopping Cart -->
				<div class="shopping-cart">
					<?php get_template_part('woocommerce/cart/mini','cart'); ?>
				</div>
				<!--end shopping-cart -->
			</li>
		<?php } }
	}
}



if ( ! function_exists( 'spabiz_header_booknow_button' ) ) {
	function spabiz_header_booknow_button() {
		$spabiz_hs_hdr_btn 		=	get_theme_mod('hs_hdr_btn','1');
		$spabiz_hdr_btn_lbl 	=	get_theme_mod('hdr_btn_lbl');
		$spabiz_hdr_btn_url  	=	get_theme_mod('hdr_btn_url');
		$spabiz_hdr_btn_open_new_tab  = get_theme_mod('hdr_btn_open_new_tab');	
		if($spabiz_hs_hdr_btn=='1' && !empty($spabiz_hdr_btn_lbl)):	
		?>
			<li class="button-area">
				<a href="<?php echo esc_url( $spabiz_hdr_btn_url ); ?>" <?php if($spabiz_hdr_btn_open_new_tab == '1'): echo "target='_blank'"; endif;?> class="main-btn btn-effect"><span></span><?php echo esc_html( $spabiz_hdr_btn_lbl ); ?></a>
			</li>
		<?php
		endif;
	}
}


/*******************************************************************************
 *  Get Started Notice
 *******************************************************************************/

add_action( 'wp_ajax_spabiz_dismissed_notice_handler', 'spabiz_ajax_notice_handler' );

/**
 * AJAX handler to store the state of dismissible notices.
 */
function spabiz_ajax_notice_handler() {
    if ( isset( $_POST['type'] ) ) {
        // Pick up the notice "type" - passed via jQuery (the "data-notice" attribute on the notice)
        $type = sanitize_text_field( wp_unslash( $_POST['type'] ) );
        // Store it in the options table
        update_option( 'dismissed-' . $type, TRUE );
    }
}

function spabiz_deprecated_hook_admin_notice() {
        // Check if it's been dismissed...
        if ( ! get_option('dismissed-get_started', FALSE ) ) {
            // Added the class "notice-get-started-class" so jQuery pick it up and pass via AJAX,
            // and added "data-notice" attribute in order to track multiple / different notices
            // multiple dismissible notice states ?>
            <div class="updated notice notice-get-started-class is-dismissible" data-notice="get_started">
                <div class="spabiz-getting-started-notice clearfix">
                    <div class="spabiz-theme-screenshot">
                        <img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/screenshot.png" class="screenshot" alt="<?php esc_attr_e( 'Theme Screenshot', 'spabiz' ); ?>" />
                    </div><!-- /.spabiz-theme-screenshot -->
                    <div class="spabiz-theme-notice-content">
                        <h2 class="spabiz-notice-h2">
                            <?php
                        printf(
                        /* translators: 1: welcome page link starting html tag, 2: welcome page link ending html tag. */
                            esc_html__( 'Welcome! Thank you for choosing %1$s!', 'spabiz' ), '<strong>'. wp_get_theme()->get('Name'). '</strong>' );
                        ?>
                        </h2>

                        <p class="plugin-install-notice"><?php echo sprintf(__('Install and activate <strong>Burger Companion</strong> plugin for taking full advantage of all the features this theme has to offer.', 'spabiz')) ?></p>

                        <a class="spabiz-btn-get-started button button-primary button-hero spabiz-button-padding" href="#" data-name="" data-slug=""><?php esc_html_e( 'Get started with SpaBiz', 'spabiz' ) ?></a><span class="spabiz-push-down">
                        <?php
                            /* translators: %1$s: Anchor link start %2$s: Anchor link end */
                            printf(
                                'or %1$sCustomize theme%2$s</a></span>',
                                '<a target="_blank" href="' . esc_url( admin_url( 'customize.php' ) ) . '">',
                                '</a>'
                            );
                        ?>
                    </div><!-- /.spabiz-theme-notice-content -->
                </div>
            </div>
        <?php }
}

add_action( 'admin_notices', 'spabiz_deprecated_hook_admin_notice' );

/*******************************************************************************
 *  Plugin Installer
 *******************************************************************************/

add_action( 'wp_ajax_install_act_plugin', 'spabiz_admin_install_plugin' );

function spabiz_admin_install_plugin() {
    /**
     * Install Plugin.
     */
    include_once ABSPATH . '/wp-admin/includes/file.php';
    include_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';
    include_once ABSPATH . 'wp-admin/includes/plugin-install.php';

    if ( ! file_exists( WP_PLUGIN_DIR . '/burger-companion' ) ) {
        $api = plugins_api( 'plugin_information', array(
            'slug'   => sanitize_key( wp_unslash( 'burger-companion' ) ),
            'fields' => array(
                'sections' => false,
            ),
        ) );

        $skin     = new WP_Ajax_Upgrader_Skin();
        $upgrader = new Plugin_Upgrader( $skin );
        $result   = $upgrader->install( $api->download_link );
    }

    // Activate plugin.
    if ( current_user_can( 'activate_plugin' ) ) {
        $result = activate_plugin( 'burger-companion/burger-companion.php' );
    }
}	