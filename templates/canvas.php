<?php
/**
 * Template Name: Baltic - Canvas
 * Template Post Type: post, page
 *
 * @package Baltic
 */
get_header();
while ( have_posts() ) : the_post();
?>
<main id="main" class="site-main">
	<?php the_content();?>
</main>
<?php
endwhile;
get_footer();
