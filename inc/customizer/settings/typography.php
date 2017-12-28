<?php
/**
 * Typography theme settings
 *
 * @package Baltic
 */
$default = baltic_setting_default();

Kirki::add_section( 'baltic_body_font_section', array(
    'title'          => esc_attr__( 'Body', 'baltic' ),
    'panel'          => 'baltic_typograhy_panel',
) );

Kirki::add_field( 'baltic', array(
	'type'        => 'typography',
	'settings'    => 'body_font',
	'label'       => esc_attr__( 'Body Fonts', 'baltic' ),
	'section'     => 'baltic_body_font_section',
	'default'     => array(
		'font-family'    => '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif',
		'variant'        => '400',
		'font-size'      => '1rem',
		'line-height'    => '1.5',
		'letter-spacing' => '0',
		'subsets'        => '',
		'text-transform' => 'none',
	),
	'transport'   => 'auto',
	'priority'    => 10,
	'output' => array(
		array(
			'element'  => 'body'
		)
	),
) );

Kirki::add_section( 'baltic_heading_font_section', array(
    'title'          => esc_attr__( 'Heading', 'baltic' ),
    'panel'          => 'baltic_typograhy_panel',
) );

Kirki::add_field( 'baltic', array(
	'type'        => 'typography',
	'settings'    => 'heading_font',
	'label'       => esc_attr__( 'Heading Fonts', 'baltic' ),
	'section'     => 'baltic_heading_font_section',
	'default'     => array(
		'font-family'    => '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif',
		'variant'        => '400',
		'letter-spacing' => '0',
		'subsets'        => '',
		'text-transform' => 'none',
	),
	'transport'   => 'auto',
	'priority'    => 10,
	'output' => array(
		array(
			'element'  => 'h1, h2, h3, h4, h5, h6'
		)
	),
) );

Kirki::add_field( 'baltic', array(
	'type'        => 'typography',
	'settings'    => 'heading1_size',
	'label'       => esc_attr__( 'H1 size', 'baltic' ),
	'section'     => 'baltic_heading_font_section',
	'default'     => array(
		'font-size'      => '2.5rem',
		'line-height'    => '1.2',
	),
	'transport'   => 'auto',
	'priority'    => 10,
	'output' => array(
		array(
			'element'  => 'h1'
		)
	),
) );

Kirki::add_field( 'baltic', array(
	'type'        => 'typography',
	'settings'    => 'heading2_size',
	'label'       => esc_attr__( 'H2 size', 'baltic' ),
	'section'     => 'baltic_heading_font_section',
	'default'     => array(
		'font-size'      => '2rem',
		'line-height'    => '1.2',
	),
	'transport'   => 'auto',
	'priority'    => 10,
	'output' => array(
		array(
			'element'  => 'h2'
		)
	),
) );

Kirki::add_field( 'baltic', array(
	'type'        => 'typography',
	'settings'    => 'heading3_size',
	'label'       => esc_attr__( 'H3 size', 'baltic' ),
	'section'     => 'baltic_heading_font_section',
	'default'     => array(
		'font-size'      => '1.75rem',
		'line-height'    => '1.2',
	),
	'transport'   => 'auto',
	'priority'    => 10,
	'output' => array(
		array(
			'element'  => 'h3'
		)
	),
) );

Kirki::add_field( 'baltic', array(
	'type'        => 'typography',
	'settings'    => 'heading4_size',
	'label'       => esc_attr__( 'H4 size', 'baltic' ),
	'section'     => 'baltic_heading_font_section',
	'default'     => array(
		'font-size'      => '1.5rem',
		'line-height'    => '1.2',
	),
	'transport'   => 'auto',
	'priority'    => 10,
	'output' => array(
		array(
			'element'  => 'h4'
		)
	),
) );

Kirki::add_field( 'baltic', array(
	'type'        => 'typography',
	'settings'    => 'heading5_size',
	'label'       => esc_attr__( 'H5 size', 'baltic' ),
	'section'     => 'baltic_heading_font_section',
	'default'     => array(
		'font-size'      => '1.25rem',
		'line-height'    => '1.2',
	),
	'transport'   => 'auto',
	'priority'    => 10,
	'output' => array(
		array(
			'element'  => 'h5'
		)
	),
) );

Kirki::add_field( 'baltic', array(
	'type'        => 'typography',
	'settings'    => 'heading6_size',
	'label'       => esc_attr__( 'H6 size', 'baltic' ),
	'section'     => 'baltic_heading_font_section',
	'default'     => array(
		'font-size'      => '1rem',
		'line-height'    => '1.2',
	),
	'transport'   => 'auto',
	'priority'    => 10,
	'output' => array(
		array(
			'element'  => 'h6'
		)
	),
) );

Kirki::add_section( 'baltic_blockquote_font_section', array(
    'title'          => esc_attr__( 'Blockquote', 'baltic' ),
    'panel'          => 'baltic_typograhy_panel',
) );

Kirki::add_field( 'baltic', array(
	'type'        => 'typography',
	'settings'    => 'blockquote_font',
	'label'       => esc_attr__( 'Blockquote Fonts', 'baltic' ),
	'section'     => 'baltic_blockquote_font_section',
	'default'     => array(
		'font-family'    => '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif',
		'variant'        => '400',
		'font-size'      => '1rem',
		'line-height'    => '1.5',
		'letter-spacing' => '0',
		'subsets'        => '',
		'text-transform' => 'none',
	),
	'transport'   => 'auto',
	'priority'    => 10,
	'output' => array(
		array(
			'element'  => 'blockquote'
		)
	),
) );

/** Code fonts */
Kirki::add_section( 'baltic_code_font_section', array(
    'title'          => esc_attr__( 'Code', 'baltic' ),
    'panel'          => 'baltic_typograhy_panel',
) );

Kirki::add_field( 'baltic', array(
	'type'        => 'typography',
	'settings'    => 'code_font',
	'label'       => esc_attr__( 'Code Fonts', 'baltic' ),
	'section'     => 'baltic_code_font_section',
	'default'     => array(
		'font-family'    => 'Monaco,"Lucida Sans Typewriter","Lucida Typewriter","Courier New",Courier,monospace',
		'variant'        => '400',
		'font-size'      => '1rem',
		'line-height'    => '1.5',
		'letter-spacing' => '0',
		'subsets'        => '',
		'text-transform' => 'none',
	),
	'transport'   => 'auto',
	'priority'    => 10,
	'output' => array(
		array(
			'element'  => 'pre, code'
		)
	),
) );

/** Fonts color */
Kirki::add_section( 'baltic_font_color_section', array(
    'title'          => esc_attr__( 'Colors', 'baltic' ),
    'panel'          => 'baltic_typograhy_panel',
) );

Kirki::add_field( 'baltic', array(
	'type'        => 'color',
	'settings'    => 'color_bg_highlight',
	'label'       => __( 'Color Background Highlight', 'baltic' ),
	'section'     => 'baltic_font_color_section',
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
	'section'     => 'baltic_font_color_section',
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

Kirki::add_field( 'baltic', array(
	'type'        	=> 'color',
	'settings'    	=> 'color_text_primary',
	'label'       	=> __( 'Primary Text Color', 'baltic' ),
	'section'     	=> 'baltic_font_color_section',
	'default'     	=> $default['color_text_primary'],
	'transport'		=> 'auto',
	'output'		=> array(
		array(
			'element'  => baltic__text_color_primary(),
			'property' => 'color',
		),
	)
) );

Kirki::add_field( 'baltic', array(
	'type'        	=> 'color',
	'settings'    	=> 'color_text_secondary',
	'label'       	=> __( 'Secondary Text Color', 'baltic' ),
	'section'     	=> 'baltic_font_color_section',
	'default'     	=> $default['color_text_secondary'],
	'transport'		=> 'auto'
) );

Kirki::add_field( 'baltic', array(
	'type'        	=> 'color',
	'settings'    	=> 'color_text_field',
	'label'       	=> __( 'Text Field Color', 'baltic' ),
	'section'     	=> 'baltic_font_color_section',
	'default'     	=> $default['color_text_field'],
	'transport'		=> 'auto',
	'output'		=> array(
		array(
			'element'  => baltic__text_color_field(),
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
	'type'        => 'color',
	'settings'    => 'color_text_field_focus',
	'label'       => __( 'Text Field Focus Color', 'baltic' ),
	'section'     => 'baltic_font_color_section',
	'default'     => $default['color_text_field_focus'],
	'transport'		=> 'auto',
	'output'		=> array(
		array(
			'element'  => baltic__text_color_field_focus(),
			'property' => 'color',
		)
	)
) );

Kirki::add_field( 'baltic', array(
	'type'        => 'color',
	'settings'    => 'color_link_primary',
	'label'       => __( 'Color Link', 'baltic' ),
	'section'     => 'baltic_font_color_section',
	'default'     => $default['color_link_primary'],
) );

Kirki::add_field( 'baltic', array(
	'type'        => 'color',
	'settings'    => 'color_link_secondary',
	'label'       => __( 'Color Link Hover', 'baltic' ),
	'section'     => 'baltic_font_color_section',
	'default'     => $default['color_link_secondary'],
) );
