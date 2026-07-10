<?php
if (! defined('ABSPATH')) exit;
get_header();
?>
<div class="p-contact">
    <div class="p-contact__inner">
        <form action="./thanks/" method="post" class="p-contact__form">
            <label for="your-name" class="p-contact__label">お名前</label>
            <div class="p-contact__content"><input type="text" name="your-name" id="your-name"></div>

            <label for="your-email" class="p-contact__label">メールアドレス</label>
            <div class="p-contact__content"><input type="email" name="your-email" id="your-email"></div>

            <label for="your-tel" class="p-contact__label">電話番号</label>
            <div class="p-contact__content"><input type="tel" name="your-tel" id="your-tel"></div>

            <label for="your-message" class="p-contact__label">お問い合わせ内容</label>
            <div class="p-contact__content"><textarea name="your-message" id="your-message"></textarea></div>

            <button type="submit" class="p-contact__submit">送信する</button>
        </form>
    </div>
</div>
<?php
get_footer();
