<?php
/**
 * Homepage structure
 *
 * @package Baltic
 */

/**
 * Homepage section
 *
 * @return void
 */
function baltic_homepage_section() {

	$default = array(
		'slider',
		'product-categories-1',
		'products-1',
		'posts-1'
	);

	$sections = get_theme_mod( 'baltic_homepage_order', $default );

	foreach ( $sections as $section ) {
		get_template_part( 'components/homepage/' . $section );
	}

}
add_action( 'baltic_homepage', 'baltic_homepage_section' );

/**
 * Callback function for components/hero.php template part
 * @return void
 */
function baltic_homepage_hero() {
	get_template_part( 'components/homepage/hero' );
}

/**
 * Callback function for components/slider.php template part
 * @return void
 */
function baltic_homepage_slider() {
	get_template_part( 'components/homepage/slider' );
}

/**
 * Callback function for components/product-categories-1.php template part
 * @return void
 */
function baltic_homepage_product_categories_1() {
	get_template_part( 'components/homepage/product-categories-1' );
}

/**
 * Callback function for components/product-categories-2.php template part
 * @return void
 */
function baltic_homepage_product_categories_2() {
	get_template_part( 'components/homepage/product-categories-2' );
}

/**
 * Callback function for components/products-1.php template part
 * @return void
 */
function baltic_homepage_products_1() {
	get_template_part( 'components/homepage/products-1' );
}

/**
 * Callback function for components/products-2.php template part
 * @return void
 */
function baltic_homepage_products_2() {
	get_template_part( 'components/homepage/products-2' );
}

/**
 * Callback function for components/products-3.php template part
 * @return void
 */
function baltic_homepage_products_3() {
	get_template_part( 'components/homepage/products-3' );
}

/**
 * Callback function for components/products-4.php template part
 * @return void
 */
function baltic_homepage_products_4() {
	get_template_part( 'components/homepage/products-4' );
}

/**
 * Callback function for components/posts-1.php template part
 * @return void
 */
function baltic_homepage_posts_1() {
	get_template_part( 'components/homepage/posts-1' );
}

/**
 * Callback function for components/posts-2.php template part
 * @return void
 */
function baltic_homepage_posts_2() {
	get_template_part( 'components/homepage/posts-2' );
}

/**
 * Callback function for components/testimonial.php template part
 * @return void
 */
function baltic_homepage_testimonial() {
	get_template_part( 'components/homepage/testimonial' );
}

/**
 * Callback function for components/latest-posts.php template part
 * @return void
 */
function baltic_homepage_latest_posts() {
	get_template_part( 'components/homepage/latest-posts' );
}

/**
 * Callback function for components/latest-tweets.php template part
 * @return void
 */
function baltic_homepage_latest_tweets() {
	get_template_part( 'components/homepage/latest-tweets' );
}
