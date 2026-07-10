<?php
if (! defined('ABSPATH')) exit;
get_header();
?>
<div class="p-404">
    <div class="p-404__inner">
        <p class="p-404__title">404 Not Found</p>
        <p class="p-404__text">お探しのページが見つかりませんでした。<br>URLが間違っているか、ページが削除された可能性があります。</p>
        <a href="<?php echo esc_url(home_url('/')); ?>" class="p-404__btn">トップページへ戻る</a>
    </div>
</div>
<?php
get_footer();
