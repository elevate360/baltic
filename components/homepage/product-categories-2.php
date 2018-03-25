<?php
/**
 * Product Categories #2
 *
 * @package  Baltic
 */
$product_cats = get_theme_mod( 'baltic_homepage_product_categories_2', array() );
?>

<div id="baltic-homepage-product-categories-2" class="baltic-homepage-product-categories-2 homepage-section">
<div class="homepage-overlay"></div>
	<?php if( get_theme_mod( 'baltic_homepage_product_categories_2_layout', 'boxed' ) == 'boxed' ) : ?>
	<div class="container">
	<?php endif;?>

	<?php
	$count = 0;
		foreach ( $product_cats as $product_cat ) {
			# code...
		}
	?>

	<?php if( get_theme_mod( 'baltic_homepage_product_categories_2_layout', 'boxed' ) == 'boxed' ) : ?>
	</div><!-- .container -->
	<?php endif;?>
</div><!-- #baltic-homepage-product-categories-2 -->
