<?php
/* @var $data */
?>
<div class="categories">
    <?php foreach ($data['categories'] as $category) : ?>
        <a
            href="/category/<?=$category['id']?>"
            class="category"
            style="background-color: <?= $category['color']; ?>;"
        >
            <?= $category['category-name'] ?>
        </a>
    <?php endforeach; ?>
</div>
