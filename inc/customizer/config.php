<?php
/**
 * Kirki Config
 *
 * @package Baltic
 */

/**
 * Configuration the Kirki Customizer.
 *
 * @param $config the configuration array
 * @return array
 */
function baltic_kirki_config( $config ) {
	return wp_parse_args( array(
		'disable_loader'	=> true
	), $config );
}
add_filter( 'kirki_config', 'baltic_kirki_config' );

Kirki::add_config( 'baltic', array(
	'capability'  => 'edit_theme_options',
	'option_type' => 'theme_mod',
) );

function baltic_kirki_css_file(){
	return 'file';
}
//add_filter( 'kirki_dynamic_css_method', 'baltic_kirki_css_file' );
