<?php
/**
 * Baltic content area
 *
 * @package Baltic
 */


/**
 * Baltic footer copyright
 *
 * @return string
 */
function baltic_inner_markup_open(){
	echo sprintf( '<div %s>', baltic_get_attr( esc_attr( 'site-content' ) ) );
}
add_action( 'baltic_inner_before', 'baltic_inner_markup_open', 10 );

/**
 * Baltic footer copyright
 *
 * @return string
 */
function baltic_inner_markup_close(){
	echo '</div><!-- #content -->';
}
add_action( 'baltic_inner_after', 'baltic_inner_markup_close', 10 );

/**
 * Baltic footer copyright
 *
 * @return string
 */
function baltic_site_main_open(){
	echo sprintf( '<main %s>', baltic_get_attr( 'site-main' ) );
}
add_action( 'baltic_loop_before', 'baltic_site_main_open', 10 );

/**
 * Baltic footer copyright
 *
 * @return string
 */
function baltic_site_main_close(){
	echo '</main><!-- #main -->';
}
add_action( 'baltic_loop_after', 'baltic_site_main_close', 10 );

/**
 * Baltic Loop
 * @return [type] [description]
 */
function baltic_loop_index(){
	get_template_part( 'components/loop', 'index' );
}
add_action( 'baltic_loop', 'baltic_loop_index', 10 );

/**
 * Baltic Loop
 * @return [type] [description]
 */
function baltic_posts_navigation(){
	get_template_part( 'components/posts', 'navigation' );
}
add_action( 'baltic_loop_after', 'baltic_posts_navigation', 20 );
