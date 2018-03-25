<?php
/**
 * Baltic functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Baltic
 *
 * Do not add any custom code here.
 * Please use a custom plugin or child theme so that your customizations aren't lost during updates.
 */

$_baltic = wp_get_theme();
define( 'BALTIC_THEME_NAME', 				$_baltic->get( 'Name' ) );
define( 'BALTIC_THEME_URL', 				$_baltic->get( 'ThemeURI' ) );
define( 'BALTIC_THEME_DEVELOPER_AUTHOR', 	$_baltic->get( 'Author' ) );
define( 'BALTIC_THEME_DEVELOPER_URI', 		$_baltic->get( 'AuthorURI' ) );
define( 'BALTIC_THEME_VERSION', 			$_baltic->get( 'Version' ) );
define( 'BALTIC_THEME_DOMAIN', 				$_baltic->get( 'TextDomain' ) );

/** Include Baltic theme core */
require_once( get_template_directory() . '/inc/class-baltic.php' );
// Baltic init hook
do_action( 'baltic_init' );

// Baltic setup hook
do_action( 'baltic_setup' );
