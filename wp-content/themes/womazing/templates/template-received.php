<?php

/*
*Template name: Received page
*/

get_header();

?>

<section class="received" >
		<div class="container">
		<div class="received__offer">
				<h1 class="offer__title">
					Заказ получен
				</h1>
				<?php
				do_action('woocommerce_before_main_content');
				?>
			</div>
			<div class="received-wrapper">
				<div class="received-item">
					<div class="received-content__img"></div>
					<div class="received__content">
						<div class="received__content_title">
							Заказ успешно оформлен
						</div>
						<p class="received__content_text">
							Мы свяжемся с вами в ближайшее время!
						</p>
					</div>
				</div>
				<a href="/home" class="btn received__btn">
					Перейти на главную
				</a>
			</div>
		</div>
	</section>
<?php

get_footer();
?>