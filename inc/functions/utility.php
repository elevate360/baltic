<?php
/**
 * Helper function
 *
 * @package Baltic
 */

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

if ( ! function_exists( 'baltic_homepage_woocommerce' ) ) :
/**
 * Helper function for homepage section if WooCommerce is not active
 */
function baltic_homepage_woocommerce(){

	if ( ! class_exists( 'WooCommerce' ) ) {

		if ( is_customize_preview() ) {
			echo '<div class="baltic-require-plugin">';
			echo esc_html__( 'This homepage block require WooCommerce plugin', 'baltic' );
			echo '</div>';
		}

		return true;
	}

}
endif;

if ( ! function_exists( 'baltic_homepage_twitter' ) ) :
/**
 * Helper function for homepage section if Latest Tweet Widget is not active
 */
function baltic_homepage_twitter(){

	if ( ! defined( 'CAMPAIGNKIT_TWITTER_NAME' ) ) {

		if ( is_customize_preview() ) {
			echo '<div class="baltic-require-plugin">';
			/** Translator: %s is a plugin name */
			echo sprintf( esc_html__( 'This homepage block require %s plugin', 'baltic' ), CAMPAIGNKIT_TWITTER_NAME );
			echo '</div>';
		}

		return true;
	}

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

if ( ! function_exists( 'baltic_is_homepage_template' ) ) :
/**
 * Callback funtion for is_page_template( 'templates/homepage.php' );
 */
function baltic_is_homepage_template(){
	return (bool) is_page_template( 'templates/homepage.php' );
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

if ( ! function_exists( 'baltic_get_breadcrumb_link' ) ) :
/**
 * Helper function for the Baltic Breadcrumb Class.
 *
 * @return string HTML markup for anchor link and optional separator.
 */
function baltic_get_breadcrumb_link( $url, $title, $content, $sep = '' ) {

	$link = sprintf( '<a href="%s" title="%s">%s</a>',
		esc_attr( $url ),
		esc_attr( $title ),
		esc_html( $content )
	);

	if ( $sep ){
		$link .= $sep;
	}

	return $link;

}
endif;

if ( ! function_exists( 'baltic_get_terms' ) ) :
/**
 * Get an array of terms from a taxonomy
 *
 * @static
 * @access public
 * @param string|array $taxonomies See https://developer.wordpress.org/reference/functions/get_terms/ for details.
 * @return array
 */
function baltic_get_terms( $taxonomies ) {

	$items = array();

	// Get the post types.
	$terms = get_terms( array(
    	'taxonomy' 		=> $taxonomies
	) );

	// Build the array.
	foreach ( $terms as $term ) {
		$items[ $term->term_id ] = $term->name;
	}

	return $items;

}
endif;

if ( ! function_exists( 'baltic_get_terms_slug' ) ) :
/**
 * Get an array of terms from a taxonomy
 *
 * @static
 * @access public
 * @param string|array $taxonomies See https://developer.wordpress.org/reference/functions/get_terms/ for details.
 * @return array
 */
function baltic_get_terms_slug( $taxonomies ) {

	$items = array();

	// Get the post types.
	$terms = get_terms( array(
    	'taxonomy' 		=> $taxonomies
	) );

	// Build the array.
	foreach ( $terms as $term ) {
		$items[ $term->slug ] = $term->name;
	}

	return $items;

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

if ( ! function_exists( 'baltic_do_breadcrumb' ) ) :
/**
 * [baltic_do_breadcrumb description]
 * @return [type] [description]
 */
function baltic_do_breadcrumb(){

	if ( function_exists( 'bcn_display' ) ) {
		echo '<div class="breadcrumb">';
		bcn_display();
		echo '</div>';
	}
	elseif ( function_exists( 'breadcrumbs' ) ) {
		breadcrumbs();
	}
	elseif ( function_exists( 'crumbs' ) ) {
		crumbs();
	}
	elseif ( class_exists( 'WPSEO_Breadcrumbs' ) ) {
		yoast_breadcrumb( '<div class="breadcrumb">', '</div>' );
	}
	elseif( function_exists( 'yoast_breadcrumb' ) && ! class_exists( 'WPSEO_Breadcrumbs' ) ) {
		yoast_breadcrumb( '<div class="breadcrumb">', '</div>' );
	}
	else {
		baltic_breadcrumb();
	}

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
		$layout = baltic_get_option( 'layout_archive' );
	} elseif( is_singular() && ! is_singular( 'product' ) ) {
		$layout = baltic_get_option( 'layout_singular' );
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
		$layout = esc_attr( baltic_get_option( 'layout_products' ) );
	}elseif ( is_shop() || is_product_category() || is_product_tag() ) {
		$layout = esc_attr( baltic_get_option( 'layout_products' ) );
	} elseif( is_product() ) {
		$layout = esc_attr( baltic_get_option( 'layout_product' ) );
	}

	return apply_filters( 'baltic_products_layout', $layout );

}
endif;

if ( ! function_exists( 'baltic_get_main_layout' ) ) :
/**
 * [baltic_get_main_layout description]
 * @return array
 */
function baltic_get_main_layout(){

	$layout = array(
		'content-sidebar'  	=> esc_attr__( 'Content Sidebar', 'baltic' ),
		'sidebar-content' 	=> esc_attr__( 'Sidebar Content', 'baltic' ),
		'full-width' 		=> esc_attr__( 'Full Width', 'baltic' ),
		'narrow'	 		=> esc_attr__( 'Narrow', 'baltic' ),
	);

	return apply_filters( 'baltic_get_main_layout', $layout );
}
endif;

/**
 * [baltic__get_content_sidebar description]
 * @return string
 */
function baltic__get_content_sidebar(){
	return 'content-sidebar';
}

/**
 * [baltic__get_sidebar_content description]
 * @return [type] [description]
 */
function baltic__get_sidebar_content(){
	return 'sidebar-content';
}

/**
 * [baltic__get_full_width description]
 * @return [type] [description]
 */
function baltic__get_full_width(){
	return 'full-width';
}
