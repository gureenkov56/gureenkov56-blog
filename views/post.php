<?php

require $_SERVER['DOCUMENT_ROOT'] . "/php/functions.php";

$res = $pdo->prepare("SELECT * FROM `posts` WHERE `id` = ? LIMIT 1");
$res->execute([$_GET['id']]);
$post = $res->fetch(PDO::FETCH_ASSOC);

// views +1 counter
pdo_update('posts', ['views' => $post['views'] + 1], ['id' => $post['id']]);

include_once "modules/header-post.php";
?>

<article class="post">
    <div class="post__titleBlock">
        <h1><?= $post['h1'] ?></h1>
        <img src="../img/post/<?= $post['preview_img'] ?>" alt="" class="post__mainImage">
    </div>
    <?php if($post['level_access'] > 1) : ?>
    <div class="post__access-msg">
        <input type="text" id="inputForKaomoji" hidden>
        <span>⭐</span>Пост для своих<span>⭐</span>
        <p id="japanKaomoji">( ಠ ͜ʖ ಠ)</p>

        <p id="copyKaomoji">Скопировать kaomoji</p>
    </div>
    <?php endif; ?>
    <?= $post['text'] ?>

</article>

<script src="/js/post.js"></script>

<?php
include_once "modules/footer.php"
?>