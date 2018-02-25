<?php
/**
 * WooCommerce Settings
 *
 * @package Baltic
 */

$default = baltic_setting_default();

/** Colors */
Kirki::add_section( 'baltic_wc_color_section', array(
    'title' 		=> esc_attr__( 'Colors', 'baltic' ),
    'panel' 		=> 'woocommerce',
    'priority'		=> 100
) );

Kirki::add_field( 'baltic', array(
	'type'        	=> 'color',
	'settings'    	=> 'color_price',
	'label'       	=> __( 'Price color', 'baltic' ),
	'section'     	=> 'baltic_wc_color_section',
	'default'     	=> $default['color_price'],
	'transport'		=> 'auto',
	'output'		=> array(
		array(
			'element'  => '.woocommerce-loop-product__link .price',
			'property' => 'color',
		)
	)
) );

Kirki::add_field( 'baltic', array(
	'type'        	=> 'color',
	'settings'    	=> 'color_sale_text',
	'label'       	=> __( 'Sale Badge Text Color', 'baltic' ),
	'section'     	=> 'baltic_wc_color_section',
	'default'     	=> $default['color_sale_text'],
	'transport'		=> 'auto',
	'output'		=> array(
		array(
			'element'  => '.onsale',
			'property' => 'color',
		)
	)
) );

Kirki::add_field( 'baltic', array(
	'type'        	=> 'color',
	'settings'    	=> 'color_sale',
	'label'       	=> __( 'Sale Badge Background Color', 'baltic' ),
	'section'     	=> 'baltic_wc_color_section',
	'default'     	=> $default['color_sale'],
	'transport'		=> 'auto',
	'output'		=> array(
		array(
			'element'  => '.onsale',
			'property' => 'background-color',
		)
	)
) );

Kirki::add_field( 'baltic', array(
	'type'        	=> 'color',
	'settings'    	=> 'color_stars',
	'label'       	=> __( 'Stars Rating Color', 'baltic' ),
	'section'     	=> 'baltic_wc_color_section',
	'default'     	=> $default['color_stars'],
	'transport'		=> 'auto',
	'output'		=> array(
		array(
			'element'  => '.star-rating span:before',
			'property' => 'color',
		)
	)
) );

/** Layout */
Kirki::add_section( 'baltic_wc_layout_section', array(
    'title' 		=> esc_attr__( 'Layout', 'baltic' ),
    'panel' 		=> 'woocommerce',
) );

Kirki::add_field( 'baltic', array(
	'type'        	=> 'select',
	'settings'    	=> 'layout_products',
	'label'       	=> __( 'Product Archive Layout', 'baltic' ),
	'section'     	=> 'baltic_wc_layout_section',
	'default'     	=> $default['layout_products'],
	'transport'		=> 'postMessage',
	'choices' 		=> baltic_get_main_layout(),
) );

Kirki::add_field( 'baltic', array(
	'type'        	=> 'select',
	'settings'    	=> 'layout_product',
	'label'       	=> __( 'Single Product Layout', 'baltic' ),
	'section'     	=> 'baltic_wc_layout_section',
	'default'     	=> $default['layout_product'],
	'transport'		=> 'postMessage',
	'choices' 		=> baltic_get_main_layout(),
) );

/** WooCommerce product catalog */
Kirki::add_field( 'baltic', array(
	'type'        	=> 'number',
	'settings'    	=> 'products_per_page',
	'label'       	=> esc_attr__( 'Products per page', 'baltic' ),
	'section'     	=> 'woocommerce_product_catalog',
	'default'     	=> $default['products_per_page'],
	'choices'     	=> array(
		'min'  => 0,
		'max'  => 9999,
		'step' => 1,
	),
) );

Kirki::add_field( 'baltic', array(
	'type'        	=> 'number',
	'settings'    	=> 'products_columns',
	'label'       	=> esc_attr__( 'Products Columns', 'baltic' ),
	'section'     	=> 'woocommerce_product_catalog',
	'default'     	=> $default['products_columns'],
	'choices'     	=> array(
		'min'  => 0,
		'max'  => 9999,
		'step' => 1,
	),
) );

Kirki::add_field( 'baltic', array(
	'type' 			=> 'switch',
	'settings'    	=> 'product_quick_view',
	'label'       	=> __( 'Enable product quick view?', 'baltic' ),
	'section'     	=> 'woocommerce_product_catalog',
	'default'     	=> '1',
	'choices'     	=> array(
		'on'  => esc_attr__( 'Yes', 'baltic' ),
		'off' => esc_attr__( 'No', 'baltic' ),
	),
) );

Kirki::add_field( 'baltic', array(
	'type'        	=> 'select',
	'settings'    	=> 'products_nav',
	'label'       	=> __( 'Products Navigation Type', 'baltic' ),
	'section'     	=> 'woocommerce_product_catalog',
	'default'     	=> $default['products_nav'],
	'transport'		=> 'postMessage',
	'choices' 		=> array(
		'products_navigation' 	=> esc_attr__( 'Previous/Next', 'baltic' ),
		'products_pagination'	=> esc_attr__( 'Pagination', 'baltic' ),
	),
	'partial_refresh' => array(
		'products_nav' => array(
			'selector'        		=> '.is-woocommerce .navigation ',
			'render_callback' 		=> function() {
				return baltic_wc_pagination();
			},
			'container_inclusive' 	=> true
		),
	),
) );

Kirki::add_field( 'baltic', array(
	'type'        	=> 'text',
	'settings'    	=> 'products_nav_prev',
	'label'       	=> esc_attr__( 'Previous Product Text', 'baltic' ),
	'section'     	=> 'woocommerce_product_catalog',
	'default'     	=> $default['products_nav_prev'],
	'transport'		=> 'postMessage',
	'active_callback'    => array(
		array(
			'setting'  => 'products_nav',
			'operator' => '==',
			'value'    => 'products_navigation',
		),
	),
	'partial_refresh' => array(
		'products_nav_prev' => array(
			'selector'        		=> '.is-woocommerce .navigation ',
			'render_callback' 		=> function() {
				return baltic_wc_pagination();
			},
			'container_inclusive' 	=> true
		),
	),
) );

Kirki::add_field( 'baltic', array(
	'type'        	=> 'text',
	'settings'    	=> 'products_nav_next',
	'label'       	=> esc_attr__( 'Next Product Text', 'baltic' ),
	'section'     	=> 'woocommerce_product_catalog',
	'default'     	=> $default['products_nav_next'],
	'transport'		=> 'postMessage',
	'active_callback'    => array(
		array(
			'setting'  => 'products_nav',
			'operator' => '==',
			'value'    => 'products_navigation',
		),
	),
	'partial_refresh' => array(
		'products_nav_next' => array(
			'selector'        		=> '.is-woocommerce .navigation ',
			'render_callback' 		=> function() {
				return baltic_wc_pagination();
			},
			'container_inclusive' 	=> true
		),
	),
) );
