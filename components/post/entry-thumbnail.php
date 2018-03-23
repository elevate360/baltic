<?php
/**
 * Baltic entry thumbnail
 *
 * @package Baltic
 */

if ( is_archive() && has_post_thumbnail() ) :?>
<div class="entry-thumbnail">
	<?php the_post_thumbnail( $size = 'post-thumbnail' );?>
</div>
<?php elseif( has_post_thumbnail() ) : ?>
<div class="entry-thumbnail">
	<a href="<?php the_permalink( get_the_id() );?>" class="entry-thumbnail-link">
		<?php the_post_thumbnail( $size = 'post-thumbnail' );?>
	</a>
</div>
<?php endif;?>
