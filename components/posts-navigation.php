<?php
/**
 * Posts Navigation
 *
 * @package Baltic
 */

if ( class_exists( 'Jetpack' ) && Jetpack::is_module_active( 'infinite-scroll' ) ) {
	return;
}

if ( baltic_get_option( 'posts_navigation' ) == 'posts_navigation' ) {
	the_posts_navigation( array(
        'prev_text'          => __( '&larr; Older posts', 'baltic' ),
        'next_text'          => __( 'Newer posts &rarr;', 'baltic' ),
	) );
} else {
	the_posts_pagination( array(
		'prev_text'          => sprintf( '%s <span class="screen-reader-text">%s</span>', baltic_get_svg( array( 'icon' => 'arrow-left' ) ), __( 'Previous Page', 'baltic' ) ),
		'next_text'          => sprintf( '%s <span class="screen-reader-text">%s</span>', baltic_get_svg( array( 'icon' => 'arrow-right' ) ), __( 'Next Page', 'baltic' ) ),
		'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'baltic' ) . ' </span>',
	) );
}
