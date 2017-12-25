<?php
/**
 * Template Name: Baltic - Homepage
 *
 * @package Baltic
 */

get_header();

do_action( 'baltic_homepage_before' );
printf( '<main %s>', baltic_get_attr( 'site-main' ) );

do_action( 'baltic_homepage' );

echo '</main>';
do_action( 'baltic_homepage_after' );

get_footer();
