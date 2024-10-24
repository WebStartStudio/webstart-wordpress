<?php 
	$spabiz_hs_breadcrumb				= get_theme_mod('hs_breadcrumb','1');
	$spabiz_breadcrumb_bg_img			= get_theme_mod('breadcrumb_bg_img',esc_url(get_template_directory_uri() .'/assets/images/breadcrumb.png')); 
	$spabiz_breadcrumb_back_attach		= get_theme_mod('breadcrumb_back_attach','scroll');
if($spabiz_hs_breadcrumb == '1') {	
?>
<section id="breadcrumb-section" class="breadcrumb-area breadcrumb-center ptb-80" style="background: url(<?php echo esc_url($spabiz_breadcrumb_bg_img); ?>) center center <?php echo esc_attr($spabiz_breadcrumb_back_attach); ?>;">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="breadcrumb-content">
						<div class="breadcrumb-heading">
							<h1><?php spabiz_breadcrumb_title(); ?></h1>
						</div>
						<ol class="breadcrumb-list">
							<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><i class="fa fa-home"></i></a></li>
							<li><?php spabiz_breadcrumb_title(); ?></li>
						</ol>
					</div> 	
				</div>
			</div>
		</div>
</section>
<?php }else{ ?>
<section id="breadcrumb-section" class="breadcrumb-area breadcrumb-center ptb-80">
</section>
<?php } ?>	