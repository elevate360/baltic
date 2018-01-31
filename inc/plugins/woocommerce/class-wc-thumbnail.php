<?php
/**
 * WooCommerce secondary thumbnail
 *
 * @package Baltic
 */

if ( ! class_exists( 'Baltic_WC_Thumbnail' ) ) :
/**
 * Baltic WC secondary thumbnail
 */
class Baltic_WC_Thumbnail {


	public function __construct() {

		add_action( 'baltic_init', array( $this, 'hooks' ), 15 );
		/** Fire hook before Elementor editor */
		add_action( 'admin_action_elementor', array( $this, 'hooks' ), 9 );

	}

	/**
	 * Setup action hook for custom WooCommerce thumbnail
	 *
	 * @return [type] [description]
	 */
	public function hooks() {

		add_filter( 'post_class', array( $this, 'product_has_gallery' ) );

		remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );

		add_action( 'woocommerce_before_shop_loop_item', array( $this, 'thumbnail_markup_open' ), 8 );
		add_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_thumbnail', 8 );
		add_action( 'woocommerce_before_shop_loop_item', array( $this, 'secondary_product_thumbnail' ), 8 );
		add_action( 'woocommerce_before_shop_loop_item', array( $this, 'thumbnail_markup_close' ), 8 );

	}

	/**
	 * [product_has_gallery description]
	 * @param  [type] $classes [description]
	 * @return [type]          [description]
	 */
	public function product_has_gallery( $classes ) {
		global $product;

		$post_type = get_post_type( get_the_ID() );

		if ( ! is_admin() ) {

			if ( $post_type == 'product' ) {

				$attachment_ids = $this->get_gallery_image_ids( $product );

				if ( $attachment_ids ) {
					$classes[] = 'baltic-has-gallery';
				}
			}
		}

		return $classes;
	}

	public function thumbnail_markup_open(){
		echo sprintf( '<a href="%s" class="baltic-product-thumbnail">', get_permalink( get_the_id() ) );
	}

	public function thumbnail_markup_close(){
		echo '</a>';
	}

	/**
	 * Frontend functions
	 */
	public function secondary_product_thumbnail() {
		global $product, $woocommerce;

		$attachment_ids = $this->get_gallery_image_ids( $product );

		if ( $attachment_ids ) {
			$attachment_ids     = array_values( $attachment_ids );
			$secondary_image_id = $attachment_ids['0'];

			$secondary_image_alt = get_post_meta( $secondary_image_id, '_wp_attachment_image_alt', true );
			$secondary_image_title = get_the_title($secondary_image_id);

			echo wp_get_attachment_image(
				$secondary_image_id,
				'shop_catalog',
				'',
				array(
					'class' => 'secondary-image attachment-shop-catalog wp-post-image wp-post-image--secondary',
					'alt' => $secondary_image_alt,
					'title' => $secondary_image_title
				)
			);
		}
	}


	/**
	 * WooCommerce Compatibility Functions
	 */
	public function get_gallery_image_ids( $product ) {
		if ( ! is_a( $product, 'WC_Product' ) ) {
			return;
		}

		if ( is_callable( 'WC_Product::get_gallery_image_ids' ) ) {
			return $product->get_gallery_image_ids();
		} else {
			return $product->get_gallery_attachment_ids();
		}
	}

}
endif;
return new Baltic_WC_Thumbnail();
