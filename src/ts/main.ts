import mobileMenuStarter from './menu.js'

mobileMenuStarter()

const upperToTop = document.getElementById('upperToTop')

// TODO: HIDE IT
if (upperToTop) {
    window.addEventListener('scroll', () => {
        if (window.scrollY > 100) {
            upperToTop.classList.remove('hidden')
        } else {
            upperToTop.classList.add('hidden')
        }
    })
}
