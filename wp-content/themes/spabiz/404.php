<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package SpaBiz
 */

get_header();
?>
<section class="section-404 ptb-80">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 mx-auto text-center">
				<div class="card-404">
					<h1><?php esc_html_e('4','spabiz'); ?> <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/404-icon.png" alt=""> <?php esc_html_e('4','spabiz'); ?></h1>
					<h4><?php esc_html_e("Sorry We Couldn't Find That Page",'spabiz'); ?></h4>
					<p><?php esc_html_e('It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout','spabiz'); ?></p>
					<a href="<?php echo esc_url( home_url( '/' ));  ?>" class="main-btn btn-effect"><?php esc_html_e('Back To Home','spabiz'); ?></a>
				</div>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>