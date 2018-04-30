<?php
/**
 * Template Name: Baltic - Homepage
 * Template Post Type: page
 *
 * @package Baltic
 */

add_filter( 'baltic_site_layout', '__return_false' );
get_header();?>

	<main <?php Baltic_Markup::attr( 'site-main' );?>>

		<?php do_action( 'baltic_homepage' );?>

	</main><!-- .site-main -->

<?php
get_footer();
