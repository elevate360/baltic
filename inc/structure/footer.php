<?php
/**
 * Baltic site footer
 *
 * @package Baltic
 */

/**
 * [baltic_sidebar_footer description]
 * @return [type] [description]
 */
function baltic_sidebar_footer(){
	get_sidebar( 'footer' );
}
add_action( 'baltic_footer_before', 'baltic_sidebar_footer', 10 );

/**
 * Baltic footer copyright
 *
 * @return string
 */
function baltic_footer_copyright(){
	get_template_part( 'components/footer/footer', 'copyright' );
}
add_action( 'baltic_footer', 'baltic_footer_copyright', 10 );

/**
 * Baltic footer copyright
 *
 * @return string
 */
function baltic_return_to_top(){
	get_template_part( 'components/footer/return', 'top' );
}
add_action( 'baltic_footer_after', 'baltic_return_to_top', 10 );
