<?php
/* @var $data */
?>

<section>
    <?php if (array_key_exists('id', $data)) : ?>
    <div class="short-info">
        <?= '#' . $data['content']['id'];?>
    </div>
    <?php endif; ?>

    <a href="#topBlock" id='upperToTop' class="hidden">
        <div>Наверх</div>
        <img src="/frontend/public/images/icons/go-to-top.svg" alt="UP">
    </a>

</section>
