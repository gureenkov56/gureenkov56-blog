<?php
/* @var string $content_view */
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="frontend/css/main.css">
    <title>Главная</title>
</head>
<body>

<?php require_once 'parts/header.php'; ?>
<main>
    <?php require_once 'backend/views/' . $content_view; ?>
</main>
<?php require_once 'parts/footer.php' ?>
</body>
</html>
