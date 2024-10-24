<?php
if ( get_header_image() ) : ?>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="custom-header" id="custom-header" rel="home">
		<img src="<?php echo esc_url(get_header_image()); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="<?php echo esc_attr(get_bloginfo( 'name' )); ?>">
	</a>
<?php endif; ?>
<header id="header-section" class="header header-one">
	<!--===// Start: Mobile Toggle
	=================================-->
	<div class="theme-mobile-nav <?php echo esc_attr(eduvert_sticky_menu()); ?>"> 
		<div class="nt-container">
			<div class="nt-columns-area">
				<div class="nt-column-12">
					<div class="theme-mobile-menu">                     
						<div class="headtop-mobi">
							<a href="#" class="header-sidebar-toggle"><span></span></a>
						</div>
						<div id="mob-h-top" class="mobi-head-top"></div>
						<div class="mobile-logo">
							<?php do_action('eduvert_logo_content'); ?>
						</div>      
						<div class="menu-toggle">
							<div class="hamburger-menu">
								<a href="#" class="menu-toggle">
									<div class="top-bun"></div>
									<div class="meat"></div>
									<div class="bottom-bun"></div>
								</a>
							</div>
						</div>
						<div id="mobile-m" class="mobile-menu">
							<a href="#" class="close-style close-menu"></a>
						</div>
					</div>
				</div>
			</div>
		</div>        
	</div>
	<!--===// End: Mobile Toggle
	=================================-->        

	<!--===// Start: Navigation
	=================================-->
	<div class="navigator d-none d-lg-block <?php echo esc_attr(eduvert_sticky_menu()); ?>">
		<div class="nt-container">
			<div class="nt-columns-area">
				<div class="nt-column-3 my-auto">
					<div class="logo">
						<?php do_action('eduvert_logo_content'); ?>
					</div>
				</div>

				<div class="nt-column-9 my-auto">
					<div class="theme-menu">
						<nav class="menubar">
							<?php do_action('eduvert_primary_navigation'); ?>                      
						</nav>
						<div class="menu-right">
							<ul class="wrap-right"> 
								<?php do_action('eduvert_navigation_search'); ?>
								<?php do_action('eduvert_abv_hdr_social'); ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--===// End:  Navigation
	=================================-->
</header>
<?php	
	if ( !is_page_template( 'templates/template-homepage.php' )) {
		eduvert_breadcrumbs_style();  
	}	
?>