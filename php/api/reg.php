<?php
require_once '../functions.php';


// check exist login or not
$res = pdo_prepare_execute(['login' => $_POST['login']], 'login', 'users');

if (empty($res)) {
	$new_avatar = 'default' . rand(1, 7) . '.png';

	$params = [
		'login' => $_POST['login'],
		'name' => $_POST['name'],
		'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
		'avatar' => $new_avatar
	];

	pdo_insert_prepare('users', $params);

	$_SESSION['login'] = $_POST['login'];
	$_SESSION['name'] = $_POST['name'];
	$_SESSION['access_level'] = '1';
	$_SESSION['avatar'] = $new_avatar;

	echo json_encode('success');
} else {
	echo json_encode('Логин существует');
}



?>