<?php
/**
 * Entry title
 *
 * @package Baltic
 */

if ( is_singular() ) :
	the_title( '<h1 class="entry-title"><span class="screen-reader-text">', '</span></h1>' );
else :
	the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
endif;
