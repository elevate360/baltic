<?php
/**
 * Meta Tags
 *
 * @package Baltic
 */

/* translators: used between list items, there is a space after the comma */
$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'baltic' ) );
if ( $tags_list ) {
	/* translators: 1: list of tags. */
	printf( '<span class="tags-links">%s <span class="screen-reader-text">' . esc_html__( 'Tagged', 'baltic' ) . '</span> %s</span>',
		Baltic_Icons::get_svg( array( 'class' => 'icon-stroke', 'icon' => 'tag' ) ),
		$tags_list
	); // WPCS: XSS OK.
}
