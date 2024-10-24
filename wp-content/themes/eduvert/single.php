<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Eduvert
 */

get_header();
?>
<section class="section-post wow fadeInRight ptb-80" id="blogpost1">
	<div class="nt-container">
		<div class="nt-columns-area">
			<div class="<?php esc_attr(eduvert_post_layout()); ?>">
				<div class="nt-columns-area">
					<div class="nt-column-12 mb-4 mb-nt-0">
						<?php if( have_posts() ): ?>
						<?php while( have_posts() ): the_post(); ?>
							<article class="post-items">
								<div class="post-content">
									<div class="post-meta up">
										<span class="post-list">
											<ul class="post-categories"><li><?php the_category(' '); ?></li></ul>
										</span>
										<span class="author-name">
											<a href="#"><i class="fa fa-user-o"></i> <?php esc_html_e('Posted by','eduvert'); ?> <b><?php esc_html(the_author()); ?></b></a>
										</span>
									</div>
									<?php     
										if ( is_single() ) :
										
										the_title('<h5 class="post-title">', '</h5>' );
										
										else:
										
										the_title( sprintf( '<h5 class="post-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h5>' );
										
										endif; 
									?> 
									<div class="post-meta down">
										<span class="time">
											<a href="#"><i class="fa fa-clock-o"></i> <?php echo esc_html(the_time()); ?></a>
										</span>
										<span class="posted-on">
											<a href="<?php echo esc_url(get_month_link(get_post_time('Y'),get_post_time('m'))); ?>"><i class="fa fa-calendar-plus-o"></i> <?php echo esc_html(get_the_date('j, M, Y')); ?></a>
										</span>
									</div>
								</div>
								<?php if ( has_post_thumbnail() ) { ?>
									<figure class="post-image">
										<a href="#" class="post-hover">
											<?php the_post_thumbnail(); ?>
										</a>
									</figure>
								<?php } ?>
							</article>
							<div class="discription">
								<?php 
									the_content( 
											sprintf( 
												__( 'Read More', 'eduvert' ), 
												'<span class="screen-reader-text">  '.esc_html(get_the_title()).'</span>' 
											) 
										);	
								  ?>
							</div>
						<?php endwhile; ?>
						<?php endif; ?>
						<?php comments_template( '', true ); // show comments  ?>
					</div>
				</div>                                  
			</div>
			<?php  get_sidebar(); ?>
		</div>
	</div>
</section>
<?php get_footer(); ?>
