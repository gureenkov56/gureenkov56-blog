// mobile menu
const mobileMenu = document.querySelector("#mobileMenu"),
    burgerElemFirst = document.querySelector("#burgerElemFirst"),
    burgerElemSecond = document.querySelector("#burgerElemSecond"),
    burgerElemThird = document.querySelector("#burgerElemThird")
;

document.querySelector("#mobileBurger").addEventListener('click', () =>{
    mobileMenu.classList.toggle('show_mobile_menu');
    document.body.classList.toggle('overflow_hidden');

    burgerElemFirst.classList.toggle("burger_tranform_first");
    burgerElemSecond.classList.toggle("burger_tranform_second");
    burgerElemThird.classList.toggle("burger_tranform_third");
})