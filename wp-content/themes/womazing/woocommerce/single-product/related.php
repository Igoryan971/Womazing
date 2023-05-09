<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.9.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( $related_products ) : ?>
<section>
		<?php woocommerce_product_loop_start(); ?>
		<?php foreach ( $related_products as $related_product ) : ?>
				<div class="related__products">
					<div class="related__products__item">
					<a href="<?= $related_product -> get_permalink(); ?>" class="add-to-card">
						<div class="related__products__img">
							<?= $related_product -> get_image('full')?>
						</div>
						<div class="related__products__wrapper">
							<h3 class="related__products__title">
							<?= $related_product -> get_name()?></h3>
							</h3>
							<div class="shop-products__info-wrap">
							<span class="shop-products__price sale">
								<?php $min_price_regular = $related_product->get_variation_regular_price( 'min');
								$min_price_sale = $related_product->get_variation_sale_price( 'min');
								if ($min_price_sale == $min_price_regular) {
									echo "";
								} else  {
									echo wc_price($min_price_regular);
								} ?>
							</span>
							<span class="shop-products__price">
								<?php $min_price_sale = $related_product->get_variation_sale_price( 'min');
								echo wc_price($min_price_sale);?>
							</span>
						</div>
						</div>
					</a>
				</div>

		<?php endforeach; ?>

		<?php woocommerce_product_loop_end(); ?>

	</section>
	<?php
endif;

wp_reset_postdata();
