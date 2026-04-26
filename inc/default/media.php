<?php
if (! defined('ABSPATH')) exit;

function remove_add_image_size($sizes) {
    unset($sizes['thumbnail']);
    unset($sizes['medium']);
    unset($sizes['large']);
    unset($sizes['medium_large']);
    unset($sizes['1536x1536']);
    // unset($sizes['2048x2048']);
    return $sizes;
}
add_filter('intermediate_image_sizes_advanced', 'remove_add_image_size');
add_filter('big_image_size_threshold', '__return_false');
