<?php
/**
 * General settings.
 *
 * @package Baltic
 */

/**
 * Baltic general settings class.
 *
 * @since  1.0.0
 */
class Baltic_Settings_General {

	/**
	 * Holds the theme instance.
	 *
	 * @access private
	 * @static
	 *
	 * @var Baltic_Settings_General
	 */
	private static $_instance;

	/**
	 * Holds settings defaults, populated in constructor.
	 *
	 * @access private
	 * @var array
	 */
	private $default;

	/**
	 * Ensures only one instance of the theme class is loaded or can be loaded.
	 *
	 * @access public
	 * @static
	 *
	 * @return Baltic_Settings_General An instance of the class.
	 */
	public static function instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}

		return self::$_instance;

	}

	/**
	 * Constructor.
	 */
	public function __construct() {

		$this->default = Baltic_Options::defaults();

		add_filter( 'kirki_config', array( $this, 'config' ) );
		add_filter( 'kirki_dynamic_css_method', array( $this, 'use_css_file' ) );
		add_action( 'init', array( $this, 'add_config' ) );

		add_action( 'init', array( $this, 'preloader' ) );
		add_action( 'init', array( $this, 'layout' ) );
		add_action( 'init', array( $this, 'blog_post' ) );
		add_action( 'init', array( $this, 'footer' ) );

	}

	/**
	 * Kirki config
	 *
	 * @param  arrya $config kirki config
	 * @return array
	 */
	public function config( $config ) {

		return wp_parse_args( array(
			'disable_loader'	=> true
		), $config );

	}

	/**
	 * Use css file instead of print css.
	 *
	 * @return string file
	 */
	public function use_css_file() {
		return 'file';
	}

	/**
	 * [add_config description]
	 */
	public function add_config() {

		Baltic_Kirki::add_config( 'baltic', array(
			'capability'  => 'edit_theme_options',
			'option_type' => 'theme_mod',
		) );

	}

	/**
	 * Preloader settings.
	 *
	 * @return [type] [description]
	 */
	public function preloader() {

		Baltic_Kirki::add_section( 'baltic_preloader_section', array(
		    'title'         => esc_attr__( 'Preloader', 'baltic' ),
		    'panel'         => 'baltic_setting_panel',
		) );

		Baltic_Kirki::add_field( 'baltic', array(
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

		Baltic_Kirki::add_field( 'baltic', array(
			'type'        => 'select',
			'settings'    => 'preloader_type',
			'label'       => __( 'Preloader Effect', 'baltic' ),
			'section'     => 'baltic_preloader_section',
			'default'     => $this->default['preloader_type'],
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
			'transport'			=> 'auto',
			'partial_refresh' 	=> array(
				'preloader_type' => array(
					'selector'        		=> '.spinner',
					'render_callback' 		=> array( 'Baltic_Components', 'get_preloader' ),
					'container_inclusive' 	=> true
				),
			),
		) );

		Baltic_Kirki::add_field( 'baltic', array(
			'type'        	=> 'color',
			'settings'    	=> 'preloader_bg_color',
			'label'       	=> __( 'Preloader background color', 'baltic' ),
			'section'     	=> 'baltic_preloader_section',
			'default'     	=> $this->default['preloader_bg_color'],
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
					'element'  => '.site-preloader',
					'property' => 'background-color',
				),
			),
		) );

		Baltic_Kirki::add_field( 'baltic', array(
			'type'        	=> 'color',
			'settings'    	=> 'preloader_color',
			'label'       	=> __( 'Preloader color', 'baltic' ),
			'section'     	=> 'baltic_preloader_section',
			'default'     	=> $this->default['preloader_color'],
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
					'element'  => Baltic_CSS::preloader(),
					'property' => 'background-color',
				),
			),
		) );

		Baltic_Kirki::add_field( 'baltic', array(
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

	}

	/**
	 * Layout settings.
	 *
	 * @return void
	 */
	public function layout() {

		Baltic_Kirki::add_section( 'baltic_layout_section', array(
		    'title'         => esc_attr__( 'Layout', 'baltic' ),
		    'panel'         => 'baltic_setting_panel',
		    'priority' 		=> 99
		) );

		Baltic_Kirki::add_field( 'baltic', array(
			'type'        	=> 'select',
			'settings'    	=> 'layout_archive',
			'label'       	=> __( 'Archives Layout', 'baltic' ),
			'section'     	=> 'baltic_layout_section',
			'default'     	=> $this->default['layout_archive'],
			'transport'		=> 'postMessage',
			'choices' 		=> Baltic_Utility::get_main_layout(),
		) );

		Baltic_Kirki::add_field( 'baltic', array(
			'type'        	=> 'select',
			'settings'    	=> 'layout_post',
			'label'       	=> __( 'Single Post Layout', 'baltic' ),
			'section'     	=> 'baltic_layout_section',
			'default'     	=> $this->default['layout_post'],
			'transport'		=> 'postMessage',
			'choices' 		=> Baltic_Utility::get_main_layout(),
		) );

		Baltic_Kirki::add_field( 'baltic', array(
			'type'        	=> 'select',
			'settings'    	=> 'layout_page',
			'label'       	=> __( 'Single Page Layout', 'baltic' ),
			'section'     	=> 'baltic_layout_section',
			'default'     	=> $this->default['layout_page'],
			'transport'		=> 'postMessage',
			'choices' 		=> Baltic_Utility::get_main_layout(),
		) );

	}

	/**
	 * Blog settings.
	 *
	 * @return void
	 */
	public function blog_post() {

		Baltic_Kirki::add_section( 'baltic_blog_section', array(
		    'title'         => esc_attr__( 'Blog Post', 'baltic' ),
		    'panel'         => 'baltic_setting_panel',
		    'priority' 		=> 99
		) );

		Baltic_Kirki::add_field( 'baltic', array(
			'type'        => 'image',
			'settings'    => 'thumb_placeholder',
			'label'       => esc_attr__( 'Post thumbnail placeholder', 'baltic' ),
			'section'     => 'baltic_blog_section',
			'default'     => '',
			'choices'     => array(
				'save_as' => 'id',
			),
		) );

		Baltic_Kirki::add_field( 'baltic', array(
			'type'        	=> 'checkbox',
			'settings'    	=> 'meta_date',
			'label'       	=> esc_attr__( 'Display Date?', 'baltic' ),
			'section'     	=> 'baltic_blog_section',
			'default'     	=> $this->default['meta_date'],
			'transport'		=> 'postMessage',
		) );

		Baltic_Kirki::add_field( 'baltic', array(
			'type'        	=> 'checkbox',
			'settings'    	=> 'meta_author',
			'label'       	=> esc_attr__( 'Display Author?', 'baltic' ),
			'section'     	=> 'baltic_blog_section',
			'default'     	=> $this->default['meta_author'],
			'transport'		=> 'postMessage',
		) );

		Baltic_Kirki::add_field( 'baltic', array(
			'type'        	=> 'checkbox',
			'settings'    	=> 'meta_comment',
			'label'       	=> esc_attr__( 'Display Comments?', 'baltic' ),
			'section'     	=> 'baltic_blog_section',
			'default'     	=> $this->default['meta_comment'],
			'transport'		=> 'postMessage',
		) );

		Baltic_Kirki::add_field( 'baltic', array(
			'type'        	=> 'checkbox',
			'settings'    	=> 'meta_categories',
			'label'       	=> esc_attr__( 'Display Categories?', 'baltic' ),
			'section'     	=> 'baltic_blog_section',
			'default'     	=> $this->default['meta_categories'],
			'transport'		=> 'postMessage',
		) );

		Baltic_Kirki::add_field( 'baltic', array(
			'type'        	=> 'checkbox',
			'settings'    	=> 'meta_tags',
			'label'       	=> esc_attr__( 'Display Tags?', 'baltic' ),
			'section'     	=> 'baltic_blog_section',
			'default'     	=> $this->default['meta_tags'],
			'transport'		=> 'postMessage',
		) );

		Baltic_Kirki::add_field( 'baltic', array(
			'type'        	=> 'checkbox',
			'settings'    	=> 'author_profile',
			'label'       	=> esc_attr__( 'Display Author Profile?', 'baltic' ),
			'section'     	=> 'baltic_blog_section',
			'default'     	=> $this->default['author_profile'],
			'transport'		=> 'postMessage',
		) );

		Baltic_Kirki::add_field( 'baltic', array(
			'type'        	=> 'number',
			'settings'    	=> 'excerpt_length',
			'label'       	=> esc_attr__( 'Excerpt Length', 'baltic' ),
			'section'     	=> 'baltic_blog_section',
			'default'     	=> $this->default['excerpt_length'],
			'choices'     	=> array(
				'min'  => 0,
				'max'  => 9999,
				'step' => 1,
			),
			'transport'		=> 'postMessage',
			'partial_refresh' => array(
				'excerpt_length' => array(
					'selector'        		=> '.content-area:not(.is-woocommerce) .site-main',
					'render_callback' 		=> array( 'Baltic_Components', 'loop_index' )
				),
			),
		) );

		Baltic_Kirki::add_field( 'baltic', array(
			'type'        	=> 'text',
			'settings'    	=> 'more_link_text',
			'label'       	=> esc_attr__( 'More Link Text', 'baltic' ),
			'section'     	=> 'baltic_blog_section',
			'default'     	=> $this->default['more_link_text'],
			'transport'		=> 'postMessage',
		) );

		Baltic_Kirki::add_field( 'baltic', array(
			'type'        	=> 'select',
			'settings'    	=> 'nav_posts',
			'label'       	=> __( 'Posts Navigation Type', 'baltic' ),
			'section'     	=> 'baltic_blog_section',
			'default'     	=> $this->default['nav_posts'],
			'transport'		=> 'postMessage',
			'choices' 		=> array(
				'posts_navigation'  => esc_attr__( 'Previous/Next', 'baltic' ),
				'posts_pagination' 	=> esc_attr__( 'Pagination', 'baltic' ),
			),
			'partial_refresh' => array(
				'nav_posts' => array(
					'selector'        		=> '.content-area:not(.is-woocommerce) .navigation ',
					'render_callback' 		=> array( 'Baltic_Components', 'nav_posts' ),
					'container_inclusive' 	=> true
				),
			),
		) );

		Baltic_Kirki::add_field( 'baltic', array(
			'type'        	=> 'text',
			'settings'    	=> 'nav_posts_prev',
			'label'       	=> esc_attr__( 'Previous Post Text', 'baltic' ),
			'section'     	=> 'baltic_blog_section',
			'default'     	=> $this->default['nav_posts_prev'],
			'transport'		=> 'postMessage',
			'active_callback'    => array(
				array(
					'setting'  => 'nav_posts',
					'operator' => '===',
					'value'    => 'posts_navigation',
				),
			),
		) );

		Baltic_Kirki::add_field( 'baltic', array(
			'type'        	=> 'text',
			'settings'    	=> 'nav_posts_next',
			'label'       	=> esc_attr__( 'Next Post Text', 'baltic' ),
			'section'     	=> 'baltic_blog_section',
			'default'     	=> $this->default['nav_posts_next'],
			'transport'		=> 'postMessage',
			'active_callback'    => array(
				array(
					'setting'  => 'nav_posts',
					'operator' => '===',
					'value'    => 'posts_navigation',
				),
			),
		) );

	}

	/**
	 * Footer Settings.
	 *
	 * @return [type] [description]
	 */
	public function footer() {

		Baltic_Kirki::add_section( 'baltic_footer_section', array(
		    'title'         => esc_attr__( 'Footer', 'baltic' ),
		    'panel'         => 'baltic_setting_panel',
		    'priority' 		=> 99
		) );

		Baltic_Kirki::add_field( 'baltic', array(
			'type'        	=> 'number',
			'settings'    	=> 'footer_widgets_col',
			'label'       	=> esc_attr__( 'Footer widgets columns', 'baltic' ),
			'section'     	=> 'baltic_footer_section',
			'default'     	=> $this->default['footer_widgets_col'],
			'choices'     	=> array(
				'min'  => 1,
				'max'  => 6,
				'step' => 1,
			),
			'transport'		=> 'postMessage',
			'partial_refresh' => array(
				'footer_widgets_col' => array(
					'selector'        		=> '#tertiary',
					'render_callback' 		=> array( 'Baltic_Components', 'sidebar_footer' ),
					'container_inclusive' 	=> true
				),
			),
		) );

		Baltic_Kirki::add_field( 'baltic', array(
			'type'        => 'textarea',
			'settings'    => 'footer_text',
			'label'       => esc_attr__( 'Footer Text', 'baltic' ),
			'section'     => 'baltic_footer_section',
			'default'     => $this->default['footer_text'],
			'partial_refresh' => array(
				'footer_text' => array(
					'selector'        		=> '.site-footer .site-info',
					'render_callback' 		=> array( 'Baltic_Components', 'footer_copyright' ),
					'container_inclusive' 	=> true
				),
			),
		) );

		Baltic_Kirki::add_field( 'baltic', array(
			'type' 			=> 'switch',
			'settings'    	=> 'footer_credits',
			'label'       	=> __( 'Display theme designer?', 'baltic' ),
			'section'     	=> 'baltic_footer_section',
			'default'     	=> $this->default['footer_credits'],
			'transport'		=> 'postMessage',
			'choices'     	=> array(
				'on'  => esc_attr__( 'On', 'baltic' ),
				'off' => esc_attr__( 'Off', 'baltic' ),
			)
		) );

		Baltic_Kirki::add_field( 'baltic', array(
			'type'        	=> 'select',
			'settings'    	=> 'payment_icons',
			'label'       	=> __( 'Payment icons', 'baltic' ),
			'section'     	=> 'baltic_footer_section',
			'default'     	=> '',
			'multiple'    	=> 13,
			'choices'     	=> Baltic_Utility::get_payment_icons(),
			'transport' 	=> 'auto',
			'partial_refresh' => array(
				'payment_icons' => array(
					'selector'        		=> '.footer-payments-card',
					'render_callback' 		=> array( 'Baltic_Components', 'payment_icons' ),
					'container_inclusive' 	=> true
				),
			),
		) );

	}

}
