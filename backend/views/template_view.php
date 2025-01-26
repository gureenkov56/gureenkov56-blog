<?php
/* @var $data
 * @var $BLOG_DESCRIPTION
 * @var $DEFAULT_SEO_TITLE
 */
//print_r($data);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="/frontend/css/main.css">
    <meta name="description" content="<?= key_exists("SEO_description", $data)
        ? $data["SEO_description"]
        : $GLOBALS["BLOG_DESCRIPTION"] ?>"/>
    <title><?= key_exists("SEO_title", $data)
        ? $data["SEO_title"]
        : $GLOBALS["DEFAULT_SEO_TITLE"] ?></title>
</head>
<body>
<?php require_once "parts/header/metrika.php"; ?>
<?php require_once "parts/header/header.php"; ?>
<?php require_once "parts/middle.php"; ?>
<?php require_once "parts/footer.php"; ?>
</body>
</html>
