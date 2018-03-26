<?php
/**
 * Posts
 *
 * @package Baltic
 */

$display 	= get_theme_mod( 'baltic_homepage_posts_1_display', 'grid' );
$display 	= ( ! empty( $display ) ) ? $display : '';
$columns 	= get_theme_mod( 'baltic_homepage_posts_1_columns', 4 );
$limit 		= get_theme_mod( 'baltic_homepage_posts_1_limit', 4 );

$args = array(
	'posts_per_page' 	=> absint( $limit ),
	'post__not_in' 		=> get_option( 'sticky_posts' ),
	'no_found_rows'  	=> true,
);
$featured = new WP_Query( $args );

?>

<div id="baltic-homepage-posts-1" class="baltic-homepage-posts-1 homepage-posts homepage-section <?php echo esc_attr( $display );?>" data-columns="<?php echo absint( $columns );?>">
	<div class="homepage-overlay"></div>
	<?php if( get_theme_mod( 'baltic_homepage_posts_1_layout', 'boxed' ) == 'boxed' ) : ?>
	<div class="container">
	<?php endif;?>

		<?php if ( $featured->have_posts() ) : ?>

			<div class="columns columns-<?php echo absint( $columns );?>">

			<?php while ( $featured->have_posts() ) : $featured->the_post(); ?>

				<article id="latest-post-<?php the_ID(); ?>" <?php post_class( 'column-item' ); ?>>
					<div class="entry-inner">
						<?php if( has_post_thumbnail() ) : ?>
						<div class="entry-thumbnail">
							<a href="<?php echo esc_url( get_permalink() );?>" class="entry-thumbnail-link">
								<?php the_post_thumbnail( $size = 'post-thumbnail' );?>
							</a>
						</div>
						<?php endif;?>
						<header class="entry-header">
							<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
							<?php Baltic_Components::entry_meta();?>
						</header>
						<div class="entry-summary">
							<?php the_excerpt();?>
						</div>
					</div>
				</article>

			<?php endwhile; ?>

			</div><!-- .columns -->

		<?php endif;?>

	<?php if( get_theme_mod( 'baltic_homepage_posts_1_layout', 'boxed' ) == 'boxed' ) : ?>
	</div><!-- .container -->
	<?php endif;?>

</div>
<?php wp_reset_postdata();?>
