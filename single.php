<?php
if (! defined('ABSPATH')) exit;
get_header();
?>
<div class="l-single">
    <div class="l-single__inner">
        <h1 class="l-single__title"><?php the_title(); ?></h1>
        <div class="l-single__date"><?php echo get_the_date(); ?></div>
        <div class="l-single__content">
            <?php the_content(); ?>
        </div>
        <a href="<?php echo home_url('/news/'); ?>" class="l-single__return">一覧に戻る</a>
    </div>
</div>
<?php
get_footer();
