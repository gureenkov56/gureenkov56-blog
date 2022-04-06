<footer>
    <?php if (empty($_SESSION)) : ?>
        <a href="/login">
            <button class="footer__login-btn">Войти</button>
        </a>
        <a href="/reg">
            <button class="footer__reg-btn">Reg</button>
        </a>
    <?php else : ?>
        <?php
        if($_SESSION['avatar']) {
            $avatar = $_SESSION['avatar'];
        } else {
            $avatar = 'default1.png';
        }
        ?>
        <div>
            <img class="footer__avatar" src="../../img/users/<?= $avatar ?>" alt="avatar">
        </div>

        <p class='footer__username'><?= $_SESSION['login'] ?></p>

        <?php if ($_SESSION['access_level'] !== 'all') : ?>
        <div class="footer__access-msg">⭐  Доступен дополнительный контент</div>
        <?php endif; ?>

        <?php if ($_SESSION['access_level'] === 'admin') : ?>
            <a href="/admin">
                <button class="footer__login-btn">Админ панель</button>
            </a>
        <?php endif; ?>

        <form action="<?php $_SERVER['DOCUMENT_ROOT'] ?>/php/logOut.php">
            <button class="footer__login-btn">Выйти</button>
        </form>

    <?php endif; ?>

    <p>Показалось, что какой-то сюжет про вас? Не стоит себе льстить.<br />
        Все персонажи выдуманы, совпадения случайны.</p>

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