<?php
/**
 * Baltic Page Header
 *
 * @package Baltic
 */

if ( ! function_exists( 'baltic_breadcrumb' ) ) :
/**
 * Helper function for the Baltic Breadcrumb Class.
 *
 * @since 1.0.0
 *
 * @global Baltic_Breadcrumb $_baltic_breadcrumb
 *
 * @param array $args Breadcrumb arguments.
 */
function baltic_breadcrumb( $args = array() ) {

	global $_baltic_breadcrumb;

	if ( ! $_baltic_breadcrumb ) {
		$_baltic_breadcrumb = new Baltic_Breadcrumb;
	}

	$_baltic_breadcrumb->output( $args );

}
endif;

if ( ! function_exists( 'baltic_page_header_page' ) ) :
/**
 * Baltic page header archive
 *
 * @return string
 */
function baltic_page_header_page( $page_id ){

	if ( has_post_thumbnail( $page_id ) ) {
		echo sprintf( '<div class="page-header-image">%s</div>', get_the_post_thumbnail( $page_id, 'full' ) );
	}

	echo sprintf( '<p class="page-title">%s</p>', get_the_title( absint( $page_id ) ) );
	echo sprintf( '<div class="page-description">%s</div>', wpautop( get_post_field( 'post_content', absint( $page_id ) ) ) );

}
endif;

function baltic_do_breadcrumb(){

	baltic_breadcrumb();

}
add_action( 'woocommerce_archive_description', 'baltic_do_breadcrumb', 20 );
