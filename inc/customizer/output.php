<?php
/**
 * Customizer Output
 *
 * @package Baltic
 */

/**
 * Baltic custom logo, header and background
 */
function baltic_custom_logo_header_and_background(){

	/** Enable support for custom logo */
	add_theme_support( 'custom-logo', array(
		'width'       => 360,
		'height'      => 96,
		'flex-width'  => true,
		'flex-height' => false,
		'header-text' => array( 'site-title', 'site-description' ),
	) );

	/** Custom Header */
	add_theme_support( 'custom-header', apply_filters( 'baltic_custom_header_args', array(
		'width'       			=> 1600,
		'height'      			=> 1600,
		'default-image'          => '',
		'default-text-color'     => '455a64',
		'flex-width'             => true,
		'flex-height'            => true,
		'wp-head-callback'       => 'baltic_header_style',
	) ) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'baltic_custom_background_args', array(
		'default-color' 		=> 'eceff1',
		'default-repeat'        => 'no-repeat',
		'default-attachment'    => 'scroll'
	) ) );

}
add_action( 'after_setup_theme', 'baltic_custom_logo_header_and_background' );

/**
 * Styles the header image and text displayed on the blog.
 *
 * @see baltic_custom_header_setup().
 */
function baltic_header_style() {
	$header_text_color = get_header_textcolor();

	/*
	 * If no custom options for text are set, let's bail.
	 * get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: add_theme_support( 'custom-header' ).
	 */
	if ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color ) {
		return;
	}

	// If we get this far, we have custom styles. Let's do this.
	?>
	<style type="text/css">
	<?php
	// Has the text been hidden?
	if ( ! display_header_text() ) :
	?>
		.site-title,
		.site-description {
			position: absolute;
			clip: rect(1px, 1px, 1px, 1px);
		}
	<?php
		// If the user has set a custom color for the text use that.
		else :
	?>
		.site-title a,
		.site-description {
			color: #<?php echo esc_attr( $header_text_color ); ?>;
		}
	<?php endif; ?>
	</style>
	<?php
}

/**
 * Print inline style
 *
 * @return string
 */
function baltic_add_inline_style(){

	$css_selector 			= baltic_css_classes_selector();

	$css= '';

    $css = str_replace( array( "\n", "\t", "\r" ), '', $css );

	if ( ! empty( $css ) ) {
		wp_add_inline_style( $baltic_inline_style, apply_filters( 'baltic_inline_style', trim( $css ) ) );
	}

}
add_action( 'wp_enqueue_scripts', 'baltic_add_inline_style' );
