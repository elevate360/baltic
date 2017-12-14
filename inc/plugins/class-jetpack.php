<?php
/**
 * Baltic Jetpack compatibility
 *
 * @package Jetpack
 */

if( ! class_exists( 'Baltic_Jetpack' ) ) :
/**
 * Main Baltic Jetpack class
 */
class Baltic_Jetpack {

	public function __construct(){

		add_action( 'after_setup_theme', array( $this, 'support' ) );

		add_action( 'wp_print_styles', array( $this, 'deregister_style' ) );

	}

	/**
	 * Jetpack support
	 *
	 * @return [type] [description]
	 */
	public function support(){

		add_theme_support( 'infinite-scroll', array(
			'type'      		=> 'click',
			'container' 		=> 'main',
			'render'    		=> array( $this, 'infinite_scroll_render' ),
			'footer_widgets'	=> array( 'sidebar-2', 'sidebar-3', 'sidebar-4', ),
		) );

		add_theme_support( 'jetpack-testimonial' );

		/**
		 * Add theme support for Portfolio Custom Post Type.
		 */
		add_theme_support( 'jetpack-portfolio', array(
			'title'          => true,
			'content'        => true,
			'featured-image' => true,
		) );

	}

	public function infinite_scroll_render(){

		while ( have_posts() ) {
			the_post();
			if ( is_search() ) :
				get_template_part( 'components/content', 'search' );
			else :
				get_template_part( 'components/content', get_post_format() );
			endif;
		}

	}

	public function deregister_style(){

		wp_deregister_style( 'the-neverending-homepage' ); // Infinite Scroll

	}

}
endif;
return new Baltic_Jetpack();
