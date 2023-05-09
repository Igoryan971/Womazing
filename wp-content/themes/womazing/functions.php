<?php
/**
 * Womazing functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Womazing
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function womazing_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Womazing, use a find and replace
		* to change 'womazing' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'womazing', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'womazing' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'womazing_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'womazing_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function womazing_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'womazing_content_width', 640 );
}
add_action( 'after_setup_theme', 'womazing_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function womazing_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'womazing' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'womazing' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'womazing_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function womazing_scripts() {

	wp_enqueue_style( 'womazing-slick', get_template_directory_uri() . "/assets/css/slick.css");
	wp_enqueue_style( 'womazing-slick-theme', get_template_directory_uri() . "/assets/css/slick-theme.css");
	wp_enqueue_style( 'womazing-main', get_template_directory_uri() . "/assets/css/main.css");


	wp_enqueue_script( 'womazing-jquery-3.5.1.min', get_template_directory_uri() . '/assets/js/jquery-3.5.1.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'womazing-validate', get_template_directory_uri() . '/assets/js/jquery.validate.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'womazing-lick.min', get_template_directory_uri() . '/assets/js/slick.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'womazing-main', get_template_directory_uri() . '/assets/js/main.js', array(), _S_VERSION, true );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	} 
}
add_action( 'wp_enqueue_scripts', 'womazing_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
/**
 * Woo
 */
require get_template_directory(). '/inc/woo.php';


add_filter( 'woocommerce_pagination_args', function ( $args ) {
    $args['prev_text'] = '<div class="arrow-prev"></div>'; // ваша стрелка
    $args['next_text'] = '<div class="arrow-next"></div>'; // ваша стрелка

    return $args;
} );

add_filter( 'woocommerce_output_related_products_args', 'truemisha_rel_products_args', 25 );
 
function truemisha_rel_products_args( $args ) {
	$args[ 'posts_per_page' ] = 2; // сколько штук отображать
	$args[ 'columns' ] = 2; // сколько штук в одном ряду
	return $args;
}
/**
 * Replace add to cart button in the loop.
 */
function iconic_change_loop_add_to_cart() {
	remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
	add_action( 'woocommerce_after_shop_loop_item', 'iconic_template_loop_add_to_cart', 10 );
}
 
add_action( 'init', 'iconic_change_loop_add_to_cart', 10 );
 
/**
 * Use single add to cart button for variable products.
 */
function iconic_template_loop_add_to_cart() {
	global $product;
 
	if ( ! $product->is_type( 'variable' ) ) {
		woocommerce_template_loop_add_to_cart();
		return;
	}
 
	remove_action( 'woocommerce_single_variation', 'woocommerce_single_variation_add_to_cart_button', 20 );
	add_action( 'woocommerce_single_variation', 'iconic_loop_variation_add_to_cart_button', 20 );
 
	woocommerce_template_single_add_to_cart();
}
 
/**
 * Customise variable add to cart button for loop.
 *
 * Remove qty selector and simplify.
 */
add_action('add_to_cart_redirect', 'resolve_dupes_add_to_cart_redirect');

function resolve_dupes_add_to_cart_redirect($url = false) {

// If another plugin beats us to the punch, let them have their way with the URL
if(!empty($url)) { return $url; }

// Redirect back to the original page, without the 'add-to-cart' parameter.
// We add the `get_bloginfo` part so it saves a redirect on https:// sites.
return get_bloginfo('wpurl').add_query_arg(array(), remove_query_arg('add-to-cart'));

}

function return_empty_message() { return; }
add_filter( 'wc_add_to_cart_message', 'return_empty_message' );

add_action( 'template_redirect', 'truemisha_redirect_to_thank_you' );
 
function truemisha_redirect_to_thank_you() {
 
	// если не страница "Заказ принят", то ничего не делаем
	if( ! is_order_received_page() ) {
		return;
	}
 
	// неплохо бы проверить статус заказа, не редиректим зафейленные заказы
	if( isset( $_GET[ 'key' ] ) ) {
		$order_id = wc_get_order_id_by_order_key( $_GET[ 'key' ] );
		$order = wc_get_order( $order_id );
		if( $order->has_status( 'failed' ) ) {
			return;
		}
	}
 
 
	wp_redirect( site_url( 'received' ) );
	exit;
 
}


add_filter( 'woocommerce_variable_price_html', 'truemisha_variation_price', 20, 2 );
 
function truemisha_variation_price( $price, $product ) {
 
	$min_regular_price = $product->get_variation_regular_price( 'min', true );
	$min_sale_price = $product->get_variation_sale_price( 'min', true );
	$max_regular_price = $product->get_variation_regular_price( 'max', true );
	$max_sale_price = $product->get_variation_sale_price( 'max', true );
 
	if ( ! ( $min_regular_price == $max_regular_price && $min_sale_price == $max_sale_price ) ) {
		if ( $min_sale_price < $min_regular_price ) {
			$price = sprintf( 'от <del>%1$s</del><ins>%2$s</ins>', wc_price( $min_regular_price ), wc_price( $min_sale_price ) );
		} else {
			$price = sprintf( 'от %1$s', wc_price( $min_regular_price ) );
		}
	}
 
	return $price;
 
}


add_filter('woocommerce_get_breadcrumb',function($crumbs,$tthis){
    if(strpos($crumbs[count($crumbs)-1][0],'Страница ')===0){
        unset($crumbs[count($crumbs)-1]);
        $args["breadcrumb"][count($crumbs)-1][1]='';
    }
    return $crumbs;
},10,2);
