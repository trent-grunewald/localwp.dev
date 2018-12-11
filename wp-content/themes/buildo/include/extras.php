<?php
/**
 * Functions hooked to core hooks.
 *
 */

if ( ! function_exists( 'buildo_customize_search_form' ) ) :

	/** Customize search form.
	 **/
	function buildo_customize_search_form() {

		$form = '<form role="search" method="get" class="search-form" action="' . esc_url( home_url( '/' ) ) . '">
			<label>
			<span class="screen-reader-text">' . esc_html( '', 'label', 'buildo' ) . '</span>
			<input type="search" class="search-input form-control" placeholder="' . esc_attr_x( 'Search...', 'placeholder', 'buildo' ) . '" value="' . get_search_query() . '" name="s" title="' . esc_attr_x( 'Search for:', 'label', 'buildo' ) . '" />
			</label>
			<input type="submit" class="search-submit" value="&#xf002;" /></form>';
			

		return $form;
    }
	
	endif;
add_filter( 'get_search_form', 'buildo_customize_search_form', 15 );
?>
