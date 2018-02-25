<?php
/**
 * Baltic Theme Settings
 *
 * @package Baltic
 */

$default = baltic_setting_default();

/** Preloader */
Kirki::add_section( 'baltic_preloader_section', array(
    'title'         => esc_attr__( 'Preloader', 'baltic' ),
    'panel'         => 'baltic_setting_panel',
) );

Kirki::add_field( 'baltic', array(
	'type' 			=> 'switch',
	'settings'    	=> 'preloader',
	'label'       	=> __( 'Enable Preloader', 'baltic' ),
	'section'     	=> 'baltic_preloader_section',
	'default'     	=> '1',
	'priority'    	=> 10,
	'choices'     	=> array(
		'on'  => esc_attr__( 'On', 'baltic' ),
		'off' => esc_attr__( 'Off', 'baltic' ),
	),
) );

Kirki::add_field( 'baltic', array(
	'type'        => 'select',
	'settings'    => 'preloader_type',
	'label'       => __( 'Preloader Effect', 'baltic' ),
	'section'     => 'baltic_preloader_section',
	'default'     => $default['preloader_type'],
	'multiple'    => 1,
	'choices'     => array(
		"rotating-plane"	=> esc_attr__( 'rotating-plane', 'baltic' ),
		"double-bounce"		=> esc_attr__( 'double-bounce', 'baltic' ),
		"wave"				=> esc_attr__( 'wave', 'baltic' ),
		"wandering-cubes"	=> esc_attr__( 'wandering-cubes', 'baltic' ),
		"pulse"				=> esc_attr__( 'pulse', 'baltic' ),
		"chasing-dots"		=> esc_attr__( 'chasing-dots', 'baltic' ),
		"three-bounce"		=> esc_attr__( 'three-bounce', 'baltic' ),
		"circle"			=> esc_attr__( 'circle', 'baltic' ),
		"cube-grid"			=> esc_attr__( 'cube-grid', 'baltic' ),
		"fading-circle"		=> esc_attr__( 'fading-circle', 'baltic' ),
		"folding-cube"		=> esc_attr__( 'folding-cube', 'baltic' ),
	),
	'active_callback'    => array(
		array(
			'setting'  => 'preloader',
			'operator' => '==',
			'value'    => true,
		),
	),
	'partial_refresh' => array(
		'preloader_type' => array(
			'selector'        		=> '.spinner',
			'render_callback' 		=> function() {
				return baltic_get_preloader();
			},
			'container_inclusive' 	=> true
		),
	),
) );

Kirki::add_field( 'baltic', array(
	'type'        	=> 'color',
	'settings'    	=> 'preloader_bg_color',
	'label'       	=> __( 'Preloader background color', 'baltic' ),
	'section'     	=> 'baltic_preloader_section',
	'default'     	=> $default['preloader_bg_color'],
	'priority'    	=> 10,
	'choices'     	=> array( 'alpha' => true ),
	'transport'		=> 'auto',
	'active_callback'    => array(
		array(
			'setting'  => 'preloader',
			'operator' => '==',
			'value'    => true,
		),
	),
	'output' => array(
		array(
			'element'  => '.js .site-preloader',
			'property' => 'background-color',
		),
	),
) );

Kirki::add_field( 'baltic', array(
	'type'        	=> 'color',
	'settings'    	=> 'preloader_color',
	'label'       	=> __( 'Preloader color', 'baltic' ),
	'section'     	=> 'baltic_preloader_section',
	'default'     	=> $default['preloader_color'],
	'priority'    	=> 10,
	'choices'     	=> array( 'alpha' => true ),
	'transport'		=> 'auto',
	'active_callback'    => array(
		array(
			'setting'  => 'preloader',
			'operator' => '==',
			'value'    => true,
		),
	),
	'output'   		=> array(
		array(
			'element'  => '.sk-rotating-plane, .sk-double-bounce .sk-child, .sk-wave .sk-rect, .sk-wandering-cubes .sk-cube, .sk-spinner-pulse, .sk-chasing-dots .sk-child, .sk-three-bounce .sk-child, .sk-circle .sk-child:before, .sk-cube-grid .sk-cube, .sk-fading-circle .sk-circle:before, .sk-folding-cube .sk-cube:before',
			'property' => 'background-color',
		),
	),
) );

Kirki::add_field( 'baltic', array(
	'type'        	=> 'switch',
	'settings'    	=> 'show_preloader',
	'label'       	=> __( 'Preview Preloader', 'baltic' ),
	'section'     	=> 'baltic_preloader_section',
	'default'     	=> false,
	'transport'		=> 'postMessage',
	'active_callback'    => array(
		array(
			'setting'  => 'preloader',
			'operator' => '==',
			'value'    => true,
		),
	),
	'choices'     => array(
		'on'  => esc_attr__( 'Show', 'baltic' ),
		'off' => esc_attr__( 'Hide', 'baltic' ),
	),
) );

/** Layout */
Kirki::add_section( 'baltic_layout_section', array(
    'title'         => esc_attr__( 'Layout', 'baltic' ),
    'panel'         => 'baltic_setting_panel',
    'priority' 		=> 99
) );

Kirki::add_field( 'baltic', array(
	'type'        	=> 'select',
	'settings'    	=> 'layout_archive',
	'label'       	=> __( 'Archives Layout', 'baltic' ),
	'section'     	=> 'baltic_layout_section',
	'default'     	=> $default['layout_archive'],
	'transport'		=> 'postMessage',
	'choices' 		=> baltic_get_main_layout(),
) );

Kirki::add_field( 'baltic', array(
	'type'        	=> 'select',
	'settings'    	=> 'layout_singular',
	'label'       	=> __( 'Single Post/Page Layout', 'baltic' ),
	'section'     	=> 'baltic_layout_section',
	'default'     	=> $default['layout_singular'],
	'transport'		=> 'postMessage',
	'choices' 		=> baltic_get_main_layout(),
) );

/** Blog Posts */
Kirki::add_section( 'baltic_blog_section', array(
    'title'         => esc_attr__( 'Blog Post', 'baltic' ),
    'panel'         => 'baltic_setting_panel',
    'priority' 		=> 99
) );

Kirki::add_field( 'baltic', array(
	'type'        	=> 'checkbox',
	'settings'    	=> 'meta_date',
	'label'       	=> esc_attr__( 'Display Date?', 'baltic' ),
	'section'     	=> 'baltic_blog_section',
	'default'     	=> $default['meta_date'],
	'transport'		=> 'postMessage',
) );

Kirki::add_field( 'baltic', array(
	'type'        	=> 'checkbox',
	'settings'    	=> 'meta_author',
	'label'       	=> esc_attr__( 'Display Author?', 'baltic' ),
	'section'     	=> 'baltic_blog_section',
	'default'     	=> $default['meta_author'],
	'transport'		=> 'postMessage',
) );

Kirki::add_field( 'baltic', array(
	'type'        	=> 'checkbox',
	'settings'    	=> 'meta_comment',
	'label'       	=> esc_attr__( 'Display Comments?', 'baltic' ),
	'section'     	=> 'baltic_blog_section',
	'default'     	=> $default['meta_comment'],
	'transport'		=> 'postMessage',
) );

Kirki::add_field( 'baltic', array(
	'type'        	=> 'checkbox',
	'settings'    	=> 'meta_categories',
	'label'       	=> esc_attr__( 'Display Categories?', 'baltic' ),
	'section'     	=> 'baltic_blog_section',
	'default'     	=> $default['meta_categories'],
	'transport'		=> 'postMessage',
) );

Kirki::add_field( 'baltic', array(
	'type'        	=> 'checkbox',
	'settings'    	=> 'meta_tags',
	'label'       	=> esc_attr__( 'Display Tags?', 'baltic' ),
	'section'     	=> 'baltic_blog_section',
	'default'     	=> $default['meta_tags'],
	'transport'		=> 'postMessage',
) );

Kirki::add_field( 'baltic', array(
	'type'        	=> 'checkbox',
	'settings'    	=> 'author_profile',
	'label'       	=> esc_attr__( 'Display Author Profile?', 'baltic' ),
	'section'     	=> 'baltic_blog_section',
	'default'     	=> $default['author_profile'],
	'transport'		=> 'postMessage',
) );

Kirki::add_field( 'baltic', array(
	'type'        	=> 'number',
	'settings'    	=> 'excerpt_length',
	'label'       	=> esc_attr__( 'Excerpt Length', 'baltic' ),
	'section'     	=> 'baltic_blog_section',
	'default'     	=> $default['excerpt_length'],
	'choices'     	=> array(
		'min'  => 0,
		'max'  => 9999,
		'step' => 1,
	),
	'transport'		=> 'postMessage',
	'partial_refresh' => array(
		'excerpt_length' => array(
			'selector'        		=> '.content-area:not(.is-woocommerce) .site-main',
			'render_callback' 		=> function() {
				return baltic_loop_index();
			}
		),
	),
) );

Kirki::add_field( 'baltic', array(
	'type'        	=> 'text',
	'settings'    	=> 'more_link_text',
	'label'       	=> esc_attr__( 'More Link Text', 'baltic' ),
	'section'     	=> 'baltic_blog_section',
	'default'     	=> $default['more_link_text'],
	'transport'		=> 'postMessage',
) );

Kirki::add_field( 'baltic', array(
	'type'        	=> 'select',
	'settings'    	=> 'posts_nav',
	'label'       	=> __( 'Posts Navigation Type', 'baltic' ),
	'section'     	=> 'baltic_blog_section',
	'default'     	=> $default['posts_nav'],
	'transport'		=> 'postMessage',
	'choices' 		=> array(
		'posts_navigation'  => esc_attr__( 'Previous/Next', 'baltic' ),
		'posts_pagination' 	=> esc_attr__( 'Pagination', 'baltic' ),
	),
	'partial_refresh' => array(
		'posts_nav' => array(
			'selector'        		=> '.content-area:not(.is-woocommerce) .navigation ',
			'render_callback' 		=> function() {
				return baltic_posts_navigation();
			},
			'container_inclusive' 	=> true
		),
	),
) );

Kirki::add_field( 'baltic', array(
	'type'        	=> 'text',
	'settings'    	=> 'posts_nav_prev',
	'label'       	=> esc_attr__( 'Previous Post Text', 'baltic' ),
	'section'     	=> 'baltic_blog_section',
	'default'     	=> $default['posts_nav_prev'],
	'transport'		=> 'postMessage',
	'active_callback'    => array(
		array(
			'setting'  => 'posts_nav',
			'operator' => '==',
			'value'    => 'posts_navigation',
		),
	),
) );

Kirki::add_field( 'baltic', array(
	'type'        	=> 'text',
	'settings'    	=> 'posts_nav_next',
	'label'       	=> esc_attr__( 'Next Post Text', 'baltic' ),
	'section'     	=> 'baltic_blog_section',
	'default'     	=> $default['posts_nav_next'],
	'transport'		=> 'postMessage',
	'active_callback'    => array(
		array(
			'setting'  => 'posts_nav',
			'operator' => '==',
			'value'    => 'posts_navigation',
		),
	),
) );


/** Footer */
Kirki::add_section( 'baltic_footer_section', array(
    'title'         => esc_attr__( 'Footer', 'baltic' ),
    'panel'         => 'baltic_setting_panel',
    'priority' 		=> 99
) );

Kirki::add_field( 'baltic', array(
	'type'        => 'textarea',
	'settings'    => 'footer_text',
	'label'       => esc_attr__( 'Footer Text', 'baltic' ),
	'section'     => 'baltic_footer_section',
	'default'     => $default['footer_text'],
	'partial_refresh' => array(
		'footer_text' => array(
			'selector'        		=> '.site-footer .site-info',
			'render_callback' 		=> function() {
				return baltic_footer_copyright();
			},
			'container_inclusive' 	=> true
		),
	),
) );

Kirki::add_field( 'baltic', array(
	'type' 			=> 'switch',
	'settings'    	=> 'footer_credits',
	'label'       	=> __( 'Display theme designer?', 'baltic' ),
	'section'     	=> 'baltic_footer_section',
	'default'     	=> $default['footer_credits'],
	'transport'		=> 'postMessage',
	'choices'     	=> array(
		'on'  => esc_attr__( 'On', 'baltic' ),
		'off' => esc_attr__( 'Off', 'baltic' ),
	)
) );

Kirki::add_field( 'baltic', array(
	'type' 			=> 'switch',
	'settings'    	=> 'return_top',
	'label'       	=> __( 'Enable return to top link?', 'baltic' ),
	'section'     	=> 'baltic_footer_section',
	'default'     	=> $default['return_top'],
	'transport'		=> 'postMessage',
	'choices'     	=> array(
		'on'  => esc_attr__( 'On', 'baltic' ),
		'off' => esc_attr__( 'Off', 'baltic' ),
	)
) );
