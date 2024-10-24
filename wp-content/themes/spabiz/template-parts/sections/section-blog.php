<?php  
	$spabiz_hs_blog 		= get_theme_mod('hs_blog','1');
	$spabiz_blog_title		= get_theme_mod('blog_title'); 
	$spabiz_blog_subtitle	= get_theme_mod('blog_subtitle'); 
	$spabiz_blog_description= get_theme_mod('blog_description'); 
	$spabiz_blog_display_num= get_theme_mod('blog_display_num','3');
	if($spabiz_hs_blog=='1'):
?>	
<section id="blog-home" class="blog-section ptb-80 wow fadeInUp blog-home">
	<div class="container">
		<?php if ( ! empty( $spabiz_blog_title )  || ! empty( $spabiz_blog_subtitle ) || ! empty( $spabiz_blog_description )) : ?>
			<div class="section-title">
				<?php if ( ! empty( $spabiz_blog_title ) ) : ?>
					<h6 class="subtitle"><?php echo wp_kses_post($spabiz_blog_title); ?></h6>
				<?php endif; ?>
				
				<?php if ( ! empty( $spabiz_blog_subtitle ) ) : ?>
					<h3 class="title"><?php echo wp_kses_post($spabiz_blog_subtitle); ?></h3>
				<?php endif; ?>
				
				<?php if ( ! empty( $spabiz_blog_description ) ) : ?>
					<p class="text"><?php echo wp_kses_post($spabiz_blog_description); ?></p>
				<?php endif; ?>
			</div>
		<?php endif; ?>
		<div class="row">
			<?php 	
				$spabiz_blogs_args = array( 'post_type' => 'post', 'posts_per_page' => $spabiz_blog_display_num,'post__not_in'=>get_option("sticky_posts")) ; 	
				$spabiz__blog_wp_query = new WP_Query($spabiz_blogs_args);
				if($spabiz__blog_wp_query)
				{	
				while($spabiz__blog_wp_query->have_posts()):$spabiz__blog_wp_query->the_post(); 
			?>
			<div class="col-lg-4">
				<?php get_template_part('template-parts/content/content','page'); ?>
			</div>
			<?php 
				endwhile; 
				}
				wp_reset_postdata();
			?>
		</div>
	</div>
</section>
<?php endif; ?>