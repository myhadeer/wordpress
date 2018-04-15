<?php
/**
 * The template for displaying search forms in SKT Lawzo
 *
 * @package SKT Lawzo
 */
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<?php /*<span class="screen-reader-text"><?php _ex( 'Search for:', 'label', 'skt-lawzo' ); ?></span>*/ ?>
		<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search...', 'placeholder', 'skt-lawzo' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s">
	</label>
	<input type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'skt-lawzo' ); ?>">
</form>
