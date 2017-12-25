<?php
/**
 * Template Name: Baltic - Canvas
 * Template Post Type: post, page
 *
 * @package Baltic
 */

add_filter( 'baltic_site_layout', '__return_false' );
get_header();?>

	<main <?php baltic_attr( 'site-main' );?>>
		<?php
		while ( have_posts() ) : the_post();

			the_content();

		endwhile;
		?>
	</main><!-- .site-main -->

<?php
get_footer();
