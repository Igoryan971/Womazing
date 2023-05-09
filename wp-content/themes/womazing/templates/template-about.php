<?php

/*
*Template name: About page
*/

get_header();

?>
<section class="about" id="about">
		<div class="container">
		<div class="about__offer">
				<h1 class="offer__title">
				О бренде
				</h1>
				<?php
					do_action( 'woocommerce_before_main_content');
				?>
			</div>
			<div class="about-wrapper">
				<div class="about__img">
					<img src="/wp-content/uploads/2023/03/about1.png" alt="">	
				</div>
				<div class="about__content">
					<h3 class="about__title">
						Идея и женщина
					</h3>
					<p class="about__text">
						Womazing была основана в 2010-ом и стала одной из самых успешных компаний нашей страны. Как и многие итальянские фирмы, Womazing остаётся семейной компанией, хотя ни один из членов семьи не является модельером. 
					</p>
					<p class="about__text">
						Мы действуем по успешной формуле, прибегая к услугам известных модельеров для создания своих коллекций. Этот метод был описан критиком моды Колином Макдауэллом как форма дизайнерского со-творчества, характерная для ряда итальянских prêt-a-porter компаний. 
					</p>
				</div>
			</div>
			<div class="about-wrapper">
				<div class="about__content">
					<h3 class="about__title">
						Магия в деталях
					</h3>
					<p class="about__text">
						Первый магазин Womazing был открыт в маленьком городке на севере страны в 2010-ом году. Первая коллекция состояла из двух пальто и костюма, которые были копиями парижских моделей.
					</p>
					<p class="about__text">
						есмотря на то, что по образованию основательница была адвокатом, ее семья всегда была тесно связана с шитьём (прабабушка основательницы шила одежду для женщин, а мать основала профессиональную школу кроя и шитья). Стремление производить одежду для масс несло в себе большие перспективы, особенно в то время, когда высокая мода по-прежнему доминировала, а рынка качественного prêt-a-porter попросту не существовало.
					</p>
				</div>
				<div class="about__img">
					<img src="/wp-content/uploads/2023/03/about2.png" alt="">	
				</div>
			</div>
			<a href="/shop" class="btn about__btn">
				Перейти в магазин
			</a>
		</div>
	</section>

<?php
get_footer();
?>