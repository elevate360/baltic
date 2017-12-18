<?php
/**
 * Baltic setting defaults
 *
 * @package Baltic
 */

if ( ! function_exists( 'baltic_setting_default' ) ) :
/**
 * Baltic default setting
 *
 * @return array()
 */
function baltic_setting_default(){

	$settings = array(
		'enable_preloader'		=> true,
		'preloader'				=> 'pulse',
		'preloader_color'		=> '#ff5722',
		'preloader_bg_color'	=> '#ffffff',

		'primary_text_color'	=> '#606060',
		'secondary_text_color'	=> '#202020',
		'primary_color'			=> '#ff5722',
		'secondary_color'		=> '#ff8a65',

		'archive_layout'		=> 'full-width',
		'singular_layout'		=> 'content-sidebar',

		'meta_date'				=> true,
		'meta_author'			=> true,
		'meta_comment'			=> true,
		'meta_categories'		=> true,
		'meta_tags'				=> true,
		'author_profile'		=> true,
		'excerpt_length'		=> 30,
		'more_link_text'		=> esc_html__( 'Continue reading', 'baltic' ),
		'posts_navigation'		=> 'posts_pagination',

		'custom_footers'		=> false,
		'elementor_footer'		=> '',
		'return_top'			=> true,

		// WooCommerce
		'price_color'			=> '#77a464',
		'sale_color'			=> '#f44336',
		'stars_color'			=> '#fc0',
		'wc_quick_view'			=> true,
		'products_per_page'		=> 12,
		'products_columns'		=> 4,
		'products_layout'		=> 'content-sidebar',
		'product_layout'		=> 'content-sidebar',

	);

	return apply_filters( 'baltic_setting_default', $settings );

}
endif;
