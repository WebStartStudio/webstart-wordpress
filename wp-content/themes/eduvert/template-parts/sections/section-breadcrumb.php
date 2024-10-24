<?php 
$eduvert_hs_breadcrumb		= get_theme_mod('hs_breadcrumb','1');
$eduvert_bg_element_enable	= get_theme_mod('breadcrumb_bg_element_enable','1');
	
if($eduvert_hs_breadcrumb == '1') {	
?>
<section id="breadcrumb-section" class="breadcrumb-area breadcrumb-center">
		<?php if($eduvert_bg_element_enable == '1') { ?>
        <div class="bg-shape1"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/element1/group-2.png" alt=""></div>
        <div class="bg-shape2"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/element1/Vector-2.png" alt=""></div>
        <div class="bg-shape3"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/element1/Vector-9.png" alt=""></div>
        <div class="bg-shape4"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/element1/Vector-9.png" alt=""></div>
        <div class="bg-shape5"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/element1/Vector-9.png" alt=""></div>
        <div class="bg-shape6"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/element1/Vector-9.png" alt=""></div>
        <div class="bg-shape7"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/element1/Vector-9.png" alt=""></div>
        <div class="bg-shape8"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/element1/Vector-9.png" alt=""></div>
        <div class="bg-shape9"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/element1/Vector-9.png" alt=""></div>
        <div class="bg-shape10"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/element1/Vector.png" alt=""></div>
        <div class="bg-shape11"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/element1/Group-6.png" alt=""></div>
        <div class="bg-shape12"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/element1/Group-3.png" alt=""></div>
        <div class="bg-shape13"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/element1/Group.png" alt=""></div>
        <div class="bg-shape14"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/element1/Group-1.png" alt=""></div>
        <div class="bg-shape16"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/element1/Group-5.png" alt=""></div>
        <div class="bg-shape17"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/element1/Vector-9.png" alt=""></div>
		<?php } ?>
        <div class="nt-container">
            <div class="nt-columns-area">
                <div class="nt-column-12">
                    <div class="breadcrumb-content">
                        <div class="breadcrumb-heading">	
							<h2>
								<?php 
									if ( is_home() || is_front_page()):

										single_post_title();
								
									elseif ( is_day() ) : 
									
										printf( __( 'Daily Archives: %s', 'eduvert' ), get_the_date() );
									
									elseif ( is_month() ) :
									
										printf( __( 'Monthly Archives: %s', 'eduvert' ), (get_the_date( 'F Y' ) ));
										
									elseif ( is_year() ) :
									
										printf( __( 'Yearly Archives: %s', 'eduvert' ), (get_the_date( 'Y' ) ) );
										
									elseif ( is_category() ) :
									
										printf( __( 'Category Archives: %s', 'eduvert' ), (single_cat_title( '', false ) ));

									elseif ( is_tag() ) :
									
										printf( __( 'Tag Archives: %s', 'eduvert' ), (single_tag_title( '', false ) ));
										
									elseif ( is_404() ) :

										printf( __( 'Error 404', 'eduvert' ));
										
									elseif ( is_author() ) :
									
										printf( __( 'Author: %s', 'eduvert' ), (get_the_author( '', false ) ));	
										
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
										
								?>
							</h2>
                        </div>
						<ol class="breadcrumb-list">
							<?php if (function_exists('eduvert_breadcrumbs')) eduvert_breadcrumbs();?>
						</ol>
                    </div>                    
                </div>
            </div>
        </div>
    </section>
<?php }else{ ?>	
<section id="breadcrumb-section" class="breadcrumb-area no-breadcrumb"></div>
<?php } ?>