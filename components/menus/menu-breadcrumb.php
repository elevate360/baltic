<?php
/**
 * Baltic breadcrumb
 *
 * @package Balitc
 */

baltic_breadcrumb(
	array(
		'container'     => 'nav',
		'show_browse'   => false,
		'show_on_front' => false,
		'post_taxonomy' => array(
			'portfolio_project' => 'portfolio_category',
			'download'          => 'download_category',
		)
	)
);
