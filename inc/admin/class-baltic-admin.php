<?php
/**
 * Baltic admin class
 *
 * @package Baltic
 */

if ( ! class_exists( 'Baltic_Admin' ) ) :
/**
 * Main Baltic Admin class
 *
 * @since  1.0.0
 */
class Baltic_Admin {

	public function __construct() {

		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );

		add_action( 'admin_menu', array( $this, 'register_menu' ) );

	}

	/**
	 * Load welcome screen css
	 *
	 * @param string $hook_suffix the current page hook suffix.
	 * @return void
	 * @since  1.0.0
	 */
	public function enqueue_scripts() {

		$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

		wp_enqueue_style( 'baltic-admin-style', get_parent_theme_file_uri( "/assets/css/admin$suffix.css" ), '', BALTIC_THEME_VERSION );

	}

	/**
	 * Creates the dashboard page
	 *
	 * @see  add_theme_page()
	 * @since 1.0.0
	 */
	public function register_menu() {

		add_theme_page(
			'Baltic',
			'Baltic',
			'activate_plugins',
			'baltic',
			array( $this, 'page_screen' ) );

	}

	/**
	 * The welcome screen
	 *
	 * @since 1.0.0
	 */
	public function page_screen() {

		require_once( ABSPATH . 'wp-load.php' );
		require_once( ABSPATH . 'wp-admin/admin.php' );
		require_once( ABSPATH . 'wp-admin/admin-header.php' );

		$active_tab   = isset( $_GET['tab'] ) ? wp_unslash( $_GET['tab'] ) : 'actions';
		?>

		<div class="wrap">
			<h1>
				<?php echo sprintf( __( '<strong>%s</strong> <small>version %s</small>', 'baltic' ), BALTIC_THEME_NAME, BALTIC_THEME_VERSION );?>
			</h2>
		</div>

		<div class="wrap baltic-wrap">

			<nav class="nav-tab-wrapper baltic-admin-navigation">
				<a href="<?php echo esc_url( admin_url( 'themes.php?page=baltic&tab=welcome' ) ); ?>" class="nav-tab <?php echo 'welcome' == $active_tab ? 'nav-tab-active' : ''; ?>"><?php esc_attr_e( 'Dashboard', 'baltic' ); ?></a>
				<a href="<?php echo esc_url( admin_url( 'themes.php?page=baltic&tab=actions' ) ); ?>" class="nav-tab <?php echo 'actions' == $active_tab ? 'nav-tab-active' : ''; ?>"><?php esc_attr_e( 'Recommended Actions', 'baltic' ); ?></a>
				<a href="<?php echo esc_url( admin_url( 'themes.php?page=baltic&tab=plugins' ) ); ?>" class="nav-tab <?php echo 'plugins' == $active_tab ? 'nav-tab-active' : ''; ?>"><?php esc_attr_e( 'Recommended Plugins', 'baltic' ); ?></a>
				<a href="<?php echo esc_url( admin_url( 'themes.php?page=baltic&tab=addons' ) ); ?>" class="nav-tab <?php echo 'addons' == $active_tab ? 'nav-tab-active' : ''; ?>"><?php esc_attr_e( 'Add-Ons', 'baltic' ); ?></a>
				<a href="<?php echo esc_url( admin_url( 'themes.php?page=baltic&tab=support' ) ); ?>" class="nav-tab <?php echo 'support' == $active_tab ? 'nav-tab-active' : ''; ?>"><?php esc_attr_e( 'Support', 'baltic' ); ?></a>
			</nav>

		<?php
			switch ( $active_tab ) {
				case 'welcome':
					require get_parent_theme_file_path( '/inc/admin/sections/welcome.php' );
					break;
				case 'actions':
					require get_parent_theme_file_path( '/inc/admin/sections/recommended-actions.php' );
					break;
				case 'plugins':
					require get_parent_theme_file_path( '/inc/admin/sections/recommended-plugins.php' );
					break;
				case 'addons':
					require get_parent_theme_file_path( '/inc/admin/sections/add-ons.php' );
					break;
				case 'support':
					require get_parent_theme_file_path( '/inc/admin/sections/support.php' );
					break;
				default:
					require get_parent_theme_file_path( '/inc/admin/sections/recommended-actions.php' );
					break;
			}

		?>

		</div>
		<?php
	}

}
endif;

return new Baltic_Admin;
