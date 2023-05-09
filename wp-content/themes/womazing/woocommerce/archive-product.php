<?php

/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined('ABSPATH') || exit;

get_header();

?>
<header class="woocommerce-products-header">
	<div class="container">
		<div class="shop__offer">
			<h1 class="offer__title">
				Магазин
			</h1>
			<?php
			do_action('woocommerce_before_main_content');
			?>
		</div>
	</div>
</header>
<section class="collection" id="collection">
	<div class="container">
		<div class="categories-wrapper">
			<div class="categories__item active">
				<a href="/shop" class="categories__text">
					Все
				</a>
			</div>
			<?php
			wp_nav_menu([
				'menu'  => 'Категории'
			]);
			?>			 
		</div>
		<div class="pagination__text clearfix">
			<?php do_action('woocommerce_before_shop_loop', 'woocommerce_result_count'); ?>
		</div>
		<div class="shop-products">
			<?php
			if (wc_get_loop_prop('total')) {
				while (have_posts()) {
					the_post();
					global $product;
			?>
					<div class="shop-products__item">
						<a href="<?php the_permalink(); ?>" class="add-to-card">
							<div class="shop-products__img">
								<?= $product->get_image('full') ?>
							</div>
							<div class="shop-products__wrapper">
								<h3 class="shop-products__title">
									<?= $product->get_name() ?>
								</h3>
								<div class="shop-products__info-wrap">
									<span class="shop-products__price sale">
										<?php $min_price_regular = $product->get_variation_regular_price( 'min');
										$min_price_sale = $product->get_variation_sale_price( 'min');
										if ($min_price_sale == $min_price_regular) {
											echo "";
										} else  {
											echo wc_price($min_price_regular);
										} ?>
										
									</span>
									<span class="shop-products__price">
										<?php $min_price_sale = $product->get_variation_sale_price( 'min');
										echo wc_price($min_price_sale);?>
									</span>
								</div>
							</div>
						</a>
					</div>
			<?php
				}
			}
			?>
		</div>
		<div class="pagination__text clearfix">
			<?php do_action('woocommerce_before_shop_loop', 'woocommerce_result_count'); ?>
		</div>
	</div>
</section>
<?php
if (woocommerce_product_loop()) {

	woocommerce_product_loop_start();

	if (wc_get_loop_prop('total')) {
		while (have_posts()) {
			the_post();

			/**
			 * Hook: woocommerce_shop_loop.
			 */
			//do_action( 'woocommerce_shop_loop' );

			//wc_get_template_part( 'content', 'product' );
		}
	}

	woocommerce_product_loop_end();

	/**
	 * Hook: woocommerce_after_shop_loop.
	 *
	 * @hooked woocommerce_pagination - 10
	 */
	do_action('woocommerce_after_shop_loop');
} else {
	/**
	 * Hook: woocommerce_no_products_found.
	 *
	 * @hooked wc_no_products_found - 10
	 */
	do_action('woocommerce_no_products_found');
}

/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action('woocommerce_after_main_content');

/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
do_action('woocommerce_sidebar');


get_footer();
