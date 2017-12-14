<?php
/**
 * Baltic Plugin Install Class
 *
 * @link 	 https://github.com/dcooney/wordpress-plugin-installer
 * @package  Baltic
 */

if ( ! class_exists( 'Baltic_Plugin_Installer' ) ) :
/**
 * Main Baltic Plugin installer class
 */
class Baltic_Plugin_Installer {


	/**
	 * [__construct description]
	 */
	public function __construct(){

		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		add_action( 'wp_ajax_baltic_plugin_activation', array( $this, 'plugin_activation' ) );

	}

	/**
	 * [enqueue_scripts description]
	 * @param  string $hook [description]
	 * @return [type]       [description]
	 */
	public function enqueue_scripts(){

		$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

		wp_enqueue_script( 'baltic-plugin-installer', get_parent_theme_file_uri( "/inc/admin/assets/js/admin$suffix.js" ), array( 'jquery', 'updates' ), 'all' );
		wp_localize_script( 'baltic-plugin-installer', 'BalticInstallerl10n', array(
			'installer_nonce' 	=> wp_create_nonce( 'baltic_installer_nonce' ),
			'activated_btn' 	=> __( 'Activated', 'baltic' )
		));

	}

	/**
	 * [init description]
	 * @param  [type] $plugins [description]
	 * @return [type]          [description]
	 */
	public static function init( $plugins ){

		if ( ! current_user_can( 'install_plugins' ) && ! current_user_can( 'activate_plugins' ) ) {
			return;
		}

		foreach ( $plugins as $plugin ) :

			$data = array(
				'slug' 			=> isset( $plugin['slug'] ) 		? $plugin['slug'] : '',
				'url' 			=> isset( $plugin['url'] ) 			? $plugin['url'] : '',
				'name' 			=> isset( $plugin['name'] ) 		? $plugin['name'] : '',
				'description' 	=> isset( $plugin['description'] ) 	? $plugin['description'] : '',
				'icon' 			=> isset( $plugin['icon'] ) 		? $plugin['icon'] : '',
				'author' 		=> isset( $plugin['author'] ) 		? $plugin['author'] : '',
				'author_url' 	=> isset( $plugin['author_url'] ) 	? $plugin['author_url'] : '',
				'external'		=> isset( $plugin['external'] )		? true : false,
				'premium'		=> isset( $plugin['premium'] )		? true : false,
			);

			if ( is_wp_error( $data ) ) {
				return;
			}

			echo '<div class="baltic-admin-card">';
				echo '<div class="baltic-admin-card-body">';

					if ( $data['premium'] == true ) {
						echo sprintf( '<span class="premium-label">%s</span>', __( 'Premium', 'baltic' ) );
					}

					echo sprintf( '<img src="%s" alt="%s">', esc_url( $data['icon'] ), esc_attr( $data['name'] ) );
					echo sprintf( '<h2>%s</h2>', esc_attr( $data['name'] ) );
					echo wpautop( wp_kses_post( $data['description'] ) );

				echo '</div>';

				echo '<div class="baltic-admin-card-footer">';

					if ( $data['external'] == false ) {
						self::install_plugin_button(
							$data['slug'],
							$data['name']
						);
					} else {
						if ( self::_get_plugin_file( $data['slug'] ) ) {
							self::install_plugin_button(
								$data['slug'],
								$data['name']
							);
						} else {
							echo sprintf( '<a href="%s" class="button button-premium" target="_blank">%s</a>',
									esc_url( $data['url'] ),
									esc_attr__( 'Get This Plugin &rarr;', 'baltic' )
								);
						}
					}

					echo sprintf( '<span class="plugin-detail"><a href="%s" target="_blank">%s</a></span>',
							esc_url( $data['url'] ),
							esc_attr__( 'More Details', 'baltic' )
						);

				echo '</div>';
			echo '</div>';

		endforeach;

	}

	/**
	 * Output a button that will install or activate a plugin if it doesn't exist, or display a disabled button if the
	 * plugin is already activated.
	 *
	 * @param  [type] $plugin_slug [description]
	 * @param  [type] $plugin_name [description]
	 * @param  array  $classes     [description]
	 * @param  string $activated   [description]
	 * @param  string $activate    [description]
	 * @param  string $install     [description]
	 * @return [type]              [description]
	 */
	public static function install_plugin_button( $plugin_slug, $plugin_name, $classes = array(), $activated = '', $activate = '', $install = '' ) {

		if ( ! current_user_can( 'install_plugins' ) && ! current_user_can( 'activate_plugins' ) ) {
			return;
		}

		if ( is_plugin_active( self::_get_plugin_file( $plugin_slug ) ) ) {
			// The plugin is already active
			$button = array(
				'message' => esc_attr__( 'Activated', 'baltic' ),
				'url'     => '#',
				'classes' => array( 'button', 'baltic-button', 'disabled' ),
			);

			if ( '' !== $activated ) {
				$button['message'] = esc_attr( $activated );
			}
		} elseif ( $url = self::_is_plugin_installed( $plugin_slug ) ) {
			// The plugin exists but isn't activated yet.
			$button = array(
				'message' => esc_attr__( 'Activate', 'baltic' ),
				'url'     => $url,
				'classes' => array( 'button', 'button-primary', 'baltic-activate-now', 'activate-now' ),
			);

			if ( '' !== $activate ) {
				$button['message'] = esc_attr( $activate );
			}
		} else {
			// The plugin doesn't exist.
			$url = wp_nonce_url( add_query_arg( array(
				'action' => 'install-plugin',
				'plugin' => $plugin_slug,
			), self_admin_url( 'update.php' ) ), 'install-plugin_' . $plugin_slug );
			$button = array(
				'message' => esc_attr__( 'Install now', 'baltic' ),
				'url'     => $url,
				'classes' => array( 'button', 'baltic-install-now', 'install-now', 'install-' . $plugin_slug ),
			);

			if ( '' !== $install ) {
				$button['message'] = esc_attr( $install );
			}
		}

		if ( ! empty( $classes ) ) {
			$button['classes'] = array_merge( $button['classes'], $classes );
		}

		$button['classes'] = implode( ' ', $button['classes'] );

		?>
		<span class="baltic-plugin-card plugin-card-<?php echo esc_attr( $plugin_slug ); ?>">
			<a href="<?php echo esc_url( $button['url'] ); ?>" class="<?php echo esc_attr( $button['classes'] ); ?>" data-originaltext="<?php echo esc_attr( $button['message'] ); ?>" data-name="<?php echo esc_attr( $plugin_name ); ?>" data-slug="<?php echo esc_attr( $plugin_slug ); ?>" aria-label="<?php echo esc_attr( $button['message'] ); ?>"><?php echo esc_attr( $button['message'] ); ?></a>
		</span>
		<?php

	}

	/**
	 * Activate premium plugin via Ajax
	 *
	 * @return [type] [description]
	 */
	public function plugin_activation() {

		if ( ! current_user_can( 'activate_plugins' ) ) {
			wp_die( __( 'Sorry, you are not allowed to activate plugins on this site.', 'baltic' ) );
		}

		$nonce 	= $_POST["nonce"];
		$plugin = $_POST["plugin"];

		// Check our nonce, if they don't match then bounce!
		if ( ! wp_verify_nonce( $nonce, 'baltic_installer_nonce' ) ) {
			die( __( 'Error - unable to verify nonce, please try again.', 'baltic' ) );
		}

		// Include required libs for activation
		require_once( ABSPATH . 'wp-admin/includes/class-wp-upgrader.php' );
		require_once( ABSPATH . 'wp-admin/includes/class-plugin-upgrader.php' );


		// Get Plugin Info
		$data = array(
			'slug' 	=> $plugin,
			'name' 	=> $plugin['name'],
		);

		if ( $data['name'] ) {
			$main_plugin_file = self::_get_plugin_file( $plugin );
			$status = 'success';
			if ( $main_plugin_file ) {
				activate_plugin( $main_plugin_file );
				$msg = sprintf( __( '%s successfully activated.', 'baltic' ), $data['name'] );
			}
		} else {
			$status = 'failed';
			$msg 	= sprintf( __( 'There was an error activating %s.', 'baltic' ), $data['name'] );
		}

		$json = array(
			'status' 	=> $status,
			'msg' 		=> $msg,
		);

		wp_send_json( $json );

	}

	/**
	 * A method to get the main plugin file
	 *
	 * @param  [type] $plugin_slug [description]
	 * @return [type]              [description]
	 */
	private static function _get_plugin_file( $plugin_slug ) {

		require_once( ABSPATH . '/wp-admin/includes/plugin.php' ); // Load plugin lib

		$plugins = get_plugins();

		foreach( $plugins as $plugin_file => $plugin_info ) {

			// Get the basename of the plugin e.g. [askismet]/askismet.php
			$slug = dirname( plugin_basename( $plugin_file ) );

			if( $slug ) {
				if ( $slug == $plugin_slug ) {
					return $plugin_file; // If $slug = $plugin_name
				}
			}
		}

		return false;
	}

	/**
	 * Check if a plugin is installed and return the url to activate it if so.
	 *
	 * @param string $plugin_slug The plugin slug.
	 * @return  void
	 */
	private static function _is_plugin_installed( $plugin_slug ) {
		if ( file_exists( WP_PLUGIN_DIR . '/' . $plugin_slug ) ) {
			$plugins = get_plugins( '/' . $plugin_slug );
			if ( ! empty( $plugins ) ) {
				$keys        = array_keys( $plugins );
				$plugin_file = $plugin_slug . '/' . $keys[0];
				$url         = wp_nonce_url( add_query_arg( array(
					'action' => 'activate',
					'plugin' => $plugin_file,
				), admin_url( 'plugins.php' ) ), 'activate-plugin_' . $plugin_file );
				return $url;
			}
		}
		return false;
	}


}
endif;

return new Baltic_Plugin_Installer;
