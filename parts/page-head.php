<?php
if (! defined('ABSPATH')) exit;

?>
<div class="l-page-head">
    <div class="l-page-head__inner">
        <?php
        switch (true) {
            case is_404():
                echo 'ページが見つかりませんでした。';
                break;

            case is_archive():
            case is_post_type_archive():

                break;

            case is_single():
            case is_singular():

                break;

            default:
                echo get_the_title();
                break;
        }
        ?>
    </div>
</div>