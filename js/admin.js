document.addEventListener('DOMContentLoaded', () => {
    const app = document.getElementById('app'),
    startMenu = document.getElementById('startMenu'),
    startBtn = document.getElementById('startBtn'),
    directionItem = document.querySelectorAll('.direction-item'),
    windowsRedBtn = document.querySelectorAll('.windows_red_btn');

    let lastZIndex = 1;

    // show and hide start menu
    startBtn.addEventListener('click', () => {
        startMenu.classList.toggle('show');
    })

    windowsRedBtn.forEach(redBtn => {
        redBtn.addEventListener('click', () => {
            redBtn.parentElement.parentElement.classList.remove('show');
        })
    })

    // click for open folder
    directionItem.forEach(folder => {
        folder.addEventListener('click', () => {
            const ID = folder.dataset.link;

            // if folder was open
            const openBeforeWindow = document.getElementById(ID);
            if (openBeforeWindow) {
                openBeforeWindow.style.zIndex = lastZIndex;
                lastZIndex++;
                return;
            }

            const newWindow = document.querySelector('#folderTemplate').cloneNode(true);
            newWindow.querySelector('#windowName').innerHTML = ID;
            newWindow.id = ID;
            newWindow.classList.remove('hide');
            newWindow.style.zIndex = lastZIndex;

            //random coordinates
            let mt = Math.random() * 30 + 'px',
                ml = Math.random() * 30 + '%';

            console.log(mt, "mt");

            newWindow.style.marginTop = mt;
            newWindow.style.marginLeft = ml;


            app.appendChild(newWindow);
            lastZIndex++;
            refreshBtnOnScreen();
        })
    })

    function refreshBtnOnScreen() {
        const closeWindowBtn = document.querySelectorAll('.windows_red_btn');

        closeWindowBtn.forEach(redBtn => {
            redBtn.addEventListener('click', () => {
                redBtn.closest('.folder').remove();
            })
        })
    }

})