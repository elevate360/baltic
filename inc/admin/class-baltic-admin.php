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

		wp_enqueue_style( 'baltic-admin-style', get_parent_theme_file_uri( "/inc/admin/assets/css/admin$suffix.css" ), '', BALTIC_THEME_VERSION );

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

		$active_tab   = isset( $_GET['tab'] ) ? wp_unslash( $_GET['tab'] ) : 'getting_started';
		?>
		<div class="wrap baltic-wrap">

			<h1 class="wp-heading-inline"><?php echo BALTIC_THEME_NAME;?> <small><?php echo BALTIC_THEME_VERSION;?></small></h1>

			<nav class="baltic-admin-navigation wp-filter">
				<ul class="filter-links">
					<li><a href="<?php echo esc_url( admin_url( 'themes.php?page=baltic&tab=recommended_actions' ) ); ?>" class="<?php echo 'recommended_actions' == $active_tab ? 'current' : ''; ?>"><?php esc_attr_e( 'Recommended Actions', 'baltic' ); ?></a></li>
					<li><a href="<?php echo esc_url( admin_url( 'themes.php?page=baltic&tab=recommended_plugins' ) ); ?>" class="<?php echo 'recommended_plugins' == $active_tab ? 'current' : ''; ?>"><?php esc_attr_e( 'Recommended Plugins', 'baltic' ); ?></a></li>
					<li><a href="<?php echo esc_url( admin_url( 'themes.php?page=baltic&tab=add_ons' ) ); ?>" class="<?php echo 'add_ons' == $active_tab ? 'current' : ''; ?>"><?php esc_attr_e( 'Add-Ons', 'baltic' ); ?></a></li>
					<li><a href="<?php echo esc_url( admin_url( 'themes.php?page=baltic&tab=support' ) ); ?>" class="<?php echo 'support' == $active_tab ? 'current' : ''; ?>"><?php esc_attr_e( 'Support', 'baltic' ); ?></a></li>
				</ul>
			</nav>

		<?php
			switch ( $active_tab ) {
				case 'recommended_actions':
					require get_parent_theme_file_path( '/inc/admin/sections/recommended-actions.php' );
					break;
				case 'recommended_plugins':
					require get_parent_theme_file_path( '/inc/admin/sections/recommended-plugins.php' );
					break;
				case 'add_ons':
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
