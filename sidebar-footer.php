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
	<?php dynamic_sidebar( $sidebar ); ?>
</aside><!-- #tertiary -->
