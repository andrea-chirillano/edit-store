<?php
function dhd_enqueue_styles()
{
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');

    wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/style.css', array('parent-style'));

    wp_enqueue_style('skeleton-style', get_stylesheet_directory_uri() . '/skeleton.css', array('child-style'));

    if (is_product()) {
        wp_enqueue_style('custom-product-css', get_stylesheet_directory_uri() . '/css/single-product.css');
    }

    wp_enqueue_script('navbar-scroll', get_stylesheet_directory_uri() . '/js/navbar-scroll.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'dhd_enqueue_styles');

function my_custom_home_top_sellers() {
    if (is_front_page()) {
        echo '<div class="home-top-sellers" style="padding: 20px; background-color: #f7f7f7; margin-top: 20px; border: 1px solid #ddd; border-radius: 10px;">';
        echo '<h2 style="text-align: center; margin-bottom: 20px;">🔥 Best selling products</h2>';
        
        echo do_shortcode('[best_selling_products limit="4" columns="4"]');
        
        echo '</div>';
    }
}
add_action('woocommerce_after_main_content', 'my_custom_home_top_sellers');

function my_custom_promo_bar() {
    if (is_front_page()) {
        echo '<div class="promo-bar" style="background: #ff5733; color: white; text-align: center; padding: 10px; font-size: 16px;">
                🚀 Special offer! Get 20% off your first purchase with the code <strong>WELCOME20</strong>.
              </div>';
    }
}
add_action('wp_head', 'my_custom_promo_bar');

function custom_footer_message() {
    echo '<p style="text-align: center; padding: 10px; background: #222; color: white; font-size: 14px;">
        © ' . date("Y") . ' Edit Store - All Rights Reserved.
    </p>';
}
add_action('wp_footer', 'custom_footer_message');

function dynamic_product_message() {
    if (is_product()) {
        $product_name = get_the_title();
        echo '<div style="padding: 15px; margin-top: 20px; background: #fffae6; border-left: 5px solid #ffac33;">
            🎉 Special offer on <strong>' . esc_html($product_name) . '</strong>!  
            Buy now and get **10% off** on your next purchase.
        </div>';
    }
}
add_action('woocommerce_single_product_summary', 'dynamic_product_message', 25);
?>