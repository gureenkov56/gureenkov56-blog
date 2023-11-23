<?php
/* @var $data */
?>
<div>
    <h1 class="category" style="background-color: <?=$data['active_category']['color']?>">
        <?=$data['active_category']['category-name']?>

    </h1>
    <?php
        include './backend/views/parts/common/posts-list.php';
    ?>
</div>
