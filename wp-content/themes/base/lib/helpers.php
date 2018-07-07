<?php

function get_all_php_files_from_dir($dir)
{
    foreach (glob($dir . '*.php') as $filename)
    {
        include $filename;
    }
}

function static_image_url($path)
{
    return get_template_directory_uri() . '/dist/images/' . $path;
}

function get_phone_contact()
{
    return get_theme_option('contact_phone');
}

function get_social_media_icons()
{
    $icons = get_theme_option('social_media');

    $iconsToShow = '<ul class="social-media-icon-list">';

    foreach ($icons as $icon) {
        $iconsToShow .= '<li><a href="' . $icon['url'] . '"><i class="icon-' . $icon['icon'] . '"></i></a></li>';
    }

    $iconsToShow .= '<ul>';

    return $iconsToShow;
}

function get_theme_option($name)
{
    return carbon_get_theme_option($name);
}

function get_image_by_id($id)
{
    return wp_get_attachment_image_src($id, 'full')[0];
}

function get_field($name, $id = null) {
    if (null === $id) {
        $id = get_the_ID();
    }

    return carbon_get_post_meta($id, $name);
}