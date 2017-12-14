<?php
/**
 * Baltic site header
 *
 * @package Baltic
 */

/**
 * Baltic site branding
 *
 * @return string
 */
function baltic_site_branding(){
	get_template_part( 'components/header/site', 'branding' );
}
add_action( 'baltic_header', 'baltic_site_branding', 10 );

/**
 * Baltic site branding
 *
 * @return string
 */
function baltic_header_search(){
	get_template_part( 'components/header/header', 'search' );
}
add_action( 'baltic_header', 'baltic_header_search', 20 );

/**
 * Baltic site branding
 *
 * @return string
 */
function baltic_menu_primary(){
	get_template_part( 'components/menus/menu', 'primary' );
}
add_action( 'baltic_header', 'baltic_menu_primary', 30 );
