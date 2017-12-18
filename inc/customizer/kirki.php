<?php
/**
 *
 */

Kirki::add_config( 'baltic', array(
	'capability'  => 'edit_theme_options',
	'option_type' => 'theme_mod',
) );

Kirki::add_panel( 'baltic_woocommerce', array(
	'priority'    => 200,
	'title'       => esc_attr__( 'WooCommerce', 'baltic' ),
	'description' => esc_attr__( 'WooCommerce settings.', 'baltic' ),
) );
