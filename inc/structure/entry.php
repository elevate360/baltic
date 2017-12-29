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
	if ( ! is_singular() ) {
		get_template_part( 'components/post/entry', 'thumbnail' );
	}
}
add_action( 'baltic_entry_header_before', 'baltic_entry_thumbnail', 10 );

/**
 * Baltic entry meta
 * @return [type] [description]
 */
function baltic_entry_meta(){

	if ( 'post' !== get_post_type() ) {
		return;
	}

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

	$posted_on = sprintf( '%s <span class="screen-reader-text">%s</span> %s',
		baltic_get_svg( array( 'class' => 'icon-stroke', 'icon' => 'calendar' ) ),
		__( 'Posted on', 'baltic' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf( '%s <span class="screen-reader-text">%s</span> %s',
		baltic_get_svg( array( 'class' => 'icon-stroke', 'icon' => 'user' ) ),
		__( 'by', 'baltic' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<div class="entry-meta">';
	echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		echo baltic_get_svg( array( 'class' => 'icon-stroke', 'icon' => 'msg' ) );
		comments_popup_link(
			sprintf(
				wp_kses(
					/* translators: %s: post title */
					__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'baltic' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			)
		);
		echo '</span>';
	}

	echo '</div>';


}
add_action( 'baltic_entry_header', 'baltic_entry_meta', 10 );

/**
 * [baltic_entry_footer description]
 * @return [type] [description]
 */
function baltic_entry_footer(){

	if ( 'post' !== get_post_type() ) {
		return;
	}

	echo '<footer class="entry-footer">';

	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'baltic' ) );
		if ( $categories_list ) {
			/* translators: 1: list of categories. */
			printf( '<span class="cat-links">%s <span class="screen-reader-text">' . esc_html__( 'Posted in', 'baltic' ) . '</span> %s</span>',
			baltic_get_svg( array( 'class' => 'icon-stroke', 'icon' => 'folder-open' ) ),
			$categories_list ); // WPCS: XSS OK.
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'baltic' ) );
		if ( $tags_list ) {
			/* translators: 1: list of tags. */
			printf( '<span class="tags-links">%s <span class="screen-reader-text">' . esc_html__( 'Tagged', 'baltic' ) . '</span> %s</span>',
			baltic_get_svg( array( 'class' => 'icon-stroke', 'icon' => 'tag' ) ),
			$tags_list ); // WPCS: XSS OK.
		}
	}

	edit_post_link(
		sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Edit <span class="screen-reader-text">%s</span>', 'baltic' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		),
		'<span class="edit-link">',
		'</span>'
	);

	echo '</footer>';

}
add_action( 'baltic_entry_footer', 'baltic_entry_footer', 10 );

/**
 * Baltic entry title
 * @return [type] [description]
 */
function baltic_entry_title(){
	get_template_part( 'components/post/entry', 'title' );
}
add_action( 'baltic_entry_header', 'baltic_entry_title', 20 );

/**
 * Baltic entry title
 * @return [type] [description]
 */
function baltic_entry_content(){

	if ( is_singular() || post_password_required() ) {
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
