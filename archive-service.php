<?php
if (! defined('ABSPATH')) exit;

$services = array();

$args = array(
    'post_type' => 'service',
    'post_status' => 'publidh',
    'posts_per_page' => -1,
);
$the_query = new WP_Query($args);
if ($the_query->have_posts()) {
    while ($the_query->have_posts()) {
        $the_query->the_post();
        $services[] = get_the_ID();
    }
}
wp_reset_postdata();


get_header();
?>

<section class="p-service">
    <div class="p-service__inner">
        <div class="p-service__sec">
            <h2 class="l-title">
                <span class="l-title__en">SERVICE</span>
                <span class="l-title__jp">サービス一覧</span>
            </h2>
        </div>

        <ul class="p-service-nav">
            <?php foreach ($services as $service): ?>
                <li class="p-service-nav__item">
                    <a href="#<?php echo $service; ?>" class="p-service-nav__link">
                        <p class="p-service-nav__title"><?php echo get_the_title($service); ?></p>
                        <p class="p-service-nav__text"><?php echo get_field('comment'); ?></p>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>

        <div class="p-service-main">
            <?php $num = 0; ?>
            <?php foreach ($services as $service): ?>
                <?php $num++; ?>
                <div class="p-service-main__item" id="<?php echo $service; ?>">
                    <div class="p-service-main__inner">
                        <div class="p-service-main__head">
                            <span class="p-service-main__num"><?php echo str_pad($num, 2, '0', STR_PAD_LEFT); ?></span>
                            <h3 class="p-service-main__title"><?php echo get_the_title($service); ?></h3>
                        </div>
                        <div class="p-service-main__thumb">
                            <?php if (get_the_post_thumbnail_url($service)): ?>
                                <img src="<?php echo get_the_post_thumbnail_url($service); ?>" alt="<?php echo get_the_title($service); ?>" loading="lazy">
                            <?php endif; ?>
                        </div>
                        <div class="p-service-main__content">
                            <p><?php echo nl2br(get_field('info', $service)); ?></p>
                        </div>
                        <div class="p-service-main__other">
                            <?php for ($i = 0; $i < 5; $i++): ?>
                                <?php if (get_field('step' . ($i + 1))): ?>
                                    <div class="p-service-main__step">
                                        <span class="p-service-main__step-num"><?php echo 'STEP ' . str_pad($i + 1, 2, '0', STR_PAD_LEFT); ?></span>
                                        <p class="p-service-main__step-text"><?php echo get_field('step' . ($i + 1), $service); ?></p>
                                    </div>
                                <?php endif; ?>
                            <?php endfor; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <section class="p-service__sec">
            <h2 class="l-title">
                <span class="l-title__en">WHY CHOOSE US</span>
                <span class="l-title__jp">選ばれる理由</span>
            </h2>

            <?php
            $why = array(
                array(
                    'icon' => 'icon-building.svg',
                    'text' => '創業70年以上の<br>実績と信頼',
                ),
                array(
                    'icon' => 'icon-forest.svg',
                    'text' => '自然素材・無垢材への<br>こだわり',
                ),
                array(
                    'icon' => 'icon-team.svg',
                    'text' => '設計から施工まで<br>自社一貫',
                ),
                array(
                    'icon' => 'icon-shake.svg',
                    'text' => '引き渡し後も続く<br>アフターサポート',
                ),
                array(
                    'icon' => 'icon-map.svg',
                    'text' => '地域密着で<br>素早い対応',
                ),
            );
            ?>
            <div class="p-service-why">
                <?php foreach ($why as $item): ?>
                    <div class="p-service-why__item">
                        <span class="p-service-why__icon" style="mask-image: url(<?php echo get_template_directory_uri() . '/assets/img/icon/' . $item['icon']; ?>);"></span>
                        <p class="p-service-why__text"><?php echo $item['text']; ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>

    </div>
</section>

<?php
get_footer();
