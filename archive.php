<?php
if (! defined('ABSPATH')) exit;

$perpage = 10;
$page_num = empty($_GET['page-num']) ? 1 : $_GET['page-num'];
$args = array();


get_header();


?>
<div class="p-archive">
    <div class="p-archive__inner">
        <?php
        $the_query = new WP_Query($args);
        if ($the_query->have_posts()) {
            while ($the_query->have_posts()) {
                $the_query->the_post();
            }
        }
        wp_reset_postdata();
        ?>
    </div>
</div>
<?php
get_footer();
