<?php
/**
 * WooCommerce product quic view template
 *
 * @package Baltic
 */

while ( have_posts() ) : the_post(); ?>

<div id="product-<?php the_ID(); ?>" <?php post_class( 'product' ); ?>>

	<?php do_action( 'baltic_woocommerce_product_image' ); ?>

	<div class="summary entry-summary">
		<div class="summary-content">
			<?php do_action( 'baltic_woocommerce_product_summary' ); ?>
		</div>
	</div>

</div>

<?php endwhile; // end of the loop.
