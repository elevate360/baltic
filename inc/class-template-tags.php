<?php
/**
 * Template tags
 *
 * @package Baltic
 */

class Baltic_Components {

	/**
	 * [entry_meta description]
	 * @return [type] [description]
	 */
	public static function entry_meta() {

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

	/**
	 * [entry_footer description]
	 * @return [type] [description]
	 */
	public static function entry_footer() {

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

}
