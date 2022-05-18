<?php

require $_SERVER['DOCUMENT_ROOT'] . "/php/functions.php";

$params = [
	'name' => $_POST['name'],
	'post_related' => $_POST['post_related']
];

$q = pdo_query('*', 'post_reactions', '', '', '1', $params);

$result = [];
foreach ($q as $t) {
	$result[] = $t;
}

$calc = ($_POST['action'] === 'plus') ? $result[0]['count'] + 1 : $result[0]['count'] - 1;

$update_params = [
	'count' => $calc
];

$param = ['id' => $result[0]['id']];

pdo_update('post_reactions', $update_params, $param);




?>