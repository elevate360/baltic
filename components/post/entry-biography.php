<?php
/**
 * Entry biography
 *
 * @package Baltic
 */
?>
<div class="author-info">

	<figure class="author-avatar">
		<?php
		/**
		 * Filter the Caspian author bio avatar size.
		 *
		 * @param int $size The avatar height and width size in pixels.
		 */
		$author_bio_avatar_size = apply_filters( 'baltic_author_bio_avatar_size', 128 );

		echo get_avatar( get_the_author_meta( 'user_email' ), $author_bio_avatar_size );
		?>
	</figure><!-- .author-avatar -->

	<div class="author-detail">

		<h3 class="author-title">
			<?php esc_attr_e( 'About', 'baltic' );?>
			<a class="author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
				<?php echo get_the_author(); ?>
			</a>
		</h3>

		<div class="author-description">

			<p class="author-bio">
				<?php the_author_meta( 'description' ); ?>
			</p><!-- .author-bio -->

		</div><!-- .author-description -->

	</div><!-- .author-detail -->

</div><!-- .author-info -->
