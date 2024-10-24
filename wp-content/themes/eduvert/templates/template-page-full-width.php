<?php
/**
Template Name: Fullwidth Page
**/

get_header();
?>
<section class="post-section ptb-80">
	<div class="nt-container">
		<div class="nt-columns-area wow fadeInUp">
			<div class="nt-column-12  wow fadeInUp">
				<?php 		
					the_post(); the_content(); 
					
					if( $post->comment_status == 'open' ) { 
						 comments_template( '', true ); // show comments 
					}
				?>
			</div>
		</div>
	</div>
</section> 
<?php get_footer(); ?>

