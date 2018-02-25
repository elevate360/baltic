<?php
/**
 * HTML attribute functions and filters.  The purposes of this is to provide a way for theme/plugin devs
 * to hook into the attributes for specific HTML elements and create new or modify existing attributes.
 * This is sort of like `body_class()`, `post_class()`, and `comment_class()` on steroids.  Plus, it
 * handles attributes for many more elements.  The biggest benefit of using this is to provide richer
 * microdata while being forward compatible with the ever-changing Web.
 *
 * @package Baltic
 * @link 	https://github.com/justintadlock/hybrid-core/blob/master/inc/functions-attr.php
 */

/**
 * Outputs an HTML element's attributes.
 *
 * @param  string  $slug     The slug/ID of the element (e.g., 'sidebar').
 * @param  string  $context  A specific context (e.g., 'primary').
 * @param  array   $attr     Array of attributes to pass in (overwrites filters).
 * @return void
 */
function baltic_attr( $slug, $context = '', $attr = array()  ) {

	echo baltic_get_attr( esc_attr( $slug ), esc_attr( $context ), $attr );

}

/**
 * Gets an HTML element's attributes.  This function is actually meant to be filtered by theme authors, plugins,
 * or advanced child theme users.  The purpose is to allow folks to modify, remove, or add any attributes they
 * want without having to edit every template file in the theme.  So, one could support microformats instead
 * of microdata, if desired.
 *
 * @param  string  $slug     The slug/ID of the element (e.g., 'sidebar').
 * @param  string  $context  A specific context (e.g., 'primary').
 * @param  array   $attr     Array of attributes to pass in (overwrites filters).
 * @return string
 */
function baltic_get_attr( $slug, $context = '', $attr = array() ) {

	$out    = '';
	$attr   = wp_parse_args( $attr, apply_filters( "baltic_attr_{$slug}", array(), $context ) );

	if ( empty( $attr ) )
		$attr['class'] = $slug;

	foreach ( $attr as $name => $value ){

		if ( 'class' === $name && has_filter( "baltic_attr_{$slug}_class" ) ) {

			$value = join( ' ', apply_filters( "baltic_attr_{$slug}_class", explode( ' ', $value ) ) );
		}

		$out .= $value ? sprintf( ' %s="%s"', esc_html( $name ), esc_attr( $value ) ) : esc_html( " {$name}" );
	}

	return trim( $out );

}

/**
 * <body> element attributes.
 *
 * @param  array   $attr
 * @return array
 */
function baltic_attr_body( $attr ) {

	$attr['class'] = join( ' ', get_body_class() );
	$attr['dir']   = is_rtl() ? 'rtl' : 'ltr';

	return $attr;

}
add_filter( 'baltic_attr_body', 'baltic_attr_body', 5 );

/**
 * <header> element attributes.
 *
 * @param  array   $attr
 * @return array
 */
function baltic_attr_site( $attr ) {

	$attr['id'] 	= 'page';
	$attr['class']  = 'site';

	return $attr;

}
add_filter( 'baltic_attr_site', 'baltic_attr_site', 5 );

/**
 * <header> element attributes.
 *
 * @param  array   $attr
 * @return array
 */
function baltic_attr_site_header( $attr ) {

	$attr['id'] 	= 'masthead';
	$attr['class']  = 'site-header';

	return $attr;

}
add_filter( 'baltic_attr_site-header', 'baltic_attr_site_header', 5 );

/**
 * <nav> main-navigation attributes.
 *
 * @param  array   $attr
 * @return array
 */
function baltic_attr_main_navigation( $attr ) {

	$attr['id'] 	= 'site-navigation';
	$attr['class']  = 'main-navigation';

	return $attr;

}
add_filter( 'baltic_attr_main-navigation', 'baltic_attr_main_navigation', 5 );

/**
 * Content area element attributes.
 *
 * @param  array   $attr
 * @return array
 */
function baltic_attr_site_content( $attr ) {

	$attr['id'] 	= 'content';
	$attr['class']  = 'site-content';

	return $attr;

}
add_filter( 'baltic_attr_site-content', 'baltic_attr_site_content', 5 );

/**
 * <div> element attributes.
 *
 * @param  array   $attr
 * @return array
 */
function baltic_attr_jumbotron_header( $attr ) {

	$attr['id'] 	= 'jumbotron-header';
	$attr['class']  = 'jumbotron-header';

	return $attr;

}
add_filter( 'baltic_attr_jumbotron-header', 'baltic_attr_jumbotron_header', 5 );

/**
 * <footer> element attributes.
 *
 * @param  array   $attr
 * @return array
 */
function baltic_attr_site_footer( $attr ) {

	$attr['id'] 	= 'colophon';
	$attr['class']  = 'site-footer';

	return $attr;

}
add_filter( 'baltic_attr_site-footer', 'baltic_attr_site_footer', 5 );

/**
 * <div> primary element attributes.
 *
 * @param  array   $attr
 * @return array
 */
function baltic_attr_primary( $attr ) {

	$attr['id'] 	= 'primary';
	$attr['class']  = 'content-area';

	return $attr;

}
add_filter( 'baltic_attr_primary', 'baltic_attr_primary', 5 );

/**
 * <div> secondary element attributes.
 *
 * @param  array   $attr
 * @return array
 */
function baltic_attr_secondary( $attr ) {

	$attr['id'] 	= 'secondary';
	$attr['class']  = 'widget-area';

	return $attr;

}
add_filter( 'baltic_attr_secondary', 'baltic_attr_secondary', 5 );

/**
 * <div> tertiary element attributes.
 *
 * @param  array   $attr
 * @return array
 */
function baltic_attr_tertiary( $attr ) {

	$attr['id'] 	= 'tertiary';
	$attr['class']  = 'sidebar-footer widget-area';

	return $attr;

}
add_filter( 'baltic_attr_tertiary', 'baltic_attr_tertiary', 5 );

/**
 * <div> quaternary element attributes.
 *
 * @param  array   $attr
 * @return array
 */
function baltic_attr_quaternary( $attr ) {

	$attr['id'] 	= 'quaternary';
	$attr['class']  = 'sidebar-footer widget-area';

	return $attr;

}
add_filter( 'baltic_attr_quaternary', 'baltic_attr_quaternary', 5 );

/**
 * <main> element attributes.
 *
 * @param  array   $attr
 * @return array
 */
function baltic_attr_site_main( $attr ) {

	$attr['id'] 	= 'main';
	$attr['class']  = 'site-main';

	return $attr;

}
add_filter( 'baltic_attr_site-main', 'baltic_attr_site_main', 5 );

/**
 * Post <article> element attributes.
 *
 * @param  array   $attr
 * @return array
 */
function baltic_attr_post( $attr ) {

	$post = get_post();

	$attr['id']    = ! empty( $post ) ? sprintf( 'post-%d', get_the_ID() ) : 'post-0';
	$attr['class'] = join( ' ', get_post_class() );

	return $attr;

}
add_filter( 'baltic_attr_post', 'baltic_attr_post', 5 );

/**
 * <nav> main-navigation attributes.
 *
 * @param  array   $attr
 * @return array
 */
function baltic_attr_secondary_navigation( $attr ) {

	$attr['id'] 	= 'secondary-navigation';
	$attr['class']  = 'secondary-navigation column-item';

	return $attr;

}
add_filter( 'baltic_attr_secondary-navigation', 'baltic_attr_secondary_navigation', 5 );
