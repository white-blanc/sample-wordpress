<?php
if (! defined('ABSPATH')) exit;

function menu_items() {
    $menu = array();

    $menu[] = array(
        'name' => 'TOP',
        'url' => home_url(),
    );

    $menu[] = array(
        'name' => '私たちについて',
        'url' => home_url('/about/'),
    );

    $menu[] = array(
        'name' => 'サービス',
        'url' => home_url('/service/'),
    );

    $menu[] = array(
        'name' => '施工実績',
        'url' => home_url('/works/'),
    );

    $menu[] = array(
        'name' => '採用情報',
        'url' => home_url('/recruit/'),
    );

    $menu[] = array(
        'name' => 'お知らせ',
        'url' => home_url('/news/'),
    );

    $menu[] = array(
        'name' => 'お問い合わせ',
        'url' => home_url('/contact/'),
    );


    return $menu;
}
