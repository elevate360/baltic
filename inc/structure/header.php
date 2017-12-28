<?php
/**
 * Baltic site header
 *
 * @package Baltic
 */

/**
 * [baltic_get_preloader description]
 * @return [type] [description]
 */
function baltic_get_preloader(){

	$preloader = baltic_get_option( 'preloader_type' );

	$markup = '';

	switch( $preloader ){
		case 'rotating-plane':
			$markup .= '
				<div class="sk-rotating-plane"></div>
			';
		break;
		case 'double-bounce' :
			$markup .= '
				<div class="sk-double-bounce">
					<div class="sk-child sk-double-bounce1"></div>
					<div class="sk-child sk-double-bounce2"></div>
				</div>
			';
		break;
		case 'wave' :
			$markup .= '
				<div class="sk-wave">
					<div class="sk-rect sk-rect1"></div>
					<div class="sk-rect sk-rect2"></div>
					<div class="sk-rect sk-rect3"></div>
					<div class="sk-rect sk-rect4"></div>
					<div class="sk-rect sk-rect5"></div>
				</div>
			';
		break;
		case 'wandering-cubes' :
			$markup .= '
				<div class="sk-wandering-cubes">
					<div class="sk-cube sk-cube1"></div>
					<div class="sk-cube sk-cube2"></div>
				</div>
			';
		break;
		case 'pulse' :
			$markup .= '
				<div class="sk-spinner-pulse"></div>
			';
		break;
		case 'chasing-dots' :
			$markup .= '
				<div class="sk-chasing-dots">
					<div class="sk-child sk-dot1"></div>
					<div class="sk-child sk-dot2"></div>
				</div>
			';
		break;
		case 'three-bounce' :
			$markup .= '
				<div class="sk-three-bounce">
					<div class="sk-child sk-bounce1"></div>
					<div class="sk-child sk-bounce2"></div>
					<div class="sk-child sk-bounce3"></div>
				</div>
			';
		break;
		case 'circle' :
			$markup .= '
				<div class="sk-circle">
					<div class="sk-circle1 sk-child"></div>
					<div class="sk-circle2 sk-child"></div>
					<div class="sk-circle3 sk-child"></div>
					<div class="sk-circle4 sk-child"></div>
					<div class="sk-circle5 sk-child"></div>
					<div class="sk-circle6 sk-child"></div>
					<div class="sk-circle7 sk-child"></div>
					<div class="sk-circle8 sk-child"></div>
					<div class="sk-circle9 sk-child"></div>
					<div class="sk-circle10 sk-child"></div>
					<div class="sk-circle11 sk-child"></div>
					<div class="sk-circle12 sk-child"></div>
				</div>
			';
		break;
		case 'cube-grid' :
			$markup .= '
				<div class="sk-cube-grid">
					<div class="sk-cube sk-cube1"></div>
					<div class="sk-cube sk-cube2"></div>
					<div class="sk-cube sk-cube3"></div>
					<div class="sk-cube sk-cube4"></div>
					<div class="sk-cube sk-cube5"></div>
					<div class="sk-cube sk-cube6"></div>
					<div class="sk-cube sk-cube7"></div>
					<div class="sk-cube sk-cube8"></div>
					<div class="sk-cube sk-cube9"></div>
				</div>
			';
		break;
		case 'fading-circle' :
			$markup .= '
				<div class="sk-fading-circle">
					<div class="sk-circle1 sk-circle"></div>
					<div class="sk-circle2 sk-circle"></div>
					<div class="sk-circle3 sk-circle"></div>
					<div class="sk-circle4 sk-circle"></div>
					<div class="sk-circle5 sk-circle"></div>
					<div class="sk-circle6 sk-circle"></div>
					<div class="sk-circle7 sk-circle"></div>
					<div class="sk-circle8 sk-circle"></div>
					<div class="sk-circle9 sk-circle"></div>
					<div class="sk-circle10 sk-circle"></div>
					<div class="sk-circle11 sk-circle"></div>
					<div class="sk-circle12 sk-circle"></div>
				</div>
			';
		break;
		case 'folding-cube' :
			$markup .= '
				<div class="sk-folding-cube">
					<div class="sk-cube1 sk-cube"></div>
					<div class="sk-cube2 sk-cube"></div>
					<div class="sk-cube4 sk-cube"></div>
					<div class="sk-cube3 sk-cube"></div>
				</div>
			';
		break;

	}

	return sprintf( '<div class="spinner">%s</div>', $markup );

}

/**
 * [baltic_do_preloader description]
 * @return [type] [description]
 */
function baltic_do_preloader(){

	if ( baltic_get_option( 'preloader' ) === true ) : ?>

		<div class="site-preloader">
			<?php echo baltic_get_preloader();?>
		</div>
	<?php endif;

}
add_action( 'baltic_before', 'baltic_do_preloader' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function baltic__blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function baltic__blogdescription() {
	bloginfo( 'description' );
}

/**
 * Baltic skip link
 *
 * @return [type] [description]
 */
function baltic_skip_links(){
	get_template_part( 'components/header/skip', 'links' );
}
add_action( 'baltic_before', 'baltic_skip_links', 20 );

/**
 * [baltic_header_toggle description]
 * @return [type] [description]
 */
function baltic_header_toggle(){
	get_template_part( 'components/header/header', 'toggle' );
}
add_action( 'baltic_header', 'baltic_header_toggle', 10 );

/**
 * Baltic site branding
 *
 * @return string
 */
function baltic_site_branding(){
	get_template_part( 'components/header/site', 'branding' );
}
add_action( 'baltic_header', 'baltic_site_branding', 10 );

/**
 * Baltic site branding
 *
 * @return string
 */
function baltic_header_search(){
	get_template_part( 'components/header/header', 'search' );
}
add_action( 'baltic_header', 'baltic_header_search', 20 );

/**
 * Baltic site branding
 *
 * @return string
 */
function baltic_menu_primary(){
	get_template_part( 'components/menus/menu', 'primary' );
}
add_action( 'baltic_header', 'baltic_menu_primary', 30 );
