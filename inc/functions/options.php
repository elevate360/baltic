<?php
/**
 * Baltic setting defaults
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


if ( ! function_exists( 'baltic_setting_default' ) ) :
/**
 * Baltic default setting
 *
 * @return array()
 */
function baltic_setting_default(){

	$default = array(

		'preloader'					=> true,
		'preloader_type'			=> 'pulse',
		'preloader_color'			=> '#ff5722',
		'preloader_bg_color'		=> '#ffffff',

		'color_bg_highlight'		=> '#ff5722',
		'color_text_highlight'		=> '#ffffff',
		'color_text_primary'		=> '#505050',
		'color_text_secondary'		=> '#909090',
		'color_text_field'			=> '#909090',
		'color_text_field_focus'	=> '#505050',
		'color_link_primary'		=> '#ff5722',
		'color_link_secondary'		=> '#ff8a65',
		'color_button'				=> '#ff5722',
		'color_button_hover'		=> '#ff8a65',

		'layout_archive'			=> 'content-sidebar',
		'layout_singular'			=> 'content-sidebar',

		'meta_date'					=> true,
		'meta_author'				=> true,
		'meta_comment'				=> true,
		'meta_categories'			=> true,
		'meta_tags'					=> true,
		'author_profile'			=> true,
		'excerpt_length'			=> 30,
		'more_link_text'			=> esc_html__( 'Continue reading', 'baltic' ),
		'posts_nav'					=> 'posts_navigation',
		'posts_nav_prev'			=> esc_html( '&larr; Older posts', 'baltic' ),
		'posts_nav_next'			=> esc_html( 'Newer posts &rarr;', 'baltic' ),

		'footer_text'				=> esc_html__( 'Copyright &copy; 2016-[YEAR] [SITE]. Proudly powered by [WP].', 'baltic' ),
		'return_top'				=> true,

		// WooCommerce
		'color_price'				=> '#77a464',
		'color_sale'				=> '#f44336',
		'color_stars'				=> '#ffc107',
		'layout_products'			=> 'content-sidebar',
		'layout_product'			=> 'content-sidebar',
		'products_per_page'			=> 12,
		'products_columns'			=> 4,
		'products_nav'				=> 'products_pagination',
		'products_nav_prev'			=> esc_html( '&larr; Older product', 'baltic' ),
		'products_nav_next'			=> esc_html( 'Newer product &rarr;', 'baltic' ),

	);

	return apply_filters( 'baltic_setting_default', $default );

}
endif;
