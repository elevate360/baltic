<?php
/**
 * Customizer Colors
 *
 * @package Baltic
 */

$default = baltic_setting_default();

/** Header */
Kirki::add_section( 'baltic_header_color_section', array(
    'title'          => esc_attr__( 'Header', 'baltic' ),
    'panel'          => 'baltic_colors_panel',
) );

Kirki::add_field( 'baltic', array(
	'type'        	=> 'color',
	'settings'    	=> 'color_bg_header',
	'label'       	=> __( 'Header Background Color', 'baltic' ),
	'section'     	=> 'baltic_header_color_section',
	'default'     	=> $default['color_bg_header'],
	'transport'		=> 'auto',
	'output'		=> array(
		array(
			'element'  => '.site-header, .menu-toggle, .menu-toggle:hover, .menu-toggle:focus, .toggled .menu-toggle',
			'property' => 'background-color',
		)
	)
) );

Kirki::add_field( 'baltic', array(
	'type'        	=> 'color',
	'settings'    	=> 'color_header_input',
	'label'       	=> __( 'Header search background color', 'baltic' ),
	'section'     	=> 'baltic_header_color_section',
	'default'     	=> $default['color_header_input'],
	'choices'     	=> array( 'alpha' => true ),
	'transport'		=> 'auto',
	'output'		=> array(
		array(
			'element'  => '.header-search-area input[type=search], .header-search-area select',
			'property' => 'background-color',
		),
	)
) );

Kirki::add_field( 'baltic', array(
	'type'        	=> 'color',
	'settings'    	=> 'color_header_input_focus',
	'label'       	=> __( 'Header search background color focus', 'baltic' ),
	'section'     	=> 'baltic_header_color_section',
	'default'     	=> $default['color_header_input_focus'],
	'choices'     	=> array( 'alpha' => true ),
	'transport'		=> 'auto',
	'output'		=> array(
		array(
			'element'  => '.header-search-area input[type=search]:focus',
			'property' => 'background-color',
		),
	)
) );

Kirki::add_field( 'baltic', array(
	'type'        	=> 'color',
	'settings'    	=> 'color_header_textfield',
	'label'       	=> __( 'Header search text color', 'baltic' ),
	'section'     	=> 'baltic_header_color_section',
	'default'     	=> $default['color_header_textfield'],
	'choices'     	=> array( 'alpha' => true ),
	'transport'		=> 'auto',
	'output'		=> array(
		array(
			'element'  => '.header-search-area input[type=search]',
			'property' => 'color',
		),
		array(
			'element'  => '.header-search-area select',
			'property' => 'color',
		),
		array(
			'element'	=> '.header-search-area input[type=search]::-webkit-input-placeholder',
			'property'	=> 'color'
		),
		array(
			'element'	=> '.header-search-area input[type=search]::-moz-placeholder',
			'property'	=> 'color'
		),
		array(
			'element'	=> '.header-search-area input[type=search]:-ms-input-placeholder',
			'property'	=> 'color'
		),
		array(
			'element'	=> '.header-search-area input[type=search]:-moz-placeholder',
			'property'	=> 'color'
		),
	)
) );

Kirki::add_field( 'baltic', array(
	'type'        	=> 'color',
	'settings'    	=> 'color_header_textfield_focus',
	'label'       	=> __( 'Header search text color focus', 'baltic' ),
	'section'     	=> 'baltic_header_color_section',
	'default'     	=> $default['color_header_textfield_focus'],
	'choices'     	=> array( 'alpha' => true ),
	'transport'		=> 'auto',
	'output'		=> array(
		array(
			'element'  => '.header-search-area input[type=search]:focus',
			'property' => 'color',
		),
		array(
			'element'  => '.header-search-area select:focus',
			'property' => 'color',
		),
		array(
			'element'	=> '.header-search-area input[type=search]:focus::-webkit-input-placeholder',
			'property'	=> 'color'
		),
		array(
			'element'	=> '.header-search-area input[type=search]:focus::-moz-placeholder',
			'property'	=> 'color'
		),
		array(
			'element'	=> '.header-search-area input[type=search]:focus:-ms-input-placeholder',
			'property'	=> 'color'
		),
		array(
			'element'	=> '.header-search-area input[type=search]:focus:-moz-placeholder',
			'property'	=> 'color'
		),
	)
) );

Kirki::add_field( 'baltic', array(
	'type'        	=> 'color',
	'settings'    	=> 'color_header_btn',
	'label'       	=> __( 'Header search button color', 'baltic' ),
	'section'     	=> 'baltic_header_color_section',
	'default'     	=> $default['color_header_btn'],
	'choices'     	=> array( 'alpha' => true ),
	'transport'		=> 'auto',
	'output'		=> array(
		array(
			'element'  => '.header-search-area .search-submit',
			'property' => 'background-color',
		)
	)
) );

Kirki::add_field( 'baltic', array(
	'type'        	=> 'color',
	'settings'    	=> 'color_header_btn_hover',
	'label'       	=> __( 'Header search button color hover', 'baltic' ),
	'section'     	=> 'baltic_header_color_section',
	'default'     	=> $default['color_header_btn_hover'],
	'choices'     	=> array( 'alpha' => true ),
	'transport'		=> 'auto',
	'output'		=> array(
		array(
			'element'  => '.header-search-area .search-submit:hover, .header-search-area .search-submit:focus',
			'property' => 'background-color',
		),
		array(
			'element'  => '.header-search-area .search-submit:hover, .header-search-area .search-submit:focus',
			'property' => 'border-color',
		)
	)
) );

Kirki::add_field( 'baltic', array(
	'type'        	=> 'color',
	'settings'    	=> 'color_header_btn_icon',
	'label'       	=> __( 'Header search icon color', 'baltic' ),
	'section'     	=> 'baltic_header_color_section',
	'default'     	=> $default['color_header_btn_icon'],
	'choices'     	=> array( 'alpha' => true ),
	'transport'		=> 'auto',
	'output'		=> array(
		array(
			'element'  => '.header-search-area .search-submit .icon-stroke',
			'property' => 'stroke',
		)
	)
) );

Kirki::add_field( 'baltic', array(
	'type'        	=> 'color',
	'settings'    	=> 'color_header_btn_icon_hover',
	'label'       	=> __( 'Header search icon color hover', 'baltic' ),
	'section'     	=> 'baltic_header_color_section',
	'default'     	=> $default['color_header_btn_icon_hover'],
	'choices'     	=> array( 'alpha' => true ),
	'transport'		=> 'auto',
	'output'		=> array(
		array(
			'element'  => '.header-search-area .search-submit:hover .icon-stroke, .header-search-area .search-submit:focus .icon-stroke',
			'property' => 'stroke',
		)
	)
) );

/** Background */
Kirki::add_section( 'baltic_bg_color_section', array(
    'title'          => esc_attr__( 'Background', 'baltic' ),
    'panel'          => 'baltic_colors_panel',
) );

/** Selection */
Kirki::add_section( 'baltic_selection_color_section', array(
    'title'          => esc_attr__( 'Selection', 'baltic' ),
    'panel'          => 'baltic_colors_panel',
) );

Kirki::add_field( 'baltic', array(
	'type'        => 'color',
	'settings'    => 'color_bg_highlight',
	'label'       => __( 'Color Background Highlight', 'baltic' ),
	'section'     => 'baltic_selection_color_section',
	'default'     => $default['color_bg_highlight'],
	'transport'		=> 'auto',
	'output'		=> array(
		array(
			'element'  => '::selection',
			'property' => 'background-color',
		),
		array(
			'element'  => '::-moz-selection',
			'property' => 'background-color',
		),
	)
) );

Kirki::add_field( 'baltic', array(
	'type'        => 'color',
	'settings'    => 'color_text_highlight',
	'label'       => __( 'Color Text Highlight', 'baltic' ),
	'section'     => 'baltic_selection_color_section',
	'default'     => $default['color_text_highlight'],
	'transport'		=> 'auto',
	'output'		=> array(
		array(
			'element'  => '::selection',
			'property' => 'color',
		),
		array(
			'element'  => '::-moz-selection',
			'property' => 'color',
		),
	)
) );

/** Text */
Kirki::add_section( 'baltic_text_color_section', array(
    'title'          => esc_attr__( 'Text', 'baltic' ),
    'panel'          => 'baltic_colors_panel',
) );

Kirki::add_field( 'baltic', array(
	'type'        	=> 'color',
	'settings'    	=> 'color_text_primary',
	'label'       	=> __( 'Primary Text Color', 'baltic' ),
	'section'     	=> 'baltic_text_color_section',
	'default'     	=> $default['color_text_primary'],
	'transport'		=> 'auto',
	'output'		=> array(
		array(
			'element'  => baltic__color_text_primary(),
			'property' => 'color',
		),
		array(
			'element'	=> 'ul.cart_list a.remove, .product-remove a, .widget-title:after, #ship-to-different-address label span:before, #ship-to-different-address label input[type=checkbox]:checked+span:before, .wc_payment_methods input.input-radio[name=payment_method]:checked+label:before',
			'property'	=> 'background-color'
		),
		array(
			'element'	=> '.return-to-top, #ship-to-different-address label span:before, #ship-to-different-address label input[type=checkbox]:checked+span:before',
			'property'	=> 'border-color'
		),
		array(
			'element'	=> '.wc_payment_methods input.input-radio[name=payment_method]+label:before',
			'property'	=> 'box-shadow',
			'value_pattern'	=> '0 0 0 2px $'
		)
	)
) );

Kirki::add_field( 'baltic', array(
	'type'        	=> 'color',
	'settings'    	=> 'color_text_secondary',
	'label'       	=> __( 'Secondary Text Color', 'baltic' ),
	'section'     	=> 'baltic_text_color_section',
	'default'     	=> $default['color_text_secondary'],
	'transport'		=> 'auto',
	'output'		=> array(
		array(
			'element'  => baltic__color_text_secondary(),
			'property' => 'color',
		),
		array(
			'element'	=> 'ul.products li.product .button',
			'property'	=> 'border-color'
		)
	)
) );

/** Textfields */
Kirki::add_section( 'baltic_textfield_color_section', array(
    'title'          => esc_attr__( 'TextField', 'baltic' ),
    'panel'          => 'baltic_colors_panel',
) );

Kirki::add_field( 'baltic', array(
	'type'        	=> 'color',
	'settings'    	=> 'color_text_field',
	'label'       	=> __( 'Text Field Color', 'baltic' ),
	'section'     	=> 'baltic_textfield_color_section',
	'default'     	=> $default['color_text_field'],
	'transport'		=> 'auto',
	'output'		=> array(
		array(
			'element'  => baltic__color_text_field(),
			'property' => 'color',
		),
		array(
			'element'	=> '::-webkit-input-placeholder',
			'property'	=> 'color'
		),
		array(
			'element'	=> ':-moz-placeholder',
			'property'	=> 'color'
		),
		array(
			'element'	=> '::-moz-placeholder',
			'property'	=> 'color'
		),
		array(
			'element'	=> ':-ms-input-placeholder',
			'property'	=> 'color'
		)
	)
) );

Kirki::add_field( 'baltic', array(
	'type'        	=> 'color',
	'settings'    	=> 'color_text_field_focus',
	'label'       	=> __( 'Text Field Focus Color', 'baltic' ),
	'section'     	=> 'baltic_textfield_color_section',
	'default'     	=> $default['color_text_field_focus'],
	'transport'		=> 'auto',
	'output'		=> array(
		array(
			'element'  => baltic__color_text_field_focus(),
			'property' => 'color',
		)
	)
) );

/** Link */
Kirki::add_section( 'baltic_link_color_section', array(
    'title'          => esc_attr__( 'Link', 'baltic' ),
    'panel'          => 'baltic_colors_panel',
) );

Kirki::add_field( 'baltic', array(
	'type'        	=> 'color',
	'settings'    	=> 'color_link_primary',
	'label'       	=> __( 'Color Link', 'baltic' ),
	'section'     	=> 'baltic_link_color_section',
	'default'     	=> $default['color_link_primary'],
	'transport'		=> 'auto',
	'output'		=> array(
		array(
			'element'  	=> baltic__color_link_primary(),
			'property' 	=> 'color',
		),
		array(
			'element' 	=> '.screen-reader-text:focus, .widget_layered_nav_filters ul li.chosen:before, .woocommerce-widget-layered-nav-list li.chosen:before',
			'property'	=> 'background-color'
		),
		array(
			'element'	=> '.widget_layered_nav_filters ul li:before, .woocommerce-widget-layered-nav-list li:before, .widget_layered_nav_filters ul li.chosen:before, .woocommerce-widget-layered-nav-list li.chosen:before',
			'property'	=> 'border-color'
		),
		array(
			'element'	=> '.woocommerce .blockUI.blockOverlay::before, .woocommerce .loader::before',
			'property'	=> 'border-top-color'
		),
	)
) );

Kirki::add_field( 'baltic', array(
	'type'        	=> 'color',
	'settings'    	=> 'color_link_secondary',
	'label'       	=> __( 'Color Link Hover', 'baltic' ),
	'section'     	=> 'baltic_link_color_section',
	'default'     	=> $default['color_link_secondary'],
	'transport'		=> 'auto',
	'output'		=> array(
		array(
			'element'  	=> baltic__color_link_secondary(),
			'property' 	=> 'color',
		),
		array(
			'element'	=> 'ul.cart_list a.remove:focus, ul.cart_list a.remove:hover, .product-remove a:hover, .product-remove a:focus',
			'property'	=> 'background-color'
		),
	)
) );

/** Button */
Kirki::add_section( 'baltic_button_color_section', array(
    'title'          => esc_attr__( 'Button', 'baltic' ),
    'panel'          => 'baltic_colors_panel',
) );

Kirki::add_field( 'baltic', array(
	'type'        	=> 'color',
	'settings'    	=> 'color_text_button',
	'label'       	=> __( 'Color Text Button', 'baltic' ),
	'section'     	=> 'baltic_button_color_section',
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
	'section'     	=> 'baltic_button_color_section',
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
	'section'     	=> 'baltic_button_color_section',
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

Kirki::add_section( 'baltic_border_color_section', array(
    'title'          => esc_attr__( 'Border', 'baltic' ),
    'panel'          => 'baltic_colors_panel',
) );

Kirki::add_field( 'baltic', array(
	'type'        	=> 'color',
	'settings'    	=> 'color_border',
	'label'       	=> __( 'Color Border', 'baltic' ),
	'section'     	=> 'baltic_border_color_section',
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
