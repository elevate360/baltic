<?php
/**
 * Baltic entry thumbnail
 *
 * @package Baltic
 */

if ( is_singular() && has_post_thumbnail() ) :?>
<div class="entry-thumbnail">
	<?php the_post_thumbnail( $size = 'post-thumbnail' );?>
</div>
<?php else : ?>
<div class="entry-thumbnail alignleft">
	<a href="<?php the_permalink( get_the_id() );?>" class="entry-thumbnail-link">
		<?php the_post_thumbnail( $size = 'medium' );?>
	</a>
</div>
<?php endif;?>
