</div>
<?php 
$spabiz_footer_bg_img= get_theme_mod('footer_bg_img',esc_url(get_template_directory_uri() .'/assets/images/bg-footer.png')); 
$spabiz_footer_bg_img_opacity= get_theme_mod('footer_bg_img_opacity','0.8'); 
?>	

<footer class="footer-section footer-one">
	<div class="footer-inner ptb-80"  style="background:url('<?php echo esc_url($spabiz_footer_bg_img); ?>') no-repeat scroll center center / cover rgb(0 0 0 / <?php echo esc_attr($spabiz_footer_bg_img_opacity); ?>);background-blend-mode:multiply;">
		<?php  if ( is_active_sidebar( 'spabiz-footer-widget-area' ) ) { ?>	
		<div class="footer-main">
			<div class="container">
				<div class="row row-cols-1 row-cols-lg-4 row-cols-md-2 g-5">
					<?php  dynamic_sidebar( 'spabiz-footer-widget-area' ); ?>
				</div>
			</div>
		</div>
		<?php } ?>
	</div>
	
	<div class="footer-copyright">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-sm-6">
					<?php spabiz_footer_copyright();  ?>
				</div>
				<div class="col-lg-6 col-sm-6" style="text-align: right;">
					<aside class="widget widget-nav-menu">
						<div class="menu-pages-container">
							<?php 
								wp_nav_menu( 
									array(  
										'theme_location' => 'footer_menu',
										'container'  => '',
										'menu_class' => 'menu',
										'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
										'walker' => new WP_Bootstrap_Navwalker()
										 ) 
									);
							?>   
						</div>
					</aside>
				</div>
			</div>
		</div>
	</div>
</footer>
<?php $spabiz_hs_scroller		=	get_theme_mod('hs_scroller','1'); ?>		
<?php if ($spabiz_hs_scroller == '1') { ?>
	<button type="button" class="scrollingUp scrolling-btn" aria-label="scrollingUp"><i class="fa fa-angle-up"></i></button>
<?php } ?>	
</div>		
<?php wp_footer(); ?>
</body>
</html>
