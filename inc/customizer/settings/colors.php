<?php
/**
 * Customizer Colors
 *
 * @package Baltic
 */

$default = baltic_setting_default();

Kirki::add_field( 'baltic', array(
	'type'        => 'color',
	'settings'    => 'color_button',
	'label'       => __( 'Color Button', 'baltic' ),
	'section'     => 'colors',
	'default'     => $default['color_button'],
) );

Kirki::add_field( 'baltic', array(
	'type'        => 'color',
	'settings'    => 'color_button_hover',
	'label'       => __( 'Color Button Hover', 'baltic' ),
	'section'     => 'colors',
	'default'     => $default['color_button_hover'],
) );
