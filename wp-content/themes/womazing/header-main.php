<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Womazing
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Магазин женской одежды">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> id="bodyMain">
	<header class="header-main">
			<div class="container container_flex">
				<a href="/" class="logo__img"></a>
				<ul class="menu">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
						)
					);
					?>
				</ul>
				<div class="tel">
					<div id="tel__logo"></div>
					<a href="tel:+74958235412" class="tel__text">+7 (495) 823-54-12</a>
				</div>
				<div id="mobile-tel__logo"></div>
				<div class="busket-icon">
					<a href="/cart" class="busket"></a>
					<?php 
						if(!empty(WC()->cart->get_cart_contents_count())) {
							?>
							<span>
							<?php 	echo WC()->cart->get_cart_contents_count(); ?>
							</span>
							<?php
						}
						else{
							echo "";
						}
						?>
				</div>
				<div class="hamburger__menu">
					<ul class="menu__list">
						<li class="menu__item">
							<a href="/home/">
								Главная
							</a>
						</li>
						<li class="menu__item">
							<a href=/shop />
							Магазин
							</a>
						</li>
						<li class="menu__item">
							<a href=/about />
							О бренде
							</a>
						</li>
						<li class="menu__item">
							<a href=/contact />
							Контакты
							</a>
						</li>
					</ul>
				</div>
				<button class="hamburger">
					<span class="hamburger__item"></span>
					<span class="hamburger__item"></span>
					<span class="hamburger__item"></span>
				</button>
	</header>
	<main>