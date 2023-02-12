<?php
/**
 * Template for displaying search forms
 *
 * @package  Billey
 * @since    1.0
 */
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php echo esc_html_x( 'Search for:', 'label', 'billey' ); ?></span>
		<input type="search" class="search-field"
		       placeholder="<?php echo esc_attr_x( 'Search&hellip;', 'placeholder', 'billey' ); ?>"
		       value="<?php echo get_search_query() ?>" name="s"
		       title="<?php echo esc_attr_x( 'Search for:', 'label', 'billey' ); ?>"/>
	</label>
	<button type="submit" class="search-submit">
		<span class="search-btn-icon fal fa-search"></span>
		<span class="search-btn-text">
			<?php echo _x( 'Search', 'submit button', 'billey' ); ?>
		</span>
	</button>
</form>
