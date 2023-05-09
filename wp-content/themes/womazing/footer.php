<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Womazing
 */

?>
</main>

<footer class="footer">
		<div class="container">
			<ul class="footer-content">
				<div class="footer-content__wrapper">
					<a href="#" class="logo__img"></a>
					<div class="footer-content__wrapper_items">
						<a href="#">
							© Все права защищены
						</a>
						<a href="#">
							Политика конфиденциальности
						</a>
						<a href="#">
							Публичная оферта
						</a>
					</div>
				</div>
					<ul class="footer-menu">
						<?php
							wp_nav_menu([
								'menu'  => 'footer menu'
							]);
						?>	
					</ul>
			
				<ul class="footer-content__list">
				<li class="footer-content__list-item_tel">
				<a href="tel:+380448235412" class="footer-tel__text">+38 (044) 823-54-12</a>
				</li>
					<li class="footer-content__list-item_mail">
						<a href="mailto:test@test.ru" alt="Написать" class="footer-content__text">
							hello@womazing.com
						</a>
					</li>
					<li class="footer-content__list-item_img">
						<div class="social__img">
							<div class="social__img_instagram"></div>
							<div class="social__img_facebook"></div>
							<div class="social__img_twitter"></div>
						</div>
					</li>
					<li class="footer-content__list-item_card">
						<div class="visa"></div>
					</li>
				</ul>
			</div>
		</div>
	</footer>
	<div id="wrapper-modal">
		<div id="overlay"></div>
		<div id="modal-window">
			<div id="btn-close"></div>
			<form class="form js-form" id="form-help">
				<h3 class="modal-title">Заказать обратный звонок</h3>
				<input class="form__field" type="text" id="name" name="name" placeholder="Имя" required>
				<input class="form__field" type="text" id="email" name="email" placeholder="E-mail" required>
				<input class="form__field" type="tel" id="tel" name="tel" placeholder="Телефон" required>
				<button class="btn modal-btn submit" data-submit>Заказать звонок</button>
			</form>
		</div>
	</div>
	<div id="wrapper-modal__valid">
		<div id="overlay__valid"></div>
		<div id="modal-window__valid">
			<div class="modal-content">
				<h3 class="modal-title">Отлично! Мы скоро вам перезвоним.</h3>
				<button class="btn valid__btn submit" type="submit">
					Закрыть
				</button>
			</div>
		</div>
	</div>
<?php wp_footer(); ?>
</body>
</html>
