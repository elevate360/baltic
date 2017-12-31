<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Baltic
 */

?>
<!doctype html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php do_action( 'baltic_meta' ); ?>
<?php wp_head(); ?>
</head>
<body <?php baltic_attr( 'body' );?>>

<?php
/**
 * baltic_before hook
 *
 * @hooked baltic_do_preloader() - 10
 * @hooked baltic_skip_links() - 20
 */
do_action( 'baltic_before' );?>

<div <?php baltic_attr( 'site' );?>>

	<?php do_action( 'baltic_header_before' );?>
	<header <?php baltic_attr( 'site-header' );?>>
			<?php
			/**
			 * baltic_header hook
			 *
			 * @hooked baltic_header_container_open() - 10
			 * @hooked baltic_header_toggle() - 20
			 * @hooked baltic_site_branding() - 30
			 * @hooked baltic_header_search() - 40
			 * @hooked baltic_header_container_close() - 50
			 * @hooked baltic_menu_primary() - 60
			 */
			do_action( 'baltic_header' );?>
	</header><!-- #masthead -->
	<?php do_action( 'baltic_header_after' );?>

	<?php
	/**
	 * baltic_inner_before hook
	 *
	 * @hooked baltic_inner_markup_open() - 10
	 */
	do_action( 'baltic_inner_before' );?>
