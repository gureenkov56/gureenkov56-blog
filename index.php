<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);


require_once 'backend/starter.php';
//
//$request = $_SERVER['REQUEST_URI'];
//
//if (strpos($request, '/api/posts') !== false) {
//    require __DIR__ . '/php/api/get-posts.php';
//    die();
//}
//
//if (strpos($request, '/api/upload-post') !== false) {
//    require __DIR__ . '/php/api/upload-posts.php';
//    die();
//}
//
//if (strpos($request, '/api/update-post') !== false) {
//    require __DIR__ . '/php/api/update-post.php';
//    die();
//}
//
//
//// separate string to array
//$res = explode('/', $request);
//
//// for route with GET params
//if (count($res) > 2 || !empty($_GET)) {
//    if (strpos($request, 'post') !== false) {
//        $_GET['id']= $res[2];
//        require __DIR__ . '/views/post.php';
//        die();
//    }
//
//    if (strpos($request, 'category') !== false) {
//        $_GET['id'] = $res[2];
//        require __DIR__ . '/views/category.php';
//        die();
//    }
//
//    if (strpos($request, 'login') !== false) {
//        require __DIR__ . '/views/login.php';
//        die();
//    }
//
//    if (strpos($request, 'reg') !== false) {
//        require __DIR__ . '/views/reg.php';
//        die();
//    }
//}
//
//// route without GET params
//switch ($request) {
//    case '/':
//    case '':
//        require __DIR__ . '/views/index.php';
//        break;
//    case '/login':
//        require __DIR__ . '/views/login.php';
//        break;
//    case '/reg':
//        require __DIR__ . '/views/reg.php';
//        break;
//    case '/admin':
//        require __DIR__ . '/views/admin/admin.php';
//        break;
//
//    case '/preview-projects/weatherChecker':
//        require __DIR__ . '/preview-projects/weatherChecker/index.html';
//        break;
//
//    case '/preview-projects/currency-api-vue':
//        require __DIR__ . '/preview-projects/currency-api-vue/index.html';
//        break;
//
//    case '/preview-projects/burger-shop':
//        require __DIR__ . '/preview-projects/burger-shop/index.html';
//        break;
//
//    case '/preview-projects/facts-shuffle/':
//        require __DIR__ . '/preview-projects/facts-shuffle/index.html';
//        break;
//
//    case '/404':
//        require __DIR__ . '/views/404.php';
//        break;
//
//    default:
//        require __DIR__ . '/views/index.php';
//}
?>
