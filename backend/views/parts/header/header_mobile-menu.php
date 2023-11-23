<?php
/* @var $data */
?>
<div class="mobile-menu">
    <div class="mobile-menu__wrapper">
        <?php include './backend/views/parts/common/about-me.php'; ?>

        <div class="folders">
            <?php if (key_exists('categories', $data) && $data['categories']) : ?>
            <div class="title">Здесь все по полочкам:</div>

            <?php
                include './backend/views/parts/common/categories.php';
                endif;
            ?>
        </div>
    </div>
</div>
