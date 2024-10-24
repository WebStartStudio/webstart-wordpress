<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package eduvert
 */

get_header(); 
?>
<section class="section-post pg-blog wow fadeInLeft ptb-80" id="blogpost1">
	<div class="nt-container">
		<div class="nt-columns-area">
			<div class="<?php esc_attr(eduvert_post_layout()); ?>">	
				<div class="nt-columns-area">
					<?php 
						$eduvert_paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
						$args = array( 'post_type' => 'post','paged'=>$eduvert_paged );	
					?>
					<?php if( have_posts() ): ?>
						<?php while( have_posts() ) : the_post();  ?>
							<div class="nt-column-12 mb-4 mb-nt-0">
								<?php get_template_part('template-parts/content/content','page');  ?>
							</div>
						<?php endwhile; ?>
					<?php endif; ?>	
				</div>
				<!-- Pagination -->
						<?php								
						// Previous/next page navigation.
						the_posts_pagination( array(
						'prev_text'          => '<i class="fa fa-angle-double-left"></i>',
						'next_text'          => '<i class="fa fa-angle-double-right"></i>',
						) ); ?>
				<!-- Pagination -->	
			</div>
			<?php  get_sidebar(); ?>
		</div>
	</div>
</section>
<?php get_footer(); ?>