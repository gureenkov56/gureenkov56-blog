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
        <h1><?=$post['h1'] ?></h1>
        <img src="../img/post/<?=$post['preview_img'] ?>" alt="" class="post__mainImage">
    </div>
    <?=$post['text'] ?>

</article>

<?php
include_once "modules/footer.php"
?>
