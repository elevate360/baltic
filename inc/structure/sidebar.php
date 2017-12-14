<?php
/**
 * Sidebar structure
 *
 * @package Baltic
 */

/**
 * [baltic_sidebar_before_content description]
 * @return [type] [description]
 */
function baltic_sidebar_before_content(){

	$layout = baltic_get_layout();

	if( $layout == 'content-sidebar' || $layout == 'sidebar-content' ) {
		get_sidebar();
	}

}
add_action( 'baltic_content_area_after', 'baltic_sidebar_before_content', 10 );
