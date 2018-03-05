<?php
/**
 * Baltic recent post
 *
 * @package  Baltic
 */

$limit 		= get_theme_mod( 'baltic_homepage_latest_posts_limit', 4 );
$columns 	= get_theme_mod( 'baltic_homepage_latest_posts_columns', 4 );

$args = array(
	'posts_per_page' 	=> absint( $limit ),
	'post__not_in' 		=> get_option( 'sticky_posts' ),
	'no_found_rows'  	=> true,
);

$latest_posts = new WP_Query( $args );

?>
<div id="baltic-homepage-latest-posts" class="baltic-homepage-latest-posts homepage-section">
	<?php if( get_theme_mod( 'baltic_homepage_latest_posts_layout', 'boxed' ) == 'boxed' ) : ?>
	<div class="container">
	<?php endif;?>

		<?php if ( $latest_posts->have_posts() ) : ?>
			<div class="columns columns-<?php echo absint( $columns );?>">
			<?php while ( $latest_posts->have_posts() ) : $latest_posts->the_post(); ?>

				<article id="latest-post-<?php the_ID(); ?>" <?php post_class( 'column-item' ); ?>>
					<header class="entry-header">
						<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
					</header>
					<div class="entry-summary">
						<?php the_excerpt();?>
					</div>
				</article>

			<?php endwhile; ?>
			</div><!-- .columns -->
		<?php endif;?>

	<?php if( get_theme_mod( 'baltic_homepage_latest_posts_layout', 'boxed' ) == 'boxed' ) : ?>
	</div><!-- .container -->
	<?php endif;?>
</div><!-- #baltic-homepage-latest-posts -->
