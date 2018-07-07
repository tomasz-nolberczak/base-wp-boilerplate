<?php

function fetch_posts_as_json(){
    wp_send_json([
        'posts' => get_posts(),
    ]);
    wp_die();
}
add_action('wp_ajax_fetch_posts_as_json' , 'fetch_posts_as_json');
add_action('wp_ajax_nopriv_fetch_posts_as_json','fetch_posts_as_json');