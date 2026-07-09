<?php
if (! defined('ABSPATH')) exit;

$perpage = 10;
$page_num = empty($_GET['page-num']) ? 1 : $_GET['page-num'];
$args = array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => $perpage,
    'paged' => $page_num,
);

$the_query = new WP_Query($args);

$found_posts = $the_query->found_posts;

get_header();

?>
<div class="p-archive">
    <div class="p-archive__inner">
        <div class="p-archive__wrap">

            <?php
            if ($the_query->have_posts()) {
                while ($the_query->have_posts()) {
                    $the_query->the_post();

            ?>
                    <a href="<?php echo get_permalink(); ?>" class="c-news">
                        <span class="c-news__date"><?php echo get_the_date(); ?></span>
                        <p class="c-news__title"><?php echo get_the_title(); ?></p>
                    </a>
            <?php
                }
            }
            wp_reset_postdata();
            ?>
        </div>

        <div class="p-archive__pagination">
            <?php echo pagination($page_num, $perpage, $found_posts); ?>
        </div>
    </div>
</div>
<?php
get_footer();
