<?php
if (! defined('ABSPATH')) exit;

get_header();
?>

<section class="p-top-hero">
    <img class="p-top-hero__img" src="<?php echo get_template_directory_uri() . '/assets/img/top/top-hero.jpg'; ?>" alt="TOPイメージ">

    <div class="p-top-hero__inner" id="">
        <div class="p-top-hero__catch">
            <p><span>家</span>は、人生の器だ。</p>
        </div>
    </div>
</section>

<section class="p-top-about">
    <div class="p-top-about__img">
        <img src="<?php echo get_template_directory_uri() . '/assets/img/top/top-about.jpg'; ?>" alt="ABOUT背景" loading="lazy">
    </div>
    <div class="p-top-about__content">
        <h2 class="p-top-title">
            <span class="p-top-title__en">ABOUT</span>
            <span class="p-top-title__jp">私たちについて</span>
        </h2>

        <div class="p-top-about__text">
            昭和27年の創業以来、福岡の地で家づくりに向き合ってきました。素材を選び、職人が手を動かし、お客様と共に理想の住まいを形にする。それが暁工務店の仕事です。
        </div>

        <div class="p-top-about__link">
            <a href="<?php echo home_url('about'); ?>" class="c-link">私たちについて詳しく見る</a>
        </div>
    </div>
</section>

<section class="p-top-service">
    <div class="p-top-service__inner">
        <h2 class="p-top-title">
            <span class="p-top-title__en">SERVICE</span>
            <span class="p-top-title__jp">サービス</span>
        </h2>

        <div class="p-top-service__wrap">
            <?php
            $args = array(
                'post_status' => 'publish',
                'post_type' => 'service',
                'posts_per_page' => 3,
            );

            $wp_query = new WP_Query($args);

            $num = 0;

            if ($wp_query->have_posts()) {
                while ($wp_query->have_posts()) {
                    $num++;
                    $wp_query->the_post();
            ?>
                    <div class="p-top-service-item">
                        <p class="p-top-service-item__num"><?php echo str_pad($num, 2, '0', STR_PAD_LEFT); ?></p>
                        <h3 class="p-top-service-item__title"><?php the_title(); ?></h3>
                        <div class="p-top-service-item__content"><?php echo get_field('comment'); ?></div>
                        <div class="p-top-service-item__link">
                            <a href="<?php echo get_permalink(); ?>" class="c-link">詳しく見る</a>
                        </div>
                    </div>
            <?php

                }
            }

            wp_reset_postdata();
            ?>
        </div>
    </div>
</section>

<section class="p-top-works">
    <div class="p-top-works__inner">
        <h2 class="p-top-title">
            <span class="p-top-title__en">WORKS</span>
            <span class="p-top-title__jp">施工実績</span>
        </h2>
        <div class="p-top-works__wrap">
            <?php
            $args = array(
                'post_status' => 'publish',
                'post_type' => 'works',
                'posts_per_page' => 3,
            );

            $wp_query = new WP_Query($args);

            if ($wp_query->have_posts()) {
                while ($wp_query->have_posts()) {
                    $wp_query->the_post();
            ?>
                    <a class="p-top-works-item" href="<?php echo get_permalink(); ?>">
                        <div class="p-top-works-item__img">
                            <?php if (get_the_post_thumbnail_url()): ?>
                                <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php echo get_the_title(); ?>">
                            <?php else: ?>
                                <img src="<?php echo get_template_directory_uri() . '/assets/img/common/thumb-default.png'; ?>" alt="<?php echo get_the_title(); ?>">
                            <?php endif; ?>
                        </div>
                        <div class="p-top-works-item__content">
                            <div class="p-top-works-item__cat">
                                <?php
                                $cats = array(
                                    1 => '注文住宅',
                                    2 => 'リフォーム',
                                    3 => 'アフターサポート',
                                );

                                if (!empty($cats[get_field('type')])) echo $cats[get_field('type')];
                                ?>
                            </div>
                            <h3 class="p-top-works-item__title"><?php echo get_the_title(); ?></h3>
                        </div>
                    </a>
            <?php

                }
            }

            wp_reset_postdata();
            ?>
        </div>

        <div class="p-top-works__link">
            <a href="<?php echo home_url('works'); ?>" class="c-link">施工実績を詳しく見る</a>
        </div>
    </div>
</section>

<section class="p-top-recruit">
    <div class="p-top-recruit__left">
        <p>手で、つくる。<br>誇りを、持って。</p>
    </div>
    <div class="p-top-recruit__right">
        <div class="p-top-recruit__main">
            <h2 class="p-top-title">
                <span class="p-top-title__en">RECRUIT</span>
                <span class="p-top-title__jp">採用情報</span>
            </h2>

            <div class="p-top-recruit__content">暁工務店では、共に家づくりを担う仲間を募集しています。技術を磨きたい方、地域に根ざした仕事がしたい方、ぜひご応募ください。</div>

            <div class="p-top-recruit__link">
                <a class="c-link" href="<?php echo home_url('recruit'); ?>">採用情報を詳しく見る</a>
            </div>
        </div>
    </div>
</section>

<?php

get_footer();
