<?php
/* @var $data */
foreach ($data as $post) :
?>
<a href="/post/<?=$post['id'] ?>">
    <div class="post-preview">
        <img src="<?='../../frontend/public/images/content/' . $post['preview_img'] ?>" alt="">
        <div class="post-preview__text">
            <div class="title-and-label">
                <h3>
                    <?=$post['h1'] ?>
                </h3>
                <!--TODO: labels-->
                <?php if(false): ?>
                <div>новьё</div>
                <?php endif; ?>
            </div>
            <p>
                <?=$post['description'] ?>
            </p>
        </div>
    </div>
</a>
<?php endforeach; ?>
