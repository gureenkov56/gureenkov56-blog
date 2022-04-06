<?php
require_once 'functions.php';

// check exist login or not
$res = pdo_prepare_execute(['login' => $_POST['login']], 'login', 'users');

if (empty($res)) {
	$avatarDefaultRandom = 'default' . rand(1, 7) . '.png';
	$params = array_merge($_POST, ['avatar' => $avatarDefaultRandom]);

	pdo_insert_prepare('users', $params);
	$_SESSION['login'] = $_POST['login'];
	$_SESSION['access_level'] = 'all';
	$_SESSION['avatar'] = $avatarDefaultRandom;
	header('Location: /');
} else {
	header('Location: /reg?result=Такой логин существует.<br />Креативь!');
}



?>