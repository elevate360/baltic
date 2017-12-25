<?php
/**
 * Baltic Theme Customizer
 *
 * @package Baltic
 */

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function pacific_customize_preview_js() {

	$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

	wp_enqueue_script( 'baltic-customizer', get_parent_theme_file_uri( "/inc/customizer/assets/" ), array( 'customize-preview', 'customize-selective-refresh' ), BALTIC_THEME_VERSION, true );

	$output = array();
	wp_localize_script( 'baltic-customizer', 'BalticCustomizel10n', $output );

}
add_action( 'customize_preview_init', 'pacific_customize_preview_js' );

if ( ! function_exists( 'baltic_customize_register' ) ) :
/**
 * Baltic main customizer
 *
 * @package Baltic
 */
function baltic_customize_register( $wp_customize ){

	$wp_customize->add_panel( 'baltic_header_panel', array(
		'title' 		=> esc_html__( 'Baltic Header', 'baltic' ),
		'priority' 		=> 100,
	) );

	$wp_customize->add_panel( 'baltic_typograhy_panel', array(
		'title' 		=> esc_html__( 'Baltic Typography', 'baltic' ),
		'priority' 		=> 199,
	) );

	$wp_customize->add_panel( 'baltic_wc_panel', array(
		'title' 		=> esc_html__( 'WooCommerce', 'baltic' ),
		'priority' 		=> 199,
	) );

	/** WP */
	$wp_customize->get_section( 'title_tagline' )->panel 				= 'baltic_theme_panel';
	$wp_customize->get_section( 'header_image' )->panel 				= 'baltic_theme_panel';
	$wp_customize->get_section( 'background_image' )->panel 			= 'baltic_theme_panel';
	$wp_customize->get_section( 'colors' )->panel 						= 'baltic_theme_panel';

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'baltic__blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'baltic__blogdescription',
		) );
	}

}
endif;
add_action( 'customize_register', 'baltic_customize_register' );

if ( class_exists( 'Kirki' ) ) {
	require get_parent_theme_file_path( '/inc/customizer/config.php' );
}
require get_parent_theme_file_path( '/inc/customizer/css.php' );
require get_parent_theme_file_path( '/inc/customizer/output.php' );
