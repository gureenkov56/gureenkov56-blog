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
    <aside class="right-sidebar">
        <!-- TODO: Post ID here and page scroller to top  -->
        <?php require_once 'right_sidebar.php'; ?>
    </aside>
</section>
