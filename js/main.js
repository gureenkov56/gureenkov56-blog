/*************
 * 1. Creating constants
 * 2. Mobile burger menu
 * 3. Modal change user info
 * 4. Reg & auth modal
 */

document.addEventListener("DOMContentLoaded", () => {
    /************************
    * 1. Creating constants *
    *************************/
    const
        mobileMenu = document.querySelector("#mobileMenu"),
        burgerElemFirst = document.querySelector("#burgerElemFirst"),
        burgerElemSecond = document.querySelector("#burgerElemSecond"),
        burgerElemThird = document.querySelector("#burgerElemThird"),
        modalChangeAvatarItems = document.querySelectorAll(".modal__change-avatar > *"),
        modalNewAvatar = document.getElementById('modalNewAvatar'),
        uploadAvatarForm = document.getElementById('uploadAvatarForm'),
        avatars = document.querySelectorAll('.footer__avatar'),
        footerEditBtn = document.getElementById('footerEditBtn'),
        modalBg = document.getElementById('modalBg'),
        modalCloseBtn = document.getElementById('modalCloseBtn'),
        modalContainer = document.getElementById('modalContainer'),
        saveProfileEdit = document.getElementById('saveProfileEdit'),

        footerRegBtn = document.querySelector('.footer__reg-btn'),
        footerLoginBtn = document.querySelector('.footer__login-btn'),

        authModalWrapper = document.querySelector('.auth-modal__wrapper'),
        authModal = document.querySelector('.auth-modal'),
        authModalCloseBtn = document.getElementById('authModalCloseBtn'),
        authModalForm = document.getElementById('authModalForm'),
        authLogin = document.getElementById('authLogin'),
        authPassword = document.getElementById('authPassword'),
        authError = authModalForm.querySelector('.modal__error-span'),

        regModalWrapper = document.querySelector('.reg-modal__wrapper'),
        regModal = document.querySelector('.reg-modal'),
        regModalCloseBtn = document.getElementById('regModalCloseBtn'),
        regModalForm = document.getElementById('regModalForm'),
        regError = regModalForm.querySelector('.modal__error-span'),
        regName = regModalForm.querySelector('#regName'),
        regLogin = regModalForm.querySelector('#regLogin'),
        regPassword = regModalForm.querySelector('#regPassword')
        ;

    /*************************
     * 2. Mobile burger menu *
     *************************/

    document.querySelector("#mobileBurger").addEventListener('click', () => {
        mobileMenu.classList.toggle('show_mobile_menu');
        document.body.classList.toggle('overflow_hidden');

        burgerElemFirst.classList.toggle("burger_tranform_first");
        burgerElemSecond.classList.toggle("burger_tranform_second");
        burgerElemThird.classList.toggle("burger_tranform_third");
    })

    /*****************************
     * 3. Modal change user info *
     *****************************/
    if (footerEditBtn) footerEditBtn.addEventListener('click', () => {
        modalBg.classList.remove('hide');
        document.body.classList.add('overflow_hidden')
    })


    if (modalCloseBtn) modalCloseBtn.addEventListener('click', (event) => {
        event.stopPropagation();
        modalBg.classList.add('hide');
        document.body.classList.remove('overflow_hidden')
    })

    if (modalBg) modalBg.addEventListener('click', (event) => {
        if (!event.composedPath().includes(modalContainer)) {
            modalBg.classList.add('hide');
            document.body.classList.remove('overflow_hidden');
        }
    })

    if (saveProfileEdit) saveProfileEdit.addEventListener('click', () => {
        modalBg.classList.add('hide');
        document.body.classList.remove('overflow_hidden');
    })

    if (modalChangeAvatarItems) modalChangeAvatarItems.forEach(el => {
        el.addEventListener('click', () => {
            modalNewAvatar.click();
        })
    })

    if (modalNewAvatar) modalNewAvatar.addEventListener('change', () => {

        fetch('/php/api/upload-avatar.php', {
            method: "POST",
            body: new FormData(uploadAvatarForm),
        })
            .then(res => res.json())
            .then(res => {
                avatars.forEach(avatar => avatar.setAttribute('src', `/img/users/${res}`));
            })
    })

    /***********************
     * 4. Reg & auth modal *
     ***********************/

    // show reg modal
    if (!footerRegBtn) return;

    footerRegBtn.addEventListener('click', () => {
        regModalWrapper.style.display = 'flex';

        setTimeout(() => {
            regModalWrapper.style.visibility = "visible";
            regModalWrapper.style.opacity = 1;

            regModal.style.opacity = 1;
            regModal.style.marginTop = 0;
        }, 0);
    })

    // show auth modal
    footerLoginBtn.addEventListener('click', () => {
        authModalWrapper.style.display = 'flex';

        setTimeout(() => {
            authModalWrapper.style.visibility = "visible";
            authModalWrapper.style.opacity = 1;

            authModal.style.opacity = 1;
            authModal.style.marginTop = 0;
        }, 0);
    })

    // close reg modal
    regModalWrapper.addEventListener('click', (event) => {
        if (!event.composedPath().includes(regModal)) {
            regModalCloseBtn.click();
        }
    })

    regModalCloseBtn.addEventListener('click', () => {
        regModalWrapper.style.visibility = "hidden";
        regModalWrapper.style.opacity = 0;

        regModal.style.opacity = 0;
        regModal.style.marginTop = "200px";

        setTimeout(() => {
            regModalWrapper.style.display = 'none';
        }, 500);
    })

    // close auth modal
    authModalWrapper.addEventListener('click', (event) => {
        if (!event.composedPath().includes(authModal)) {
            authModalCloseBtn.click();
        }
    })

    authModalCloseBtn.addEventListener('click', () => {
        authModalWrapper.style.visibility = "hidden";
        authModalWrapper.style.opacity = 0;

        authModal.style.opacity = 0;
        authModal.style.marginTop = "200px";

        setTimeout(() => {
            authModalWrapper.style.display = 'none';
        }, 500);
    })

    // hide error after input
    authLogin.addEventListener('input', () => showOrHideErrorInModal('hide', authModalForm, authError));
    authPassword.addEventListener('input', () => showOrHideErrorInModal('hide', authModalForm, authError));

    // auth send request
    authModalForm.addEventListener('submit', event => {
        event.preventDefault();


        // validate
        if (authLogin.value.length === 0) {
            showOrHideErrorInModal('show', authModalForm, authError, "Заполните все поля", authLogin);
            return;
        } else if (authPassword.value.length === 0) {
            showOrHideErrorInModal('show', authModalForm, authError, "Заполните все поля", authPassword);
            return;
        }

        const loginForm = new FormData();
        loginForm.append('login', authLogin.value);
        loginForm.append('pass', authPassword.value);

        fetch("../php/api/login.php", {
            method: "POST",
            body: loginForm
        })
            .then(res => res.json())
            .then(res => {
                if (res === "OK") {
                    location.reload();
                } else
                if (res === 'admin') {
                    location = '/admin';
                } else
                if (res === 'Неверный логин') {
                    showOrHideErrorInModal('show', authModalForm, authError, res, authLogin);
                } else
                if (res === 'Неверный пароль') {
                    showOrHideErrorInModal('show', authModalForm, authError, res, authPassword);
                }
            })
    })

    // hide error after input
    regModalForm.querySelectorAll('input').forEach(input => {
        input.addEventListener('input', () => showOrHideErrorInModal('hide', regModalForm, regError));
    })

    // reg send request
    regModalForm.addEventListener('submit', event => {
        event.preventDefault();
        console.log('submit regModalForm');

        if (regName.value.length === 0) {
            showOrHideErrorInModal('show', regModalForm, regError, "Заполните имя", regName);
            return;
        } else
        if (regLogin.value.length === 0) {
            showOrHideErrorInModal('show', regModalForm, regError, "Заполните логин", regLogin);
            return;
        } else
        if (regPassword.value.length === 0) {
            showOrHideErrorInModal('show', regModalForm, regError, "Заполните пароль", regPassword);
            return;
        }

        const regForm = new FormData();
        regForm.append('name', regName.value);
        regForm.append('login', regLogin.value);
        regForm.append('password', regPassword.value);

        fetch('../php/api/reg.php', {
            method: "POST",
            body: regForm,
        })
            .then(res => res.json())
            .then(res => {
                if (res === 'Логин существует') {
                    showOrHideErrorInModal('show', regModalForm, regError, res, regLogin);
                } else
                if (res === 'success') {
                    regError.style.color = "green";
                    showOrHideErrorInModal('show', regModalForm, regError, "Успех!");

                    setTimeout(() => {
                        location.reload();
                    }, 1300);
                }
            })
    })


    function showOrHideErrorInModal(showOrHide, form, errorDiv, errorText, errorInput) {
        if (showOrHide === 'show') {
            errorDiv.innerHTML = errorText;
            errorDiv.style.height = "1.5rem";

            if (errorInput) errorInput.classList.add('red-error-border');
        } else {
            errorDiv.style.height = "0";
            form.querySelectorAll('input').forEach(input => {
                input.classList.remove('red-error-border');
            });
        }


    }

})



