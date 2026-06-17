<?php
if (! defined('ABSPATH')) exit;

function load_scripts() {
    $version = '1.0.0';
    wp_enqueue_script('header-script', get_template_directory_uri() . '/assets/js/header.js', null, $version, array('in_footer' => true));

    if (is_front_page()) {
    }

    if (is_singular('works')) {
        wp_enqueue_script('works-script', get_template_directory_uri() . '/assets/js/works.js', null, $version, array('in_footer' => true));
    }
}
add_action('wp_enqueue_scripts', 'load_scripts');
