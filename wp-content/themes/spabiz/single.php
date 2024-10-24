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
<section class="blog-section blog-single ptb-80" id="blog_single">
	<div class="container">
		<div class="row">
			<div class="<?php esc_attr(spabiz_post_layout()); ?>">
				<div class="row">
					<div class="col-lg-12">
						<?php if( have_posts() ): ?>
							<?php while( have_posts() ): the_post(); ?>
									<?php get_template_part('template-parts/content/content','page'); ?>
							<?php endwhile; ?>
						<?php endif; ?>
					</div>
					<div class="col-lg-12">
						<?php comments_template( '', true ); // show comments  ?>
					</div>
				</div>
			</div>
			<?php  get_sidebar(); ?>
		</div>
	</div>
</section>
<?php get_footer(); ?>
