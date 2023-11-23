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
        <button id="likeBtn" data-id="<?=$data['content']['id']?>" data-status="">
            <svg xmlns="http://www.w3.org/2000/svg" width="20px" viewBox="0 0 48 48" enable-background="new 0 0 48 48">
                <path fill="none" stroke-width="3" stroke="#E9161E" d="M34,9c-4.2,0-7.9,2.1-10,5.4C21.9,11.1,18.2,9,14,9C7.4,9,2,14.4,2,21c0,11.9,22,24,22,24s22-12,22-24 C46,14.4,40.6,9,34,9z"/>
            </svg>

            <span id="likeCount"><?= $data['content']['likes'] ?></span>
        </button>

        <div class="view-count">
            Просмотры:
            <?= $data['content']['views'] ?>
        </div>

    </div>
    <script src="/frontend/js/post.js" type="module"></script>
</article>
