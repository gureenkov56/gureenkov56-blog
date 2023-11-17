export default function mobileMenuStarter() {
    const menu = document.getElementById('menu');
    const menuBtn = document.getElementById('menu-btn');
    const centerHeader = document.getElementById('centerHeader')!

    menuBtn?.addEventListener('click', () => {
        if (!menuBtn.classList.contains('active')) {
            menuBtn.classList.remove('inactive')
            menuBtn.classList.add('active')
            centerHeader.classList.add('menu-title');
            centerHeader.classList.remove('page-title');
            menu.classList.add('show');
            document.body.style.overflow = "hidden";
        } else {
            menuBtn.classList.remove('active')
            menuBtn.classList.add('inactive')
            centerHeader.classList.remove('menu-title');
            centerHeader.classList.add('page-title');
            menu.classList.remove('show');
            document.body.style.overflow = "auto";
        }
    })


}
