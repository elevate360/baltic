<?php
/**
 * Testimonial
 *
 * @package Baltic
 */
?>
<div id="baltic-homepage-testimonial" class="baltic-homepage-testimonial homepage-twitter homepage-section <?php echo esc_attr( $display );?>" data-columns="<?php echo absint( $columns );?>">
	<div class="homepage-overlay"></div>
	<?php if( get_theme_mod( 'baltic_homepage_testimonial_layout', 'boxed' ) == 'boxed' ) : ?>
	<div class="container">
	<?php endif;?>

		<?php if( ! empty( $title ) ) : ?>
			<h3 class="homepage-title"><?php echo esc_attr( $title );?></h3>
		<?php endif;?>

		<?php if( ! empty( $description ) ) : ?>
			<div class="homepage-description"><?php echo esc_textarea( $description );?></div>
		<?php endif;?>


	<?php if( get_theme_mod( 'baltic_homepage_testimonial_layout', 'boxed' ) == 'boxed' ) : ?>
	</div><!-- .container -->
	<?php endif;?>

</div><!-- #baltic-homepage-testimonial -->
