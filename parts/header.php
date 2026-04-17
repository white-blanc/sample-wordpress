<?php

if (! defined('ABSPATH')) exit;

?>
<header class="l-header" id="header">
    <div class="l-header__inner">
        <?php
        $tag = 'div';
        if (is_front_page()) $tag = 'h1';

        echo '<' . $tag . ' class="l-header__logo">';
        ?>
        <a href="<?php echo home_url(); ?>" class="l-header__link">
            <img src="<?php echo get_template_directory_uri() . '/assets/img/common/logo-side.svg'; ?>" alt="<?php echo get_bloginfo('name'); ?>">
        </a>
        <?php echo '</' . $tag . '>'; ?>

        <nav class="l-header__nav">
            <ul class="l-header-menu">
                <?php $menu = menu_items(); ?>
                <?php foreach ($menu as $m): ?>
                    <li class="l-meader-menu__item">
                        <a class="l-header-menu__link" href="<?php echo $m['url']; ?>"><?php echo $m['name']; ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>
    </div>
</header>