<?php
/**
 * Baltic Homepage Slider
 *
 * @package  Baltic
 */

$display 		= get_theme_mod( 'baltic_homepage_latest_tweets_display', 'grid' );
$display 		= ( ! empty( $display ) ) ? $display : '';
$overlay 		= get_theme_mod( 'baltic_homepage_latest_tweets_overlay', 'rgba(0,0,0,0)' );
$title 			= get_theme_mod( 'baltic_homepage_latest_tweets_title' );
$description 	= get_theme_mod( 'baltic_homepage_latest_tweets_description' );
$limit 			= get_theme_mod( 'baltic_homepage_latest_tweets_limit', 4 );
$columns 		= get_theme_mod( 'baltic_homepage_latest_tweets_columns', 4 );
$username 		= get_theme_mod( 'baltic_homepage_latest_tweets_handle' );

?>
<div id="baltic-homepage-latest-tweets" class="baltic-homepage-latest-tweets homepage-twitter homepage-section <?php echo esc_attr( $display );?>" data-columns="<?php echo absint( $columns );?>">
	<?php if( baltic_homepage_twitter() == true ) return;?>
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

		<?php

		$args = [
			'screen_name' 	=> $username,
			'count'			=> $limit
		];

		$tweets = campaignkit_twitter_get_tweets( $args );

		$html = '';

		if ( !empty( $username ) ) {

			$html .= sprintf( '<div class="baltic-twitter columns columns-%s">', absint( $columns ) );

			foreach ( $tweets as $tweet ) {

				$html .= '<div class="column-item">';

					$html .= '<div class="baltic-twitter__item">';

						$html .= '<div class="baltic-twitter__profile">';

							$html .= sprintf( '<a href="%1$s" class="baltic-twitter__userpict" rel="nofollow"><img src="%2$s" alt="%3$s"></a>',
								esc_url( 'https://twitter.com/' . esc_attr( $tweet['user']['screen_name'] ) ),
								esc_url( $tweet['user']['profile_image_url_https'] ),
								esc_attr( $tweet['user']['name'] )
							);

							$html .= sprintf( '<a href="%1$s" class="baltic-twitter__username" rel="nofollow"><span class="baltic-twitter__name">%2$s</span><span class="baltic-twitter__screen">@%3$s</span></a>',
								esc_url( 'https://twitter.com/' . esc_attr( $tweet['user']['screen_name'] ) ),
								esc_attr( $tweet['user']['name'] ),
								esc_attr( $tweet['user']['screen_name'] )
							);

						$html .= '</div>';

						$html .= '<div class="baltic-twitter__text">'. wp_kses_post( $tweet['ck_html_text'] ) .'</div>';

						$html .= sprintf( '<a href="%1$s" class="baltic-twitter__date" target="_blank"><time datetime="%2$s">%3$s%4$s</time></a>',
							esc_url( sprintf( 'https://twitter.com/%1$s/status/%2$s', esc_attr( $tweet['user']['screen_name'] ), $tweet['id'] ) ),
							date_i18n( 'Y-m-d H:i:sO', strtotime( $tweet['created_at'] ) ),
							baltic_get_svg( array( 'icon' => 'twitter' ) ),
							esc_attr( $tweet['ck_created_at'] )
						);

					$html .= '</div>';

				$html .= '</div>';

			}

			$html .= '</div>';

		}

		echo $html;

		?>

	<?php if( get_theme_mod( 'baltic_homepage_latest_tweets_layout', 'boxed' ) == 'boxed' ) : ?>
	</div><!-- .container -->
	<?php endif;?>

</div><!-- #baltic-homepage-latest-tweets -->
