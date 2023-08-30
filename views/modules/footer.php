<footer>
    <?php if (empty($_SESSION)) : ?>
        <button class="footer__login-btn" hidden>Войти</button>
        <button class="footer__reg-btn" hidden>Reg</button>
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

        <p class='footer__username'>
            <?= $_SESSION['name'] ?> <br />
            <?= $_SESSION['login'] ?>
        </p>

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

    <p>Показалось, что какой-то сюжет про вас? <span class='space-wrap-nowrap'>Не стоит себе льстить.</span><br />
        Все персонажи выдуманы, совпадения случайны.</p>

    <div class="footer__title">
        GUREENKOV56
    </div>
    <p>На связи:</p>
    <a href="https://www.instagram.com/gureenkov56/">
        <img src="../../img/icons/instagam-icon.png" alt="instagram" class="footer__icons">
    </a>

    <!--auth modal start-->
    <div class="auth-modal__wrapper">
        <div class="auth-modal">
            <div class="auth-modal__close-btn">
                <button class="modal__close-btn" id="authModalCloseBtn">×</button>
            </div>
            <h2>Вход</h2>

            <form id="authModalForm">
                <div class="input-label__wrapper">
                    <input type="text" id="authLogin" placeholder="Логин">
                </div>

                <div class="input-label__wrapper">
                    <input type="password" id="authPassword" placeholder="Пароль">
                </div>

                <div class="modal__error-span">
                    <span>Заполните все поля</span>
                </div>

                <button class="auth-modal__login-btn" type="submit">
                    Вход
                </button>
            </form>
        </div>
    </div>
    <!--auth modal end-->

    <!--reg modal start-->
    <div class="reg-modal__wrapper">
        <div class="reg-modal">
            <div class="reg-modal__close-btn">
                <button class="modal__close-btn" id="regModalCloseBtn">×</button>
            </div>
            <h2>Регистрация</h2>

            <form autocomplete="off" id="regModalForm">
                <div class="input-label__wrapper">
                    <input type="text" id="regName" placeholder="Имя" autocomplete="off">
                </div>

                <div class="input-label__wrapper">
                    <input type="text" id="regLogin" placeholder="Логин" autocomplete="off">
                </div>

                <div class="input-label__wrapper">
                    <input type="password" id="regPassword" placeholder="Пароль" autocomplete="off">
                </div>

                <div class="modal__error-span">
                    <span>Заполните все поля</span>
                </div>

                <button class="reg-modal__login-btn" type="submit">
                    Зарегистрироваться
                </button>
            </form>
        </div>
    </div>
    <!--reg modal end-->

</footer>


<script src="../../js/main.js"></script>

<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(88839935, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/88839935" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->

</body>

</html>
