<?php
/**
 * Baltic WooCommerce quick-view function file
 *
 * @package Baltic
 */

if ( ! class_exists( 'Baltic_WC_Quick_View' ) ) :
/**
 * Baltic WC quick view class
 */
class Baltic_WC_Quick_View {

	/** Constructor */
	public function __construct() {

		if ( baltic_get_option( 'product_quick_view' ) == false ) {
			return;
		}

		add_action( 'wp_enqueue_scripts', 	array( $this, 'scripts' ) );

		add_action( 'wp_ajax_baltic_product_quick_view', array( $this, 'quick_view_ajax' ) );
		add_action( 'wp_ajax_nopriv_baltic_product_quick_view', array( $this, 'quick_view_ajax' ) );

		add_action( 'baltic_after', array( $this, 'quick_view_container' ) );

		// Image
		add_action( 'baltic_woocommerce_product_image', 'woocommerce_show_product_sale_flash', 10 );
		add_action( 'baltic_woocommerce_product_image', 'woocommerce_show_product_images', 20 );

		// Summary
		add_action( 'baltic_woocommerce_product_summary', 'woocommerce_template_single_title', 5 );
		add_action( 'baltic_woocommerce_product_summary', 'woocommerce_template_single_rating', 10 );
		add_action( 'baltic_woocommerce_product_summary', 'woocommerce_template_single_price', 15 );
		add_action( 'baltic_woocommerce_product_summary', 'woocommerce_template_single_excerpt', 20 );
		add_action( 'baltic_woocommerce_product_summary', 'woocommerce_template_single_add_to_cart', 25 );
		add_action( 'baltic_woocommerce_product_summary', 'woocommerce_template_single_meta', 30 );

	}

	/**
	 * [scripts description]
	 * @return [type] [description]
	 */
	public function scripts() {
		wp_enqueue_script( 'zoom' );
		wp_enqueue_script( 'flexslider' );
		wp_enqueue_script( 'photoswipe-ui-default' );
		wp_enqueue_style(  'photoswipe-default-skin' );
		add_action( 'wp_footer', 'woocommerce_photoswipe' );
		wp_enqueue_script( 'wc-single-product' );
		wp_enqueue_script( 'wc-add-to-cart-variation' );
	}

	/**
	 * [quick_view_container description]
	 * @return [type] [description]
	 */
	public function quick_view_container() {
		?>
			<div id="quick-view-container" class="quick-view-container hide">
				<div class="quick-view-wrap">
					<button class="close-quick-view">
						<span class="screen-reader-text"><?php _e( 'Close', 'baltic' );?></span>
						<?php echo baltic_get_svg( array( 'class' => 'icon-stroke','icon' => 'close' ) );?>
					</button>
					<div id="quick-view-content"></div>
				</div><!-- .quick-view-wrap -->
			</div><!-- #quick-view-container -->
		<?php
	}

	/**
	 * Quick view ajax request function
	 * @return [type] [description]
	 */
	public function quick_view_ajax() {

		if ( ! isset( $_REQUEST['product_id'] ) ) {
			die();
		}

		$product_id = intval( $_REQUEST['product_id'] );

		// set the main wp query for the product
		wp( 'p=' . $product_id . '&post_type=product' );

		ob_start();

		// load content template
		get_template_part( 'components/quick', 'view' );

		echo ob_get_clean();

		die();

	}

}
endif;

return new Baltic_WC_Quick_View();
