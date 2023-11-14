<?php
/* @var $data */
//print_r($data);
?>
<article>
    <h1><?=$data['h1']?></h1>
    <?php if ($data['pre_text']) : ?>
    <blockquote class="pre-content">
        <?=$data['pre_text']?>
    </blockquote>
    <?php endif ?>
    <img src="../../frontend/public/images/content/<?=$data['preview_img'] ?>" alt="">
    <?= $data['post_content'] ?>
</article>
