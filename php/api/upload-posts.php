<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/php/functions.php';

$params = [
	'title' => $_POST['title'],
	'description' => $_POST['description'],
	'h1' => $_POST['h1'],
	'text' => $_POST['text'],
	'pub_status' => $_POST['pub_status'],
	'in_category' => $_POST['in_category'],
	'preview_img' => $_POST['preview_img'],
	'level_access' => $_POST['level_access'],
];

//INSERT INTO `posts` (`id`, `h1`, `text`, `pub_status`, `in_category`, `preview_img`, `level_access`, `views`, `pub_date`) VALUES (NULL, '123', '123', 'draft', '2', '123', NULL, '0', CURRENT_TIMESTAMP);
pdo_insert_prepare('posts', $params);

?>