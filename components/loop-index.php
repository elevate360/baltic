<?php
/**
 * Baltic main loop
 *
 * @package Baltic
 */
if ( have_posts() ) :

	while ( have_posts() ) : the_post();

		get_template_part( 'components/content', get_post_format() );

	endwhile;

else :

	get_template_part( 'components/content', 'none' );

endif;
