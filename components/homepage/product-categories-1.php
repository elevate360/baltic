<?php
/**
 * Baltic product categories
 *
 * @package  Baltic
 */
$product_cats = get_theme_mod( 'baltic_homepage_product_categories_1', array() );
?>
<div id="baltic-homepage-product-categories-1" class="baltic-homepage-product-categories-1 homepage-section">
	<?php if( baltic_homepage_woocommerce() == true ) return;?>
	<div class="homepage-overlay"></div>

	<?php if( get_theme_mod( 'baltic_homepage_product_categories_1_layout', 'boxed' ) == 'boxed' ) : ?>
	<div class="container">
	<?php endif;?>

	<div class="product-categories__wrapper total-items-<?php echo count( $product_cats );?>">

		<?php
		$count = 0;
		foreach ( $product_cats as $product_cat ) : ?>

			<?php
			$count++;
			$cat_id 	= $product_cat;
			$btn_text 	= get_theme_mod( 'baltic_homepage_product_categories_1_btn_text', esc_html__( 'Shop Now', 'baltic' ) );

			if ( ! empty( $cat_id ) ) {

				$term 		= get_term( $cat_id, 'product_cat' );
		    	$image_id 	= get_woocommerce_term_meta( $term->term_id, 'thumbnail_id', true );
		    	$image 		= wp_get_attachment_image_src( $image_id, 'large' );

				?>

				<div class="product-categories__item item-<?php echo absint( $count );?>">

					<div class="product-categories__inner">

						<?php if( ! empty( $image_id ) ) : ?>
							<div class="product-categories__thumbnail" style="background-image:url('<?php echo $image[0];?>')"></div>
						<?php endif;?>
						<h3 class="product-categories__title"><?php echo esc_attr( $term->name );?></h3>
						<?php echo wpautop( wp_kses_post( $term->description ) );?>
						<?php if( !empty( $btn_text ) ) : ?>
							<a href="<?php echo get_term_link( $term );?>" class="button"><?php echo esc_attr( $btn_text );?></a>
						<?php endif;?>

					</div>

				</div>
				<?php

			}

			?>
		<?php endforeach;?>

	</div><!-- .product-categories__wrapper -->

	<?php if( get_theme_mod( 'baltic_homepage_product_categories_1_layout', 'boxed' ) == 'boxed' ) : ?>
	</div><!-- .container -->
	<?php endif;?>

</div><!-- #baltic-homepage-product-categories-1 -->
