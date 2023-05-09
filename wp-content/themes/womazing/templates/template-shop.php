<?php
/*
*Template name: Shop page
*/

get_header();

?>
<header class="woocommerce-products-header">
	<div class="container">
			<div class="shop__offer">
				<h1 class="offer__title">
				Магазин
				</h1>
				<?php
					do_action( 'woocommerce_before_main_content' );
				?>
			</div>
		</div>
</header>
<section class="collection" id="collection">
		<div class="container">
		<div class="categories-wrapper">
				<?php
				wp_nav_menu([
					'menu'  => 'Категории'
				]);
				?>
			</div>
			<p class="pagination__text">
				Показано: 9 из 12 товаров
			</p>
			<div class="products">
				<?php
					if ( wc_get_loop_prop( 'total' ) ) {
						while ( have_posts() ) {
							the_post();
							global $product;
				?>
				<div class="products__item">
					<a href="<?php the_permalink(); ?>" class="add-to-card">
					<div class="products__img">
					<?= $product -> get_image('full')?>
					</div>
					<div class="products__wrapper">
						<h3 class="products__title">
							<?= $product -> get_name()?>
						</h3>
						<div class="products__info-wrap">
							<a href="#" class="products__price sale">
							$<?= $product -> get_regular_price()?>
							</a>
							<a href="#" class="products__price">
							$<?= $product -> get_price()?>
							</a>
						</div>
					</div>
					</a>
				</div>
				<?php
						}
						}
				?>
			</div>
			<p class="pagination__text">
				Показано: 9 из 12 товаров
			</p>
			<div class="pagination">
				<div class="pagination__item active">
					<p class="pagination__number">
						1
					</p>
				</div>
				<div class="pagination__item">
					<p class="pagination__number">
						2
					</p>
				</div>
				<a class="arrow-black"></a>
			</div>
		</div>
	</section>
<?php
get_footer();
