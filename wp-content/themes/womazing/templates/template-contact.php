<?php

/*
*Template name: Contact page
*/

get_header();

?>
<section class="contact" >
		<div class="container">
		<div class="contact__offer">
		<h1 class="offer__title">
				Контакты
				</h1>
				<?php
					do_action( 'woocommerce_before_main_content' );
				?>
			</div>
			<div class="container-fluid">
				<div class="map-block" id="map"><iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3A10e6e0398e021adcfc7052116fe26eb2efd73061ac919c1f77b2cc8d60acbf38&amp;source=constructor" width="100%" height="476" frameborder="0"></iframe></div>
			</div>
			<div class="contact-wrapper">
				<div class="contact-item">
					<span class="contact-text">Телефон</span>
					<a href="tel:+74958235412" class="contact-tel">+7 (495) 823-54-12</a>
				</div>
				<div class="contact-item">
					<span class="contact-text">E-mail</span>
					<a href="mailto:info@sitename.com" alt="Написать" class="contact-email">
						info@sitename.com
					</a>
				</div>
				<div class="contact-item">
					<span class="contact-text">Адрес</span>
					<span class="contact-address">г. Москва, 3-я улица Строителей, 25</span>
				</div>
			</div>
			<div class="contacts-form">
				<form class="form contact-form">
					<h3 class="form-title">Напишите нам</h3>
					<input class="form__field" type="text" id="name" name="name" placeholder="Имя" required>
					<input class="form__field" type="text" id="email" name="email" placeholder="E-mail" required>
					<input class="form__field" type="tel" id="tel" name="tel" placeholder="Телефон" required>
					<textarea class="form__field comments" type="text" id="message" name="message" class="comments" placeholder="Сообщение" required></textarea>
						<button class="btn contact-btn" type="submit">
							Отправить
						</button>
				</form>
				<div class="message-success">
					<p>Сообщение успешно отправлено</p>
				</div>
			</div>
		</div>
	</section>

<?php
get_footer();
?>