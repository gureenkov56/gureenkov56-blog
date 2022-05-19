<?php

$params = [
	'post_related' => $_GET['id']
];

$reaction_total = [];

$reactions_query = pdo_query('*', 'post_reactions', 'count', 'DESC', '20', $params);

?>

<div class="reactions__wrapper">
	<?php foreach ($reactions_query as $reaction) : ?>

	<span class="reaction__item" id="<?= $reaction['name'] ?>">
		<span class="reaction__emoji"></span>
		<span class="reaction__count"><?= $reaction['count'] ?></span>
	</span>

	<?php endforeach; ?>

</div>