<?php
if (! defined('ABSPATH')) exit;

$per_page = 12;
$get_type = isset($_GET['type']) ? array_map('htmlspecialchars', $_GET['type']) : array();
$get_room = isset($_GET['room']) ? array_map('htmlspecialchars', $_GET['room']) : array();
$get_style = isset($_GET['style']) ? array_map('htmlspecialchars', $_GET['style']) : array();

$paged = isset($_GET['page-num']) ? $_GET['page-num'] : 1;
$paged = intval($paged);
if ($paged < 1) $paged = 1;


$args = array(
    'post_type' => 'works',
    'post_status' => 'publish',
    'posts_per_page' => $per_page,
    'paged' => $paged,
);

$meta_query = array();
$type_array = null;
$room_array = null;
$style_array = null;

if (!empty($get_type)) {
    $type_array = array(
        'key' => 'type',
        'value' => $get_type,
        'type' => 'NUMERIC',
        'compare' => 'IN',
    );
}

if (!empty($get_room)) {
    $room_array = array(
        'key' => 'room',
        'value' => $get_room,
        'type' => 'NUMERIC',
        'compare' => 'IN',
    );
}

if (!empty($get_style)) {
    $style_array = array(
        'key' => 'style',
        'value' => $get_style,
        'type' => 'NUMERIC',
        'compare' => 'IN',
    );
}

if ($type_array || $room_array || $style_array) $meta_query['relation'] = 'AND';
if ($type_array) $meta_query[] = $type_array;
if ($room_array) $meta_query[] = $room_array;
if ($style_array) $meta_query[] = $style_array;

if (!empty($meta_query)) $args['meta_query'] = $meta_query;


get_header();
?>
<div class="p-works">
    <div class="p-works__inner">
        <form action="" method="get" class="p-works-sort">
            <div class="p-works-sort__row">
                <p class="p-works-sort__title">工事種別で絞り込む</p>
                <div class="p-works-sort__labels">
                    <?php
                    $cats = array(
                        1 => '注文住宅',
                        2 => 'リフォーム',
                        3 => 'アフターサポート',
                    );

                    foreach ($cats as $key => $cat) {
                        echo '<label class="p-works-sort__label">';
                        echo '<input type="checkbox" name="type[]" class="p-works-sort__input" value="' . $key . '"';
                        if (in_array($key, $get_type)) echo ' checked';
                        echo '>';
                        echo $cat;
                        echo '</label>';
                    }

                    ?>
                </div>
            </div>
            <div class="p-works-sort__row">
                <p class="p-works-sort__title">間取りで絞り込む</p>
                <div class="p-works-sort__labels">
                    <?php
                    $rooms = array(
                        1 => '1LDK',
                        2 => '2LDK',
                        3 => '3LDK',
                        4 => '4LDK',
                        5 => '5LDK以上',
                    );

                    foreach ($rooms as $key => $room) {
                        echo '<label class="p-works-sort__label">';
                        echo '<input type="checkbox" name="room[]" class="p-works-sort__input" value="' . $key . '"';
                        if (in_array($key, $get_room)) echo ' checked';
                        echo '>';
                        echo $room;
                        echo '</label>';
                    }

                    ?>

                </div>
            </div>
            <div class="p-works-sort__row">
                <p class="p-works-sort__title">スタイル・テイストで絞り込む</p>
                <div class="p-works-sort__labels">
                    <?php
                    $styles = array(
                        1 => 'モダン',
                        2 => 'ナチュラル',
                        3 => 'シンプル・ミニマル',
                        4 => '北欧風',
                        5 => 'クラシック・アンティーク',
                    );

                    foreach ($styles as $key => $style) {
                        echo '<label class="p-works-sort__label">';
                        echo '<input type="checkbox" name="style[]" class="p-works-sort__input" value="' . $key . '"';
                        if (in_array($key, $get_style)) echo ' checked';
                        echo '>';
                        echo $style;
                        echo '</label>';
                    }

                    ?>

                </div>
            </div>
            <div class="p-works-sort__row">
                <button type="submit" class="p-works-sort__submit">絞り込む</button>
            </div>
        </form>


        <div class="p-works__wrap">
            <?php
            $the_query = new WP_Query($args);
            if ($the_query->have_posts()) {
                while ($the_query->have_posts()) {
                    $the_query->the_post();
            ?>
                    <a class="c-work" href="<?php echo get_permalink(); ?>">
                        <div class="c-work__img">
                            <?php if (get_the_post_thumbnail_url()): ?>
                                <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php echo get_the_title(); ?>">
                            <?php else: ?>
                                <img src="<?php echo get_template_directory_uri() . '/assets/img/common/thumb-default.png'; ?>" alt="<?php echo get_the_title(); ?>">
                            <?php endif; ?>
                        </div>
                        <div class="c-work__content">
                            <div class="c-work__cat">
                                <?php
                                $c = array(
                                    1 => '注文住宅',
                                    2 => 'リフォーム',
                                    3 => 'アフターサポート',
                                );

                                if (!empty($c[get_field('type')])) echo $c[get_field('type')];
                                ?>
                            </div>
                            <h3 class="c-work__title"><?php echo get_the_title(); ?></h3>
                        </div>
                    </a>

            <?php
                }
            }
            wp_reset_postdata();
            ?>
        </div>
    </div>
</div>
<?php
get_footer();
