<?php
/**
 * Recommended actions admin page
 *
 * @package Baltic
 */
?>

<h2><?php echo __( 'Recommended Actions', 'baltic' );?></h2>

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

<h2 class="title"><?php echo __( 'Recommended Plugins', 'baltic' );?></h2>

<div class="baltic-admin-list wp-clearfix">
	<?php
		$plugins = array(
			array(
				'slug' 			=> 'yith-woocommerce-compare',
				'icon' 			=> esc_url( 'https://ps.w.org/yith-woocommerce-compare/assets/icon-128x128.jpg' ),
				'url' 			=> esc_url( 'https://wordpress.org/plugins/yith-woocommerce-compare' ),
				'name' 			=> 'YITH WooCommerce Compare',
				'description' 	=> esc_html__( 'YITH WooCommerce Compare allows you to compare more products with WooCommerce plugin, through product attributes.', 'baltic' ),
			),
			array(
				'slug' 			=> 'yith-woocommerce-wishlist',
				'icon' 			=> esc_url( 'https://ps.w.org/yith-woocommerce-wishlist/assets/icon-128x128.jpg' ),
				'url' 			=> esc_url( 'https://wordpress.org/plugins/yith-woocommerce-wishlist' ),
				'name' 			=> 'YITH WooCommerce Wishlist',
				'description' 	=> esc_html__( 'YITH WooCommerce Wishlist allows you to add Wishlist functionality to your e-commerce.', 'baltic' ),
			),
			array(
				'slug' 			=> 'one-click-demo-import',
				'icon' 			=> esc_url( 'https://ps.w.org/one-click-demo-import/assets/icon-128x128.png' ),
				'url' 			=> esc_url( 'https://wordpress.org/plugins/one-click-demo-import' ),
				'name' 			=> 'One Click Demo Import',
				'description' 	=> esc_html__( 'Import your content, widgets and theme settings with one click. Theme authors! Enable simple demo import for your theme demo data.', 'baltic' ),
			),
			array(
				'slug' 			=> 'contact-form-7',
				'icon' 			=> esc_url( 'https://ps.w.org/contact-form-7/assets/icon-128x128.png' ),
				'url' 			=> esc_url( 'https://wordpress.org/plugins/contact-form-7' ),
				'name' 			=> 'Contact Form 7',
				'description' 	=> esc_html__( 'Just another contact form plugin. Simple but flexible.', 'baltic' ),
			),
			array(
				'slug' 			=> 'wordpress-seo',
				'icon' 			=> esc_url( 'https://ps.w.org/wordpress-seo/assets/icon-128x128.png' ),
				'url' 			=> esc_url( 'https://wordpress.org/plugins/wordpress-seo' ),
				'name' 			=> 'Yoast SEO',
				'description' 	=> esc_html__( 'The first true all-in-one SEO solution for WordPress, including on-page content analysis, XML sitemaps and much more.', 'baltic' ),
			),
			array(
				'slug' 			=> 'latest-tweets-widget',
				'icon' 			=> esc_url( 'https://ps.w.org/latest-tweets-widget/assets/icon-128x128.png' ),
				'url' 			=> esc_url( 'https://wordpress.org/plugins/latest-tweets-widget' ),
				'name' 			=> 'Latest Tweets Widget',
				'description' 	=> esc_html__( 'Provides a sidebar widget showing latest tweets - compatible with the new Twitter API 1.1', 'baltic' ),
			),
		);
		Baltic_Plugin_Installer::init( $plugins );
	?>
</div><!-- .baltic-installer-list -->
