<?php
/**
 * The template for displaying search form.
 *
 * @package     SpaBiz 
 * @since       1.0
 */
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php esc_html_e( 'Search for:', 'spabiz' ); ?></span>
		<input type="search" class="search-field" placeholder="<?php esc_attr_e( 'Search …', 'spabiz' ); ?>" value="" name="s">
	</label>
	<button type="submit" class="search-submit" value="<?php esc_attr_e( 'Search', 'spabiz' ); ?>">
		<i class="fa fa-search"></i>
	</button>
</form>