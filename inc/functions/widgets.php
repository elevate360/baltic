<?php
/**
 * Widgets function and definition
 *
 * @package Baltic
 */

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function baltic_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'baltic' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'baltic' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title h6">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar Footer', 'baltic' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Add widgets here.', 'baltic' ),
		'before_widget' => '<section id="%1$s" class="widget column-item %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title h6">',
		'after_title'   => '</h2>',
	) );
	if ( class_exists( 'WooCommerce' ) ) {
		register_sidebar( array(
			'name'          => esc_html__( 'Sidebar Shop', 'baltic' ),
			'id'            => 'sidebar-3',
			'description'   => esc_html__( 'Add widgets here.', 'baltic' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title h6">',
			'after_title'   => '</h2>',
		) );
	}
}
add_action( 'widgets_init', 'baltic_widgets_init' );

/**
 * [baltic_after_setup_widget description]
 * @return [type] [description]
 */
function baltic_after_setup_widget(){

	add_filter( 'widget_tag_cloud_args', 'baltic_widget_tag_cloud_args' );
	add_filter( 'woocommerce_product_tag_cloud_widget_args', 'baltic_widget_tag_cloud_args' );

}
add_action( 'after_setup_theme', 'baltic_after_setup_widget' );

/**
 * Modifies tag cloud widget arguments to have all tags in the widget same font size.
 *
 * @param array $args Arguments for tag cloud widget.
 * @return array A new modified arguments.
 */
function baltic_widget_tag_cloud_args( $args ) {
	$args['largest'] = 0.875;
	$args['smallest'] = 0.875;
	$args['unit'] = 'rem';
	return $args;
}
