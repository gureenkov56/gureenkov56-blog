<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

$request = $_SERVER['REQUEST_URI'];

// separate string to array
$res = explode('/', $request);

// for route with GET params
if (count($res) > 2 || !empty($_GET)) {
    if (strpos($request, 'post') !== false) {
        $_GET['id']= $res[2];
        require __DIR__ . '/views/post.php';
        die();
    }

    if (strpos($request, 'category') !== false) {
        $_GET['id'] = $res[2];
        require __DIR__ . '/views/category.php';
        die();
    }

    if (strpos($request, 'login') !== false) {
        require __DIR__ . '/views/login.php';
        die();
    }
}

// route without GET params
switch ($request) {
    case '/':
    case '':
        require __DIR__ . '/views/index.php';
        break;
    case '/login':
        require __DIR__ . '/views/login.php';
        break;
    case '/admin':
        require __DIR__ . '/views/admin/admin.php';
        break;
    default:
        require __DIR__ . '/views/404.php';
}
?>