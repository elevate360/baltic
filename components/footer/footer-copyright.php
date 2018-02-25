<?php
/**
 * Baltic footer
 *
 * @package Baltic
 */
?>
<div class="site-info column-item">
	<?php
		$footer_text = baltic_get_option( 'footer_text' );
		if ( ! empty( $footer_text ) ) {
			$footer_text = str_replace( '[YEAR]', date_i18n( __( 'Y', 'baltic' ) ), $footer_text );
			$footer_text = str_replace( '[SITE]', '<a href="'. esc_url( home_url() ) .'">'. esc_attr( get_bloginfo( 'name' ) ) .'</a>', $footer_text );
			$footer_text = str_replace( '[WP]', '<a href="'. esc_url( 'https://wordpress.org/' ) .'">WordPress</a>', $footer_text );
			echo wp_kses_post( wpautop( $footer_text ) );
		}

		if ( baltic_get_option( 'footer_credits' ) ) {
			echo '<p class="site-designer">';
			printf( esc_html__( 'Theme design by %1$s %2$s.', 'baltic' ), baltic_get_svg( array( 'icon' => 'campaignkit' ) ), '<a href="https://campaignkit.co/" target="_blank">Campaign Kit</a>' );
			echo '</p>';
		}
	?>
</div>
