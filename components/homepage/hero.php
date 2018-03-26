<?php
/**
 * Baltic hero section
 *
 * @package  Baltic
 */
$hero_prefix 		= get_theme_mod( 'baltic_homepage_hero_prefix', esc_html__( 'Baltic theme is suitable for', 'baltic' ) );
$hero_rotator 		= get_theme_mod( 'baltic_homepage_hero_rotator', esc_html__( 'small business, founder, startup', 'baltic' ) );
$hero_suffix 		= get_theme_mod( 'baltic_homepage_hero_suffix', '.' );
$hero_description 	= get_theme_mod( 'baltic_homepage_hero_description', '' );
$btn_text_1 		= get_theme_mod( 'baltic_homepage_hero_btn_text_1', 'Button Text #1' );
$btn_link_1 		= get_theme_mod( 'baltic_homepage_hero_btn_text_1', '#' );
$btn_text_2 		= get_theme_mod( 'baltic_homepage_hero_btn_text_2', '' );
$btn_link_2 		= get_theme_mod( 'baltic_homepage_hero_btn_text_2', '' );
?>

<div id="baltic-homepage-hero" class="baltic-homepage-hero homepage-section">
	<div class="homepage-overlay"></div>
	<?php if( get_theme_mod( 'baltic_homepage_hero_layout', 'boxed' ) == 'boxed' ) : ?>
	<div class="container">
	<?php endif;?>

		<div class="baltic-homepage-hero-wrap">
			<div class="baltic-homepage-hero-inner">
				<div class="baltic-homepage-hero-area">
					<h2 class="baltic-hero-title">
						<?php
						echo esc_attr( $hero_prefix ) . ' ';

						if ( ! empty( $hero_rotator ) ) :
							printf( '<span id="baltic-hero-rotator" class="baltic-hero-rotator" data-typist="%s"></span>', $hero_rotator );
						endif;

						echo esc_attr( $hero_suffix );
						?>
					</h2>

					<?php if( ! empty( $hero_description ) ) : ?>
					<div class="baltic-hero-description">
						<?php echo wpautop( wp_kses_post( $hero_description ) ); ?>
					</div>
					<?php endif;?>

					<?php
					if( ! empty( $btn_text_1 ) || ! empty( $btn_link_1 ) ) :
						printf( '<a href="%1$s" class="button hero-button-1">%2$s</a>',
							esc_url( $btn_link_1 ),
							esc_attr( $btn_text_1 )
						);
					endif;

					if( ! empty( $btn_text_2 ) || ! empty( $btn_link_2 ) ) :
						printf( '<a href="%1$s" class="button hero-button-2">%2$s</a>',
							esc_url( $btn_link_2 ),
							esc_attr( $btn_text_2 )
						);
					endif;
					?>
				</div><!-- .baltic-homepage-hero-area -->
			</div><!-- .baltic-homepage-hero-inner -->
		</div><!-- .baltic-homepage-hero-wrap -->

	<?php if( get_theme_mod( 'baltic_homepage_hero_layout', 'boxed' ) == 'boxed' ) : ?>
	</div><!-- .container -->
	<?php endif;?>
</div><!-- #baltic-homepage-hero -->
