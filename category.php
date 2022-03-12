<?php
include_once "php/modules/header-main.php";

// category
global $categories;

foreach ($categories as $key => $value) {
    if ($value['id'] == $_GET['id']) {
        $category = $value;
        break;
    }
}

// posts
$posts_of_category = pdo_prepare_execute(['in_category' => $category['id']]);
?>

<h1 class="category__h1"><?=$category['category-name']?></h1>
<section class="last_posts">
<?php
foreach ($posts_of_category as $post_of_cat) { ?>
    <a href="/post.php?id=<?=$post_of_cat['id'] ?>">
        <div class="last_posts__item" style="background-image:url('<?=$post_of_cat['preview_img'] ?>');">
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

<?php
include_once "php/modules/footer.php"
?>