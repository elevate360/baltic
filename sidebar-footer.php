<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Baltic
 */

$sidebar = apply_filters( 'baltic_sidebar_tertiary', 'sidebar-2' );

if ( ! is_active_sidebar( $sidebar ) ) {
	return;
}
?>

<aside <?php baltic_attr( 'tertiary' );?>>
	<div class="container">
		<div class="columns columns-4">
			<?php dynamic_sidebar( $sidebar ); ?>
		</div><!-- .columns -->
	</div><!-- .container -->
</aside><!-- #tertiary -->
