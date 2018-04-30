<?php
/**
 * Payment icons.
 *
 * @package Baltic
 */

$icons = Baltic_Options::get_option( 'payment_icons' );

if ( ! empty( $icons ) ) {
	echo '<div class="footer-payments-card">';
		echo '<div class="container">';

			echo '<ul class="baltic__payment-icons">';
			foreach ( $icons as $icon) {
				echo '<li>';
					echo Baltic_Icons::get_svg( array(
						'class'	=> 'icon icon-payment',
						'icon' 	=> esc_attr( $icon )
					) );
				echo '</li>';
			}
			echo '</ul>';

		echo '</div>';
	echo '</div>';
}
?>
