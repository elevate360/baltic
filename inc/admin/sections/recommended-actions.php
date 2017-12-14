<?php
/**
 * Recommended actions admin page
 *
 * @package Baltic
 */
?>
<h2 class="title"><?php echo __( 'Recommended Actions', 'baltic' );?></h2>

<div class="clear"></div>

<div class="baltic-admin-list wp-clearfix">
	<?php
		$plugins = array(
			array(
				'slug' 			=> 'woocommerce',
				'icon' 			=> esc_url( 'https://ps.w.org/woocommerce/assets/icon-128x128.png' ),
				'url' 			=> esc_url( 'https://wordpress.org/plugins/themes' ),
				'name' 			=> 'WooCommerce',
				'description' 	=> esc_html__( 'An e-commerce toolkit that helps you sell anything.', 'baltic' ),			),
			array(
				'slug' 			=> 'kirki',
				'icon' 			=> esc_url( 'https://ps.w.org/kirki/assets/icon-128x128.png' ),
				'url' 			=> esc_url( 'https://wordpress.org/plugins/kirki' ),
				'name' 			=> 'Kirki Toolkit',
				'description' 	=> esc_html__( 'The ultimate framework for theme developers using the WordPress Customizer.', 'baltic' ),
			),
			array(
				'slug' 			=> 'elementor',
				'icon' 			=> esc_url( 'https://ps.w.org/elementor/assets/icon-128x128.png' ),
				'url' 			=> esc_url( 'https://wordpress.org/plugins/elementor' ),
				'name' 			=> 'Elementor',
				'description' 	=> esc_html__( 'The most advanced frontend drag & drop page builder.', 'baltic' ),
			),
		);
		Baltic_Plugin_Installer::init( $plugins );
	?>
</div><!-- .container -->
