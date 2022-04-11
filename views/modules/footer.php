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
        if ($_SESSION['avatar']) {
            $avatar = $_SESSION['avatar'];
        } else {
            $avatar = 'default1.png';
        }
        ?>
        <div>
            <img class="footer__avatar" src="../../img/users/<?= $avatar ?>" alt="avatar">
        </div>

        <p class='footer__username'><?= $_SESSION['login'] ?></p>

        <?php if ($_SESSION['access_level'] > 1) : ?>
            <div class="footer__access-msg"> <span>⭐</span>Доступен дополнительный контент</div>
        <?php endif; ?>

        <?php if ($_SESSION['access_level'] === 'admin') : ?>
            <a href="/admin">
                <button class="footer__login-btn">Админ панель</button>
            </a>
        <?php endif; ?>

        <button class="footer__edit-btn" id="footerEditBtn">Изменить профиль</button>
        <form action="<?php $_SERVER['DOCUMENT_ROOT'] ?>/php/logOut.php">
            <button class="footer__login-btn">Выйти</button>
        </form>

        <!--modal edit-->
        <div class="modal-bg hide" id="modalBg">
            <div class="modal__container" id="modalContainer">
                <div class="modal__header">
                    <button class="modal__close-btn" id="modalCloseBtn">×</button>
                </div>
                <div class="modal__change-avatar">
                    <img class="footer__avatar" src="../../img/users/<?= $avatar ?>" alt="avatar"> <br />
                    <span class="modal__edit-img-span">Изменить аватарку</span>
                    <form enctype="multipart/form-data" method="POST" id="uploadAvatarForm">
                        <input type="file" name="uploadimg" id="modalNewAvatar" accept=".jpg, .jpeg, .png" hidden>
                    </form>
                </div>

                <div class="modal__change-login-pass hide">
                    <span>Изменить логин/пароль</span>
                </div>

                <div class="modal__input-container hide">
                    <label for="newLogin">Новый логин</label> <br />
                    <input type="text">
                </div>

                <div class="modal__input-container hide">
                    <label for="newLogin">Пароль</label> <br />
                    <input type="pass"> <br />
                    <span class="modal__info">требуется для изменения логина</span>
                </div>

                <div class="modal__input-container hide">
                    <label for="newLogin">Новый пароль</label> <br />
                    <input type="pass"> <br />
                    <span class="modal__info">требуется для изменения логина</span>
                </div>




                <button class="footer__login-btn" id="saveProfileEdit">Сохранить</button>
            </div>
        </div>

        <!--modal edit end-->

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