<?php  
	$eduvert_blog_hs			= get_theme_mod('blog_hs','1');
	$eduvert_blog_title 		= get_theme_mod('blog_title');
	$eduvert_blog_description	= get_theme_mod('blog_description'); 
	$eduvert_blog_display_num	= get_theme_mod('blog_display_num','3'); 
	if($eduvert_blog_hs=='1'):
?>	
<section class="section-post home1-blog wow fadeInLeft ptb-80" id="blogpost1">
	<div class="nt-container">
		<?php if(!empty($eduvert_blog_title) || !empty($eduvert_blog_description)): ?>
			<div class="section-title">
				<?php if(!empty($eduvert_blog_title)): ?>
					<h5><?php echo wp_kses_post($eduvert_blog_title); ?></h5>
				<?php endif; ?>
				
				<?php if(!empty($eduvert_blog_description)): ?>
					<h3><?php echo wp_kses_post($eduvert_blog_description); ?></h3>
				<?php endif; ?>	
			</div>
		<?php endif; ?>
		<div class="nt-columns-area">
			<?php 
				$eduvert_blog_args = array( 'post_type' => 'post', 'posts_per_page' => $eduvert_blog_display_num,'post__not_in'=>get_option("sticky_posts")) ; 	
				
				$eduvert_wp_query = new WP_Query($eduvert_blog_args);
				if($eduvert_wp_query)
				{	
				while($eduvert_wp_query->have_posts()):$eduvert_wp_query->the_post(); 
			?>
			<div class="nt-column-4 nt-md-column-6 mb-4 mb-nt-0">
				<?php get_template_part('template-parts/content/content','page'); ?>
			</div>
			<?php endwhile; } wp_reset_postdata(); ?>
		</div>
	</div>
</section>
<?php endif; ?>