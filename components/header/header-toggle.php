<?php
/**
 * Header toggle
 *
 * @package Baltic
 */
?>
<button class="header-menu-toggle" aria-controls="site-navigation" aria-expanded="false">
	<?php
	echo baltic_get_svg( array( 'class' => 'icon-stroke', 'icon' => 'menu' ) );
	echo baltic_get_svg( array( 'class' => 'icon-stroke', 'icon' => 'close' ) );
	echo '<span class="screen-reader-text">' . esc_html( 'Toggle Main Navigation', 'baltic' ) . '</span>';
	?>
</button>
