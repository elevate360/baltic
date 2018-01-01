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

	}

	public function wcwl_update_count() {

		wp_send_json( array(
			'count' => yith_wcwl_count_all_products()
		) );

	}

}

return new Baltic_YITH_Wishlist();
