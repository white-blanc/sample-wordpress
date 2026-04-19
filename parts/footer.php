<footer class="l-footer" id="footer">
    <div class="l-footer__inner">
        <div class="l-footer__info">
            <a href="<?php echo home_url(); ?>" class="l-footer__logo"></a>
            <p class="l-footer__tel">000-000-0000</p>
            <p class="l-footer__mail">xxx@xxx.xxx</p>
            <p class="l-footer__address">〒000-0000<br>xx県xx市xx町xxxx</p>


        </div>
        <nav class="l-footer__nav">
            <ul class="l-footer-menu">
                <?php foreach (menu_items() as $item): ?>
                    <li class="l-footer-menu__item">
                        <a href="<?php echo $item['url']; ?>" class="l-footer-menu__link"><?php echo $item['name']; ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>
    </div>
    <div class="l-footer__bottom">
        <a class="l-footer__privacy" href="<?php echo home_url('privacy'); ?>">プライバシーポリシー</a>
        <div class="l-footer__copyright">© 2025 [会社名]</div>
    </div>
</footer>