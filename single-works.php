<?php
if (! defined('ABSPATH')) exit;
get_header();

$cats = array(
    1 => '注文住宅',
    2 => 'リフォーム',
    3 => 'アフターサポート',
);
$rooms = array(
    1 => '1LDK',
    2 => '2LDK',
    3 => '3LDK',
    4 => '4LDK',
    5 => '5LDK以上',
);
$styles = array(
    1 => 'モダン',
    2 => 'ナチュラル',
    3 => 'シンプル・ミニマル',
    4 => '北欧風',
    5 => 'クラシック・アンティーク',
);

?>
<div class="l-works">
    <div class="l-works__inner">
        <h1 class="l-works__title"><?php echo get_the_title(); ?></h1>
        <div class="l-works-concept">
            <div class="l-works-concept__title">
                <h2 class="l-title">
                    <span class="l-title__en">CONCEPT</span>
                    <span class="l-title__jp">コンセプト</span>
                </h2>
            </div>
            <div class="l-works__concept__content"><?php echo nl2br(get_field('concept')); ?></div>
        </div>
        <div class="l-works-meta">
            <div class="l-works-meta__item">
                <div class="l-works-meta__title">工事種別</div>
                <div class="l-works-meta__value">
                    <?php echo $cats[get_field('type')]; ?>
                </div>
            </div>
            <div class="l-works-meta__item">
                <div class="l-works-meta__title">間取り</div>
                <div class="l-works-meta__value">
                    <?php echo $rooms[get_field('room')]; ?>
                </div>
            </div>
            <div class="l-works-meta__item">
                <div class="l-works-meta__title">テイスト</div>
                <div class="l-works-meta__value">
                    <?php echo $styles[get_field('style')]; ?>
                </div>
            </div>
        </div>

        <div class="l-works-gallery">
            <div class="l-works-gallery__large" id="gallery-main">
                <?php for ($i = 1; $i <= 4; $i++): ?>
                    <?php if (get_field('img-' . $i)): ?>
                        <img src="<?php echo wp_get_attachment_url(get_field('img-' . $i)); ?>" alt="" data-index="<?php echo $i; ?>">
                    <?php endif; ?>
                <?php endfor; ?>
            </div>
            <div class="l-works-gallery__btns" id="gallery-btns">
                <?php for ($i = 1; $i <= 4; $i++): ?>
                    <?php if (get_field('img-' . $i)): ?>
                        <img class="l-works-gallery__btn" src="<?php echo wp_get_attachment_url(get_field('img-' . $i)); ?>" alt="" data-index="<?php echo $i; ?>">
                    <?php endif; ?>
                <?php endfor; ?>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
