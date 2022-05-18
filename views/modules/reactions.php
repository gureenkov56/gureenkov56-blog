<?php

$params = [
	'post_related' => '1'
];

$reaction_total = [];

$reactions_query = pdo_query('*', 'post_reactions', 'count', 'DESC', '20', $params);

?>

<div class="reactions__wrapper">
	<?php foreach ($reactions_query as $reaction) : ?>

	<span class="reaction__item" id="<?= $reaction['name'] ?>" data-active-color="<?= $reaction['active_color'] ?>">
		<span class="reaction__emoji"><?= $reaction['symbol'] ?></span>
		<span class="reaction__count"><?= $reaction['count'] ?></span>
	</span>

	<?php endforeach; ?>

</div>