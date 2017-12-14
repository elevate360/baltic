<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Baltic
 */

?>

<?php do_action( 'baltic_entry_before' );?>
<article <?php baltic_attr( 'post' );?>>
	<div <?php baltic_attr( 'entry-inner' );?>>

		<?php do_action( 'baltic_entry_header_before' );?>
		<header <?php baltic_attr( 'entry-header' );?>>
			<?php do_action( 'baltic_entry_header' );?>
		</header><!-- .entry-header -->
		<?php do_action( 'baltic_entry_header_after' );?>

		<?php do_action( 'baltic_entry_content_before' );?>
		<div <?php baltic_attr( 'entry-content' );?>>
			<?php do_action( 'baltic_entry_content' );?>
		</div><!-- .entry-content -->
		<?php do_action( 'baltic_entry_content_after' );?>

		<?php do_action( 'baltic_entry_footer' );?>

	</div><!-- .entry-inner -->
</article><!-- #post-<?php the_ID(); ?> -->
<?php do_action( 'baltic_entry_after' );?>
