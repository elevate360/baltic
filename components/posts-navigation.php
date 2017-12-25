<?php
/**
 * Posts Navigation
 *
 * @package Baltic
 */

if ( class_exists( 'Jetpack' ) && Jetpack::is_module_active( 'infinite-scroll' ) ) {
	return;
}

if ( baltic_get_option( 'posts_nav' ) == 'posts_navigation' ) {
	the_posts_navigation( array(
        'prev_text'          => esc_html( baltic_get_option( 'posts_nav_prev' ) ),
        'next_text'          => esc_html( baltic_get_option( 'posts_nav_next' ) ),
	) );
} elseif( baltic_get_option( 'posts_nav' ) == 'posts_pagination' ) {
	the_posts_pagination( array(
		'prev_text'          => sprintf( '%s <span class="screen-reader-text">%s</span>', baltic_get_svg( array( 'class' => 'icon-stroke', 'icon' => 'arrow-left' ) ), __( 'Previous Page', 'baltic' ) ),
		'next_text'          => sprintf( '%s <span class="screen-reader-text">%s</span>', baltic_get_svg( array( 'class' => 'icon-stroke', 'icon' => 'arrow-right' ) ), __( 'Next Page', 'baltic' ) ),
		'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'baltic' ) . ' </span>',
	) );
}
