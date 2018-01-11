<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Baltic
 */


if ( ! class_exists( 'Baltic_Theme_Functions' ) ) :
/**
 * Baltic_Theme_Functions Class
 */
class Baltic_Theme_Functions {

	/** Constructor */
	public function __construct() {

		add_filter( 'body_class', array( $this, 'body_classes' ) );
		add_filter( 'post_class', array( $this, 'post_classes' ) );

		add_action( 'wp_head', array( $this, 'pingback_header' ) );

		add_action( 'wp', array( $this, 'hook_filters' ) );

	}

	/**
	 * Adds custom classes to the array of body classes.
	 *
	 * @param array $classes Classes for the body element.
	 * @return array
	 */
	public function body_classes( $classes ) {

		if ( baltic_get_option( 'preloader' )  === true ) {
			$classes[] = 'preloader-enabled';
		}

		$classes[]	= esc_attr( baltic_get_layout() );

		return $classes;
	}

	/**
	 * Removes hentry class from the array of post classes.
	 * Currently, having the class on pages is not correct use of hentry.
	 * hentry requires more properties than pages typically have.
	 * Core is not likely to remove class because of backward compatibility.
	 * See: https://core.trac.wordpress.org/ticket/28482
	 *
	 * @param array $classes Classes for the post element.
	 * @return array
	 */
	public function post_classes( $classes ) {

		if ( 'page' === get_post_type() ) {
			$classes = array_diff( $classes, array( 'hentry' ) );
		}
		$classes[] = 'entry';

		return $classes;
	}

	/**
	 * Add a pingback url auto-discovery header for singularly identifiable articles.
	 */
	public function pingback_header() {
		if ( is_singular() && pings_open() ) {
			echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
		}
	}

	public function hook_filters() {

		if ( baltic_is_blog() ) {
			add_filter( 'the_title', array( $this, 'untitled_post' ) );
			add_filter( 'excerpt_length', array( $this, 'excerpt_length' ), 999 );
			add_filter( 'excerpt_more', array( $this, 'excerpt_more' ) );
			add_filter( 'the_content_more_link', array( $this, 'excerpt_more' ), 10, 2 );
			add_filter( 'embed_defaults', array( $this, 'default_embed_size' ) );
			add_filter( 'embed_oembed_html', array( $this, 'mixcloud_oembed_parameter' ), 10, 3 );
		}

		if ( is_singular() ) {
			add_filter( 'the_title', array( $this, 'untitled_post' ) );
			add_filter( 'embed_defaults', array( $this, 'default_embed_size' ) );
			add_filter( 'embed_oembed_html', array( $this, 'mixcloud_oembed_parameter' ), 10, 3 );
		}

	}

	/**
	 * Fix embed height
	 * @return [type] [description]
	 */
	public function default_embed_size(){
		return array( 'width' => 720, 'height' => 120 );
	}

	/**
	 * [olesya_mixcloud_oembed_parameter description]
	 * @param  [type] $html [description]
	 * @param  [type] $url  [description]
	 * @param  [type] $args [description]
	 * @return [type]       [description]
	 */
	public function mixcloud_oembed_parameter( $html, $url, $args ) {
		return str_replace( 'hide_cover=1', 'hide_cover=1&hide_tracklist=1&light=1', $html );
	}

	/**
	 * Add (Untitled) for post who doesn't have title
	 * @param  string  $title
	 * @return string
	 */
	public function untitled_post( $title ) {

		// Translators: Used as a placeholder for untitled posts on non-singular views.
		if ( ! $title && ! is_singular() && in_the_loop() && ! is_admin() ){
			$title = esc_html__( '(Untitled)', 'baltic' );
		}

		return $title;
	}

	/**
	 * Filter the except length to 20 characters.
	 *
	 * @param int $length Excerpt length.
	 * @return int (Maybe) modified excerpt length.
	 */
	public function excerpt_length( $length ) {
		$setting = baltic_get_option( 'excerpt_length' );
		if ( !empty( $setting ) ) {
			return (int)$setting;
		} else {
			return 20;
		}
	}

	/**
	 * Replaces "[...]" (appended to automatically generated excerpts) with ... and
	 * a 'Continue reading' link.
	 *
	 * @return string 'Continue reading' link prepended with an ellipsis.
	 */
	public function excerpt_more() {
		$link = sprintf( '<p><a href="%1$s" class="more-link">%2$s %3$s</a></p>',
			esc_url( get_permalink( get_the_ID() ) ),
			/* translators: %s: Name of current post */
			sprintf( __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'baltic' ), get_the_title( get_the_ID() ) ),
			baltic_get_svg( array( 'class'=>'icon-stroke', 'icon' => 'arrow-right' ) )
		);
		return ' ' . $link;
	}

}
endif;

return new Baltic_Theme_Functions();
