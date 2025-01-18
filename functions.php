<?php
function dhd_enqueue_styles()
{
    // Cargar los estilos del tema padre
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');

    // Cargar los estilos del tema hijo
    wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/style.css', array('parent-style'));

    // Cargar otros estilos adicionales
    wp_enqueue_style('skeleton-style', get_stylesheet_directory_uri() . '/skeleton.css', array('child-style'));
}
add_action('wp_enqueue_scripts', 'dhd_enqueue_styles');