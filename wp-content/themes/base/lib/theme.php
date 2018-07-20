<?php

/*
 * Menu
 * */
function register_main_menu()
{
    $locations = array(
        'header-menu' => __('Header menu', 'base'),
        'footer-menu' => __('Footer menu', 'base')
    );
    register_nav_menus($locations);
}

add_action('init', 'register_main_menu'); // Register navigations

/*
 * Insert scripts and styles in WP way
 * */
function base_insert_styles() {
    wp_register_style( 'base_style', get_template_directory_uri() . '/dist/css/style.min.css' );
    wp_enqueue_style('base_style');
}

function base_insert_scripts() {
    wp_register_script( 'base_scripts', get_template_directory_uri() . '/dist/js/scripts.min.js' );
    wp_enqueue_script('base_scripts');
}

add_action( 'wp_footer', 'base_insert_scripts' );
add_action( 'wp_head', 'base_insert_styles' );

/*
 * Hide WordPress version
 */
remove_action('wp_head', 'wp_generator');

/*
 * Remove information about version stored in RSS
 */
define('BASE_WORDPRESS_VERSION', '1.0.0');

function rm_generator_filter() {
    return '';
}

if(!function_exists('base_remove_wp_ver_css_js')) :
    function base_remove_wp_ver_css_js($src) {
        if(strpos($src, 'ver=' . get_bloginfo( 'version'))) {
            $src = remove_query_arg( 'ver', $src );
        }
        if(!strpos($src, '?')) {
            $src .= '?ver=' . BASE_WORDPRESS_VERSION;
        }
        return $src;
    }
endif;

add_filter('the_generator', 'rm_generator_filter');
add_filter('style_loader_src', 'base_remove_wp_ver_css_js', 9999);
add_filter('script_loader_src', 'base_remove_wp_ver_css_js', 9999);
add_filter('get_the_generator_html', 'rm_generator_filter');
add_filter('get_the_generator_xhtml', 'rm_generator_filter');
add_filter('get_the_generator_atom', 'rm_generator_filter');
add_filter('get_the_generator_rss2', 'rm_generator_filter');
add_filter('get_the_generator_comment', 'rm_generator_filter');
add_filter('get_the_generator_export', 'rm_generator_filter');
add_filter('wf_disable_generator_tags', 'rm_generator_filter');