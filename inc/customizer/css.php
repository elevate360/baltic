<?php
/**
 * CSS Selector for color customizer
 *
 * @package Baltic
 */

/**
 * [baltic__text_color_primary description]
 * @return [type] [description]
 */
function baltic__text_color_primary(){

	$baltic__text_color_primary = '
		body,
		.entry-title a,
		.page-numbers
	';

	return apply_filters( 'baltic__text_color_primary', $baltic__text_color_primary );
}

/**
 * [baltic__text_color_field description]
 * @return [type] [description]
 */
function baltic__text_color_field(){

	$baltic__text_color_field = '
		input[type="text"],
		input[type="email"],
		input[type="url"],
		input[type="password"],
		input[type="search"],
		input[type="number"],
		input[type="tel"],
		input[type="range"],
		input[type="date"],
		input[type="month"],
		input[type="week"],
		input[type="time"],
		input[type="datetime"],
		input[type="datetime-local"],
		input[type="color"],
		textarea,
		select
	';

	return apply_filters( 'baltic__text_color_field', $baltic__text_color_field );

}

/**
 * [baltic__text_color_field_focus description]
 * @return [type] [description]
 */
function baltic__text_color_field_focus(){

	$baltic__text_color_field_focus = '
		input[type="text"]:focus,
		input[type="email"]:focus,
		input[type="url"]:focus,
		input[type="password"]:focus,
		input[type="search"]:focus,
		input[type="number"]:focus,
		input[type="tel"]:focus,
		input[type="range"]:focus,
		input[type="date"]:focus,
		input[type="month"]:focus,
		input[type="week"]:focus,
		input[type="time"]:focus,
		input[type="datetime"]:focus,
		input[type="datetime-local"]:focus,
		input[type="color"]:focus,
		textarea:focus,
		select:focus
	';

	return apply_filters( 'baltic__text_color_field_focus', $baltic__text_color_field_focus );

}

/**
 * [baltic__preloader_elements description]
 * @return [type] [description]
 */
function baltic__preloader_elements(){

	$baltic__preloader_elements = '
		.sk-rotating-plane,
		.sk-double-bounce .sk-child,
		.sk-wave .sk-rect,
		.sk-wandering-cubes .sk-cube,
		.sk-spinner-pulse,
		.sk-chasing-dots .sk-child,
		.sk-three-bounce .sk-child,
		.sk-circle .sk-child:before,
		.sk-cube-grid .sk-cube,
		.sk-fading-circle .sk-circle:before,
		.sk-folding-cube .sk-cube:before
	';

	return apply_filters( 'baltic__preloader_elements', $baltic__preloader_elements );

}
