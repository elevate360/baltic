<?php
/**
 * Primary Menu
 *
 * @package Baltic
 */

$menu_location = apply_filters( 'baltic_primary_menu', 'menu-2' );
?>
<?php if( has_nav_menu( $menu_location ) ) :?>
	<nav <?php baltic_attr( 'secondary-navigation' );?>>
		<?php
			wp_nav_menu( array(
				'theme_location' 	=> $menu_location,
				'menu_id'        	=> 'secondary-menu',
				'container_class' 	=> 'menu',
			) );
		?>
	</nav><!-- #site-navigation -->
<?php endif;?>
