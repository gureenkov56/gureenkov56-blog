<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/php/functions.php';



$res = pdo_prepare_execute(['login' => $_POST['login']], '*', 'users');

if (empty($res)) {
	echo json_encode('Неверный логин');
    $_SESSION = [];
    exit();
}
elseif ( password_verify($_POST['pass'], $res[0]['password']) ) {
    $_SESSION['login'] = $res[0]['login'];
    $_SESSION['access_level'] = $res[0]['access_level'];
    $_SESSION['avatar'] = $res[0]['avatar'];

    if ($_SESSION['access_level'] === 'admin') {
        echo json_encode('admin');
        exit();
    } else {
		echo json_encode('OK');
        exit();
    }

} else {
	echo json_encode('Неверный пароль');
    $_SESSION = [];
}





