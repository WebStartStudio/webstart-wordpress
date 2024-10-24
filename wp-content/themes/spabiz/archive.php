<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package SpaBiz
 */

get_header();
?>
<section class="blog-section ptb-80">
	<div class="container">
		<div class="row">
			<div class="<?php esc_attr(spabiz_post_layout()); ?>">
				<div class="row">
					<div class="col-lg-12">
						<?php if( have_posts() ): ?>
				
								<?php while( have_posts() ) : the_post(); ?>
								
									<?php get_template_part('template-parts/content/content','page'); ?>
									
							<?php endwhile; ?>
					
							<?php else: ?>
							
								<?php get_template_part('template-parts/content/content','none'); ?>
								
						<?php endif; ?>
					</div>
				</div>
			</div>
			<?php  get_sidebar(); ?>
		</div>
	</div>
</section>
<?php get_footer(); ?>
