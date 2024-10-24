<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
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
			 <?php 
					if( have_posts()) :  the_post();
					
					the_content(); 
					endif;
					
					if( $post->comment_status == 'open' ) { 
						 comments_template( '', true ); // show comments 
					}
				?>
			</div>
			<?php get_sidebar(); ?>
		</div>
	</div>
</section>
<?php get_footer(); ?>