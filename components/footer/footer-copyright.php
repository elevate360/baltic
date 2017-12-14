<?php
/**
 * Baltic footer
 *
 * @package Baltic
 */

$default_footer_copyright 	= sprintf( __( 'Copyright &copy; %1$s %2$s. Proudly powered by %3$s.', 'baltic' ),
	date_i18n( __('Y', 'baltic' ) ),
	'<a href="'. esc_url( home_url() ) .'">'. esc_attr( get_bloginfo( 'name' ) ) .'</a>',
	'<a href="'. esc_url( 'https://wordpress.org/' ) .'">WordPress</a>' );

$footer_copyright 			= get_theme_mod( 'footer_copyright', $default_footer_copyright );
?>
<div class="site-info column-item">
	<?php
		if ( ! empty( $footer_copyright ) ) {
			$footer_copyright = str_replace( '[YEAR]', date_i18n( __('Y', 'baltic' ) ), $footer_copyright );
			$footer_copyright = str_replace( '[SITE]', '<a href="'. esc_url( home_url() ) .'">'. esc_attr( get_bloginfo( 'name' ) ) .'</a>', $footer_copyright );
			echo htmlspecialchars_decode( esc_attr( $footer_copyright ) );
		} else {
			echo htmlspecialchars_decode( esc_attr( $default_footer_copyright ) );
		}
	?>
</div>
