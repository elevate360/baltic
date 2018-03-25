<?php
/**
 * Baltic products #2
 *
 * @package  Baltic
 */

$display 	= get_theme_mod( 'baltic_homepage_products_2_display', 'grid' );
$display 	= ( ! empty( $display ) ) ? $display : '';
$title 		= get_theme_mod( 'baltic_homepage_products_2_title' );
$description = get_theme_mod( 'baltic_homepage_products_2_description' );
$limit 		= get_theme_mod( 'baltic_homepage_products_2_limit', 4 );
$columns 	= get_theme_mod( 'baltic_homepage_products_2_columns', 4 );
$orderby 	= get_theme_mod( 'baltic_homepage_products_2_orderby', 'date' );
$order 		= get_theme_mod( 'baltic_homepage_products_2_order', 'ASC' );
$visibility = get_theme_mod( 'baltic_homepage_products_2_visibility', 'ASC' );
$status = get_theme_mod( 'baltic_homepage_products_2_status' );
$status = ( !empty( $status ) ) ? ' ' . $status . '="true"' : '';
$category = (array) get_theme_mod( 'baltic_homepage_products_2_categories' );
$category = implode(',', $category);
$categories = !empty( $category ) ? ' category="'. $category . '"' : '';

?>
<div id="baltic-homepage-products-2" class="baltic-homepage-products-2 homepage-products homepage-section <?php echo esc_attr( $display );?>" data-columns="<?php echo absint( $columns );?>">
	<?php if( baltic_homepage_woocommerce() == true ) return;?>
	<div class="homepage-overlay"></div>

	<?php if( get_theme_mod( 'baltic_homepage_products_2_layout', 'boxed' ) == 'boxed' ) : ?>
	<div class="container">
	<?php endif;?>

		<?php if( !empty( $title ) ) : ?>
			<h3 class="homepage-title"><?php echo esc_attr( $title );?></h3>
		<?php endif;?>

		<?php if( !empty( $description ) ) : ?>
			<div class="homepage-description"><?php echo esc_attr( $description );?></div>
		<?php endif;?>

		<?php
		$shortcode = sprintf( '[products limit="%1$s" columns="%2$s" orderby="%3$s" order="%4$s" visibility="%5$s"%6$s%7$s]',
			$limit,
			$columns,
			$orderby,
			$order,
			$visibility,
			$status,
			$categories );
		echo do_shortcode( $shortcode );
		?>

	<?php if( get_theme_mod( 'baltic_homepage_products_2_layout', 'boxed' ) == 'boxed' ) : ?>
	</div><!-- .container -->
	<?php endif;?>

</div><!-- #baltic-homepage-products-2 -->
