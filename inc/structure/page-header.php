<?php
/**
 * Baltic Page Header
 *
 * @package Baltic
 */

/**
 * [baltic_page_header description]
 * @return [type] [description]
 */
function baltic_page_header(){

	if ( baltic_is_woocommerce() ) {
		return;
	}

	if ( ! is_front_page() ) {
		get_template_part( 'components/page', 'header' );
	}

}
add_action( 'baltic_inner_before', 'baltic_page_header', 20 );

/**
 * [baltic_page_header_home description]
 * @return [type] [description]
 */
function baltic_page_header_home(){

	if ( ! is_home() ) {
		return;
	}

	$blog_id = get_option( 'page_for_posts' );

	echo '<div class="page-header-inner">';

	echo sprintf( '<p class="page-title">%s</p>', get_the_title( absint( $blog_id ) ) );
	echo sprintf( '<div class="page-description">%s</div>', wpautop( get_post_field( 'post_content', absint( $blog_id ) ) ) );

	if ( has_post_thumbnail( $blog_id ) ) {
		echo sprintf( '<figure class="page-header-thumbnail">%s</figure>', get_the_post_thumbnail( $blog_id, 'full' ) );
	}

	baltic_do_breadcrumb();

	echo '</div>';

}
add_action( 'baltic_page_header', 'baltic_page_header_home' );

/**
 * [page_header_archive description]
 * @return [type] [description]
 */
function page_header_archive(){

	if ( baltic_is_woocommerce() ) {
		return;
	}

	if ( ! is_archive() ) {
		return;
	}

	echo '<div class="page-header-inner">';

	if( is_author() ) {

		echo sprintf( '<h1 class="page-title">%s</h1>', get_the_author() );
		echo sprintf( '<div class="page-description">%s</div>', wpautop( get_the_author_meta('description') ) );

	} elseif( is_archive() ) {
		$term_id = get_queried_object()->term_id;
		$image_id = get_term_meta( $term_id, 'image', true );
		echo sprintf( '<h1 class="page-title">%s</h1>', get_the_archive_title() );
		echo sprintf( '<div class="page-description">%s</div>', wpautop( get_the_archive_description() ) );

		if ( ! empty( $image_id ) ) {
			echo sprintf( '<figure class="page-header-thumbnail">%s</figure>', wp_get_attachment_image( $image_id, 'full' ) );
		}
	}

	baltic_do_breadcrumb();

	echo '</div>';

}
add_action( 'baltic_page_header', 'page_header_archive' );

/**
 * [page_header_singular description]
 * @return [type] [description]
 */
function page_header_singular(){

	if ( ! is_singular() ) {
		return;
	}

	echo '<div class="page-header-inner">';

	echo sprintf( '<p class="page-title">%s</p>', get_the_title( absint( get_the_id() ) ) );

	if ( has_post_thumbnail( get_the_id() ) ) {
		echo sprintf( '<figure class="page-header-thumbnail">%s</figure>', get_the_post_thumbnail( get_the_id(), 'full' ) );
	}

	baltic_do_breadcrumb();

	echo '</div>';

}
add_action( 'baltic_page_header', 'page_header_singular' );
