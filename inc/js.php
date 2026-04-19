<?php
if (! defined('ABSPATH')) exit;

function load_scripts() {
    $version = '1.0.0';
    wp_enqueue_script('header-script', get_template_directory_uri() . '/assets/js/header.js', null, $version, array('in_footer' => true));

    if (is_front_page()) {
    }
}
add_action('wp_enqueue_scripts', 'load_scripts');
