<?php

/*
 * It includes every PHP file within directory in $dir param
 * */
function get_all_php_files_from_dir($dir = null)
{
    if ($dir === null) $dir = __DIR__ . '/';

    foreach (glob($dir . '*.php') as $filename)
    {
        include_once $filename;
    }
}

/*
 * It returns path to image from template directory
 * */
function static_image_url($path)
{
    return get_template_directory_uri() . '/dist/images/' . $path;
}

/*
 * It returns value of 'contact_phone' field
 * */
function get_phone_contact()
{
    return get_theme_option('contact_phone');
}

/*
 * It returns HTML with filled in CMS social media icons - social media exists within almost all templates I did
 * */
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

/*
 * It returns theme option
 *
 * The 'name' param is key of one of Carbon Fields
 * */
function get_theme_option($name)
{
    return carbon_get_theme_option($name);
}

/*
 * It returns source of image by id in param
 * */
function get_image_by_id($id)
{
    return wp_get_attachment_image_src($id, 'full')[0];
}

/*
 * It returns post meta value from post
 * */
function get_field($name, $id = null) {
    if (null === $id) {
        $id = get_the_ID();
    }

    return carbon_get_post_meta($id, $name);
}

/*
 * It displays current post content (standard The Loop)
 * */
function display_current_post_content($raw = false) {
    if ( have_posts() ) : while ( have_posts() ) : the_post();
        echo $raw ? get_the_content() : wpautop(get_the_content());
    endwhile; endif;
}