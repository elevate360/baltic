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
	<div class="container">

		<?php foreach ( $product_cats as $product_cat ) : ?>
		<?php

		$cat_id = $product_cat;

		$btn_text 	= get_theme_mod( 'product_cat_btn_text', 'Shop Now' );

		if ( ! empty( $cat_id ) ) {

			$term 		= get_term( $cat_id, 'product_cat' );
	    	$image_id 	= get_woocommerce_term_meta( $term->term_id, 'thumbnail_id', true );
	    	$image 		= wp_get_attachment_image_src( $image_id, 'large' );

			?>

			<div class="product-cat">

				<div class="product-cat__inner">
					<?php if( ! empty( $image_id ) ) : ?>
						<div class="product-cat__thumbnail" style="background-image:url('<?php echo $image[0];?>')"></div>
					<?php endif;?>
					<h4 class="product-cat__title"><?php echo esc_attr( $term->name );?></h4>
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

	</div><!-- .container -->
</div><!-- #baltic-homepage-product-categories-1 -->
