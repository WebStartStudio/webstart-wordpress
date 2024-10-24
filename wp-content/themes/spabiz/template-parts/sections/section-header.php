<?php
if ( get_header_image() ) : ?>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" id="custom-header" rel="home">
		<img src="<?php esc_url(header_image()); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="<?php echo esc_attr(get_bloginfo( 'title' )); ?>">
	</a>	
<?php endif; ?>
<header id="main-header" class="main-header header-one">
	
	<!--===// Start: Header Above
    =================================-->
	<?php do_action('spabiz_above_header'); ?>
    <!--===// End: Header Top
    =================================--> 

    <!--===// Start: Navigation Wrapper
        =================================-->
        <div class="navigation-wrapper">
            <!--===// Start: Main Desktop Navigation
            =================================-->
            <div class="main-navigation-area d-none d-lg-block">
                <div class="main-navigation <?php echo esc_attr(spabiz_sticky_menu()); ?>">
                    <div class="container">
                        <div class="row">
                            <div class="col-auto my-auto">
                                <div class="logo">
                                   <?php spabiz_logo_site_ttl_description(); ?>
                                </div>
                            </div>
                            <div class="col my-auto">
                                <nav class="navbar-area">
                                    <div class="main-navbar">
                                        <?php spabiz_header_menu_navigation(); ?>
                                    </div>
                                    <div class="main-menu-right">
                                        <ul class="menu-right-list">
                                           <?php spabiz_header_search(); ?>
                                            <?php spabiz_header_cart(); ?>
                                            <?php spabiz_header_booknow_button(); ?>
                                        </ul>                            
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--===// End:  Main Desktop Navigation
            =================================-->


            <!--===// Start: Main Mobile Navigation
            =================================-->
            <div class="main-mobile-nav <?php echo esc_attr(spabiz_sticky_menu()); ?>"> 
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="main-mobile-menu">
                                <div class="mobile-logo">
                                    <div class="logo">
                                         <?php spabiz_logo_site_ttl_description(); ?>
                                    </div>
                                </div>
                                <div class="menu-collapse-wrap">
                                    <div class="hamburger-menu">
                                        <button type="button" class="menu-collapsed" aria-label="<?php esc_attr_e('Menu Collaped','spabiz'); ?>">
                                            <div class="top-bun"></div>
                                            <div class="meat"></div>
                                            <div class="bottom-bun"></div>
                                        </button>
                                    </div>
                                </div>
                                <div class="main-mobile-wrapper">
                                    <div id="mobile-menu-build" class="main-mobile-build">
                                        <button type="button" class="header-close-menu close-style" aria-label="<?php esc_attr_e('Header Close Menu','spabiz'); ?>"></button>
                                        <?php spabiz_header_menu_navigation(); ?>
                                    </div>
                                </div>
                                <div class="header-above-btn">
                                    <button type="button" class="header-above-collapse" aria-label="<?php esc_attr_e('Header Above Collapse','spabiz'); ?>"><span></span></button>
                                </div>
								<?php 
								$spabiz_hs_hdr_info		=	get_theme_mod('hs_hdr_info','1');
								$spabiz_hs_social_icon	=	get_theme_mod('hs_social_icon','1');
								if ( function_exists( 'burger_companion_activated' ) ) {
								if($spabiz_hs_hdr_info == '1' || $spabiz_hs_social_icon == '1'){ ?>
                                <div class="header-above-wrapper">
                                    <div id="header-above-bar" class="header-above-bar">
                                    	<div class="header-widget d-flex align-items-center">
								            <div class="container">
								                <div class="row align-items-center">
								                    <div class="col-lg-6 col-sm-6 col-12">
								                        <?php if($spabiz_hs_hdr_info == '1'){ ?>
															<div class="widget-left text-lg-left">
																<?php do_action('spabiz_header_info'); ?>
															</div>
														<?php } ?>
								                    </div>
								                    <div class="col-lg-6 col-sm-6 col-12">                            
								                        <?php if($spabiz_hs_social_icon == '1'){ ?>
															<div class="widget-right justify-content-lg-end justify-content-center text-lg-right text-center">
																<?php do_action('spabiz_header_social_icon'); ?>
															</div>
														<?php } ?>
								                    </div>
								                </div>
								            </div>
								        </div>
                                    </div>
                                </div>
								<?php } } ?>
                            </div>
                        </div>
                    </div>
                </div>        
            </div>
            <!--===// End: Main Mobile Navigation
            =================================-->
        </div>
        <!--===// End: Navigation Wrapper
        =================================-->
</header>