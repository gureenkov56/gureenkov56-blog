<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/php/functions.php';

// TODO: создать реакции сразу после создания поста

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
$insert_row_id = pdo_insert_prepare('posts', $params);

// check reaction
$isReactionsHas = pdo_query('id', 'post_reactions', '', '', '1', ['post_related' => $insert_row_id]);

$res = [];
foreach ($isReactionsHas as $key => $value) {
	$res[] = $value;
}

if (empty($res)) {
	$reactions_array = [
		[
			'post_related' 	=> $insert_row_id,
			'name'			=> 'reactionLike'
		],
		[
			'post_related' 	=> $insert_row_id,
			'name'			=> 'reactionFire'
		],
		[
			'post_related' 	=> $insert_row_id,
			'name'			=> 'reactionDislike'
		],
		[
			'post_related' 	=> $insert_row_id,
			'name'			=> 'reactionSmilingShit'
		],
		[
			'post_related' 	=> $insert_row_id,
			'name'			=> 'reactionBrainExplosion'
		],
		[
			'post_related' 	=> $insert_row_id,
			'name'			=> 'reactionHeart'
		],
		[
			'post_related' 	=> $insert_row_id,
			'name'			=> 'reactionShock'
		],
		[
			'post_related' 	=> $insert_row_id,
			'name'			=> 'reactionSad'
		],
		[
			'post_related' 	=> $insert_row_id,
			'name'			=> 'reactionAngry'
		]
	];

	foreach ($reactions_array as $key) {
		pdo_insert_prepare('post_reactions', $key);
	}
}



?>