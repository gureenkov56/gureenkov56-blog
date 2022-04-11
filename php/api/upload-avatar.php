<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/php/functions.php';

pdo_update_prepare('users', ['avatar' => $_FILES['uploadimg']['name']], ['login' => $_SESSION['login']]);

$_SESSION['avatar'] = $_FILES['uploadimg']['name'];

$way_for_save = $_SERVER['DOCUMENT_ROOT'] . "/img/users/" . $_FILES['uploadimg']['name'];


if (move_uploaded_file($_FILES['uploadimg']['tmp_name'], $way_for_save)) {
	echo json_encode($_FILES['uploadimg']['name']);
} else {
	echo json_encode('ERROR');
}


?>