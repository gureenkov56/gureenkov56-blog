<?php
/* @var $data */
//print_r($data);
?>
<article>
    <h1><?=$data['content']['h1']?></h1>
    <?php if ($data['content']['pre_text']) : ?>
    <blockquote class="pre-content">
        <?=$data['content']['pre_text']?>
    </blockquote>
    <?php endif ?>
    <img src="../../frontend/public/images/content/<?=$data['content']['preview_img'] ?>" alt="">
    <?= $data['content']['post_content'] ?>
    <div>
        likes: <?= $data['content']['likes'] ?>
    </div>
    <div>
        просмотров: <?= $data['content']['views'] ?>
    </div>
</article>
