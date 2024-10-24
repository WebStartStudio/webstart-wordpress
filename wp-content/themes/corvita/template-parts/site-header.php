<?php  do_action('corpiva_site_preloader'); ?>	
<?php  do_action('corpiva_wp_hdr_image'); ?>
<?php 
$corpiva_hs_hdr_sticky = get_theme_mod( 'corpiva_hs_hdr_sticky','1');
?>
<header id="dt_header" class="dt_header header--two">
	<div class="dt_header-inner">
		
		<div class="dt_header-navwrapper">
			<div class="dt_header-navwrapperinner">
				<!--=== / Start: DT_Navbar / === -->
				<div class="dt_navbar dt-d-none dt-d-lg-block">
					<div class="dt_navbar-wrapper <?php if($corpiva_hs_hdr_sticky=='1'): esc_attr_e('is--sticky','corvita'); endif; ?>">
						<div class="dt-container">
							<div class="dt-row">
								<div class="dt-col-2 dt-mt-auto">
									<div class="site--logo">
										<div class="site--logo-inner">
											<?php do_action('corpiva_site_logo'); ?>
										</div>
										<div class="logo-shape-outer">
											<div class="logo-shape">
												<svg class="logo-shape1" width="215" height="214" viewBox="0 0 215 214" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M10.8494 212.816C5.24167 213.955 0 209.66 0 203.928V9.07002C0 4.06079 4.053 0 9.05263 0H205.947C210.947 0 215 4.06079 215 9.07002V163.978C215 168.294 211.965 172.011 207.744 172.867L10.8494 212.816Z" fill="currentColor"/>
												</svg>
												<svg class="logo-shape2" width="167" height="164" viewBox="0 0 167 164" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M6.80703 163.689C3.29955 164.437 0 161.73 0 158.105V5.70552C0 2.55444 2.52597 0 5.64189 0H161.358C164.474 0 167 2.55444 167 5.70552V124.868C167 127.566 165.133 129.894 162.524 130.45L6.80703 163.689Z" fill="currentColor"/>
												</svg>
											</div>
										</div>
									</div>
								</div>
								<div class="dt-col-10">
									<div class="dt_header-topbar dt-d-lg-block dt-d-none">
										<?php do_action('corpiva_site_header'); ?>
									</div>
									<div class="dt_navbar-menu">
										<nav class="dt_navbar-nav">
											<?php do_action('corpiva_site_header_navigation'); ?>
										</nav>
										<div class="dt_navbar-right">
											<ul class="dt_navbar-list-right">
												<?php do_action('corpiva_hdr_account'); ?>
												<?php do_action('corpiva_woo_cart'); ?>
												<?php do_action('corpiva_site_main_search'); ?>
												<?php do_action('corpiva_header_button'); ?>
												<?php do_action('corpiva_header_contact'); ?>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--=== / End: DT_Navbar / === -->
				<!--=== / Start: DT_Mobile Menu / === -->
				<div class="dt_mobilenav dt-d-lg-none <?php if($corpiva_hs_hdr_sticky=='1'): esc_attr_e('is--sticky','corvita'); endif; ?>">
					<div class="dt_mobilenav-topbar">
						<button type="button" class="dt_mobilenav-topbar-toggle"><i class="fas fa-angle-double-down" aria-hidden="true"></i></button>
						<div class="dt_mobilenav-topbar-content">
							<div class="dt-container">
								<div class="dt-row">
									<div class="dt-col-12">
										<?php do_action('corpiva_site_header'); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="dt-container">
						<div class="dt-row">
							<div class="dt-col-12">
								<div class="dt_mobilenav-menu">
									<div class="dt_mobilenav-logo">
										<div class="site--logo">
											<?php do_action('corpiva_site_logo'); ?>
										</div>
									</div>
									<div class="dt_mobilenav-toggles">
										<div class="dt_mobilenav-right">
											<ul class="dt_navbar-list-right">           
												<?php do_action('corpiva_site_main_search'); ?>
												<?php do_action('corpiva_header_button'); ?>
											</ul>
										</div>
										<div class="dt_mobilenav-mainmenu">
											<button type="button" class="hamburger dt_mobilenav-mainmenu-toggle">
												<span></span>
												<span></span>
												<span></span>
											</button>
											<nav class="dt_mobilenav-mainmenu-content">
												<div class="dt_header-closemenu off--layer"></div>
												<div class="dt_mobilenav-mainmenu-inner">
													<button type="button" class="dt_header-closemenu site--close"></button>
													<?php do_action('corpiva_site_header_navigation'); ?>
												</div>
											</nav>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--=== / End: DT_Mobile Menu / === -->
			</div>
		</div>
	</div>
</header>