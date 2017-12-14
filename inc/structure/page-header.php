<?php
/**
 * Baltic Page Header
 *
 * @package Baltic
 */

function baltic_do_breadcrumb(){
	if ( is_singular( 'product' )) {
		baltic_breadcrumb();
	}
}
add_action( 'woocommerce_before_single_product', 'baltic_do_breadcrumb', 10 );
