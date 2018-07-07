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

add_action('init', 'register_main_menu'); // Register nav