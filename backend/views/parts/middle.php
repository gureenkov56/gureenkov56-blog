<?php
/* @var string $content_view */
?>


<section class="middle">
    <aside class="left-sidebar">
        <?php require_once 'left_sidebar.php'; ?>
    </aside>
    <main>
        <?php require_once 'backend/views/' . $content_view; ?>
    </main>
    <aside>
        <!-- TODO: Post ID here and page scroller to top  -->
        <!-- aside right -->
    </aside>
</section>
