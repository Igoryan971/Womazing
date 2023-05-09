<?php

/*
*Template name: Cart page
*/

get_header();

?>
<form class="woocommerce-cart-form" action="<?php echo esc_url(wc_get_cart_url()); ?>" method="post">
	<section class="card">
		<div class="container">
			<div class="card__offer">
				<h1 class="offer__title">
					Корзина
				</h1>
				<?php
				do_action('woocommerce_before_main_content');
				?>
			</div>
			<div class="card-content">
				<table>
					<tr>
						<td class="card-head">
							Товар
						</td>
						<td class="card-head">
							Цена
						</td>
						<td class="card-head">
							Количество
						</td>
						<td class="card-head">
							Всего
						</td>
					</tr>
					<?php
					foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
						$_product   = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
						$product_id = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key);

						if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_cart_item_visible', true, $cart_item, $cart_item_key)) {
							$product_permalink = apply_filters('woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink($cart_item) : '', $cart_item, $cart_item_key);
					?>
							<tr class="woocommerce-cart-form__cart-item <?php echo esc_attr(apply_filters('woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key)); ?>">

								<td class="card-item">
									<div class="card-product">
										<div class="card-btn">
											<?php
											echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
												'woocommerce_cart_item_remove_link',
												sprintf(
													'<a href="%s" class="remove" aria-label="%s" data-product_id="%s" data-product_sku="%s"><img src="/wp-content/uploads/2023/04/close.png"></a>',
													esc_url(wc_get_cart_remove_url($cart_item_key)),
													esc_html__('Remove this item', 'woocommerce'),
													esc_attr($product_id),
													esc_attr($_product->get_sku())
												),
												$cart_item_key
											);
											?>
										</div>
										<div class="card__img">
											<img src="<?= wp_get_attachment_url($_product->get_image_id()); ?>" alt="">
										</div>
										<p class="card__text"><?= $_product->get_name(); ?></p>
									</div>
								</td>
								<td class="card-item">
									<?php
									echo apply_filters('woocommerce_cart_item_price', WC()->cart->get_product_price($_product), $cart_item, $cart_item_key); // PHPCS: XSS ok.
									?>
								</td>
								<td class="card-item">
									<?php
									if ($_product->is_sold_individually()) {
										$product_quantity = sprintf('1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key);
									} else {
										$product_quantity = woocommerce_quantity_input(
											array(
												'input_name' => "cart[{$cart_item_key}][qty]",
												'input_value' => $cart_item['quantity'],
												'max_value' => $_product->get_max_purchase_quantity(),
												'min_value' => '0',
												'product_name' => $_product->get_name(),
											),
											$_product,
											false
										);
									}
									echo apply_filters('woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item); // PHPCS: XSS ok.
									?>
								</td>
								<td class="card-item">
									<?php
									echo apply_filters('woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal($_product, $cart_item['quantity']), $cart_item, $cart_item_key); // PHPCS: XSS ok.
									?>
								</td>
							</tr>
					<?php
						}
					}
					?>
					<?php do_action('woocommerce_cart_contents'); ?>
				</table>
				<div class="management">
					<?php if (wc_coupons_enabled()) { ?>
						<div class="management__input">
							<input type="text" name="coupon_code" class="management__input" id="coupon_code" value="" placeholder="Введите купон" />
						</div>
						<button type="submit" class="btn management__btn<?php echo esc_attr(wc_wp_theme_get_element_class_name('button') ? ' ' . wc_wp_theme_get_element_class_name('button') : ''); ?>" name="apply_coupon" value="<?php esc_attr_e('Apply coupon', 'woocommerce'); ?>"><?php esc_attr_e('Apply coupon', 'woocommerce'); ?></button>
						<?php do_action('woocommerce_cart_coupon'); ?>

					<?php } ?>
					<button type="submit" class="btn management__btn<?php echo esc_attr(wc_wp_theme_get_element_class_name('button') ? ' ' . wc_wp_theme_get_element_class_name('button') : ''); ?>" name="update_cart" value="<?php esc_attr_e('Update cart', 'woocommerce'); ?>" aria-disabled="false"><?php esc_html_e('Update cart', 'woocommerce'); ?></button>
					<?php do_action('woocommerce_cart_actions'); ?>
					<?php wp_nonce_field('woocommerce-cart', 'woocommerce-cart-nonce'); ?>
				</div>
				<div class="total">
					<div class="total__content">
						<div class="total-text">
							<div class="total-text__item">
								Подытог:
							</div>
							<div class="total-text__item">
								<?php wc_cart_totals_subtotal_html(); ?>
							</div>
						</div>
						<?php foreach (WC()->cart->get_coupons() as $code => $coupon) : ?>

							<div class="total-text__item">
								Купон: <?php echo $coupon->code ?>
							</div>
							<div class="total-text__item">
								<?php wc_cart_totals_coupon_html($coupon); ?>
							</div>
						<?php endforeach; ?>

						<div class="total__item">
							<div class="total__board">
								<div class="total__item-text">
									Итого:
								</div>
								<div class="total__item-text">
									<?php wc_cart_totals_order_total_html(); ?>
								</div>
							</div>
							<a href="/checkout" class=" btn total__btn">
								Оформить заказ
							</a>
						</div>
					</div>
				</div>
			</div>
	</section>
</form>

<?php

get_footer();
?>