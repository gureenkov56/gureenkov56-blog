<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/php/functions.php';

$id = $_POST['id'];
unset($_POST['id']);

pdo_update_prepare('posts', $_POST, ['id' => $id]);

?>