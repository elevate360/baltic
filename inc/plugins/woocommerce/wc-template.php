<?php
/**
 * WooCommerce template hook
 *
 * @package Baltic
 */

/**
 * Baltic WooCommerce Markup
 * @return [type] [description]
 */
function baltic_wc_markup(){

	/** Add archive page header */
	add_action( 'baltic_inner_before', 'baltic_wc_page_header', 20 );
	add_action( 'woocommerce_archive_description', 'baltic_wc_archive_thumbnail', 20 );

	/** Breadcrumb */
	remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
	add_action( 'woocommerce_archive_description', 'baltic_do_breadcrumb', 20 );

	/** Wrap #primary and #secondary within container class */
	add_action( 'woocommerce_before_main_content', 'baltic_wc_container_open', 5 );
	add_action( 'woocommerce_sidebar', 'baltic_wc_container_close', 15 );

	/** Add primary main wrapper */
	remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
	remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
	add_action( 'woocommerce_before_main_content', 'baltic_wc_wrapper_before' );
	add_action( 'woocommerce_after_main_content', 'baltic_wc_wrapper_after' );

	/** Wrap result and sort within a div */
	add_action( 'woocommerce_before_shop_loop', 'baltic_wc_result_wrap_open', 19 );
	add_action( 'woocommerce_before_shop_loop', 'baltic_wc_result_wrap_close', 31 );

	/** Add WooCommerce columns count */
	add_action( 'woocommerce_before_shop_loop', 'baltic_wc_product_columns_wrapper', 40 );
	add_action( 'woocommerce_after_shop_loop', 'baltic_wc_product_columns_wrapper_close', 40 );

	/** Add pagination within primary and main class */
	remove_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination', 10 );

	/** Add entry-inner inside li.product */
	add_action( 'woocommerce_before_shop_loop_item', 'baltic_wc_entry_inner_open', 5 );
	add_action( 'woocommerce_after_shop_loop_item', 'baltic_wc_entry_inner_close', 99 );

	/** Reposition rating */
	remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
	add_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );

	/** Remove sidebar if full-width layout is selected */
	remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
	add_action( 'woocommerce_sidebar', 'baltic_wc_sidebar', 10 );

}
add_action( 'baltic_init', 'baltic_wc_markup', 15 );

/**
 * [baltic_wc_page_header description]
 * @return [type] [description]
 */
function baltic_wc_page_header(){
	if( ! is_woocommerce() ) {
		return;
	}
?>
    <header class="page-header woocommerce-products-header">
    	<div class="container">
			<div class="page-header-inner">
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
			</div><!-- .page-header-inner -->
		</div><!-- .container -->
    </header><!-- .page-header -->
<?php
}

/**
 * [baltic_wc_archive_thumbnail description]
 * @return [type] [description]
 */
function baltic_wc_archive_thumbnail(){

	$shop_id 	= wc_get_page_id( 'shop' );

    if ( is_product_category() ){
	    global $wp_query;
	    $cat 		= $wp_query->get_queried_object();
	    $image_id 	= get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true );
	    $image 		= wp_get_attachment_image( $image_id, 'full' );

	    if ( $image ) {
	    	echo sprintf( '<figure class="page-header-thumbnail">%s</figure>', $image );
		}

	} elseif ( is_shop() || ( is_post_type_archive( 'product' ) && is_search() ) ) {

		$image 		= get_the_post_thumbnail( $shop_id, 'full' );

		if ( $image ) {
			echo sprintf( '<figure class="page-header-thumbnail">%s</figure>', $image );
		}

	}

}

/**
 * [baltic_wc_container_open description]
 * @return [type] [description]
 */
function baltic_wc_container_open(){
	?>
		<div class="container">
			<div class="columns">
	<?php
}

/**
 * [baltic_wc_container_close description]
 * @return [type] [description]
 */
function baltic_wc_container_close(){
	?>
			</div><!-- .columns -->
		</div><!-- .container -->
	<?php
}

/**
 * Before Content.
 *
 * Wraps all WooCommerce content in wrappers which match the theme markup.
 *
 * @return void
 */
function baltic_wc_wrapper_before() {
	?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
	<?php
}


/**
 * After Content.
 *
 * Closes the wrapping divs.
 *
 * @return void
 */
function baltic_wc_wrapper_after() {
	?>
		</main><!-- #main -->
		<?php baltic_wc_pagination();?>
	</div><!-- #primary -->
	<?php
}


/**
 * [baltic_wc_result_wrap_open description]
 * @return [type] [description]
 */
function baltic_wc_result_wrap_open(){
	echo '<div class="result-count-wrap clear">';
}

/**
 * [baltic_wc_result_wrap_close description]
 * @return [type] [description]
 */
function baltic_wc_result_wrap_close(){
	echo '</div>';
}

/**
 * Product columns wrapper.
 *
 * @return  void
 */
function baltic_wc_product_columns_wrapper() {

	echo '<div class="columns-' . absint( baltic_get_option( 'products_columns' ) ) .'">';

}

/**
 * Product columns wrapper close.
 *
 * @return  void
 */
function baltic_wc_product_columns_wrapper_close() {
	echo '</div>';
}

/**
 * [baltic_wc_entry_inner_open description]
 * @return [type] [description]
 */
function baltic_wc_entry_inner_open(){
	echo '<div class="entry-product">';
}

/**
 * [baltic_wc_entry_inner_close description]
 * @return [type] [description]
 */
function baltic_wc_entry_inner_close(){
	echo '</div>';
}

/**
 * [baltic_wc_pagination description]
 * @return [type] [description]
 */
function baltic_wc_pagination(){

	if ( class_exists( 'Jetpack' ) && Jetpack::is_module_active( 'infinite-scroll' ) ) {
		return;
	}

	if ( baltic_get_option( 'posts_navigation' ) == 'posts_navigation' ) {
		the_posts_navigation( array(
	        'prev_text'          => __( '&larr; Older Products', 'baltic' ),
	        'next_text'          => __( 'Newer Products &rarr;', 'baltic' ),
		) );
	} else {
		the_posts_pagination( array(
			'prev_text'          => sprintf( '%s <span class="screen-reader-text">%s</span>', baltic_get_svg( array( 'class' => 'icon-stroke', 'icon' => 'arrow-left' ) ), __( 'Previous Product', 'baltic' ) ),
			'next_text'          => sprintf( '%s <span class="screen-reader-text">%s</span>', baltic_get_svg( array( 'class' => 'icon-stroke', 'icon' => 'arrow-right' ) ), __( 'Next Product', 'baltic' ) ),
			'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'baltic' ) . ' </span>',
		) );
	}

}

/**
 * [baltic_wc_sidebar description]
 * @return [type] [description]
 */
function baltic_wc_sidebar(){

	$layout = baltic_get_products_layout();

	if( $layout == 'content-sidebar' || $layout == 'sidebar-content' ) {
		woocommerce_get_sidebar();
	}

}

