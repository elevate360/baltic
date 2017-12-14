<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Baltic
 */

get_header(); ?>

<div class="container">
	<div <?php baltic_attr( 'columns' );?>>

		<?php do_action( 'baltic_content_area_before' );?>
		<div <?php baltic_attr( 'primary' );?>>

			<?php do_action( 'baltic_loop_before' );?>

			<?php do_action( 'baltic_loop' );?>

			<?php do_action( 'baltic_loop_after' );?>

		</div><!-- #primary -->
		<?php do_action( 'baltic_content_area_after' );?>

	</div><!-- .columns -->
</div><!-- .container -->

<?php
get_footer();
