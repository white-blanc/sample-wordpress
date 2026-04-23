<?php
if (! defined('ABSPATH')) exit;

$post_label = 'お知らせ';
$post_slug  = 'news';

add_action('admin_menu', function () use ($post_label) {
    global $menu, $submenu;

    $menu[5][0] = $post_label;
    $submenu['edit.php'][5][0] = $post_label . '一覧';
    $submenu['edit.php'][10][0] = '新規' . $post_label . '投稿';
});

add_filter(
    'register_post_type_args',
    function ($args, $post_type) use ($post_label, $post_slug) {
        if ('post' == $post_type) {
            $args['rewrite'] = true;
            $args['has_archive'] = $post_slug;
            $args['label'] = $post_label;
        }
        return $args;
    },
    10,
    2
);

add_action('init', function () use ($post_label, $post_slug) {
    global $wp_post_types;

    if (!isset($wp_post_types['post'])) return;

    $labels = &$wp_post_types['post']->labels;
    $labels->name = $post_label;
    $labels->singular_name = $post_label;
    $labels->add_new = _x('追加', $post_label);
    $labels->add_new_item = $post_label . 'の新規追加';
    $labels->edit_item = $post_label . 'の編集';
    $labels->new_item = '新規' . $post_label;
    $labels->view_item = $post_label . 'を表示';
    $labels->search_items = $post_label . 'を検索';
    $labels->not_found = $post_label . 'が見つかりませんでした';
    $labels->not_found_in_trash = 'ゴミ箱に' . $post_label . 'は見つかりませんでした';
});

add_filter('pre_post_link', function ($permalink) use ($post_slug) {
    return '/' . $post_slug . $permalink;
});

add_filter('post_rewrite_rules', function ($post_rewrite) use ($post_slug) {
    $rules = [];
    foreach ($post_rewrite as $regex => $rewrite) {
        $rules[$post_slug . '/' . $regex] = $rewrite;
    }
    return $rules;
});
