<?php
if (! defined('ABSPATH')) exit;
get_header();
?>
<div class="p-recruit-catch">
    <div class="p-recruit-catch__inner">
        <div class="p-recruit-catch__content">
            <h2 class="p-recruit-catch__catch">
                手で、つくる。<br>
                誇りを、持って。
            </h2>
            <div class="p-recruit-catch__text">
                暁工務店では、共に家づくりを担う仲間を募集しています。技術を磨きたい方、地域に根ざした仕事がしたい方、ぜひご応募ください。創業70年以上の歴史の中で培ってきた技術と、チームの温かさがここにあります。
            </div>
        </div>
        <img class="p-recruit-catch__img" src="<?php echo get_template_directory_uri() . '/assets/img/recruit/recruit-catch.jpg'; ?>" alt="キャッチイメージ">
    </div>
</div>

<div class="p-recruit-environment">
    <div class="p-recruit-environment__inner">
        <h2 class="l-title">
            <span class="l-title__en">ENVIRONMENT</span>
            <span class="l-title__jp">働く環境</span>
        </h2>

        <?php
        $items = array();
        $items[] = array(
            'title' => '充実の研修制度',
            'text' => '入社後は先輩職人がマンツーマンで指導。未経験からでも着実にスキルを身につけられます。',
            'icon' => 'icon-training.svg',
        );
        $items[] = array(
            'title' => '完全週休2日制',
            'text' => '土日祝休みを基本とし、メリハリのある働き方を実現。有給取得率も高く、プライベートも充実。',
            'icon' => 'icon-calendar.svg',
        );
        $items[] = array(
            'title' => '明確なキャリアパス',
            'text' => '職人から現場監督、施工管理まで。実力に応じたキャリアアップの道が用意されています。',
            'icon' => 'icon-path.svg',
        );
        $items[] = array(
            'title' => '風通しの良い職場',
            'text' => '創業70年以上の歴史を持つ地域密着企業。社員同士の距離が近く、相談しやすい環境です。',
            'icon' => 'icon-office.svg',
        );
        $items[] = array(
            'title' => '各種手当・福利厚生',
            'text' => '交通費全額支給、住宅手当、資格取得支援など。長く安心して働ける環境を整えています。',
            'icon' => 'icon-consultation.svg',
        );
        $items[] = array(
            'title' => '道具・ユニフォーム支給',
            'text' => '必要な道具・作業着は会社が支給。入社初日から現場に集中できる環境を整えています。',
            'icon' => 'icon-tool.svg',
        );
        ?>

        <div class="p-recruit-environment__wrap">
            <?php foreach ($items as $item): ?>
                <div class="p-recruit-environment-item">
                    <span class="p-recruit-environment-item__icon" style="mask-image: url(<?php echo get_template_directory_uri() . '/assets/img/icon/' . $item['icon']; ?>);"></span>
                    <h3 class="p-recruit-environment-item__title"><?php echo $item['title']; ?></h3>
                    <div class="p-recruit-environment-item__content"><?php echo $item['text']; ?></div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<div class="p-recruit-jobs">
    <div class="p-recruit-jobs__inner">
        <h2 class="l-title">
            <span class="l-title__en">JOBS</span>
            <span class="l-title__jp">募集職種</span>
        </h2>

        <?php
        $jobs = array();
        $jobs[] = array(
            'name' => '大工・施工スタッフ',
            'salary' => '月給 220,000円〜',
            'time' => '8:00〜17:00',
            'holiday' => '完全週休2日（土日祝）',
        );
        $jobs[] = array(
            'name' => '現場監督・施工管理',
            'salary' => '月給 280,000円〜',
            'time' => '8:00〜17:00',
            'holiday' => '完全週休2日（土日祝）',
        );
        ?>

        <div class="p-recruit-jobs__wrap">
            <?php foreach ($jobs as $job): ?>
                <div class="p-recruit-jobs-item">
                    <h3 class="p-recruit-jobs-item__title"><?php echo $job['name']; ?></h3>
                    <div class="p-recruit-jobs-item__name">給与</div>
                    <div class="p-recruit-jobs-item__label"><?php echo $job['salary']; ?></div>
                    <div class="p-recruit-jobs-item__name">勤務時間</div>
                    <div class="p-recruit-jobs-item__label"><?php echo $job['time']; ?></div>
                    <div class="p-recruit-jobs-item__name">休日</div>
                    <div class="p-recruit-jobs-item__label"><?php echo $job['holiday']; ?></div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<div class="p-recruit-flow">
    <div class="p-recruit-flow__inner">
        <h2 class="l-title">
            <span class="l-title__en">FLOW</span>
            <span class="l-title__jp">応募の流れ</span>
        </h2>

        <?php
        $flows = array();
        $flows[] = array(
            'name' => '応募',
            'comment' => '専用サイトからご応募ください。',
        );
        $flows[] = array(
            'name' => '書類選考',
            'comment' => '1週間以内にご連絡いたします。',
        );
        $flows[] = array(
            'name' => '一次面接',
            'comment' => null,
        );
        $flows[] = array(
            'name' => '二次面接',
            'comment' => null,
        );
        $flows[] = array(
            'name' => '内定',
            'comment' => null,
        );
        ?>

        <div class="p-recruit-flow__wrap">
            <?php foreach ($flows as $flow): ?>
                <div class="p-recruit-flow-item">
                    <div class="p-recruit-flow-item__name"><?php echo $flow['name']; ?></div>
                    <?php if ($flow['comment']): ?>
                        <p class="p-recruit-flow-item__comment"><?php echo $flow['comment']; ?></p>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>

        <a href="" class="p-recruit-flow__btn">まずはこちらからご応募ください。</a>
    </div>
</div>

<?php
get_footer();
