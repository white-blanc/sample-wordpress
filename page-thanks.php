<?php
if (! defined('ABSPATH')) exit;
get_header();
?>
<div class="p-thanks">
    <div class="p-thanks__inner">
        <p class="p-thanks__title">お問い合わせありがとうございました。</p>
        <p class="p-thanks__text">内容を確認の上、担当者よりご連絡いたします。<br>しばらくお待ちください。</p>
        <a href="<?php echo esc_url(home_url('/')); ?>" class="p-thanks__btn">トップページへ戻る</a>
    </div>
</div>
<?php
get_footer();
