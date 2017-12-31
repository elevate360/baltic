<?php
/**
 * Social Menus
 *
 * @package Baltic
 */

if ( has_nav_menu ( 'menu-3' ) ) : ?>
	<div class="social-links">
	<?php wp_nav_menu( array(
		'theme_location' 	=> 'menu-3',
		'depth' 			=> 1,
		'link_before' 		=> '<span class="screen-reader-text">',
		'link_after' 		=> '</span>',
		'container_class' 	=> 'container',
	) ); ?>
	</div>
<?php endif; ?>
