/*************
 * 1. Creating constants
 * 2. Mobile burger menu
 * 3. Modal change user info
 */

/************************
* 1. Creating constants *
*************************/
const mobileMenu = document.querySelector("#mobileMenu"),
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
    saveProfileEdit = document.getElementById('saveProfileEdit')
    ;

/******
 * 2. Mobile burger menu
 */

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
footerEditBtn.addEventListener('click', () => {
    modalBg.classList.remove('hide');
    document.body.classList.add('overflow_hidden')
})

modalCloseBtn.addEventListener('click', (event) => {
    event.stopPropagation();
    modalBg.classList.add('hide');
    document.body.classList.remove('overflow_hidden')
})

modalBg.addEventListener('click', (event) => {
    console.log(event.composedPath().includes(modalContainer));
    if (!event.composedPath().includes(modalContainer)) {
        modalBg.classList.add('hide');
        document.body.classList.remove('overflow_hidden');
    }
})

saveProfileEdit.addEventListener('click', () => {
    modalBg.classList.add('hide');
    document.body.classList.remove('overflow_hidden');
})

modalChangeAvatarItems.forEach(el => {
    el.addEventListener('click', () => {
        modalNewAvatar.click();
    })
})

modalNewAvatar.addEventListener('change', () => {
    console.log('change');

    fetch('/php/api/upload-avatar.php', {
        method: "POST",
        body: new FormData(uploadAvatarForm),
    })
        .then(res => res.json())
        .then(res => {
            console.log('res', res);
            avatars.forEach(avatar => avatar.setAttribute('src', `/img/users/${res}`));
        })
})





