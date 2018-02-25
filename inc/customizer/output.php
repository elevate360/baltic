<?php
/**
 * Customizer Output
 *
 * @package Baltic
 */

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

	$css = '';

	if ( ! display_header_text() ) {
		$css .= '
		.site-title,
		.site-description {
			position: absolute;
			clip: rect(1px, 1px, 1px, 1px);
		}
		';
	} else {
		$css .= '
		.site-title a,
		.site-description,
		.site-header-extra a,
		.main-navigation ul.menu>.menu-item>a {
			color: # '. esc_attr( $header_text_color ) .';
		}
		.header-search-area .search-submit .icon-stroke {
			stroke: # '. esc_attr( $header_text_color ) .';
		}
		';
	}

    $css = str_replace( array( "\n", "\t", "\r" ), '', $css );

	if ( ! empty( $css ) ) {
		return trim( $css );
	}

}

/**
 * Print inline style
 *
 * @uses  baltic_header_style() [<description>]
 * @return string
 */
function baltic_add_inline_style(){

	$css= '';

	$css .= baltic_header_style();

    $css = str_replace( array( "\n", "\t", "\r" ), '', $css );

	if ( ! empty( $css ) ) {
		wp_add_inline_style( 'baltic-style', apply_filters( 'baltic_inline_style', trim( $css ) ) );
	}

}
add_action( 'wp_enqueue_scripts', 'baltic_add_inline_style' );
