<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/php/functions.php';
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ADMIN PANEL</title>
    <script src="https://unpkg.com/vue@3"></script>
    <link href="../../styles/admin-style.css" rel="stylesheet">
</head>
<body>
    <div id="app">
        <div class="direction__wrapper">
            <div class="direction-item">1</div>
            <div class="direction-item">2</div>
            <div class="direction-item">3</div>
            <div class="direction-item">4</div>
        </div>

        <div class="bottom__menu">
            Bottom menu
        </div>
    </div>
</body>
</html>



<script>
    Vue.createApp({
        data() {
            return {
                message: 'Hello Vue!',
            }
        }
    }).mount('#app')
</script>