<?php
/**
 * CSS Selector for color customizer
 *
 * @package Baltic
 */

/**
 * [baltic__color_text_primary description]
 * @return [type] [description]
 */
function baltic__color_text_primary(){

	$baltic__color_text_primary = '
		body,
		.entry-title a,
		.page-numbers,
		.return-to-top
	';

	return apply_filters( 'baltic__color_text_primary', $baltic__color_text_primary );
}

/**
 * [baltic__color_text_secondary description]
 * @return [type] [description]
 */
function baltic__color_text_secondary(){

	$baltic__color_text_secondary = '
		.site-footer,
		.breadcrumb a,
		.breadcrumb .separator,
		.comment-navigation a span,
		.posts-navigation a span,
		.post-navigation a span,
		.comment-navigation a:hover span,
		.comment-navigation a:focus span,
		.posts-navigation a:hover span,
		.posts-navigation a:focus span,
		.post-navigation a:hover span,
		.post-navigation a:focus span,
		.comment-metadata a,
		.comment-body > .reply a,
		#cancel-comment-reply-link,
		#secondary a,
		.widget_tag_cloud a,
		.widget_product_tag_cloud a,
		ul.products li.product .button
	';

	return apply_filters( 'baltic__color_text_secondary', $baltic__color_text_secondary );
}

/**
 * [baltic__color_text_field description]
 * @return [type] [description]
 */
function baltic__color_text_field(){

	$baltic__color_text_field = '
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

	return apply_filters( 'baltic__color_text_field', $baltic__color_text_field );

}

/**
 * [baltic__color_text_field_focus description]
 * @return [type] [description]
 */
function baltic__color_text_field_focus(){

	$baltic__color_text_field_focus = '
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

	return apply_filters( 'baltic__color_text_field_focus', $baltic__color_text_field_focus );

}

/**
 * [baltic__color_button description]
 * @return [type] [description]
 */
function baltic__color_button(){

	$baltic__color_button = '
		.button,
		button,
		input[type="button"],
		input[type="reset"],
		input[type="submit"],
		.header-search-area .search-submit:focus,
		.header-search-area .search-submit:hover,
		.return-to-top:focus,
		.return-to-top:hover,
		ul.products li.product .button:focus,
		ul.products li.product .button:hover,
		.widget_price_filter .ui-slider .ui-slider-handle,
		.widget_price_filter .ui-slider .ui-slider-range
	';

	return apply_filters( 'baltic__color_button', $baltic__color_button );

}

/**
 * [baltic__color_button_hover description]
 * @return [type] [description]
 */
function baltic__color_button_hover(){

	$baltic__color_button_hover = '
		.button:hover,
		button:hover,
		input[type="button"]:hover,
		input[type="reset"]:hover,
		input[type="submit"]:hover,
		.button:focus,
		button:focus,
		input[type="button"]:focus,
		input[type="reset"]:focus,
		input[type="submit"]:focus,
		.woocommerce-mini-cart__buttons a.button:not(.checkout):focus,
		.woocommerce-mini-cart__buttons a.button:not(.checkout):hover
	';

	return apply_filters( 'baltic__color_button_hover', $baltic__color_button_hover );

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

/**
 * [baltic__color_link_primary description]
 * @return [type] [description]
 */
function baltic__color_link_primary(){

	$baltic__color_link_primary = '
		a,
		.page-numbers.current,
		.widget_layered_nav_filters ul li.chosen:before,
		.woocommerce-widget-layered-nav-list li.chosen:before
	';

	return apply_filters( 'baltic__color_link_primary', $baltic__color_link_primary );

}

function baltic__color_link_secondary(){

	$baltic__color_link_secondary = '
		a:active,
		a:focus,
		a:hover,
		.breadcrumb a:hover,
		.breadcrumb a:focus,
		.entry-meta a:focus,
		.entry-meta a:hover,
		.sticky .entry-meta a:focus,
		.sticky .entry-meta a:hover,
		.entry-title a:hover,
		.entry-title a:focus,
		.sticky .entry-title a:hover,
		.sticky .entry-title a:focus,
		.entry-footer a:focus,
		.entry-footer a:hover,
		.sticky .entry-footer a:focus,
		.sticky .entry-footer a:hover,
		.site-footer a:hover,
		.site-footer a:focus,
		.comment-navigation a:hover,
		.comment-navigation a:focus,
		.posts-navigation a:hover,
		.posts-navigation a:focus,
		.post-navigation a:hover,
		.post-navigation a:focus,
		.page-numbers:focus:not(.current),
		.page-numbers:hover:not(.current),
		#secondary a:focus,
		#secondary a:hover
	';

	return apply_filters( 'baltic__color_link_secondary', $baltic__color_link_secondary );

}
