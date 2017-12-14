<?php
/**
 * Baltic post entry
 *
 * @package baltic
 */

/**
 * Baltic entry thumbnail
 * @return [string] [description]
 */
function baltic_entry_thumbnail(){
	get_template_part( 'components/post/entry', 'thumbnail' );
}
add_action( 'baltic_entry_header_before', 'baltic_entry_thumbnail', 10 );

/**
 * Baltic entry title
 * @return [type] [description]
 */
function baltic_entry_title(){
	get_template_part( 'components/post/entry', 'title' );
}
add_action( 'baltic_entry_header', 'baltic_entry_title', 10 );

/**
 * Baltic entry meta
 * @return [type] [description]
 */
function baltic_entry_meta(){
	if ( 'post' === get_post_type() ) {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date */
			__( '<span class="screen-reader-text">Posted on</span> %s', 'baltic' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'by %s', 'post author', 'baltic' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.
	}
}
add_action( 'baltic_entry_header', 'baltic_entry_meta', 20 );

/**
 * Baltic entry title
 * @return [type] [description]
 */
function baltic_entry_content(){

	if ( is_singular() ) {
		get_template_part( 'components/post/entry', 'content' );
	} else {
		the_excerpt();
	}

}
add_action( 'baltic_entry_content', 'baltic_entry_content', 10 );

/**
 * Post navigation
 *
 * @return [type] [description]
 */
function baltic_entry_post_navigation(){

	if ( ! is_singular( 'post' ) ) {
		return;
	}

	the_post_navigation( array(
	    'prev_text'                  => __( '<span>&larr; previous post</span> %title', 'baltic' ),
	    'next_text'                  => __( '<span>next post &rarr;</span> %title', 'baltic' ),
	    'screen_reader_text'		 => __( 'Continue Reading', 'baltic' ),
	) );

}
add_action( 'baltic_entry_after', 'baltic_entry_post_navigation', 20 );

/**
 * [baltic_entry_author_biography description]
 * @return [type] [description]
 */
function baltic_entry_author_biography(){

	if ( ! is_singular( 'post' ) ) {
		return;
	}

	get_template_part( 'components/post/entry', 'biography' );

}
add_action( 'baltic_entry_after', 'baltic_entry_author_biography', 20 );

/**
 * Baltic entry comment
 *
 * @return string [<description>]
 */
function baltic_entry_comments(){

	if ( ! is_singular() ) {
		return;
	}

	if ( comments_open() || get_comments_number() ) :
		comments_template();
	endif;
}
add_action( 'baltic_entry_after', 'baltic_entry_comments', 30 );
