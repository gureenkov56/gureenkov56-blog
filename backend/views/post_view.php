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
    <div class="post-statistic">
        <button id="likeBtn" data-id="<?=$data['content']['id']?>">
            <img src="/frontend/public/images/icons/likes.svg" alt="Likes:" width="20px">
            <?= $data['content']['likes'] ?>
        </button>

        <div class="view-count">
            Просмотры:
            <?= $data['content']['views'] ?>
        </div>

    </div>

</article>
