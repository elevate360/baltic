<?php
/**
 * YITH Wishlist integration
 *
 * @package Baltic
 */

class Baltic_YITH_Wishlist {

	public function __construct() {

		add_action( 'wp_ajax_baltic_wcwl_update_count', array( $this, 'wcwl_update_count' ) );
		add_action( 'wp_ajax_nopriv_baltic_wcwl_update_count', array( $this, 'wcwl_update_count' ) );

		add_action( 'wp_enqueue_scripts', array( $this, 'script' ) );

	}

	/**
	 * Parse wishlist count into json
	 *
	 * @return json
	 */
	public function wcwl_update_count() {

		wp_send_json( array(
			'count' => yith_wcwl_count_all_products()
		) );

	}

	/**
	 * Enqueuing script
	 *
	 * @return void
	 */
	public function script() {

		$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
		wp_enqueue_script( 'baltic-wishlist', get_theme_file_uri( "/assets/js/baltic-wishlist$suffix.js" ), array( 'baltic-script' ), BALTIC_THEME_VERSION, true );

	}

}

return new Baltic_YITH_Wishlist();
