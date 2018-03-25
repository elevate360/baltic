<?php
/**
 * Baltic Homepage Slider
 *
 * @package  Baltic
 */

$slides = get_theme_mod( 'baltic_homepage_slider' );
$effect = get_theme_mod( 'baltic_homepage_slider_effect', 'true' );
$autoplay = get_theme_mod( 'baltic_homepage_slider_autoplay', true );
$autoplay = ( $autoplay == true ) ? 'true' : 'false';
$autoplayspeed = get_theme_mod( 'baltic_homepage_slider_autoplayspeed', 5000 );
$arrows = get_theme_mod( 'baltic_homepage_slider_arrows', true );
$arrows = ( $arrows == true ) ? 'true' : 'false';
$dots = get_theme_mod( 'baltic_homepage_slider_dots', true );
$dots = ( $dots == true ) ? 'true' : 'false';
$pauseonhover = get_theme_mod( 'baltic_homepage_slider_pauseonhover', false );
$pauseonhover = ( $pauseonhover == true ) ? 'true' : 'false';

printf( '<div id="baltic-homepage-slider" class="baltic-homepage-slider %1$s" %2$s %3$s %4$s %5$s %6$s %7$s>',
	'fade-'. esc_attr( $effect ),
	'data-fade="'. esc_attr( $effect ) .'"',
	'data-autoplay="'. esc_attr( $autoplay ) .'"',
	'data-autoplayspeed="'. esc_attr( $autoplayspeed ) .'"',
	'data-arrows="'. esc_attr( $arrows ) .'"',
	'data-dots="'. esc_attr( $dots ) .'"',
	'data-pauseonhover="'. esc_attr( $pauseonhover ) .'"'
);
?>
	<div class="homepage-overlay"></div>
	<?php if( get_theme_mod( 'baltic_homepage_slider_layout', 'boxed' ) == 'boxed' ) : ?>
	<div class="container">
	<?php endif;?>

	<?php if ( $slides ) : ?>

		<div class="baltic-homepage-slider-container fade-<?php echo esc_attr( $effect );?>">

		<?php
		foreach ( $slides as $slide ) :

			$image = $slide['image'];
			$image = wp_get_attachment_image_src( $image, 'full' );
			$image = ( !empty( $image ) ) ? 'style="background-image:url('. esc_url( $image[0] ) .');"' : '';

		?>

			<div class="slide-item">
				<div class="slide-inner" <?php echo $image;?>>

					<div class="slide-content">

						<h2 class="slide-title"><?php echo esc_attr( $slide['title'] );?></h2>
						<div class="slide-description"><?php echo wpautop( esc_textarea( $slide['description'] ) );?></div>

						<?php if( $slide['btn_text_1'] && $slide['btn_link_1'] ) :?>
							<a href="<?php echo esc_url( $slide['btn_link_1'] );?>" class="button slide-button-1"><?php echo esc_attr( $slide['btn_text_1'] );?></a>
						<?php endif;?>
						<?php if( $slide['btn_text_2'] && $slide['btn_link_2'] ) :?>
							<a href="<?php echo esc_url( $slide['btn_link_2'] );?>" class="button slide-button-2"><?php echo esc_attr( $slide['btn_text_2'] );?></a>
						<?php endif;?>

					</div><!-- .slide-content -->

				</div><!-- .slide-inner -->
			</div>

		<?php endforeach;?>

		</div><!-- .baltic-homepage-slider-container -->

	<?php endif;?>

	<?php if( get_theme_mod( 'baltic_homepage_slider_layout', 'boxed' ) == 'boxed' ) : ?>
	</div><!-- .container -->
	<?php endif;?>

</div><!-- #baltic-homepage-slider -->
