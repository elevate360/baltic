<?php
/**
 * Getting add-ons admin page
 *
 * @package Baltic
 */
?>
<h2 class="title"><?php _e( 'Premium Add-Ons', 'baltic' );?></h2>
<div class="clear"></div>
<div class="baltic-admin-list wp-clearfix">
	<?php
		$plugin_array = array(
			array(
				'slug' 			=> 'baltic-pro',
				'url' 			=> 'https://elevatethemes.com.au/baltic-pro/',
				'name' 			=> esc_html__( 'Baltic Pro', 'baltic' ),
				'description' 	=> esc_html__( 'Supercharge your Baltic theme with tons of premium features.', 'baltic' ),
				'icon' 			=> get_parent_theme_file_uri( '/assets/images/baltic-pro.png' ),
				'author' 		=> esc_html__( 'Elevate Themes', 'baltic' ),
				'author_url' 	=> 'https://elevatethemes.com.au/',
				'external'		=> true,
				'premium'		=> true,
			),
			array(
				'slug' 			=> 'elevate-elements',
				'url' 			=> 'https://elevatethemes.com.au/elevate-elements/',
				'name' 			=> esc_html__( 'Elevate Elements', 'baltic' ),
				'description' 	=> esc_html__( 'Add new premium features for Elementor page builder plugin.', 'baltic' ),
				'icon' 			=> get_parent_theme_file_uri( '/assets/images/elevate-elements.png' ),
				'author' 		=> esc_html__( 'Elevate Themes', 'baltic' ),
				'author_url' 	=> 'https://elevatethemes.com.au/',
				'external'		=> true,
				'premium'		=> true,
			),
		);
		Baltic_Plugin_Installer::init( $plugin_array );
	?>
</div>
