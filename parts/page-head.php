<?php
if (! defined('ABSPATH')) exit;

?>
<div class="l-page-head">
    <div class="l-page-head__inner">
        <?php
        switch (true) {
            case is_404():
                echo '<h1 class="l-page-head__title">ページが見つかりませんでした。</h1>';
                break;

            case is_page():
                echo '<h1 class="l-page-head__title">' . esc_html(get_the_title()) . '</h1>';
                break;

            case is_category():
            case is_tag():
            case is_tax():
                echo '<h1 class="l-page-head__title">' . esc_html(single_term_title('', false)) . '</h1>';
                break;

            case is_author():
                echo '<h1 class="l-page-head__title">' . esc_html(get_the_author()) . '</h1>';
                break;

            case is_date():
                echo '<h1 class="l-page-head__title">' . esc_html(get_the_date('Y年m月')) . '</h1>';
                break;

            case is_home():
            case is_post_type_archive():
            case is_archive():
                $post_type_obj = is_home() ? get_post_type_object('post') : get_post_type_object(get_query_var('post_type'));
                echo '<h1 class="l-page-head__title">' . esc_html($post_type_obj->labels->name) . '</h1>';
                break;

            case is_single():
            case is_singular():
                $post_type_obj = get_post_type_object(get_post_type());
                echo '<div class="l-page-head__title">' . esc_html($post_type_obj->labels->name) . '</div>';
                break;

            default:
                echo '<h1 class="l-page-head__title">' . esc_html(get_the_title()) . '</h1>';
                break;
        }
        ?>
    </div>
</div>