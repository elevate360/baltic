<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Baltic
 */

?>
	<?php do_action( 'baltic_inner_after' );?>

	<?php do_action( 'baltic_footer_before' );?>
	<footer <?php baltic_attr( 'site-footer' );?>>
		<div class="container">
			<div class="columns">
				<?php do_action( 'baltic_footer' );?>
			</div><!-- .columns -->
		</div><!-- .container -->
	</footer><!-- #colophon -->
	<?php do_action( 'baltic_footer_after' );?>

</div><!-- #page -->
<?php do_action( 'baltic_after' );?>
<?php wp_footer(); ?>
</body>
</html>
