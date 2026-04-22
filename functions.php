<?php
if (! defined('ABSPATH')) exit;

require_once dirname(__FILE__) . '/inc/index.php';

add_theme_support('post-thumbnails');

function my_filter_rest_endpoints($endpoints) {
    if (isset($endpoints['/wp/v2/users'])) {
        unset($endpoints['/wp/v2/users']);
    }
    if (isset($endpoints['/wp/v2/users/(?P<id>[\d]+)'])) {
        unset($endpoints['/wp/v2/users/(?P<id>[\d]+)']);
    }
    return $endpoints;
}
add_filter('rest_endpoints', 'my_filter_rest_endpoints', 10, 1);

add_filter('author_rewrite_rules', '__return_empty_array');
function disable_author_archive() {
    if (preg_match('#/author/.+#', $_SERVER['REQUEST_URI'])) {
        wp_redirect(esc_url(home_url('/404.php')));
        exit;
    }
}
add_action('init', 'disable_author_archive');
