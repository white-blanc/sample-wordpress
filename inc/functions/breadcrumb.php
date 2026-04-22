<?php
if (! defined('ABSPATH')) exit;

function breadcrumb() {
    if (is_front_page()) {
        return '';
    }

    $crumbs = [];

    switch (true) {
        case is_page():
            $ancestors = array_reverse(get_post_ancestors(get_the_ID()));
            foreach ($ancestors as $ancestor_id) {
                $crumbs[] = [
                    'name' => get_the_title($ancestor_id),
                    'url'  => get_permalink($ancestor_id),
                ];
            }
            $crumbs[] = [
                'name' => get_the_title(),
                'url'  => '',
            ];
            break;

        case is_single():
        case is_singular():
            $post_type    = get_post_type();
            $archive_link = get_post_type_archive_link($post_type);
            if ($archive_link) {
                $post_type_obj = get_post_type_object($post_type);
                $crumbs[] = [
                    'name' => $post_type_obj->labels->name,
                    'url'  => $archive_link,
                ];
            }
            $crumbs[] = [
                'name' => get_the_title(),
                'url'  => '',
            ];
            break;

        case is_category():
            $crumbs[] = [
                'name' => single_term_title('', false),
                'url'  => '',
            ];
            break;

        case is_tag():
            $crumbs[] = [
                'name' => single_term_title('', false),
                'url'  => '',
            ];
            break;

        case is_tax():
            $crumbs[] = [
                'name' => single_term_title('', false),
                'url'  => '',
            ];
            break;

        case is_author():
            $crumbs[] = [
                'name' => get_the_author(),
                'url'  => '',
            ];
            break;

        case is_date():
            $crumbs[] = [
                'name' => get_the_date('Y年m月'),
                'url'  => '',
            ];
            break;

        case is_home():
        case is_post_type_archive():
        case is_archive():
            $post_type_obj = is_home()
                ? get_post_type_object('post')
                : get_post_type_object(get_query_var('post_type'));
            $crumbs[] = [
                'name' => $post_type_obj->labels->name,
                'url'  => '',
            ];
            break;

        case is_search():
            $crumbs[] = [
                'name' => '「' . get_search_query() . '」の検索結果',
                'url'  => '',
            ];
            break;

        case is_404():
            $crumbs[] = [
                'name' => 'ページが見つかりませんでした',
                'url'  => '',
            ];
            break;

        default:
            break;
    }

    $html  = '<nav class="c-breadcrumb" aria-label="パンくずリスト">';
    $html .= '<ul class="c-breadcrumb__list">';
    $html .= '<li class="c-breadcrumb__item"><a class="c-breadcrumb__link" href="' . esc_url(home_url('/')) . '">TOP</a></li>';
    foreach ($crumbs as $crumb) {
        $html .= '<li class="c-breadcrumb__item">';
        if ($crumb['url']) {
            $html .= '<a class="c-breadcrumb__link" href="' . esc_url($crumb['url']) . '">' . esc_html($crumb['name']) . '</a>';
        } else {
            $html .= '<span>' . esc_html($crumb['name']) . '</span>';
        }
        $html .= '</li>';
    }
    $html .= '</ul>';
    $html .= '</nav>';

    return $html;
}
