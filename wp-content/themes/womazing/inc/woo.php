<?php

if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))){

	function womazing_add_woocommerce_support() {
		add_theme_support( 'woocommerce' );
	}
	
	add_action( 'after_setup_theme', 'womazing_add_woocommerce_support' );

/**
 * Change several of the breadcrumb defaults
 */
add_filter( 'woocommerce_breadcrumb_defaults', 'jk_woocommerce_breadcrumbs' );
function jk_woocommerce_breadcrumbs() {
    return array(
            'delimiter'   => ' — ',
            'wrap_before' => '<nav class="woocommerce-breadcrumb" itemprop="breadcrumb">',
            'wrap_after'  => '</nav>',
            'before'      => ' ',
            'after'       => ' ',
            'home'        => _x( 'Home', 'breadcrumb', 'woocommerce' ),
        );
}

	remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
	remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);	
	remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15);	
	remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);	
	remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);

	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50);
	
	add_filter( 'wc_add_to_cart_message_html', '__return_null');
}