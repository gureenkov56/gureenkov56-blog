<?php

require $_SERVER['DOCUMENT_ROOT'] . "/php/functions.php";

$res = $pdo->prepare("SELECT * FROM `posts` WHERE `id` = ? LIMIT 1");
$res->execute([$_GET['id']]);
$post = $res->fetch(PDO::FETCH_ASSOC);

if ( empty($post) ) header("Location: /404");

// filter fragments

$post_content = $post['text'];

if (empty($_SESSION) ) {
    $regular_for_clean = '/==access_level=1 start==.*.==access_level=1 end==|==access_level=2 start==.*.==access_level=2 end==|==access_level=3 start==.*.==access_level=3 end==/';
} elseif ($_SESSION['access_level'] === '1') {
    $regular_for_clean = '/==access_level=2 start==.*.==access_level=2 end==|==access_level=3 start==.*.==access_level=3 end==/';
    $regular_for_open_span = '/==access_level=1 start==/';
    $regular_for_close_span = '/==access_level=1 end==/';
} elseif ($_SESSION['access_level'] === '2') {
    $regular_for_clean = '/==access_level=3 start==.*.==access_level=3 end==/';
    $regular_for_open_span = '/==access_level=1 start==|==access_level=2 start==/';
    $regular_for_close_span = '/==access_level=1 end==|==access_level=2 end==/';
} elseif ($_SESSION['access_level'] === 'admin' || $_SESSION['access_level'] === '3') {
    $regular_for_open_span = '/==access_level=1 start==|==access_level=2 start==|==access_level=3 start==/';
    $regular_for_close_span = '/==access_level=1 end==|==access_level=2 end==|==access_level=3 end==/';
}

if ( isset($regular_for_clean) ) {
    $post_content = preg_replace($regular_for_clean, "", $post_content);
}

if ( isset($regular_for_open_span) && isset($regular_for_close_span) ) {
    $post_content = preg_replace($regular_for_open_span, "<span class='fragment'>", $post_content);
    $post_content = preg_replace($regular_for_close_span, "</span>", $post_content);
}



// views +1 counter
pdo_update('posts', ['views' => $post['views'] + 1], ['id' => $post['id']]);

include_once "modules/header-post.php";
?>

<article class="post">
    <div class="post__titleBlock">
        <h1><?= $post['h1'] ?></h1>
        <img src="../img/post/<?= $post['preview_img'] ?>" alt="" class="post__mainImage">
    </div>
    <?php if($post['level_access'] > 0) : ?>
    <div class="post__access-msg">
        <input type="text" id="inputForKaomoji" hidden>
        <span>⭐</span>Пост для своих<span>⭐</span>
        <p id="japanKaomoji">( ಠ ͜ʖ ಠ)</p>

        <p id="copyKaomoji">Скопировать kaomoji</p>
    </div>
    <?php endif; ?>
    <?= $post_content ?>

</article>

<script src="/js/post.js"></script>

<?php
include_once "modules/footer.php"
?>