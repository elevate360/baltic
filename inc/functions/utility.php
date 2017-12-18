<?php
/**
 * Helper function
 *
 * @package Baltic
 */

if ( ! function_exists( 'baltic_get_option' ) ) :
/**
 * This is a short hand function for getting setting with default value
 *
 * @uses  baltic_setting_default()
 * @param setting name
 * @return bool
 */
function baltic_get_option( $name ){
	$setting = baltic_setting_default();
	if ( array_key_exists( $name, $setting ) ) {
		return get_theme_mod( esc_attr( $name ), $setting[$name] );
	}
}
endif;


if ( ! function_exists( 'baltic_get_custom_field' ) ) :
/**
 * Return custom field post meta data.
 *
 * Return only the first value of custom field. Return empty string if field is blank or not set.
 *
 * @return string|boolean Return value or empty string on failure.
 */
function baltic_get_custom_field( $field, $post_id = null ) {

	//* Use get_the_ID() if no $post_id is specified
	$post_id = empty( $post_id ) ? get_the_ID() : $post_id;

	if ( ! $post_id ) {
		return '';
	}

	$custom_field = get_post_meta( $post_id, $field, true );

	if ( ! $custom_field ) {
		return '';
	}

	//* Return custom field, slashes stripped, sanitized if string
	return is_array( $custom_field ) ? stripslashes_deep( $custom_field ) : stripslashes( wp_kses_decode_entities( $custom_field ) );

}
endif;


if ( ! function_exists( 'baltic_is_sticky' ) ) :
/**
 * [baltic_is_sticky description]
 * @return bool
 */
function baltic_is_sticky(){
	return (bool) is_sticky() && !is_paged() && !is_singular() && !is_archive();
}
endif;


if( ! function_exists( 'baltic_is_blog' ) ) :
/**
 * Baltic is blog page and blog archive
 * @return  bool
 */
function baltic_is_blog(){
	return (bool) is_home() || is_category() || is_tag() || is_author() || is_date() || is_search();
}
endif;


if ( ! function_exists( 'baltic_is_woocommerce' ) ) :
/**
 * Wrapper function for is_woocommerce() WooCommerce
 * @uses is_woocommerce()
 */
function baltic_is_woocommerce(){
	if ( function_exists( 'is_woocommerce' ) ) {
		return is_woocommerce();
	}
}
endif;

if ( ! function_exists( 'baltic_is_shop' ) ) :
/**
 * Wrapper function for is_shop() WooCommerce
 * @uses is_shop()
 */
function baltic_is_shop(){
	if ( function_exists( 'is_shop' ) ) {
		return is_shop();
	}
}
endif;

if ( ! function_exists( 'baltic_is_product_category' ) ) :
/**
 * Wrapper function for is_product_category() WooCommerce
 * @uses is_product_category()
 */
function baltic_is_product_category(){
	if ( function_exists( 'is_product_category' ) ) {
		return is_product_category();
	}
}
endif;


if ( ! function_exists( 'baltic_get_link_url' ) ) :
/**
 * Return the first link found in the post content or fall back to permalink.
 */
function baltic_get_link_url() {
	$content = get_the_content();
	$has_url = get_url_in_content( $content );

	return ( $has_url ) ? $has_url : apply_filters( 'the_permalink', get_permalink() );
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

	echo sprintf( '<p class="page-header-title">%s</p>', get_the_title( absint( $page_id ) ) );
	echo sprintf( '<div class="page-header-description">%s</div>', wpautop( get_post_field( 'post_content', absint( $page_id ) ) ) );

}
endif;

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


if ( ! function_exists( 'baltic_get_breadcrumb_link' ) ) :
/**
 * Helper function for the Baltic Breadcrumb Class.
 *
 * @since 1.0.0
 * @param string      $url     URL for href attribute.
 * @param string      $title   Title attribute.
 * @param string      $content Linked content.
 * @param bool|string $sep     Optional. Separator. Default is empty string.
 *
 * @return string HTML markup for anchor link and optional separator.
 */
function baltic_get_breadcrumb_link( $url, $title, $content, $sep = '' ) {

	$link = sprintf( '<a href="%s" title="%s">%s</a>', esc_attr( $url ), esc_attr( $title ), esc_html( $content ) );

	if ( $sep )
		$link .= $sep;

	return $link;

}
endif;

if ( ! function_exists( 'baltic_get_layout' ) ) :
/**
 * [baltic_get_layout description]
 * @return [type] [description]
 */
function baltic_get_layout(){

	$layout = '';

	if ( baltic_is_blog() ) {
		$layout = baltic_get_option( 'archive_layout' );
	} elseif( is_singular() ) {
		$layout = baltic_get_option( 'singular_layout' );
	}

	return apply_filters( 'baltic_site_layout', $layout );

}
endif;

if ( ! function_exists( 'baltic_get_products_layout' ) ) :
/**
 * [baltic_get_products_layout description]
 * @return [type] [description]
 */
function baltic_get_products_layout(){

	$layout = '';

	if ( is_post_type_archive( 'product' ) && is_search() ) {
		$layout = esc_attr( baltic_get_option( 'products_layout' ) );
	}elseif ( is_shop() || is_product_category() || is_product_tag() ) {
		$layout = esc_attr( baltic_get_option( 'products_layout' ) );
	} elseif( is_product() ) {
		$layout = esc_attr( baltic_get_option( 'product_layout' ) );
	}

	return apply_filters( 'baltic_products_layout', $layout );

}
endif;
