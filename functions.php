<?php
function dhd_enqueue_styles()
{
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');

    wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/style.css', array('parent-style'));

    wp_enqueue_style('skeleton-style', get_stylesheet_directory_uri() . '/skeleton.css', array('child-style'));

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

?>