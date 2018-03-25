<?php
/**
 * Testimonial
 *
 * @package Baltic
 */
?>
<div id="baltic-homepage-latest-tweets" class="baltic-homepage-latest-tweets homepage-twitter homepage-section <?php echo esc_attr( $display );?>" data-columns="<?php echo absint( $columns );?>">
	<div class="homepage-overlay"></div>
	<?php if( get_theme_mod( 'baltic_homepage_latest_tweets_layout', 'boxed' ) == 'boxed' ) : ?>
	<div class="container">
	<?php endif;?>

		<?php if( ! empty( $title ) ) : ?>
			<h3 class="homepage-title"><?php echo esc_attr( $title );?></h3>
		<?php endif;?>

		<?php if( ! empty( $description ) ) : ?>
			<div class="homepage-description"><?php echo esc_textarea( $description );?></div>
		<?php endif;?>

	<?php if( ! empty( $username ) ) : ?>

		<?php echo latest_tweets_render_html( esc_attr( $username ), absint( $limit ), $retweet, $replies, absint( $pop ) );?>

	<?php endif;?>

	<?php if( get_theme_mod( 'baltic_homepage_latest_tweets_layout', 'boxed' ) == 'boxed' ) : ?>
	</div><!-- .container -->
	<?php endif;?>

</div><!-- #baltic-homepage-latest-tweets -->
