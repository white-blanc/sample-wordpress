<?php
if (! defined('ABSPATH')) exit;

function load_style() {
    $version = '1.0.0';
    wp_enqueue_style('theme-style', get_template_directory_uri() . '/assets/css/style.min.css', null, $version);
}

add_action('wp_enqueue_scripts', 'load_style');
