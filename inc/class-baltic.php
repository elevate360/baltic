
<?php
/**
 * Baltic Main class
 *
 * @package Baltic
 */

if( ! class_exists( 'Baltic_Init' ) ) :
/**
 * Main Baltic class
 *
 * @since  1.0.0
 */
class Baltic_Init {

	/**
	 * Main Theme Class Constructor
	 *
	 * @return void
	 */
	public function __construct() {

		/** Backward compatibilty */
		if ( version_compare( $GLOBALS['wp_version'], '4.7', '<' ) ) {
			add_action( 'after_switch_theme', array( $this, 'back_compact' ) );
			return;
		}

		/** Setup */
		add_action( 'after_setup_theme', array( $this, 'setup' ) );
		add_action( 'template_redirect', array( $this, 'content_width' ), 0 );

		/** Scipts */
		add_action( 'wp_head', array( $this, 'javascript_detection'), 0 );
		add_action( 'wp_enqueue_scripts', array( $this, 'assets' ) );

		/** Includes files */
		add_action( 'baltic_init', array( $this, 'includes' ) );
		add_action( 'baltic_init', array( $this, 'integrations' ) );

	}

	/**
	 * Deactivated Baltic theme if not meet requirement
	 *
	 * @return void
	 */
	public function back_compact(){
		switch_theme( WP_DEFAULT_THEME );
		unset( $_GET['activated'] );
		add_action( 'admin_notices', array( $this, 'notice' ) );
	}

	/**
	 * Admin notice
	 *
	 * @return string
	 */
	public function notice(){
		$message = sprintf( __( 'Baltic theme requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.', 'baltic' ), $GLOBALS['wp_version'] );
		printf( '<div class="error">%s</div>', wp_kses_post( wpautop( $message ) ) );
	}

	/**
	 * Sets up theme defaults and registers support for various WordPress features
	 *
	 * @return  void
	 */
	public function setup(){

		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 */
		load_theme_textdomain( 'baltic', trailingslashit( WP_LANG_DIR ) . 'themes/' );
		load_theme_textdomain( 'baltic', get_stylesheet_directory() . '/languages' );
		load_theme_textdomain( 'baltic', get_template_directory() . '/languages' );

		/** Add default posts and comments RSS feed links to head. */
		add_theme_support( 'automatic-feed-links' );

		/** Let WordPress manage the document title. */
		add_theme_support( 'title-tag' );

		/**
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		set_post_thumbnail_size( 810, 466, array( 'center', 'top' ) );

		/** Set the default content width */
		$GLOBALS['content_width'] = 800;

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'baltic' ),
			'menu-2' => esc_html__( 'Secondary', 'baltic' ),
			'menu-3' => esc_html__( 'Social Link', 'baltic' ),
		) );

		/**
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		/** Enable support for custom logo */
		add_theme_support( 'custom-logo', array(
			'width'       => 360,
			'height'      => 96,
			'flex-width'  => true,
			'flex-height' => false,
			'header-text' => array( 'site-title', 'site-description' ),
		) );

		/** Custom Header */
		add_theme_support( 'custom-header', apply_filters( 'baltic_custom_header_args', array(
			'width'       			=> 1600,
			'height'      			=> 1600,
			'default-image'         => '',
			'flex-width'            => true,
			'flex-height'           => true,
			'default-text-color'	=> '505050',
			'wp-head-callback'      => 'baltic_header_style',
		) ) );

		/** Set up the WordPress core custom background feature. */
		add_theme_support( 'custom-background', apply_filters( 'baltic_custom_background_args', array(
			'default-color' 		=> 'eceff1',
			'default-repeat'        => 'no-repeat',
			'default-attachment'    => 'scroll'
		) ) );

		/**
		* Add support for Gutenberg.
		*
		* @link https://wordpress.org/gutenberg/handbook/reference/theme-support/
		*/
		add_theme_support( 'gutenberg', array(

		    // Make specific theme colors available in the editor.
		    'colors' => array(
		        baltic_get_option( 'color_text_primary' ),
		        baltic_get_option( 'color_text_secondary' ),
		        baltic_get_option( 'color_link_primary' ),
		        baltic_get_option( 'color_link_secondary' ),
		    ),

		) );

		/** Add theme support for selective refresh for widgets. */
		add_theme_support( 'customize-selective-refresh-widgets' );

		/*
		 * This theme styles the visual editor to resemble the theme style,
		 * specifically font, colors, icons, and column width.
		 */
		add_editor_style( array( 'assets/css/editor-style.min.css' ) );

		/** This theme uses its own gallery styles. */
		add_filter( 'use_default_gallery_style', '__return_false' );

	}

	/**
	 * Set the content width in pixels, based on the theme's design and stylesheet.
	 * Priority 0 to make it available to lower priority callbacks.
	 *
	 * @global int $content_width
	 */
	public function content_width(){

		$content_width = $GLOBALS['content_width'];

		if ( baltic_get_layout() == 'full-width' ) {
			$content_width = 1120;
		}

		$GLOBALS['content_width'] = apply_filters( 'baltic_content_width', $content_width );

	}

	/**
	 * Handles JavaScript detection.
	 *
	 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
	 */
	public function javascript_detection() {

		echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";

	}

	/**
	 * Enqueue scripts and styles.
	 *
	 * @return  void
	 */
	public function assets() {

		$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

		wp_dequeue_style( 'contact-form-7' );

		/** Main Style */
		wp_enqueue_style( 'baltic-style', get_theme_file_uri( "/style$suffix.css" ) );

		/** lt IE 9 script */
		wp_enqueue_script( 'html5shiv', get_theme_file_uri( "/assets/js/ie/html5shiv$suffix.js" ), array(), '3.7.3' );
		wp_script_add_data( 'html5shiv', 'conditional', 'lt IE 9' );
		wp_enqueue_script( 'respond', get_theme_file_uri( "/assets/js/ie/respond$suffix.js" ), array(), '1.4.2' );
		wp_script_add_data( 'respond', 'conditional', 'lt IE 9' );
		wp_enqueue_script( 'nwmatcher', get_theme_file_uri( "/assets/js/ie/nwmatcher$suffix.js" ), array(), '1.4.2' );
		wp_script_add_data( 'nwmatcher', 'conditional', 'lt IE 9' );
		wp_enqueue_script( 'selectivizr', get_theme_file_uri( "/assets/js/ie/selectivizr$suffix.js" ), array(), '1.0.2' );
		wp_script_add_data( 'selectivizr', 'conditional', 'lt IE 9' );

		/** Vendor scripts */
		wp_enqueue_script( 'jquery-fitvids', get_theme_file_uri( "/assets/js/fitvids/jquery.fitvids$suffix.js" ), array( 'jquery' ), '1.2.0', true );
		wp_enqueue_script( 'jquery-stickit', get_theme_file_uri( "/assets/js/stickit/jquery.stickit$suffix.js" ), array( 'jquery' ), '0.2.13', true );
		wp_enqueue_script( 'jquery-match-height', get_theme_file_uri( "/assets/js/match-height/jquery.matchHeight$suffix.js" ), array( 'jquery' ), '0.7.2', true );
		wp_enqueue_script( 'jquery-slick', get_theme_file_uri( "/assets/js/slick/slick$suffix.js" ), array( 'jquery' ), '1.8.0', true );
		wp_enqueue_script( 'typist', get_theme_file_uri( "/assets/js/typist/typist$suffix.js" ), array(), '1.2', true );

		// Main script
		wp_enqueue_script( 'baltic-script', get_theme_file_uri( "/assets/js/frontend$suffix.js" ), array( 'jquery' ), '20151215', true );

		$output = array(
			'sliderPrevBtn'	=> '<button type="button" data-role="none" class="baltic-slick-prev" aria-label="Previous" tabindex="0" role="button">'. baltic_get_svg( array( 'class' => 'icon-stroke', 'icon' => 'chevron-left' ) ) .'</button>',
			'sliderNextBtn' => '<button type="button" data-role="none" class="baltic-slick-next" aria-label="Next" tabindex="0" role="button">'. baltic_get_svg( array( 'class' => 'icon-stroke', 'icon' => 'chevron-right' ) ) .'</button>',
			'ajax_url'		=> admin_url( 'admin-ajax.php' ),
			'loader'		=> str_replace( array( "\n", "\t", "\r" ), '', baltic_get_preloader() )
		);
		wp_localize_script( 'baltic-script', 'Balticl10n', $output );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

	}

	/**
	 * Include Baltic theme files
	 *
	 * @return void
	 */
	public function includes() {

		/** Admin Dashboard */
		if ( is_admin() ) {
			require get_parent_theme_file_path( '/inc/vendor/vendor.php' );
		}

		/** Theme classes */
		require get_parent_theme_file_path( '/inc/class-breadcrumb.php' );
		require get_parent_theme_file_path( '/inc/class-theme-functions.php' );
		require get_parent_theme_file_path( '/inc/class-template-tags.php' );

		/** Include theme functions */
		require get_parent_theme_file_path( '/inc/functions/attr.php' );
		require get_parent_theme_file_path( '/inc/functions/icons.php' );
		require get_parent_theme_file_path( '/inc/functions/widgets.php' );
		require get_parent_theme_file_path( '/inc/functions/options.php' );
		require get_parent_theme_file_path( '/inc/functions/utility.php' );

		/** Include theme customizer */
		require get_parent_theme_file_path( '/inc/customizer/customizer.php' );

		/** Theme structures */
		$structures = array(
			'header',
			'page-header',
			'content',
			'sidebar',
			'entry',
			'footer',
			'homepage',
		);
		foreach ( $structures as $structure ) {
			require get_parent_theme_file_path( "/inc/structure/{$structure}.php" );
		}

	}

	/**
	 * Includes plugin integration
	 *
	 * @return  void
	 */
	public function integrations(){

		// require get_parent_theme_file_path( '/inc/vendor/vendor.php' );

		require get_parent_theme_file_path( '/inc/plugins/demo-import.php' );

		if ( class_exists( 'WooCommerce' ) ) {
			require get_parent_theme_file_path( '/inc/plugins/woocommerce/class-wc.php' );
			require get_parent_theme_file_path( '/inc/plugins/woocommerce/class-wc-thumbnail.php' );
			require get_parent_theme_file_path( '/inc/plugins/woocommerce/class-quick-view.php' );
			require get_parent_theme_file_path( '/inc/plugins/woocommerce/wc-template.php' );
			if ( defined( 'YITH_WCWL' ) ) {
				require get_parent_theme_file_path( '/inc/plugins/woocommerce/class-yith-wishlist.php' );
			}
		}

		if ( class_exists( 'Jetpack' ) ) {
			require get_parent_theme_file_path( '/inc/plugins/class-jetpack.php' );
		}

	}

}
endif;

return new Baltic_Init;
