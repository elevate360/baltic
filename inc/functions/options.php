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

if ( ! function_exists( 'baltic_get_sidebar_widget_options' ) ) :
/**
 * Find a given widget in a given sidebar and return its settings.
 *
 * Example usage:
 * $options = [];
 * try {
 *    $options = baltic_get_sidebar_widget_options('sidebar-1', 'recent-comments');
 * } catch (Exception $e) {}
 *
 * @link https://www.flynsarmy.com/2015/06/retrieving-wordpress-sidebar-widget-options/
 *
 * @param $sidebar_id    The ID of the sidebar. Defined in your register_sidebar() call
 * @param $widget_type   Widget type specified in register_sidebar()
 * @return array         Saved options
 * @throws Exception     "Widget not found in sidebar" or "Widget has no saved options"
 */
function baltic_get_sidebar_widget_options( $sidebar_id, $widget_type ) {

    // Grab the list of sidebars and their widgets
    $sidebars = wp_get_sidebars_widgets();
    // Just grab the widgets for our sidebar
    $widgets = $sidebars[$sidebar_id];

    // Get the ID of our widget in this sidebar
    $widget_id = 0;
    foreach ( $widgets as $widget_details )
    {
        // $widget_details is of the format $widget_type-$id - we just want the id part
        if ( preg_match("/^{$widget_type}\-(?P<id>\d+)$/", $widget_details, $matches) )
        {
            $widget_id = $matches['id'];
            break;
        }
    }

    // If we didn't find the given widget in the given sidebar, throw an error
    if ( !$widget_id )
        throw new Exception("Widget not found in sidebar");

    // Grab the options of each instance of our $widget_type from the DB
    $options = get_option( 'widget_' . $widget_type );

    // Ensure there are settings to return
    if ( !isset($options[$widget_id]) )
        throw new Exception( "Widget has no saved options" );

    // Grab the settings
    $widget_options = $options[$widget_id];

    return $widget_options;

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
		'color_text_button'			=> '#ffffff',
		'color_button'				=> '#ff5722',
		'color_button_hover'		=> '#ff8a65',
		'color_border'				=> 'rgba( 0,0,0,0.1 )',

		'color_bg_header'			=> '#ffffff',
		'color_text_header'			=> '#505050',

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
		'color_sale_text'			=> '#ffffff',
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
