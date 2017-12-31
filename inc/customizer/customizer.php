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

	wp_enqueue_script( 'baltic-customizer', get_parent_theme_file_uri( "/assets/js/customizer$suffix.js" ), array( 'customize-preview', 'customize-selective-refresh' ), BALTIC_THEME_VERSION, true );

}
add_action( 'customize_preview_init', 'pacific_customize_preview_js' );

/**
 * Additional customizer control scripts.
 */
function baltic_customizer_control() {

	$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

	wp_enqueue_style( 'baltic-customizer-control', get_parent_theme_file_uri( "/assets/css/customizer-control$suffix.css" ), array(), time(), 'all' );
	wp_enqueue_script( 'baltic-customizer-control', get_parent_theme_file_uri( "/assets/js/customizer-control$suffix.js" ), array(), time(), true );
}
add_action( 'customize_controls_enqueue_scripts', 'baltic_customizer_control', 15 );

if ( ! function_exists( 'baltic_customize_register' ) ) :
/**
 * Baltic main customizer
 *
 * @package Baltic
 */
function baltic_customize_register( $wp_customize ){

	if ( ! defined( 'BALTIC_PRO_VERSION' ) ) {
		// Load custom sections.
		require_once( get_parent_theme_file_path( "/inc/customizer/controls/class-section-pro.php" ) );

		// Register custom section types.
		$wp_customize->register_section_type( 'Baltic_Customize_Section_Pro' );

		// Register sections.
		$wp_customize->add_section( new Baltic_Customize_Section_Pro( $wp_customize, 'baltic_pro', array(
			'title'    			=> esc_html__( 'Upgrade to Baltic Pro', 'baltic' ),
			'pro_text' 			=> esc_html__( 'Learn More', 'baltic' ),
			'pro_url'  			=> esc_url( 'https://elevatethemes.com.au/baltic' ),
			//'pro_description'	=> esc_html__( 'Unlock all the features of Baltic theme can offer.', 'baltic' ),
			'priority'			=> 999
		) ) );
	}

	$wp_customize->add_panel( 'baltic_setting_panel', array(
		'title' 		=> esc_html__( 'Theme Settings', 'baltic' ),
		'priority' 		=> 199,
	) );

	$wp_customize->add_panel( 'baltic_typograhy_panel', array(
		'title' 		=> esc_html__( 'Typography', 'baltic' ),
		'priority' 		=> 199,
	) );

	$wp_customize->add_panel( 'baltic_colors_panel', array(
		'title' 		=> esc_html__( 'Colors', 'baltic' ),
		'priority' 		=> 199,
	) );

	$wp_customize->add_panel( 'baltic_wc_panel', array(
		'title' 		=> esc_html__( 'WooCommerce', 'baltic' ),
		'priority' 		=> 199,
	) );

	/** WP */
	$wp_customize->get_section( 'header_image' )->panel 		= 'baltic_setting_panel';
	$wp_customize->get_section( 'background_image' )->panel 	= 'baltic_setting_panel';
	$wp_customize->get_control( 'header_textcolor' )->section 	= 'baltic_header_color_section';
	$wp_customize->get_control( 'background_color' )->section 	= 'baltic_bg_color_section';

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

require get_parent_theme_file_path( '/inc/customizer/css.php' );
if ( class_exists( 'Kirki' ) ) {
	require get_parent_theme_file_path( '/inc/customizer/config.php' );
	require get_parent_theme_file_path( '/inc/customizer/settings/typography.php' );
	require get_parent_theme_file_path( '/inc/customizer/settings/baltic-settings.php' );
	require get_parent_theme_file_path( '/inc/customizer/settings/colors.php' );
	if ( class_exists( 'WooCommerce' ) ) {
		require get_parent_theme_file_path( '/inc/customizer/settings/woocommerce.php' );
	}
}
require get_parent_theme_file_path( '/inc/customizer/output.php' );
