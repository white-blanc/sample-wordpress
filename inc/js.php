<?php
if (! defined('ABSPATH')) exit;

function load_scripts() {
    $version = '1.0.0';

    if (is_front_page()) {

        wp_enqueue_script('front-script', get_template_directory_uri() . '/assets/js/front.js', null, $version, array('in_footer' => true));
    }
}
add_action('wp_enqueue_scripts', 'load_scripts');
