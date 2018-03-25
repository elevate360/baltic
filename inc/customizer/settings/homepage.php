<?php
/**
 * Homepage settings
 *
 * @package Baltic
 */

function baltic_customize_register_homepage() {

	$default = baltic_setting_default();

	/** Homepage Slider panel*/
	Kirki::add_panel( 'baltic_homepage_slider_panel', array(
	    'title' 			=> esc_html__( 'Homepage Slider', 'baltic' ),
	    'priority'			=> 10,
	    'active_callback'	=> 'baltic_is_homepage_template'
	) );

	/** Homepage Slider section*/
	Kirki::add_section( 'baltic_homepage_slider_section', array(
	    'title' 		=> esc_html__( 'Slides', 'baltic' ),
	    'panel' 		=> 'baltic_homepage_slider_panel'
	) );

		Kirki::add_field( 'baltic', array(
			'type'        => 'repeater',
			'label'       => esc_html__( 'Slider', 'baltic' ),
			'section'     => 'baltic_homepage_slider_section',
			'priority'    => 10,
			'row_label' => array(
				'type' => 'text',
				'value' => esc_html__( 'slide', 'baltic' ),
			),
			'settings'    => 'baltic_homepage_slider',
			'default'     => array(
				array(
					'title' 		=> esc_html__( 'Slide title #1', 'baltic' ),
					'description'  	=> esc_html__( 'Slide description #1', 'baltic' ),
					'image'			=> '',
					'btn_text_1'	=> esc_html__( 'Button text #1A', 'baltic' ),
					'btn_link_1'	=> '#',
					'btn_text_2'	=> esc_html__( 'Button text #1B', 'baltic' ),
					'btn_link_2'	=> '#',
				),
				array(
					'title' 		=> esc_html__( 'Slide title #2', 'baltic' ),
					'description'  	=> esc_html__( 'Slide description #2', 'baltic' ),
					'image'			=> '',
					'btn_text_1'	=> esc_html__( 'Button text #2A', 'baltic' ),
					'btn_link_1'	=> '#',
					'btn_text_2'	=> esc_html__( 'Button text #2B', 'baltic' ),
					'btn_link_2'	=> '#',
				),
			),
			'fields' => array(
				'title' => array(
					'type'        => 'text',
					'label'       => esc_html__( 'Title', 'baltic' ),
					'default'     => esc_html__( 'Slide title', 'baltic' ),
				),
				'description' => array(
					'type'        => 'textarea',
					'label'       => esc_html__( 'Description', 'baltic' ),
					'default'     => esc_html__( 'Slide description', 'baltic' ),
				),
				'image' => array(
					'type'        => 'image',
					'label'       => esc_html__( 'Image', 'baltic' ),
					'default'     => '',
				),
				'btn_text_1' => array(
					'type'        => 'text',
					'label'       => esc_html__( 'Button Text #1', 'baltic' ),
					'default'     => esc_html__( 'Button text', 'baltic' ),
				),
				'btn_link_1' => array(
					'type'        => 'url',
					'label'       => esc_html__( 'Button Link #1', 'baltic' ),
					'default'     => '#',
				),
				'btn_text_2' => array(
					'type'        => 'text',
					'label'       => esc_html__( 'Button Text #2', 'baltic' ),
					'default'     => '',
				),
				'btn_link_2' => array(
					'type'        => 'url',
					'label'       => esc_html__( 'Button Link #2', 'baltic' ),
					'default'     => '',
				),
			),
			'transport'	=> 'auto',
			'partial_refresh' => array(
				'baltic_homepage_slider' => array(
					'selector'        		=> '.baltic-homepage-slider',
					'render_callback' 		=> 'baltic_homepage_slider',
					'container_inclusive' 	=> true
				),
			),
		) );

	/** Homepage Slider section*/
	Kirki::add_section( 'baltic_homepage_slider_setting', array(
	    'title' 		=> esc_html__( 'Slides Setting', 'baltic' ),
	    'panel' 		=> 'baltic_homepage_slider_panel'
	) );

		Kirki::add_field( 'baltic', array(
			'type'        	=> 'color',
			'settings'    	=> 'baltic_homepage_slider_color',
			'label'       	=> __( 'Text color', 'baltic' ),
			'section'     	=> 'baltic_homepage_slider_setting',
			'default'     	=> $default['color_text_primary'],
			'choices'     	=> array( 'alpha' => true ),
			'transport'		=> 'auto',
			'output'		=> array(
				array(
					'element'  => '.slide-content',
					'property' => 'color',
				),
			)
		) );

		Kirki::add_field( 'baltic', array(
			'type'        => 'select',
			'settings'    => 'baltic_homepage_slider_effect',
			'label'       => __( 'Effect', 'baltic' ),
			'section'     => 'baltic_homepage_slider_setting',
			'default'     => 'true',
			'priority'    => 10,
			'multiple'    => 1,
			'choices'     => array(
				'true' 	=> esc_html__( 'Fade', 'baltic' ),
				'false' => esc_html__( 'Slide', 'baltic' )
			),
			'transport'	=> 'auto',
			'partial_refresh' => array(
				'baltic_homepage_slider_effect' => array(
					'selector'        		=> '.baltic-homepage-slider',
					'render_callback' 		=> 'baltic_homepage_slider',
					'container_inclusive' 	=> true
				),
			),
		) );

	$product_categories = array(
		'product_categories_1',
		'product_categories_2'
	);
	$count = 0;
	foreach ( $product_categories as $setting ) {

		$count++;
		Kirki::add_panel( 'baltic_homepage_' . $setting . '_panel', array(
		    'title' 		=> sprintf( esc_html__( 'Product Categories #%s', 'baltic' ), $count ),
		    'priority'		=> 10,
		    'active_callback'	=> 'baltic_is_homepage_template'
		) );

		Kirki::add_section( 'baltic_homepage_' . $setting . '_selector', array(
		    'title' 		=> esc_html__( 'Product categories', 'baltic' ),
		    'panel' 		=> 'baltic_homepage_' . $setting . '_panel'
		) );

			Kirki::add_field( 'baltic', array(
				'type'        	=> 'text',
				'settings'    	=> 'baltic_homepage_' . $setting . '_btn_text',
				'label'       	=> esc_attr__( 'Button text', 'baltic' ),
				'section'     	=> 'baltic_homepage_' . $setting . '_selector',
				'default'     	=> esc_html__( 'Shop Now', 'baltic' ),
				'transport'		=> 'auto',
				'partial_refresh' => array(
					'baltic_homepage' . $setting .'_btn_text' => array(
						'selector'        		=> '.baltic-homepage-' . str_replace( '_', '-', $setting ),
						'render_callback' 		=> 'baltic_homepage_' . $setting,
						'container_inclusive' 	=> true
					),
				),
			) );

	}

		Kirki::add_field( 'baltic', array(
			'type'        	=> 'select',
			'settings'    	=> 'baltic_homepage_product_categories_1',
			'label'       	=> __( 'Product Categories', 'baltic' ),
			'section'     	=> 'baltic_homepage_product_categories_1_selector',
			'default'     	=> '',
			'priority'    	=> 1,
			'multiple'    	=> 6,
			'choices'     	=> baltic_get_terms( 'product_cat' ),
			'transport' 	=> 'auto',
			'partial_refresh' => array(
				'baltic_homepage_product_categories_1' => array(
					'selector'        		=> '.baltic-homepage-product-categories-1',
					'render_callback' 		=> 'baltic_homepage_product_categories_1',
					'container_inclusive' 	=> true
				),
			),
		) );

		Kirki::add_field( 'baltic', array(
			'type'        	=> 'select',
			'settings'    	=> 'baltic_homepage_product_categories_2',
			'label'       	=> __( 'Product Categories', 'baltic' ),
			'section'     	=> 'baltic_homepage_product_categories_2_selector',
			'default'     	=> '',
			'priority'    	=> 1,
			'multiple'    	=> 999,
			'choices'     	=> baltic_get_terms( 'product_cat' ),
			'transport' 	=> 'auto',
			'partial_refresh' => array(
				'baltic_homepage_product_categories_2' => array(
					'selector'        		=> '.baltic-homepage-product-categories-2',
					'render_callback' 		=> 'baltic_homepage_product_categories_2',
					'container_inclusive' 	=> true
				),
			),
		) );

	$products = array(
		'products_1',
		'products_2',
		'products_3',
		'products_4',
	);
	$count = 0;
	foreach ( $products as $setting ) {

		$count++;
		Kirki::add_panel( 'baltic_homepage_' . $setting . '_panel', array(
		    'title' 			=> sprintf( esc_html__( 'Products #%s', 'baltic' ), $count ),
		    'priority'			=> 10,
		    'active_callback'	=> 'baltic_is_homepage_template'
		) );

		Kirki::add_section( 'baltic_homepage_' . $setting . '_property', array(
		    'title' 		=> esc_html__( 'Property', 'baltic' ),
		    'panel' 		=> 'baltic_homepage_' . $setting . '_panel',
		) );

			Kirki::add_field( 'baltic', array(
				'type'        	=> 'select',
				'settings'    	=> 'baltic_homepage_' . $setting .'_categories',
				'section'     	=> 'baltic_homepage_'. $setting .'_property',
				'label'       	=> __( 'Categories', 'baltic' ),
				'default'     	=> '',
				'multiple'    	=> 9999,
				'choices'     	=> baltic_get_terms_slug( 'product_cat' ),
				'transport' 	=> 'auto',
				'partial_refresh' => array(
					'baltic_homepage' . $setting .'_categories' => array(
						'selector'        		=> '.baltic-homepage-' . str_replace( '_', '-', $setting ),
						'render_callback' 		=> 'baltic_homepage_' . $setting,
						'container_inclusive' 	=> true
					),
				),
			) );

			Kirki::add_field( 'baltic', array(
				'type'        => 'select',
				'settings'    => 'baltic_homepage_'. $setting .'_orderby',
				'section'     => 'baltic_homepage_'. $setting .'_property',
				'label'       => esc_attr__( 'Orderby', 'baltic' ),
				'default'     => 'date',
				'choices'     => array(
					'date'			=> esc_html__( 'Date', 'baltic' ),
					'id'			=> esc_html__( 'ID', 'baltic' ),
					'menu_order'	=> esc_html__( 'Menu Order', 'baltic' ),
					'popularity'	=> esc_html__( 'Popularity', 'baltic' ),
					'rand'			=> esc_html__( 'Random', 'baltic' ),
					'rating'		=> esc_html__( 'Rating', 'baltic' ),
					'title'			=> esc_html__( 'Title', 'baltic' ),
				),
				'transport'		=> 'auto',
				'partial_refresh' => array(
					'baltic_homepage_' . $setting .'_orderby' => array(
						'selector'        		=> '.baltic-homepage-' . str_replace( '_', '-', $setting ),
						'render_callback' 		=> 'baltic_homepage_' . $setting,
						'container_inclusive' 	=> true
					),
				),
			) );

			Kirki::add_field( 'baltic', array(
				'type'        => 'select',
				'settings'    => 'baltic_homepage_'. $setting .'_order',
				'section'     => 'baltic_homepage_'. $setting .'_property',
				'label'       => esc_attr__( 'Order', 'baltic' ),
				'default'     => 'ASC',
				'choices'     => array(
					'ASC'			=> esc_html__( 'Lowest to highest', 'baltic' ),
					'DESC'			=> esc_html__( 'Highest to lowest', 'baltic' ),
				),
				'transport'		=> 'auto',
				'partial_refresh' => array(
					'baltic_homepage_' . $setting .'_order' => array(
						'selector'        		=> '.baltic-homepage-' . str_replace( '_', '-', $setting ),
						'render_callback' 		=> 'baltic_homepage_' . $setting,
						'container_inclusive' 	=> true
					),
				),
			) );

			Kirki::add_field( 'baltic', array(
				'type'        => 'select',
				'settings'    => 'baltic_homepage_'. $setting .'_visibility',
				'section'     => 'baltic_homepage_'. $setting .'_property',
				'label'       => esc_attr__( 'Visibility', 'baltic' ),
				'default'     => 'visible',
				'choices'     => array(
					'visible'	=> esc_html__( 'Visible', 'baltic' ),
					'catalog'	=> esc_html__( 'Catalog', 'baltic' ),
					'search'	=> esc_html__( 'Search', 'baltic' ),
					'hidden'	=> esc_html__( 'Hidden', 'baltic' ),
					'featured'  => esc_html__( 'Featured', 'baltic' ),
				),
				'transport'		=> 'auto',
				'partial_refresh' => array(
					'baltic_homepage_' . $setting .'_visibility' => array(
						'selector'        		=> '.baltic-homepage-' . str_replace( '_', '-', $setting ),
						'render_callback' 		=> 'baltic_homepage_' . $setting,
						'container_inclusive' 	=> true
					),
				),
			) );

			Kirki::add_field( 'baltic', array(
				'type'        => 'select',
				'settings'    => 'baltic_homepage_'. $setting .'_status',
				'section'     => 'baltic_homepage_'. $setting .'_property',
				'label'       => esc_attr__( 'Status', 'baltic' ),
				'default'     => '',
				'choices'     => array(
					''				=> esc_html__( 'Default', 'baltic' ),
					'on_sale'		=> esc_html__( 'On Sale', 'baltic' ),
					'best_selling'	=> esc_html__( 'Best Selling', 'baltic' ),
					'top_rated'		=> esc_html__( 'Top Rated', 'baltic' ),
				),
				'transport'		=> 'auto',
				'partial_refresh' => array(
					'baltic_homepage_' . $setting .'_status' => array(
						'selector'        		=> '.baltic-homepage-' . str_replace( '_', '-', $setting ),
						'render_callback' 		=> 'baltic_homepage_' . $setting,
						'container_inclusive' 	=> true
					),
				),
			) );

	}

	$posts = array(
		'posts_1',
		'posts_2'
	);
	$count = 0;
	foreach ( $posts as $setting ) {

		$count++;
		Kirki::add_panel( 'baltic_homepage_' . $setting . '_panel', array(
		    'title' 		=> sprintf( esc_html__( 'Posts #%s', 'baltic' ), $count ),
		    'priority'		=> 10,
		    'active_callback'	=> 'baltic_is_homepage_template'
		) );

		Kirki::add_section( 'baltic_homepage_' . $setting . '_section', array(
		    'title' 		=> esc_html__( 'Categories', 'baltic' ),
		    'panel' 		=> 'baltic_homepage_' . $setting . '_panel'
		) );

			Kirki::add_field( 'baltic', array(
				'type'        	=> 'select',
				'settings'    	=> 'baltic_homepage_' . $setting ,
				'section'     	=> 'baltic_homepage_'. $setting .'_section',
				'label'       	=> __( 'Categories', 'baltic' ),
				'default'     	=> '',
				'priority'    	=> 1,
				'multiple'    	=> 999,
				'choices'     	=> baltic_get_terms( 'category' ),
				'transport' 	=> 'auto',
				'partial_refresh' => array(
					'baltic_homepage_' . $setting => array(
						'selector'        		=> '.baltic-homepage-' . str_replace( '_', '-', $setting ),
						'render_callback' 		=> 'baltic_homepage_' . $setting,
						'container_inclusive' 	=> true
					),
				),
			) );

	}

	/** Latest tweets panel*/
	Kirki::add_panel( 'baltic_homepage_latest_tweets_panel', array(
	    'title' 			=> esc_html__( 'Latest Tweets', 'baltic' ),
	    'priority'			=> 10,
	    'active_callback'	=> 'baltic_is_homepage_template'
	) );

	Kirki::add_section( 'baltic_homepage_latest_tweets_section', array(
	    'title' 		=> esc_html__( 'Latest Tweets', 'baltic' ),
	    'panel' 		=> 'baltic_homepage_latest_tweets_panel'
	) );

			Kirki::add_field( 'baltic', array(
				'type'        	=> 'text',
				'settings'    	=> 'baltic_homepage_latest_tweets_handle',
				'label'       	=> esc_attr__( 'Twitter Username', 'baltic' ),
				'section'     	=> 'baltic_homepage_latest_tweets_section',
				'default'     	=> '',
				'transport'		=> 'auto',
				'partial_refresh' => array(
					'baltic_homepage_latest_tweets_handle' => array(
						'selector'        		=> '.baltic-homepage-latest-tweets',
						'render_callback' 		=> 'baltic_homepage_latest_tweets',
						'container_inclusive' 	=> true
					),
				),
			) );

	$displays = array(
		'product_categories_2',
		'products_1',
		'products_2',
		'products_3',
		'products_4',
		'posts_1',
		'posts_2',
		'testimonial',
		'latest_tweets'
	);
	foreach( $displays as $setting ) {

		Kirki::add_section( 'baltic_homepage_' . $setting . '_display', array(
		    'title' 		=> esc_html__( 'Display', 'baltic' ),
		    'panel' 		=> 'baltic_homepage_' . $setting . '_panel',
		) );

			Kirki::add_field( 'baltic', array(
				'type'        => 'select',
				'settings'    => 'baltic_homepage_'. $setting .'_display',
				'section'     => 'baltic_homepage_'. $setting .'_display',
				'label'       => esc_attr__( 'Display', 'baltic' ),
				'default'     => 'grid',
				'choices'     => array(
					'grid'		=> esc_html__( 'Grid', 'baltic' ),
					'slider'	=> esc_html__( 'Slideshow', 'baltic' ),
				),
				'transport'		=> 'auto',
				'partial_refresh' => array(
					'baltic_homepage_' . $setting .'_display' => array(
						'selector'        		=> '.baltic-homepage-' . str_replace( '_', '-', $setting ),
						'render_callback' 		=> 'baltic_homepage_' . $setting,
						'container_inclusive' 	=> true
					),
				),
			) );

			Kirki::add_field( 'baltic', array(
				'type'        	=> 'number',
				'settings'    	=> 'baltic_homepage_'. $setting .'_limit',
				'section'     	=> 'baltic_homepage_'. $setting .'_display',
				'label'       	=> esc_attr__( 'Limit', 'baltic' ),
				'default'     	=> 4,
				'choices'     	=> array(
					'min'  => 1,
					'max'  => 99999,
					'step' => 1,
				),
				'transport'		=> 'auto',
				'partial_refresh' => array(
					'baltic_homepage_' . $setting .'_limit' => array(
						'selector'        		=> '.baltic-homepage-' . str_replace( '_', '-', $setting ),
						'render_callback' 		=> 'baltic_homepage_' . $setting,
						'container_inclusive' 	=> true
					),
				),
			) );

			Kirki::add_field( 'baltic', array(
				'type'        	=> 'number',
				'settings'    	=> 'baltic_homepage_'. $setting .'_columns',
				'section'     	=> 'baltic_homepage_'. $setting .'_display',
				'label'       	=> esc_attr__( 'Columns', 'baltic' ),
				'default'     	=> 4,
				'choices'     	=> array(
					'min'  => 1,
					'max'  => 6,
					'step' => 1,
				),
				'transport'		=> 'auto',
				'partial_refresh' => array(
					'baltic_homepage_' . $setting .'_columns' => array(
						'selector'        		=> '.baltic-homepage-' . str_replace( '_', '-', $setting ),
						'render_callback' 		=> 'baltic_homepage_' . $setting,
						'container_inclusive' 	=> true
					),
				),
			) );

	}

	/** Descriptions settings */
	$descriptions = array(
		'product_categories_2',
		'products_1',
		'products_2',
		'products_3',
		'products_4',
		'posts_1',
		'posts_2',
		'testimonial',
		'latest_tweets'
	);
	foreach ( $descriptions as $setting ) {

		Kirki::add_section( 'baltic_homepage_' . $setting . '_description', array(
		    'title' 		=> esc_html__( 'Description', 'baltic' ),
		    'panel' 		=> 'baltic_homepage_' . $setting . '_panel',
		    'priority'		=> 5
		) );

			Kirki::add_field( 'baltic', array(
				'type'     			=> 'text',
				'settings' 			=> 'baltic_homepage_' . $setting . '_title',
				'section'  			=> 'baltic_homepage_' . $setting . '_description',
				'label'    			=> __( 'Title', 'baltic' ),
				'transport' 		=> 'auto',
				'partial_refresh' 	=> array(
					'baltic_homepage' . $setting . '_title' => array(
						'selector'        		=> '.baltic-homepage-' . str_replace( '_', '-', $setting ),
						'render_callback' 		=> 'baltic_homepage_' . $setting,
						'container_inclusive' 	=> true
					),
				),
			) );

			Kirki::add_field( 'baltic', array(
				'type'     			=> 'textarea',
				'settings' 			=> 'baltic_homepage_' . $setting . '_description',
				'section'  			=> 'baltic_homepage_' . $setting . '_description',
				'label'    			=> __( 'Description', 'baltic' ),
				'transport' 		=> 'auto',
				'partial_refresh' 	=> array(
					'baltic_homepage' . $setting . '_description' => array(
						'selector'        		=> '.baltic-homepage-' . str_replace( '_', '-', $setting ),
						'render_callback' 		=> 'baltic_homepage_' . $setting,
						'container_inclusive' 	=> true
					),
				),
			) );

			Kirki::add_field( 'baltic', array(
				'type'        		=> 'radio-buttonset',
				'settings' 			=> 'baltic_homepage_' . $setting . '_alignment',
				'section'  			=> 'baltic_homepage_' . $setting . '_description',
				'label'       		=> __( 'Text and description aligment', 'baltic' ),
				'default'     		=> 'left',
				'priority'    		=> 10,
				'choices'     		=> array(
					'left'   	=> esc_attr__( 'Left', 'baltic' ),
					'center' 	=> esc_attr__( 'Center', 'baltic' ),
					'right'  	=> esc_attr__( 'Right', 'baltic' ),
				),
				'transport' 		=> 'auto',
				'output'			=> array(
					array(
						'element'  => '.baltic-homepage-' . str_replace( '_', '-', $setting ) . ' .homepage-title, .baltic-homepage-' . str_replace( '_', '-', $setting ) . ' .homepage-description',
						'property' => 'text-align',
					)
				)
			) );

			Kirki::add_field( 'baltic', array(
				'type'        		=> 'color',
				'settings' 			=> 'baltic_homepage_' . $setting . '_color',
				'section'  			=> 'baltic_homepage_' . $setting . '_description',
				'label'       		=> __( 'Text and description color', 'baltic' ),
				'default'     		=> $default['color_text_primary'],
				'choices'     		=> array( 'alpha' => true ),
				'transport'			=> 'auto',
				'output'			=> array(
					array(
						'element'  => '.baltic-homepage-' . str_replace( '_', '-', $setting ) . ' .homepage-title, .baltic-homepage-' . str_replace( '_', '-', $setting ) . ' .homepage-description',
						'property' => 'color',
					)
				)
			) );
	}


	/** Background */
	$backgrounds = array(
		'slider',
		'product_categories_1',
		'product_categories_2',
		'products_1',
		'products_2',
		'products_3',
		'products_4',
		'posts_1',
		'posts_2',
		'testimonial',
		'latest_tweets'
	);
	foreach ( $backgrounds as $setting ) {

		Kirki::add_section( 'baltic_homepage_'. $setting .'_layout', array(
		    'title' 		=> esc_html__( 'Layout', 'baltic' ),
		    'panel' 		=> 'baltic_homepage_'. $setting .'_panel'
		) );

			Kirki::add_field( 'baltic', array(
				'type'        => 'select',
				'settings'    => 'baltic_homepage_'. $setting .'_layout',
				'label'       => esc_attr__( 'Layout', 'baltic' ),
				'section'     => 'baltic_homepage_'. $setting .'_layout',
				'default'     => 'boxed',
				'choices'     => array(
					'boxed'			=> esc_html__( 'Boxed', 'baltic' ),
					'full-width'	=> esc_html__( 'Full width', 'baltic' ),
				),
				'transport'		=> 'auto',
				'partial_refresh' => array(
					'baltic_homepage_' . $setting .'_layout' => array(
						'selector'        		=> '.baltic-homepage-' . str_replace( '_', '-', $setting ),
						'render_callback' 		=> 'baltic_homepage_' . $setting,
						'container_inclusive' 	=> true
					),
				),
			) );

			Kirki::add_field( 'baltic', array(
				'type'        => 'spacing',
				'settings'    => 'baltic_homepage_'. $setting .'_spacing',
				'section'     => 'baltic_homepage_'. $setting .'_layout',
				'label'       => esc_attr__( 'Spacing', 'baltic' ),
				'default'     => array(
					'top'    => '0px',
					'bottom' => '0px',
					'left'   => '0px',
					'right'  => '0px',
				),
				'transport'		=> 'auto',
				'output' => array(
					array(
						'element'  	=> '.baltic-homepage-' . str_replace( '_', '-', $setting ),
						'property'	=> 'padding'
					),
				),
			) );

		Kirki::add_section( 'baltic_homepage_'. $setting .'_background', array(
		    'title' 		=> esc_html__( 'Background', 'baltic' ),
		    'panel' 		=> 'baltic_homepage_'. $setting . '_panel',
		) );


			Kirki::add_field( 'baltic', array(
				'type'        	=> 'color',
				'settings'    	=> 'baltic_homepage_'. $setting .'_overlay',
				'label'       	=> __( 'Background overlay', 'baltic' ),
				'section'     	=> 'baltic_homepage_'. $setting .'_background',
				'default'     	=> 'rgba(0,0,0,0)',
				'choices'     	=> array( 'alpha' => true ),
				'transport'		=> 'auto',
				'output'		=> array(
					array(
						'element'  => '.baltic-homepage-' . str_replace( '_', '-', $setting ) . ' .homepage-overlay',
						'property' => 'background-color',
					),
				)
			) );

			Kirki::add_field( 'baltic', array(
				'type'        => 'background',
				'settings'    => 'baltic_homepage_'. $setting .'_background',
				'label'       => esc_html__( 'Background', 'baltic' ),
				'section'     => 'baltic_homepage_'. $setting .'_background',
				'default'     => array(
					'background-color'      => 'rgba(0,0,0,0)',
					'background-image'      => '',
					'background-repeat'     => 'repeat',
					'background-position'   => 'center center',
					'background-size'       => 'cover',
					'background-attachment' => 'scroll',
				),
				'transport'		=> 'auto',
				'output' => array(
					array(
						'element'  => '.baltic-homepage-' . str_replace( '_', '-', $setting )
					),
				),
			) );

	}


	/** Homepage Order*/
	Kirki::add_section( 'baltic_homepage_order', array(
	    'title' 			=> esc_html__( 'Homepage Order', 'baltic' ),
	    'priority'			=> 10,
	    'active_callback'	=> 'baltic_is_homepage_template'
	) );

		Kirki::add_field( 'baltic', array(
			'type'        => 'sortable',
			'settings'    => 'baltic_homepage_order',
			'section'     => 'baltic_homepage_order',
			'default'     => array(
				'slider',
				'product-categories-1',
				'products-1',
				'posts-1'
			),
			'choices'     => array(
				'slider'				=> esc_html__( 'Slider', 'baltic' ),
				'product-categories-1'	=> esc_html__( 'Product Categories #1', 'baltic' ),
				'product-categories-2'	=> esc_html__( 'Product Categories #2', 'baltic' ),
				'products-1'			=> esc_html__( 'Products #1', 'baltic' ),
				'products-2'			=> esc_html__( 'Products #2', 'baltic' ),
				'products-3'			=> esc_html__( 'Products #3', 'baltic' ),
				'products-4'			=> esc_html__( 'Products #4', 'baltic' ),
				'posts-1'				=> esc_html__( 'Posts #1', 'baltic' ),
				'posts-2'				=> esc_html__( 'Posts #2', 'baltic' ),
				'testimonial'			=> esc_html__( 'Testimonial', 'baltic' ),
				'latest-tweets'			=> esc_html__( 'Latest Tweet', 'baltic' ),
			),
			'priority'    	=> 10,
			'transport'		=> 'auto',
			'partial_refresh' => array(
				'baltic_homepage_order' => array(
					'selector'        		=> '.baltic-homepage',
					'render_callback' 		=> 'baltic_homepage_section',
					'container_inclusive' 	=> false
				),
			),
		) );

}
add_action( 'init', 'baltic_customize_register_homepage' );
