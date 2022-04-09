

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../styles/style.css">
    <title><?= $post['title'] ?></title>
    <meta name="description" content="<?= $post['description'] ?>">
</head>
<body>

<header class="post_header">
    <!--    mobile-->
    <div class="header__mobileburger" id="mobileBurger">
        <div class="header__mobileburgerFirst" id="burgerElemFirst"></div>
        <div class="header__mobileburgerSecond" id="burgerElemSecond"></div>
        <div class="header__mobileBurgerThird" id="burgerElemThird"></div>
    </div>
    <!--    mobile end-->
    <div class="post_header__wrapper">
        <div class="header__title">
            <a href="/">
                GUREENKOV56
            </a>
        </div>
        <nav>
            <ul>
                <?php
                foreach ($categories as $cat){?>
                    <li>
                        <a href='/category/<?=$cat["id"]?>'><?=$cat["category-name"]?></a>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </nav>
    </div>
</header>
<!--mobile-->
<div class="mobile_menu" id="mobileMenu">
    <ul>
        <li><a href="/">Главная</a></li>
        <?php
        foreach ($categories as $cat){ ?>
            <li>
                <a href='/category/<?=$cat["id"]?>'><?=$cat["category-name"]?></a>
            </li>
        <?php
        }
        ?>
    </ul>
<!--    <ul>-->
<!--        <li>Кодекс блога</li>-->
<!--        <li>Поддержать</li>-->
<!--    </ul>-->
    <div class="mobile_menu__title">
        GUREENKOV56
    </div>
</div>
<!--mobile end-->