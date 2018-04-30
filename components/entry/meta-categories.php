<?php
/**
 * Meta categories
 *
 * @package Baltic
 */

/* translators: used between list items, there is a space after the comma */
$categories_list = get_the_category_list( esc_html__( ', ', 'baltic' ) );
if ( $categories_list ) {
	/* translators: %s: list of categories. */
	printf( '<span class="cat-links">%s <span class="screen-reader-text">' . esc_html__( 'Posted in', 'baltic' ) . '</span> %s</span>',
		Baltic_Icons::get_svg( array( 'class' => 'icon-stroke', 'icon' => 'folder-open' ) ),
		$categories_list
	); // WPCS: XSS OK.
}
