<footer>

    <p>Показалось, что какой-то сюжет про вас? Не стоит себе льстить.<br />
        Все персонажи выдуманы, совпадения случайны.</p>
    <?php if (empty($_SESSION)) : ?>
        <a href="/login">
            <button class="footer__login-btn">Войти</button>
        </a>
    <?php else: ?>
        <form action="<?php $_SERVER['DOCUMENT_ROOT'] ?>/php/logOut.php">
            <button class="footer__login-btn">Выйти</button>
        </form>
        <?php if($_SESSION['access_level'] === 'admin') : ?>
            <a href="/admin">
                <button class="footer__login-btn">Админ панель</button>
            </a>
        <?php endif;?>

    <?php endif; ?>

    <div class="footer__title">
        GUREENKOV56
    </div>
    <p>На связи:</p>
    <a href="https://www.instagram.com/gureenkov56/">
        <img src="../../img/icons/instagam-icon.png" alt="instagram" class="footer__icons">
    </a>
</footer>
<script src="../../js/main.js"></script>
</body>
</html>