<?php
include_once "modules/header-post.php";

$res = $pdo->prepare("SELECT * FROM `posts` WHERE `id` = ? LIMIT 1");
$res->execute([settype($_GET['id'], 'integer')]);
$post = $res->fetch(PDO::FETCH_ASSOC);
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
