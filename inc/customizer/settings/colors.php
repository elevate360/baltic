<?php
/**
 * Customizer Colors
 *
 * @package Baltic
 */

$default = baltic_setting_default();

Kirki::add_field( 'baltic', array(
	'type'        	=> 'color',
	'settings'    	=> 'color_text_button',
	'label'       	=> __( 'Color Text Button', 'baltic' ),
	'section'     	=> 'colors',
	'default'     	=> $default['color_text_button'],
	'transport'		=> 'auto',
	'output'		=> array(
		array(
			'element'  => baltic__color_button(),
			'property' => 'color',
		)
	)
) );

Kirki::add_field( 'baltic', array(
	'type'        	=> 'color',
	'settings'    	=> 'color_button',
	'label'       	=> __( 'Color Background Button', 'baltic' ),
	'section'     	=> 'colors',
	'default'     	=> $default['color_button'],
	'transport'		=> 'auto',
	'output'		=> array(
		array(
			'element'  => baltic__color_button(),
			'property' => 'background-color',
		),
		array(
			'element'  => baltic__color_button(),
			'property' => 'border-color',
		)
	)
) );

Kirki::add_field( 'baltic', array(
	'type'        	=> 'color',
	'settings'    	=> 'color_button_hover',
	'label'       	=> __( 'Color Button Hover', 'baltic' ),
	'section'     	=> 'colors',
	'default'     	=> $default['color_button_hover'],
	'transport'		=> 'auto',
	'output'		=> array(
		array(
			'element'  => baltic__color_button_hover(),
			'property' => 'background-color',
		),
		array(
			'element'  => baltic__color_button_hover(),
			'property' => 'border-color',
		)
	)
) );

Kirki::add_field( 'baltic', array(
	'type'        	=> 'color',
	'settings'    	=> 'color_border',
	'label'       	=> __( 'Color Border', 'baltic' ),
	'section'     	=> 'colors',
	'default'     	=> $default['color_border'],
	'choices'     	=> array( 'alpha' => true ),
	'transport'		=> 'auto',
	'output'		=> array(
		array(
			'element'  		=> 'table, .wc_payment_methods',
			'property' 		=> 'box-shadow',
			'value_pattern'	=> '0 0 0 1px $, 0 4px 12px rgba(0,0,0,.1)'
		),
		array(
			'element'		=> '.comment-notes, .woocommerce-error, .woocommerce-info, .woocommerce-message, .woocommerce-noreviews, p.no-comments',
			'property'		=> 'box-shadow',
			'value_pattern'	=> 'inset 0 0 0 1px $'
		),
		array(
			'element'		=> 'input[type=color], input[type=date], input[type=datetime-local], input[type=datetime], input[type=email], input[type=month], input[type=number], input[type=password], input[type=range], input[type=search], input[type=tel], input[type=text], input[type=time], input[type=url], input[type=week], textarea, select',
			'property'		=> 'border',
			'value_pattern'	=> '1px solid $'
		),
		array(
			'element'		=> '.header-search-area .search-submit, .select2-container--default .select2-selection--single, .select2-dropdown, .select2-container--default .select2-search--dropdown .select2-search__field, .wc_payment_methods li, .wc_payment_methods .payment_box',
			'property'		=> 'border-color',
		)
	)
) );
