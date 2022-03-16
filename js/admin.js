document.addEventListener('DOMContentLoaded', () => {
    const startMenu = document.getElementById('startMenu'),
    startBtn = document.getElementById('startBtn'),
    windowsRedBtn = document.querySelectorAll('.windows_red_btn');

    // show and hide start menu
    startBtn.addEventListener('click', () => {
        startMenu.classList.toggle('show');
    })

    windowsRedBtn.forEach(redBtn => {
        redBtn.addEventListener('click', () => {
            redBtn.parentElement.parentElement.classList.remove('show');
        })
    })
})