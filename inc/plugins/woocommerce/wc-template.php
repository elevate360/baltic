<?php
/**
 * WooCommerce template hook
 *
 * @package Baltic
 */

if( ! function_exists( 'baltic_woocommerce_page_header' ) ) :
/**
 * [baltic_woocommerce_page_header description]
 * @return [type] [description]
 */
function baltic_woocommerce_page_header(){
	if( ! is_shop() ) {
		return;
	}
?>
    <header class="page-header woocommerce-products-header">
    	<div class="container">
		<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>

			<h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>

		<?php endif; ?>

		<?php
			/**
			 * woocommerce_archive_description hook.
			 *
			 * @hooked woocommerce_taxonomy_archive_description - 10
			 * @hooked woocommerce_product_archive_description - 10
			 */
			do_action( 'woocommerce_archive_description' );
		?>
		</div><!-- .container -->
    </header><!-- .page-header -->
<?php
}
endif;
add_action( 'baltic_inner_before', 'baltic_woocommerce_page_header', 20 );

if ( ! function_exists( 'baltic_woocommerce_product_columns_wrapper' ) ) :
/**
 * Product columns wrapper.
 *
 * @return  void
 */
function baltic_woocommerce_product_columns_wrapper() {

	$layout = baltic_get_layout();
	if ( $layout = 'content-sidebar' || $layout == 'sidebar-content' ) {
		$columns = 3;
	} else {
		$columns = 4;
	}
	echo '<div class="columns columns-' . absint( $columns ) . '">';
}
endif;
add_action( 'woocommerce_before_shop_loop', 'baltic_woocommerce_product_columns_wrapper', 40 );

if ( ! function_exists( 'baltic_woocommerce_product_columns_wrapper_close' ) ) :
/**
 * Product columns wrapper close.
 *
 * @return  void
 */
function baltic_woocommerce_product_columns_wrapper_close() {
	echo '</div>';
}
endif;
add_action( 'woocommerce_after_shop_loop', 'baltic_woocommerce_product_columns_wrapper_close', 40 );

/**
 * Remove default WooCommerce wrapper.
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

if ( ! function_exists( 'baltic_woocommerce_wrapper_before' ) ) {
	/**
	 * Before Content.
	 *
	 * Wraps all WooCommerce content in wrappers which match the theme markup.
	 *
	 * @return void
	 */
	function baltic_woocommerce_wrapper_before() {
		?>
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">
		<?php
	}
}
add_action( 'woocommerce_before_main_content', 'baltic_woocommerce_wrapper_before' );

if ( ! function_exists( 'baltic_woocommerce_wrapper_after' ) ) {
	/**
	 * After Content.
	 *
	 * Closes the wrapping divs.
	 *
	 * @return void
	 */
	function baltic_woocommerce_wrapper_after() {
		?>
			</main><!-- #main -->
		</div><!-- #primary -->
		<?php
	}
}
add_action( 'woocommerce_after_main_content', 'baltic_woocommerce_wrapper_after' );

/**
 * [baltic_wc_entry_inner_open description]
 * @return [type] [description]
 */
function baltic_wc_entry_inner_open(){
	echo '<div class="entry-product">';
}
add_action( 'woocommerce_before_shop_loop_item', 'baltic_wc_entry_inner_open', 5 );

/**
 * [baltic_wc_entry_inner_close description]
 * @return [type] [description]
 */
function baltic_wc_entry_inner_close(){
	echo '</div>';
}
add_action( 'woocommerce_after_shop_loop_item', 'baltic_wc_entry_inner_close', 99 );

function baltic_wc_container_open(){
	?>
		<div class="container">
			<div class="columns">
	<?php
}
add_action( 'woocommerce_before_main_content', 'baltic_wc_container_open', 5 );

function baltic_wc_container_close(){
	?>
			</div><!-- .columns -->
		</div><!-- .container -->
	<?php
}
add_action( 'woocommerce_sidebar', 'baltic_wc_container_close', 15 );

remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );

function baltic_wc_result_wrap_open(){
	echo '<div class="result-count-wrap clear">';
}
add_action( 'woocommerce_before_shop_loop', 'baltic_wc_result_wrap_open', 19 );

function baltic_wc_result_wrap_close(){
	echo '</div>';
}
add_action( 'woocommerce_before_shop_loop', 'baltic_wc_result_wrap_close', 31 );

remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
add_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_price', 5 );
