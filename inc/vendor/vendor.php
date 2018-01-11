<?php
/**
 * Baltic vendor configuration.
 *
 * @package Baltic
 */

/**
 * Include the TGM_Plugin_Activation class.
 */
require_once get_template_directory() . '/inc/vendor/class-tgm-plugin-activation.php';

/**
 * Register the required plugins for this theme.
 */
function baltic_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		array(
			/* Recommended plugin name */
			'name'      => __( 'Kirki Toolkit', 'baltic' ),
			'slug'      => 'kirki',
			'required'  => true,
            'detail' 	=> array(
                'image' => esc_url( 'https://ps.w.org/elementor/assets/icon-128x128.png' ),
            )
		),

		array(
			/* Recommended plugin name */
			'name'      => __( 'WooCommerce', 'baltic' ),
			'slug'      => 'woocommerce',
			'required'  => false,
            'detail' 	=> array(
                'image' => esc_url( 'https://ps.w.org/woocommerce/assets/icon-128x128.png' ),
            )
		),

		array(
			/* Recommended plugin name */
			'name'      => __( 'WP Term Images', 'baltic' ),
			'slug'      => 'wp-term-images',
			'required'  => false,
		),

	);

	/*
	 * Array of configuration settings.
	 */
	$config = array(
		'id'           => 'baltic',
		'default_path' => '',
		'menu'         => 'tgmpa-install-plugins',
		'has_notices'  => true,
		'dismissable'  => true,
		'dismiss_msg'  => '',
		'is_automatic' => false,
		'message'      => '',
	);

	tgmpa( $plugins, $config );

}
add_action( 'tgmpa_register', 'baltic_register_required_plugins' );
