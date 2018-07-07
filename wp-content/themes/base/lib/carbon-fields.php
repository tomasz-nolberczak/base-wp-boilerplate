<?php

/*
 * Load Carbon Fields
 * */
function load_carbon_fields_library()
{
    \Carbon_Fields\Carbon_Fields::boot();
}

function register_carbon_fields() {
    get_all_php_files_from_dir(__DIR__ . '/custom-fields/');
}

/*
 * Set Google Maps Key for Carbon Fields
 * */
function carbon_fields_google_maps_api_key() {
    return 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
}

add_action('carbon_fields_register_fields', 'register_carbon_fields');
add_action('after_setup_theme', 'load_carbon_fields_library');
add_filter( 'carbon_fields_map_field_api_key', 'carbon_fields_google_maps_api_key' );
