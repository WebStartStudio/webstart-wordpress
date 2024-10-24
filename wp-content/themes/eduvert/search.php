<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Eduvert
 */

get_header();
?>
<section class="section-post pg-blog wow fadeInLeft ptb-80" id="blogpost1">
	<div class="nt-container">
		<div class="nt-columns-area">
			<div class="<?php esc_attr(eduvert_post_layout()); ?>">
				<div class="nt-columns-area">
					<?php if( have_posts() ): ?>
				
					<?php while( have_posts() ) : the_post(); ?>
						<div class="nt-column-12 mb-4 mb-nt-0">
							<?php get_template_part('template-parts/content/content','page');  ?>
						</div>
					<?php endwhile; the_posts_navigation(); ?>
					<?php else: ?>
						<div class="nt-column-12 mb-4 mb-nt-0">
							<?php get_template_part('template-parts/content/content','none'); ?>
						</div>
					<?php endif; ?>	
				</div>
			</div>
			<?php  get_sidebar(); ?>
		</div>
	</div>
</section>
<?php get_footer(); ?>
