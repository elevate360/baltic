<?php
/**
 * Template Name: Page Grid
 * Template Post Type: page
 *
 * @package Baltic
 */
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
