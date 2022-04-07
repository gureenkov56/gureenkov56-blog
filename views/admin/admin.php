<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/php/functions.php';

if ($_SESSION['access_level'] !== 'admin') {
    header('Location: /');
}
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ADMIN PANEL</title>
    <link href="../../styles/admin.css" rel="stylesheet">
</head>
<body>
    <div id="app">
    <?php
        include $_SERVER['DOCUMENT_ROOT'] . '/views/admin/folder-posts.php';
        include $_SERVER['DOCUMENT_ROOT'] . '/views/admin/text-editor.php';
    ?>

        <div class="direction__wrapper">
            <div class="direction-item" data-link='Posts'>
                <img src="../img/admin/dir-icon.png" alt="Direction">
                <span>Posts</span>
            </div>
            <div class="direction-item" data-link='Categories'>
                <img src="../img/admin/dir-icon.png" alt="Direction">
                <span>Categories</span>
            </div>
            <div class="direction-item" data-link='Users'>
                <img src="../img/admin/dir-icon.png" alt="Direction">
                <span>Users</span>
            </div>
            <div class="direction-item" data-link="Other">
                <img src="../img/admin/dir-icon.png" alt="Direction">
                <span>Other</span>
            </div>
        </div>

        <div class="start-menu" id="startMenu">
            <div class="start-menu__header">
                <img src="../img/admin/user-icon.jpeg" alt="user">
                <span>ADMIN</span>
            </div>

            <div class="start-menu__orange-line"></div>

            <div class="start_menu__body">
                <div class="start_menu__body__first_half"></div>
                <div class="start_menu__body__second_half"></div>
            </div>

            <div class="start-menu__bottom">
                <div class="start-menu__bottom__btn">
                    <img src="../img/admin/log-off-icon.jpg" alt="Log off">
                    <span>Log Off</span>
                </div>
                <a href="/">
                    <div class="start-menu__bottom__btn">
                        <img src="../img/admin/go-home-btn.jpg" alt="Go home">
                        <span>Home page</span>
                    </div>
                </a>
            </div>

        </div>


        <div class="bottom__menu">
            <button class='bottom__menu__start-btn hover_light active_darker' id="startBtn">
                <img src="../img/admin/start-btn-icon.png" alt="start">
                <span>ПУСК</span>
            </button>

            <div class="bottom__menu__right-block">
                <span>RU</span>
                <div class="bottom__menu__right-block__time">
                    13:00
                </div>
            </div>
        </div>
    </div>
    <script src="../../js/admin.js"></script>
    <script src="../../js/editor.js"></script>
</body>
</html>