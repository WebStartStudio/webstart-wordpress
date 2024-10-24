<?php 
$eduvert_footer_bg_img		= get_theme_mod('footer_bg_img',esc_url(get_template_directory_uri() .'/assets/images/elements/Shape9.png'));	
?>
<footer class="section-footer" id="footer_one" style="background-image: url(<?php echo esc_url($eduvert_footer_bg_img); ?>);">
	<?php if ( is_active_sidebar( 'eduvert-footer-widget-area' ) ) { ?>
		<div class="footer-main ptb-80">
			<div class="nt-container">
				<div class="nt-columns-area">
					<?php  dynamic_sidebar( 'eduvert-footer-widget-area' ); ?>
				</div>
			</div>
		</div>
	<?php } ?>
	<?php 
		$footer_copyright = get_theme_mod('footer_copyright','Copyright &copy; [current_year] [site_title] | Powered by [theme_author]');
	?>
	<div class="footer-copyright">
		<div class="nt-container">
			<div class="nt-columns-area">
				<div class="nt-column-6 nt-md-column-6">
					<?php if(!empty($footer_copyright)): ?>
						<div class="widget-left">  
							<?php 	
								$eduvert_copyright_allowed_tags = array(
									'[current_year]' => date_i18n('Y'),
									'[site_title]'   => get_bloginfo('name'),
									'[theme_author]' => sprintf(__('<a href="https://www.nayrathemes.com/">Eduvert</a>', 'eduvert')),
								);
							?>   
							<div class="copyright-text">
								<?php
									echo apply_filters('eduvert_footer_copyright', wp_kses_post(eduvert_str_replace_assoc($eduvert_copyright_allowed_tags, $footer_copyright)));
								?>
							</div>
						</div>
					<?php endif; ?>
				</div>
				<div class="nt-column-6 nt-md-column-6">
					<div class="widget-right text-nt-right text-center">
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
	</div>
</footer>
<!-- scroll-btn -->
<?php $eduvert_hs_scroller = get_theme_mod('hs_scroller','1'); 
	if($eduvert_hs_scroller=='1'): 
?>
	<button type="button" class="p-0" id="scrollup"  aria-label="<?php esc_attr_e('scrollingUp','eduvert'); ?>"></button>
<?php endif; ?>
</div>
</div>
<?php wp_footer(); ?>
</body>
</html>
