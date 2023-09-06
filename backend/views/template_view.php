<?php
/* @var string $content_view */
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>Главная</title>
</head>
<body>
<header>HEADER</header>
<?php include 'backend/views/' . $content_view; ?>
<footer>FOOTER</footer>
</body>
</html>
