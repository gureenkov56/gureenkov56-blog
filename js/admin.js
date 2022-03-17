document.addEventListener('DOMContentLoaded', () => {
    const app = document.getElementById('app'),
        startMenu = document.getElementById('startMenu'),
        startBtn = document.getElementById('startBtn'),
        directionItem = document.querySelectorAll('.direction-item'),
        windowsRedBtn = document.querySelectorAll('.windows_red_btn');

    let lastZIndex = 1;

    // listener for click out of some blocks
    document.addEventListener('click', (event) => {
        const clickedElement = event.composedPath();

        if (!clickedElement.includes(startMenu) && !clickedElement.includes((startBtn))) {
            startMenu.classList.remove('show');
        }
    })

    // show and hide start menu
    startBtn.addEventListener('click', () => {
        startMenu.style.zIndex = lastZIndex;
        startMenu.classList.toggle('show');
        lastZIndex++;
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

            // random coordinates
            let mt = Math.random() * 30 + 'px',
                ml = Math.random() * 30 + '%';

            newWindow.style.marginTop = mt;
            newWindow.style.marginLeft = ml;


            app.appendChild(newWindow);
            lastZIndex++;
            refreshBtnOnScreen();

            if (ID === 'Posts') {
                let windowsFolderBodyRightWrapper = newWindow.querySelector('.windows__folder__body__right__wrapper');
                let contentItemTemplate = newWindow.querySelector('.windows__folder__body__right__file');

                windowsFolderBodyRightWrapper.innerHTML = '';

                fetch(`${window.location.origin}/api/posts?` + new URLSearchParams({
                    select: '*',
                    from: 'posts',
                    orderBy: 'pub_date',
                    order: 'DESC',
                    limit: '5',
                })
                )
                    .then(res => res.json())
                    .then(data => {
                        data.forEach(contentItem => {
                            let newContentDOM = contentItemTemplate.cloneNode(true);
                            newContentDOM.querySelector('.fileinfo__title').innerHTML = contentItem.h1;
                            newContentDOM.querySelector('.fileinfo__status_pub').innerHTML = contentItem.pub_date;


                            windowsFolderBodyRightWrapper.appendChild(newContentDOM);
                        })
                    })

            }
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



