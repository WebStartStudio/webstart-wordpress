<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Eduvert
 */

get_header();
?>
<section id="section-404" class="section-404 nt-py-default">
	<div class="img-404">
		<h1><?php esc_html_e('4','eduvert'); ?><span><?php esc_html_e('0','eduvert'); ?></span><?php esc_html_e('4','eduvert'); ?></h1>
	</div>
	<div class="nt-text-404">
		<h2><?php esc_html_e('OOPS! YOUR PAGE NOT FOUND...','eduvert'); ?></h2>		
		<p><?php esc_html_e('Something Went Wrong','eduvert'); ?> </p>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="nt-btn nt-btn-primary"><?php esc_html_e('Go To Home','eduvert'); ?></a>
	</div>
</section>
<?php get_footer(); ?>