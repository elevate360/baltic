<?php
/**
 * CSS Selector for color customzier
 *
 * @package Baltic
 */

if( ! function_exists( 'baltic_css_classes_selector' ) ) :
/**
 * [baltic_css_classes_selector description]
 * @return [type] [description]
 */
function baltic_css_classes_selector(){

	$css = array();

	return apply_filters( 'baltic_css_classes_selector', $css );
}
endif;
