<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Eduvert
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('post-items mb-6'); ?>>
	<?php if ( has_post_thumbnail() ) { ?>
		<figure class="post-image">
			<a href="#" class="post-hover">
				<?php the_post_thumbnail(); ?>
			</a>
		</figure>
	<?php } ?>
	<div class="post-content">
		<div class="post-meta up">
			<span class="post-list">
				<ul class="post-categories"><li><?php the_category(' '); ?></li></ul>
			</span>
			<span class="author-name">
				<a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) ));?>"><i class="fa fa-user"></i> <?php esc_html(the_author()); ?></a>
			</span>
		</div>
		<?php     
			if ( is_single() ) :
			
			the_title('<h5 class="post-title">', '</h5>' );
			
			else:
			
			the_title( sprintf( '<h5 class="post-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h5>' );
			
			endif; 
		?> 
		<?php 
			the_content( 
					sprintf( 
						__( 'Read More', 'eduvert' ), 
						'<span class="screen-reader-text">  '.esc_html(get_the_title()).'</span>' 
					) 
				);
		  ?>
		<div class="post-meta down">
			<span class="time">
				<a href="#"><i class="fa fa-clock-o"></i> <?php echo esc_html(the_time()); ?></a>
			</span>
			<span class="posted-on">
				<a href="<?php echo esc_url(get_month_link(get_post_time('Y'),get_post_time('m'))); ?>"><i class="fa fa-calendar-plus-o"></i> <?php echo esc_html(get_the_date('j')); ?></span><?php echo esc_html(get_the_date('M, Y')); ?></a>
			</span>
		</div>
	</div>
</article>