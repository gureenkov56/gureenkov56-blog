<?php
include_once "modules/header-main.php";
$posts_query = pdo_query('*', 'posts', 'id', 'DESC', 5, ['pub_status' => 'pub']);
$posts = [];
$user_access = (empty($_SESSION)) ? 1 : $_SESSION['access_level'];

foreach ($posts_query as $one_post) {
    if ($user_access == 3 || $user_access == 'admin') {
        // 3 or admin
        $posts[] = $one_post;
    } elseif ($one_post['level_access'] <= $user_access) {
        // 2 or 1
        $posts[] = $one_post;
    }
}
?>

<section class="last_posts">
    <?php
    foreach ($posts as $post) {
        ?>
        <!--access_level 3-->
        <a href="post/<?=$post['id'] ?>">
            <div class="last_posts__item" style="background-image:url('../img/post/<?=$post['preview_img']?>');">
                <div class="last_posts__item__gradient"></div>
                <h3 href="post.php" class="last_posts__item__title"><?=$post['h1']?></h3>
            </div>
        </a>
        <?php
    }
    ?>

</section>

<section class="posts-of-category last-for_mobile">
    <h1>Последние посты</h1>
    <div class="posts-of-category__wrapper">

        <?php
        foreach ($posts as $post) {?>
            <div class="post-of-category__item-wrapper">
                <a href="post/<?=$post['id'] ?>">
                    <div class="posts-of-category__item" style="background-image:url('../img/post/<?=$post['preview_img']?>');"></div>
                    <h5><?=$post['h1']?></h5>
                </a>
            </div>

            <?php
        }
        ?>
    </div>
</section>

<!--<section class="megapost">-->
<!--    <h2>MEGAPOST</h2>-->
<!--    <div class="megapost__wraper">-->
<!--        <a href="/post/3">-->
<!--            <div class="megapost__wrapper__cover" style="background-image: url('https://i0.wp.com/gotothailand.com/wp-content/uploads/2017/05/Motorbike-Pai-Mae-Hong-Son-Thailand.jpg?fit=980%2C653&ssl=1')">-->
<!--                <div class="megapost__gradient"></div>-->
<!--                <h3 class="megapost__wrapper__cover__title">Megapost title или как мы ушатались с байков title или как мы ушатались с байков</h3>-->
<!--            </div>-->
<!--        </a>-->
<!---->
<!--        <a href="/" class="megapost__category">-->
<!--            <p class="megapost__category__a">Путешествия</p>-->
<!--        </a>-->
<!--    </div>-->
<!--</section>-->

<!--<section class="yoda_bro">-->
<!--    <h2>YODA BRO</h2>-->
<!--    <p>Скоро здесь будет Йода с мудрейшими советами...</p>-->
<!--</section>-->
<!---->
<!--<section class="projects">-->
<!--    <h2>Мои проекты</h2>-->
<!--    <p>Скоро здесь будут мои проекты...</p>-->
<!--</section>-->

<?php
include_once "modules/footer.php"
?>
