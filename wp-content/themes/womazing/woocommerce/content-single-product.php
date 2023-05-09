<?php
global $product;
?>

<section class="item" <?php wc_product_class( '', $product, $related_product); ?>>
		<div class="container">
			<div class="item__offer">
				<h1 class="offer__title">
				<?= $product -> get_name()?>
				</h1>
					<?php
						do_action( 'woocommerce_before_main_content' );
					?>
			</div>
			<div class="item-wrapper">
				<div class="item__products__img">
					<?= $product -> get_image('full');?>
				</div>
				<div class="item__options">
					<div class="item__price">
						<span class="item__products__price sale">
							<?php $min_price_regular = $product->get_variation_regular_price( 'min');
							$min_price_sale = $product->get_variation_sale_price( 'min');
							if ($min_price_sale == $min_price_regular) {
								echo "";
							} else  {
							echo wc_price($min_price_regular);
							} ?>
						</span>
						<span class="item__products__price">
							<?php $min_price_sale = $product->get_variation_sale_price( 'min');
							echo wc_price($min_price_sale);?>
						</span>
					</div>
						<?php do_action( 'woocommerce_single_product_summary');?>
			</div>
	</section>
	<section class="related">
		<div class="container">
		<h2 class="section__title">
				Связанные товары
			</h2>
			<?php
					do_action( 'woocommerce_after_single_product_summary');
				?>
		</div>
	</section>
	

<?php do_action( 'woocommerce_after_single_product' ); ?>