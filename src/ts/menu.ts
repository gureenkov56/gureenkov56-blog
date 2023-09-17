export default function menulog() {
    const menuBtn = document.getElementById('menu');
    const centerContent = document.getElementById('centerContent')
    const center = document.getElementById('center')

    menuBtn?.addEventListener('click', () => {
        centerContent?.classList.toggle('is-show-menu')
        center?.classList.toggle('is-show-menu')


        if (!menuBtn.classList.contains('active')) {
            menuBtn.classList.remove('inactive')
            menuBtn.classList.add('active')
        } else {
            menuBtn.classList.remove('active')
            menuBtn.classList.add('inactive')
        }
    })


}