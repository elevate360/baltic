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
		'font-family'    => 'sans-serif',
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
		'font-family'    => 'sans-serif',
		'variant'        => '500',
		'letter-spacing' => '0',
		'subsets'        => '',
		'text-transform' => 'none',
	),
	'transport'   => 'auto',
	'priority'    => 10,
	'output' => array(
		array(
			'element'  => 'h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6'
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
		'font-family'    => 'sans-serif',
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
		'variant'        => '',
		'font-size'      => '0.875rem',
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
