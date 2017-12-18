<?php
/**
 * Baltic theme notification
 *
 * @package Baltic
 */

if( ! class_exists( 'Baltic_Notification' ) ) :
/**
 * Main Baltic Notification class
 */
class Baltic_Notification {

	public function __construct(){

		add_action( 'admin_enqueue_scripts', array( $this, 'scripts' ) );
		add_action( 'admin_notices', array( $this, 'admin_notices' ), 99 );
		add_action( 'wp_ajax_baltic_dismiss_notice', array( $this, 'dismiss_notice' ) );

	}

	public function scripts(){

		global $pagenow;
		if ( true === (bool) get_option( 'baltic_notice_dismissed' ) ) {
			return;
		}

		$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

		wp_enqueue_script( 'baltic-admin-notice', get_parent_theme_file_uri( "/inc/admin/assets/js/notice$suffix.js" ), array( 'jquery', 'updates' ), 'all' );
		wp_localize_script( 'baltic-admin-notice', 'BalticNoticel10n', array(
			'nonce' 	=> wp_create_nonce( 'baltic_notice_dismiss' ),
		));

	}

	/**
	 * Admin notice markup
	 *
	 * @return void
	 */
	public function admin_notices(){

		global $pagenow;

		if ( true === (bool) get_option( 'baltic_notice_dismissed' ) ) {
			return;
		}

		if( defined( 'WC_PLUGIN_FILE' ) && defined( 'KIRKI_VERSION' ) && defined( 'ELEMENTOR_VERSION' ) ) {
			return;
		}

		$screen = get_current_screen();
		if ( $screen->parent_base == 'edit' ) {
    		return;
		}

		?>
			<div class="notice baltic-notice is-dismissible">
				<?php if( current_user_can( 'install_plugins' ) && current_user_can( 'activate_plugins' ) ) : ?>
				<div class="baltic-notice-content">
					<?php if ( ! class_exists( 'WooCommerce' ) ) : ?>
						<h2><?php echo sprintf( esc_attr__( 'Thank you for choosing %s theme!.', 'baltic' ), BALTIC_THEME_NAME ); ?></h2>
						<p><?php echo sprintf( esc_attr__( '%s theme is designed to be an ecommerce. To enable eCommerce features you need to install and activate the WooCommerce plugin.', 'baltic' ), BALTIC_THEME_NAME ); ?></p>
						<p><?php Baltic_Plugin_Installer::install_plugin_button( 'woocommerce', 'WooCommerce', array( 'button-primary', 'button-hero' ), '', '', __( 'Install WooCommerce', 'baltic' ) );?></p>
					<?php elseif( ! class_exists( 'Kirki' ) || ! class_exists( 'Elementor' ) ) : ?>
						<h2><?php echo esc_attr__( 'Your site is almost ready.', 'baltic' ); ?></h2>
						<p><?php echo sprintf( esc_attr__( 'In order to enable additional features of %s theme, you can navigate to the theme setup. Otherwise you can close this notification.', 'baltic' ), BALTIC_THEME_NAME ); ?></p>
						<p><a href="<?php echo self_admin_url( 'themes.php?page=baltic&tab=actions' ) ;?>" class="button button-primary button-hero"><?php esc_attr_e( 'Complete Setup', 'baltic' );?></a></p>
					<?php endif;?>
				</div>
				<?php endif;?>
			</div>
		<?php

	}

	/**
	 * AJAX dismiss notice.
	 *
	 * @since 2.2.0
	 */
	public function dismiss_notice() {

		$nonce = ! empty( $_POST['nonce'] ) ? $_POST['nonce'] : false;

		if ( ! $nonce || ! wp_verify_nonce( $nonce, 'baltic_notice_dismiss' ) || ! current_user_can( 'manage_options' ) ) {
			die();
		}

		update_option( 'baltic_notice_dismissed', true );

	}



}
endif;
return new Baltic_Notification;
