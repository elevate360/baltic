<?php
/**
 * WooCommerce template hook
 *
 * @package Baltic
 */

/**
 * Baltic WooCommerce Markup
 *
 * @return void
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

	/** Remove WooCommerce Pagination*/
	remove_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination', 10 );

	/** Add entry-inner inside li.product */
	add_action( 'woocommerce_before_shop_loop_item', 'baltic_wc_entry_inner_open', 5 );
	add_action( 'woocommerce_after_shop_loop_item', 'baltic_wc_entry_inner_close', 99 );

	/** Onsale flash */
	remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );

	/** Product thumbnail wrap */
	add_action( 'woocommerce_before_shop_loop_item', 'baltic_product_thumbnail_wrap_open', 7 );
	add_action( 'woocommerce_before_shop_loop_item', 'woocommerce_show_product_loop_sale_flash', 9 );
	add_action( 'woocommerce_before_shop_loop_item', 'baltic_products_extra_buttons', 9 );
	add_action( 'woocommerce_before_shop_loop_item', 'baltic_product_thumbnail_wrap_close', 9 );

	/** Reposition rating */
	remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
	add_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );

	/** Remove sidebar if full-width layout is selected */
	remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
	add_action( 'woocommerce_sidebar', 'baltic_wc_sidebar', 10 );

	/** Header extra */
	add_action( 'baltic_header', 'baltic_wc_header_extra', 35 );
	add_filter( 'woocommerce_add_to_cart_fragments', 'baltic_wc_cart_link_fragment' );
	add_action( 'baltic_header', 'baltic_wc_header_cart', 35 );

	/** Add extra menu */
	add_filter( 'wp_nav_menu_items', 'baltic_wc_myaccount_menu', 10, 2 );

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
	<div id="primary" class="content-area is-woocommerce">
		<main id="main" class="site-main woocommerce" role="main">
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
 * [baltic_product_thumbnail_wrap_open description]
 * @return [type] [description]
 */
function baltic_product_thumbnail_wrap_open(){
	echo '<div class="baltic-product-thumbnail-wrap">';
}

/**
 * [baltic_product_thumbnail_wrap_close description]
 * @return [type] [description]
 */
function baltic_product_thumbnail_wrap_close(){
	echo '</div>';
}

/**
 * [baltic_products_extra_buttons description]
 *
 * @return [type] [description]
 */
function baltic_products_extra_buttons() {
?>
	<div class="baltic-extra-button">
		<ul>
			<?php if( defined( 'YITH_WCWL' ) ) :?>
			<li>
				<?php echo do_shortcode( '[yith_wcwl_add_to_wishlist]' );?>
			</li>
			<?php endif;?>
			<li>
				<a href="<?php the_permalink( get_the_id() );?>" class="extra-button ajax-quick-view" title="<?php esc_html_e( 'Quick View', 'baltic' );?>" data-product_id="<?php echo get_the_ID();?>">
					<?php echo baltic_get_svg( array( 'class' => 'icon-stroke', 'icon' => 'search' ) );?>
				</a>
			</li>
		</ul>
	</div>
<?php
}

/**
 * [baltic_wc_pagination description]
 * @return [type] [description]
 */
function baltic_wc_pagination(){

	if ( class_exists( 'Jetpack' ) && Jetpack::is_module_active( 'infinite-scroll' ) ) {
		return;
	}

	if ( baltic_get_option( 'products_nav' ) == 'products_navigation' ) {
		the_posts_navigation( array(
	        'prev_text'          => esc_html( baltic_get_option( 'products_nav_prev' ) ),
	        'next_text'          => esc_html( baltic_get_option( 'products_nav_next' ) ),
		) );
	} elseif( baltic_get_option( 'products_nav' ) == 'products_pagination' ) {
		the_posts_pagination( array(
			'prev_text'          => sprintf( '%s <span class="screen-reader-text">%s</span>', baltic_get_svg( array( 'class' => 'icon-stroke', 'icon' => 'arrow-left' ) ), __( 'Previous Product', 'baltic' ) ),
			'next_text'          => sprintf( '%s <span class="screen-reader-text">%s</span>', baltic_get_svg( array( 'class' => 'icon-stroke', 'icon' => 'arrow-right' ) ), __( 'Next Product', 'baltic' ) ),
			'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'baltic' ) . ' </span>',
		) );
	}

}

/**
 * [baltic_wc_sidebar description]
 * @uses   baltic_get_products_layout() [<description>]
 * @return [type] [description]
 */
function baltic_wc_sidebar(){

	$layout = baltic_get_products_layout();

	if( $layout == 'content-sidebar' || $layout == 'sidebar-content' ) {
		woocommerce_get_sidebar();
	}

}

/**
 * [baltic_wc_header_extra description]
 *
 * @uses  baltic_get_svg()
 * @uses  baltic_wc_cart_link()
 * @return [type] [description]
 */
function baltic_wc_header_extra(){
?>
	<div class="site-header-extra">
		<ul>
			<?php if( defined( 'YITH_WCWL' ) ) : ?>
				<li><a href="<?php the_permalink( get_option( 'yith-wcwl-page-id' ) );?>" title="<?php esc_html_e( 'Wishlist', 'baltic' );?>" class="header-wishlist"><?php echo baltic_get_svg( array( 'class' => 'icon-stroke', 'icon' => 'heart' ) );?> <span class="total hide">0</span></a></li>
			<?php endif;?>
			<li><a href="#" title="<?php esc_html_e( 'Cart', 'baltic' );?>" class="header-cart-link"><?php baltic_wc_cart_link();?></a></li>
		</ul>
	</div><!-- .site-header-extra -->
<?php
}


/**
 * [baltic_wc_cart_link description]
 * @return [type] [description]
 */
function baltic_wc_cart_link() {
?>
<div class="cart-link-content">
	<?php
	echo baltic_get_svg( array( 'class' => 'icon-stroke', 'icon' => 'cart' ) );

	if( WC()->cart->get_cart_contents_count() !== 0 ) : ?>
		<span class="total">
			<?php echo wp_kses_data( WC()->cart->get_cart_contents_count() );?>
		</span>
	<?php endif;?>
</div>
<?php
}

/**
 * [baltic_wc_cart_link_fragment description]
 * @uses  baltic_wc_cart_link()
 * @return [type] [description]
 */
function baltic_wc_cart_link_fragment( $fragments ) {
	ob_start();
	baltic_wc_cart_link();
	$fragments['.cart-link-content'] = ob_get_clean();

	return $fragments;
}


/**
 * [baltic_wc_header_cart description]
 *
 * @uses  is_checkout() [<description>]
 * @uses  is_cart() [<description>]
 * @uses  the_widget( $widget, $instance = array, $args = array ) [<description>]
 * @return [type] [description]
 */
function baltic_wc_header_cart() {
	if( is_cart() || is_checkout() ) {
		return;
	}
?>
	<div class="header-cart-content">
		<?php the_widget( 'WC_Widget_Cart', array( 'title' => '' ) );?>
	</div><!-- .site-header-cart -->
<?php
}


/**
 * [baltic_woocommerce_endpoint_menu description]
 * @uses  wc_get_account_menu_items() [<description>]
 * @return [type] [description]
 */
function baltic_wc_endpoint_menu() {

	$menu_items = wc_get_account_menu_items();

	$myaccount_menu = '';

	foreach ( $menu_items as $endpoint => $label ) {
		$myaccount_menu .= sprintf( '<li class="menu-item"><a href="%s">%s</a></li>',
			esc_url( wc_get_account_endpoint_url( $endpoint ) ),
			esc_html( $label )
		);
	}

	return $myaccount_menu;

}

/**
 * Add Login/ my account menu at menu-1
 *
 * @uses  baltic_get_svg( array() )
 * @return string
 */
function baltic_wc_myaccount_menu( $menu, $args ) {

	$args = (array)$args;

	if ( ! class_exists( 'WooCommerce' ) ) {
		return $menu;
	}

	if ( 'menu-1' !== $args['theme_location']  ){
		return $menu;
	}

	$toggle_menu = sprintf( '<button class="sub-menu-toggle" role="button" aria-expanded="false">%s%s</button>',
		baltic_get_svg( array( 'class' => 'icon-stroke', 'icon' => 'chevron-top' ) ),
		baltic_get_svg( array( 'class' => 'icon-stroke', 'icon' => 'chevron-bottom' ) ) );

	$icon = baltic_get_svg( array( 'class' => 'icon-stroke', 'icon' => 'user' ) );

	$myaccount_page = ( is_page( wc_get_page_id( 'myaccount' ) ) ) ? ' current-menu-item' : '';

	if ( is_user_logged_in() ) {
		$link = '
			<li class="menu-item menu-item-has-children menu-right'. esc_attr(  $myaccount_page ) .'">
				<a href="'. get_permalink( wc_get_page_id( 'myaccount' ) ) .'">'. $icon . esc_html__( 'My Account', 'baltic' ) . $toggle_menu .'</a>
				<ul class="sub-menu">
					'. baltic_wc_endpoint_menu() .'
				</ul>
			</li>'
		;
	} else {
		$link = '
			<li class="menu-item menu-right'. esc_attr(  $myaccount_page ) .'">
				<a href="'. get_permalink( wc_get_page_id( 'myaccount' ) ) .'">'. $icon . esc_html__( 'Login', 'baltic' ) .'</a>
			</li>'
		;
	}

	return $menu . $link;

}

