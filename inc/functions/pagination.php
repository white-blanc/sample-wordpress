<?php
if (! defined('ABSPATH')) exit;

function pagination(int $paged, int $per_page, int $found_posts, array $param = array()) {

    if ($found_posts === 0) return;

    $min_page = 1;
    $max_page = (int) ceil($found_posts / $per_page);
    $query = '&' . http_build_query($param);
    $range = 1;
    $edge = true;

    $html = '';
    $html .= '<div class="c-pagination">';

    if ($edge && $paged !== $min_page) {
        $html .= '<a class="c-pagination__page c-pagination__page--first" href="?page-num=1' . $query . '"></a>';
    }

    if ($paged !== $min_page) {
        $html .= '<a class="c-pagination__page c-pagination__page--prev" href="?page-num=' . $paged - 1 . $query . '"></a>';
    }

    $dot_flag = false;

    for ($i = 1; $i <= $max_page; $i++) {
        if ($i === $min_page && $paged - $min_page > $range) {
            $html .= '<a class="c-pagination__page c-pagination__page--num" href="?page-num=' . $i . $query . '">' . $i . '</a>';
            $dot_flag = true;
            continue;
        }

        if ($i === $max_page && $max_page - $paged > $range) {
            $html .= '<a class="c-pagination__page c-pagination__page--num" href="?page-num=' . $i . $query . '">' . $max_page . '</a>';
            $dot_flag = true;
            continue;
        }

        if ($i === $paged) {
            $html .= '<span class="c-pagination__page c-pagination__page--now">' . $i . '</span>';
            continue;
        }

        if ($paged - $range <= $i && $i <= $paged + $range) {
            $html .= '<a class="c-pagination__page c-pagination__page--num" href="?page-num=' . $i . $query . '">' . $i . '</a>';
            $dot_flag = true;

            continue;
        }

        if ($dot_flag) {
            $html .= '<span class="c-pagination__page c-pagination__page--dot">...</span>';
            $dot_flag = false;

            continue;
        }
    }

    if ($paged !== $max_page) {
        $html .= '<a class="c-pagination__page c-pagination__page--next" href="?page-num=' . $paged + 1 . $query . '"></a>';
    }

    if ($edge && $paged !== $max_page) {
        $html .= '<a class="c-pagination__page c-pagination__page--last" href="?page-num=' . $max_page . $query . '"></a>';
    }

    $html .= '</div>';

    return $html;
}
