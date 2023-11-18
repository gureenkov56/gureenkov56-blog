<?php
/* @var $data */
?>
<div class="mobile-menu">
    <div class="mobile-menu__wrapper">
        <?php include './backend/views/parts/common/about-me.php'; ?>

        <div class="folders">
            <?php if (key_exists('categories', $data) && $data['categories']) : ?>
            <div class="title">Здесь все по полочкам:</div>
            <div class="categories">
                <?php foreach ($data['categories'] as $category) : ?>
                <a href="/category/<?=$category['id']?>" style="background-color: <?= $category['color']; ?>;">
                    <?= $category['category-name'] ?>
                </a>
                <?php endforeach; ?>
            </div>

            <?php endif; ?>
        </div>
    </div>
</div>
