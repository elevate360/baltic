<?php
/**
 * Baltic Homepage Slider
 *
 * @package  Baltic
 */

$slides = get_theme_mod( 'baltic_homepage_slider' );

?>
<div id="baltic-homepage-slider" class="baltic-homepage-slider">

	<?php if( get_theme_mod( 'baltic_homepage_slider_layout', 'boxed' ) == 'boxed' ) : ?>
	<div class="container">
	<?php endif;?>

	<?php if ( $slides ) : ?>

		<div class="baltic-homepage-slider-container">

		<?php foreach ( $slides as $slide ) : ?>

			<div class="slide-item">
				<div class="slide-inner">
					<h4 class="slide-title"><?php echo esc_attr( $slide['title'] );?></h4>
					<p class="slide-description"><?php echo wpautop( esc_textarea( $slide['description'] ) );?></p>

					<?php if( $slide['btn_text_1'] && $slide['btn_link_1'] ) :?>
						<a href="<?php echo esc_url( $slide['btn_link_1'] );?>" class="button slide-button-1"><?php echo esc_attr( $slide['btn_text_1'] );?></a>
					<?php endif;?>
					<?php if( $slide['btn_text_2'] && $slide['btn_link_2'] ) :?>
						<a href="<?php echo esc_url( $slide['btn_link_2'] );?>" class="button slide-button-2"><?php echo esc_attr( $slide['btn_text_2'] );?></a>
					<?php endif;?>

				</div><!-- .slide-inner -->
			</div>

		<?php endforeach;?>

		</div><!-- .baltic-homepage-slider-container -->

	<?php endif;?>

	<?php if( get_theme_mod( 'baltic_homepage_slider_layout', 'boxed' ) == 'boxed' ) : ?>
	</div><!-- .container -->
	<?php endif;?>

</div><!-- #baltic-homepage-slider -->
