<?php
/* @var $data */
?>
<link rel="stylesheet" href="/frontend/css/posts-list.css">
<?php if (!key_exists('content', $data)) :?>
    <p class="here-no-post-message">Здесь еще нет постов, но скоро будут. Но есть еще и другие категории:</p>
    <?php
    include './backend/views/parts/common/categories.php';
else :
    foreach ($data['content'] as $index=>$post) :
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
        <?php
        if ($index === 0) {
            include './backend/views/parts/common/categories.php';
        }
    endforeach;
endif;
?>
