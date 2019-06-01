<?php
function site_files()
{
    wp_enqueue_style('bootstrap_style', get_theme_file_uri("/vendors/css/bootstrap-grid.min.css")); //v4.3.1
    wp_enqueue_style('normalize_style', get_theme_file_uri('/vendors/css/normalize.css'));
    wp_enqueue_style('slick-css', get_theme_file_uri('/vendors/js/carousel/slick/slick.css'));
    wp_enqueue_style('slick-theme-css', get_theme_file_uri('/vendors/js/carousel/slick/slick-theme.css'));
    wp_enqueue_style('icon_style', get_theme_file_uri('/vendors/fonts/fontawesome/css/all.min.css'));
    wp_enqueue_style('main_style', get_theme_file_uri("/resources/css/style.css"));
    wp_enqueue_style('queries_style', get_theme_file_uri("/resources/css/queries.css"));

    wp_enqueue_script('jquery_main-js', get_theme_file_uri('/vendors/js/jquery.js'));
    wp_enqueue_script('ajax-js', get_theme_file_uri('/vendors/js/ajax.js'));
    wp_enqueue_script('waypoints-js', get_theme_file_uri('/vendors/js/jquery.waypoints.min.js'), NULL, '1.0', true);
    wp_enqueue_script('slick-js', get_theme_file_uri('/vendors/js/carousel/slick/slick.min.js'), NULL, '1.0', true);
    wp_enqueue_script('slider-js', get_theme_file_uri('/resources/js/slider.js'), NULL, '1.0', true);
    wp_enqueue_script('main-js', get_theme_file_uri('/resources/js/script.js'), NULL, '1.0', true);
}

add_action('wp_enqueue_scripts', 'site_files');

function site_features()
{
    register_nav_menu('headerMenuLocation', 'Header Menu Location');
    add_theme_support('title-tag');
}

add_action('after_setup_theme', 'site_features');