import { MOBILE_SCREEN_BREAKPOINT } from './constants.js';
import mobileMenuStarter from './menu.js'

mobileMenuStarter()

const {innerWidth} = window;

if (innerWidth > MOBILE_SCREEN_BREAKPOINT) {
    const upperToTop = document.getElementById('upperToTop')

    if (upperToTop) {
        window.addEventListener('scroll', () => {
            if (window.scrollY > 100) {
                upperToTop.classList.remove('hidden')
            } else {
                upperToTop.classList.add('hidden')
            }
        })
    }
}
