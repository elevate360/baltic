<?php
/**
 * Baltic Homepage Slider
 *
 * @package  Baltic
 */

$display 		= get_theme_mod( 'baltic_homepage_latest_tweets_display', 'grid' );
$display 		= ( ! empty( $display ) ) ? $display : '';
$title 			= get_theme_mod( 'baltic_homepage_latest_tweets_title' );
$description 	= get_theme_mod( 'baltic_homepage_latest_tweets_description' );
$limit 			= get_theme_mod( 'baltic_homepage_latest_tweets_limit', 4 );
$columns 		= get_theme_mod( 'baltic_homepage_latest_tweets_columns', 4 );
$username 		= get_theme_mod( 'baltic_homepage_latest_tweets_handle' );
$retweet 		= get_theme_mod( 'baltic_homepage_latest_tweets_retweet', false );
$replies 		= get_theme_mod( 'baltic_homepage_latest_tweets_replies', false );
$pop 			= get_theme_mod( 'baltic_homepage_latest_tweets_pop', 0 );

?>
<div id="baltic-homepage-latest-tweets" class="baltic-homepage-latest-tweets homepage-twitter homepage-section <?php echo esc_attr( $display );?>" data-columns="<?php echo absint( $columns );?>">

	<?php if( get_theme_mod( 'baltic_homepage_latest_tweets_layout', 'boxed' ) == 'boxed' ) : ?>
	<div class="container">
	<?php endif;?>

		<?php if( ! empty( $title ) ) : ?>
			<h3 class="homepage-title"><?php echo esc_attr( $title );?></h3>
		<?php endif;?>

		<?php if( ! empty( $description ) ) : ?>
			<div class="homepage-description"><?php echo esc_textarea( $description );?></div>
		<?php endif;?>

		<?php

		$args = [
			'screen_name' 	=> 'mlover850',
			'count'			=> 10
		];

		echo campaignkit_twitter_get_tweets_html( $args );

		$tweets = campaignkit_twitter_get_tweets( $args );

		echo '<pre>';
		print_r( $tweets );
		echo '</pre>';

		?>

	<?php if( get_theme_mod( 'baltic_homepage_latest_tweets_layout', 'boxed' ) == 'boxed' ) : ?>
	</div><!-- .container -->
	<?php endif;?>

</div><!-- #baltic-homepage-latest-tweets -->
