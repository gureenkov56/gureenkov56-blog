<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/php/functions.php";


// category
global $categories;

foreach ($categories as $key => $value) {
    if ($value['id'] == $_GET['id']) {
        $category = $value;
        break;
    }
}

include_once "modules/header-main.php";

// posts
$posts_of_category = pdo_prepare_execute(['in_category' => $category['id']]);
?>

<h1 class="category__h1"><?=$category['category-name']?></h1>
<section class="last_posts">
<?php
foreach ($posts_of_category as $post_of_cat) { ?>
    <a href="/post/<?=$post_of_cat['id'] ?>">
        <div class="last_posts__item" style="background-image:url('../img/post/<?=$post_of_cat['preview_img'] ?>');">
            <div class="last_posts__item__gradient"></div>
            <h3 href="/" class="last_posts__item__title"><?=$post_of_cat['h1'] ?></h3>
            <!--            <div class="last_posts__item__category">-->
            <!--                <a href="/cat/" class="last_posts__item__category__name">Путешествия</a>-->
            <!--            </div>-->
        </div>
    </a>
<?php
}
?>
</section>

<section class="posts-of-category last-for_mobile">
    <div class="posts-of-category__wrapper">

        <?php
        foreach ($posts_of_category as $post_of_cat) {?>
            <div class="post-of-category__item-wrapper">
                <a href="/post/<?=$post_of_cat['id'] ?>">
                    <div class="posts-of-category__item" style="background-image:url('../img/post/<?=$post_of_cat['preview_img']?>');"></div>
                    <h5><?=$post_of_cat['h1']?></h5>
                </a>
            </div>

            <?php
        }
        ?>
    </div>
</section>

<?php
include_once "modules/footer.php"
?>