<?php
/* @var $data */
// print_r($data);
foreach ($data as $post) :
?>
<a href="/post/<?=$post['id'] ?>">
    <div class="post-preview">
        TODO: title image
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6d/Moench_2339.jpg/1200px-Moench_2339.jpg" alt="">
        <div class="post-preview__text">
            <div class="title-and-label">
                <h3>
                    <?=$post['title'] ?>
                </h3>
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
