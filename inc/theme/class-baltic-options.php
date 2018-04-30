<?php
/**
 * Class Baltic Options.
 *
 * @package Baltic
 */

/**
 * Main Baltic Options class.
 *
 * @since  1.0.0
 */
class Baltic_Options {

	/**
	 * Get theme option.
	 *
	 * @param  [type] $name [description]
	 * @return [type]       [description]
	 */
	public static function get_option( $name ) {

		$default = self::defaults();

		if ( array_key_exists( $name, $default ) ) {
			return get_theme_mod( esc_attr( $name ), $default[$name] );
		} else {
			return get_theme_mod( esc_attr( $name ) );
		}

	}

	/**
	 * Return custom field post meta data.
	 *
	 * @return string|boolean Return value or empty string on failure.
	 */
	public static function get_custom_field( $field, $post_id = null ) {

		// Use get_the_ID() if no $post_id is specified
		$post_id = empty( $post_id ) ? get_the_ID() : $post_id;

		if ( ! $post_id ) {
			return '';
		}

		$custom_field = get_post_meta( $post_id, $field, true );

		if ( ! $custom_field ) {
			return '';
		}

		// Return custom field, slashes stripped, sanitized if string
		return is_array( $custom_field ) ? stripslashes_deep( $custom_field ) : stripslashes( wp_kses_decode_entities( $custom_field ) );

	}

	/**
	 * Default settings.
	 *
	 * @return array default settings value
	 */
	public static function defaults() {

		$defaults = array(
			// Preloader
			'preloader'					=> true,
			'preloader_type'			=> 'pulse',
			'preloader_color'			=> '#ff5722',
			'preloader_bg_color'		=> '#ffffff',

			// Text colors
			'color_bg_highlight'		=> '#ff5722',
			'color_text_highlight'		=> '#ffffff',
			'color_text_primary'		=> '#505050',
			'color_text_secondary'		=> '#909090',
			'color_text_field'			=> '#909090',
			'color_text_field_focus'	=> '#505050',
			'color_link_primary'		=> '#ff5722',
			'color_link_secondary'		=> '#ff8a65',
			'color_text_button'			=> '#ffffff',
			'color_button'				=> '#ff5722',
			'color_button_hover'		=> '#ff8a65',
			'color_border'				=> 'rgba(0,0,0,0.1)',

			// Header color
			'color_bg_header'			=> '#ffffff',
			'color_text_header'			=> '#505050',
			'color_header_input'		=> 'rgba(255,255,255,0.5)',
			'color_header_input_focus'	=> 'rgba(255,255,255,1)',
			'color_header_input_border'	=> 'rgba(0,0,0,0.1)',
			'color_header_input_border_focus'	=> 'rgba(0,0,0,0.1)',
			'color_header_textfield'	=> '#909090',
			'color_header_textfield_focus'	=> '#505050',
			'color_header_btn'			=> 'rgba(255,255,255,0.5)',
			'color_header_btn_hover'	=> '#ff5722',
			'color_header_btn_icon'		=> '#505050',
			'color_header_btn_icon_hover'	=> '#ffffff',

			// Layout
			'layout_archive'			=> 'content-sidebar',
			'layout_post'				=> 'content-sidebar',
			'layout_page'				=> 'content-sidebar',

			// Blog post
			'thumb_placeholder'			=> '',
			'meta_date'					=> true,
			'meta_author'				=> true,
			'meta_comment'				=> true,
			'meta_categories'			=> true,
			'meta_tags'					=> true,
			'author_profile'			=> true,
			'excerpt_length'			=> 30,
			'more_link_text'			=> esc_html__( 'Continue reading', 'baltic' ),
			'nav_posts'					=> 'posts_pagination',
			'nav_posts_prev'			=> esc_html( '&larr; Older posts', 'baltic' ),
			'nav_posts_next'			=> esc_html( 'Newer posts &rarr;', 'baltic' ),

			// Footer
			'footer_widgets_col'		=> 4,
			'footer_text'				=> esc_html__( 'Copyright &copy; 2017-[YEAR] [SITE]. Proudly powered by [WP].', 'baltic' ),
			'footer_credits'			=> true,
			'return_top'				=> true,
			'payment_icons'				=> '',

			// WooCommerce
			'color_price'				=> '#77a464',
			'color_sale_text'			=> '#ffffff',
			'color_sale'				=> '#f44336',
			'color_stars'				=> '#ffc107',
			'layout_products'			=> 'full-width',
			'layout_product'			=> 'content-sidebar',
			'products_per_page'			=> 12,
			'products_columns'			=> 4,
			'product_quick_view'		=> true,
			'products_nav'				=> 'products_pagination',
			'products_nav_prev'			=> esc_html( '&larr; Older product', 'baltic' ),
			'products_nav_next'			=> esc_html( 'Newer product &rarr;', 'baltic' ),

			// Homepage Order
			'homepage_order'			=> array(
				'hero',
				'product-categories-1',
				'products-1',
				'posts-1'
			),

			// Hero
			'hero_prefix'				=> esc_html__( 'Baltic theme is suitable for', 'baltic' ),
			'hero_rotator'				=> esc_html__( 'online shop, small business, startup', 'baltic' ),
			'hero_suffix'				=> '.',
			'hero_description'			=> '',
			'hero_btn1_text'			=> esc_html__( 'Button Text #1', 'baltic' ),
			'hero_btn1_link'			=> esc_url( '#' ),
			'hero_btn1_style'			=> 'primary',
			'hero_btn2_text'			=> '',
			'hero_btn2_link'			=> '',
			'hero_btn2_style'			=> 'secondary',
			'hero_btn_rounded'			=> false,
			'hero_alignment'			=> 'left',
			'hero_text_color'			=> '#505050',
			'hero_cursor_color'			=> '#06a44d',
			'hero_layout'				=> 'boxed',
			'hero_spacing'				=> array( 'top' => '0px', 'bottom' => '0px', 'left' => '0px', 'right' => '0px'),
			'hero_background_overlay'	=> 'rgba(0,0,0,0)',
			'hero_background'			=> array(
				'background-color'	 	=> 'rgba(0,0,0,0)',
				'background-image' 		=> '',
				'background-repeat' 	=> 'repeat',
				'background-position' 	=> 'center center',
				'background-size' 		=> 'cover',
				'background-attachment' => 'scroll'
			),

			// Slider
			'homepage_slider'				=> array(
				array(
					'title' 		=> esc_html__( 'Slide title #1', 'baltic' ),
					'description'  	=> esc_html__( 'Slide description #1', 'baltic' ),
					'image'			=> '',
					'btn_text_1'	=> esc_html__( 'Button text #1A', 'baltic' ),
					'btn_link_1'	=> esc_url( '#' ),
					'btn_style_1'	=> 'primary',
					'btn_text_2'	=> esc_html__( 'Button text #1B', 'baltic' ),
					'btn_link_2'	=> esc_url( '#' ),
					'btn_style_2'	=> 'secondary',
				),
				array(
					'title' 		=> esc_html__( 'Slide title #2', 'baltic' ),
					'description'  	=> esc_html__( 'Slide description #2', 'baltic' ),
					'image'			=> '',
					'btn_text_1'	=> esc_html__( 'Button text #2A', 'baltic' ),
					'btn_link_1'	=> esc_url( '#' ),
					'btn_style_1'	=> 'primary',
					'btn_text_2'	=> esc_html__( 'Button text #2B', 'baltic' ),
					'btn_link_2'	=> esc_url( '#' ),
					'btn_style_2'	=> 'secondary',
				),
			),
			'slider_btn_rounded'			=> false,
			'slider_effect'					=> 'true',
			'slider_autoplay'				=> true,
			'slider_autoplayspeed'			=> 5000,
			'slider_arrows'					=> true,
			'slider_dots'					=> true,
			'slider_pauseonhover'			=> false,
			'slider_layout'					=> 'boxed',
			'slider_spacing'				=> array( 'top' => '0px', 'bottom' => '0px', 'left' => '0px', 'right' => '0px'),
			'slider_background_overlay'		=> 'rgba(0,0,0,0)',
			'slider_background'				=> array(
				'background-color'	 	=> 'rgba(0,0,0,0)',
				'background-image' 		=> '',
				'background-repeat' 	=> 'repeat',
				'background-position' 	=> 'center center',
				'background-size' 		=> 'cover',
				'background-attachment' => 'scroll'
			),

			// Post #1
			'posts_1_title'					=> '',
			'posts_1_description'			=> '',
			'posts_1_cat'					=> '',
			'posts_1_orderby'				=> 'date',
			'posts_1_order'					=> 'DESC',
			'posts_1_archive_link'			=> false,
			'posts_1_archive_text'			=> esc_html__( 'More from our blog', 'baltic' ),
			'posts_1_btn_style'				=> 'primary',
			'posts_1_btn_rounded'			=> 'off',
			'posts_1_btn_align'				=> 'center',
			'posts_1_display'				=> 'grid',
			'posts_1_limit'					=> 3,
			'posts_1_columns'				=> 3,
			'posts_1_layout'				=> 'boxed',
			'posts_1_spacing'				=> array( 'top' => '0px', 'bottom' => '0px', 'left' => '0px', 'right' => '0px'),
			'posts_1_background_overlay'	=> 'rgba(0,0,0,0)',
			'posts_1_background'			=> array(
				'background-color'	 	=> 'rgba(0,0,0,0)',
				'background-image' 		=> '',
				'background-repeat' 	=> 'repeat',
				'background-position' 	=> 'center center',
				'background-size' 		=> 'cover',
				'background-attachment' => 'scroll'
			),

			// Post #2
			'posts_2_title'					=> '',
			'posts_2_description'			=> '',
			'posts_2_cat'					=> '',
			'posts_2_orderby'				=> 'date',
			'posts_2_order'					=> 'DESC',
			'posts_2_archive_link'			=> false,
			'posts_2_archive_text'			=> esc_html__( 'More from our blog', 'baltic' ),
			'posts_2_btn_style'				=> 'primary',
			'posts_2_btn_rounded'			=> 'off',
			'posts_2_btn_align'				=> 'center',
			'posts_2_display'				=> 'grid',
			'posts_2_limit'					=> 3,
			'posts_2_columns'				=> 3,
			'posts_2_layout'				=> 'boxed',
			'posts_2_spacing'				=> array( 'top' => '0px', 'bottom' => '0px', 'left' => '0px', 'right' => '0px'),
			'posts_2_background_overlay'	=> 'rgba(0,0,0,0)',
			'posts_2_background'			=> array(
				'background-color'	 	=> 'rgba(0,0,0,0)',
				'background-image' 		=> '',
				'background-repeat' 	=> 'repeat',
				'background-position' 	=> 'center center',
				'background-size' 		=> 'cover',
				'background-attachment' => 'scroll'
			),

			// Product Catgories #1
			'product_cats_1_layout'				=> 'boxed',
			'product_cats_1_spacing'			=> array( 'top' => '0px', 'bottom' => '0px', 'left' => '0px', 'right' => '0px'),
			'product_cats_1_background_overlay'	=> 'rgba(0,0,0,0)',
			'product_cats_1_background'			=> array(
				'background-color'	 	=> 'rgba(0,0,0,0)',
				'background-image' 		=> '',
				'background-repeat' 	=> 'repeat',
				'background-position' 	=> 'center center',
				'background-size' 		=> 'cover',
				'background-attachment' => 'scroll'
			),

			// Product Catgories #2
			'product_cats_2_title'				=> '',
			'product_cats_2_description'		=> '',
			'product_cats_2_display'			=> 'grid',
			'product_cats_2_limit'				=> 3,
			'product_cats_2_columns'			=> 3,
			'product_cats_2_layout'				=> 'boxed',
			'product_cats_2_spacing'			=> array( 'top' => '0px', 'bottom' => '0px', 'left' => '0px', 'right' => '0px'),
			'product_cats_2_background_overlay'	=> 'rgba(0,0,0,0)',
			'product_cats_2_background'			=> array(
				'background-color'	 	=> 'rgba(0,0,0,0)',
				'background-image' 		=> '',
				'background-repeat' 	=> 'repeat',
				'background-position' 	=> 'center center',
				'background-size' 		=> 'cover',
				'background-attachment' => 'scroll'
			),

			// Product #1
			'products_1_title'				=> '',
			'products_1_description'		=> '',
			'products_1_display'			=> 'grid',
			'products_1_limit'				=> 3,
			'products_1_columns'			=> 3,
			'products_1_layout'				=> 'boxed',
			'products_1_spacing'			=> array( 'top' => '0px', 'bottom' => '0px', 'left' => '0px', 'right' => '0px'),
			'products_1_background_overlay'	=> 'rgba(0,0,0,0)',
			'products_1_background'			=> array(
				'background-color'	 	=> 'rgba(0,0,0,0)',
				'background-image' 		=> '',
				'background-repeat' 	=> 'repeat',
				'background-position' 	=> 'center center',
				'background-size' 		=> 'cover',
				'background-attachment' => 'scroll'
			),

			// Product #2
			'products_2_title'				=> '',
			'products_2_description'		=> '',
			'products_2_display'			=> 'grid',
			'products_2_limit'				=> 3,
			'products_2_columns'			=> 3,
			'products_2_layout'				=> 'boxed',
			'products_2_spacing'			=> array( 'top' => '0px', 'bottom' => '0px', 'left' => '0px', 'right' => '0px'),
			'products_2_background_overlay'	=> 'rgba(0,0,0,0)',
			'products_2_background'			=> array(
				'background-color'	 	=> 'rgba(0,0,0,0)',
				'background-image' 		=> '',
				'background-repeat' 	=> 'repeat',
				'background-position' 	=> 'center center',
				'background-size' 		=> 'cover',
				'background-attachment' => 'scroll'
			),

			// Product #3
			'products_3_title'				=> '',
			'products_3_description'		=> '',
			'products_3_display'			=> 'grid',
			'products_3_limit'				=> 3,
			'products_3_columns'			=> 3,
			'products_3_layout'				=> 'boxed',
			'products_3_spacing'			=> array( 'top' => '0px', 'bottom' => '0px', 'left' => '0px', 'right' => '0px'),
			'products_3_background_overlay'	=> 'rgba(0,0,0,0)',
			'products_3_background'			=> array(
				'background-color'	 	=> 'rgba(0,0,0,0)',
				'background-image' 		=> '',
				'background-repeat' 	=> 'repeat',
				'background-position' 	=> 'center center',
				'background-size' 		=> 'cover',
				'background-attachment' => 'scroll'
			),

			// Product #4
			'products_4_title'				=> '',
			'products_4_description'		=> '',
			'products_4_display'			=> 'grid',
			'products_4_limit'				=> 3,
			'products_4_columns'			=> 3,
			'products_4_layout'				=> 'boxed',
			'products_4_spacing'				=> array( 'top' => '0px', 'bottom' => '0px', 'left' => '0px', 'right' => '0px'),
			'products_4_background_overlay'	=> 'rgba(0,0,0,0)',
			'products_4_background'			=> array(
				'background-color'	 	=> 'rgba(0,0,0,0)',
				'background-image' 		=> '',
				'background-repeat' 	=> 'repeat',
				'background-position' 	=> 'center center',
				'background-size' 		=> 'cover',
				'background-attachment' => 'scroll'
			),

			// Latest tweets
			'latest_tweets_title'				=> '',
			'latest_tweets_description'			=> '',
			'latest_tweets_handle'				=> '',
			'latest_tweets_display'				=> 'grid',
			'latest_tweets_limit'				=> 3,
			'latest_tweets_columns'				=> 3,
			'latest_tweets_layout'				=> 'boxed',
			'latest_tweets_spacing'				=> array( 'top' => '0px', 'bottom' => '0px', 'left' => '0px', 'right' => '0px'),
			'latest_tweets_background_overlay'	=> 'rgba(0,0,0,0)',
			'latest_tweets_background'			=> array(
				'background-color'	 	=> 'rgba(0,0,0,0)',
				'background-image' 		=> '',
				'background-repeat' 	=> 'repeat',
				'background-position' 	=> 'center center',
				'background-size' 		=> 'cover',
				'background-attachment' => 'scroll'
			),

			// Testimonial
			'testimonial_title'					=> '',
			'testimonial_description'			=> '',
			'testimonial_display'				=> 'grid',
			'testimonial_limit'					=> 3,
			'testimonial_columns'				=> 3,
			'testimonial_layout'				=> 'boxed',
			'testimonial_spacing'				=> array( 'top' => '0px', 'bottom' => '0px', 'left' => '0px', 'right' => '0px'),
			'testimonial_background_overlay'	=> 'rgba(0,0,0,0)',
			'testimonial_background'			=> array(
				'background-color'	 	=> 'rgba(0,0,0,0)',
				'background-image' 		=> '',
				'background-repeat' 	=> 'repeat',
				'background-position' 	=> 'center center',
				'background-size' 		=> 'cover',
				'background-attachment' => 'scroll'
			),

		);

		return apply_filters( 'baltic_setting_defaults', $defaults );

	}

}
