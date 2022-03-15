document.addEventListener('DOMContentLoaded', () => {
    const startMenu = document.getElementById('startMenu'),
    startBtn = document.getElementById('startBtn');

    // show and hide start menu
    startBtn.addEventListener('click', () => {
        startMenu.classList.toggle('show');
    })


})