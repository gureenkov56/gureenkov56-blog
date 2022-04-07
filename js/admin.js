/*************
 * X. Open exist post for edit
 * X. Open editor for new or exist post
 *
 */


document.addEventListener("DOMContentLoaded", () => {

  const app = document.getElementById("app"),
    startMenu = document.getElementById("startMenu"),
    startBtn = document.getElementById("startBtn"),
    folderPostsIcon = document.querySelector('[data-link="Posts"]'),
    folderPosts = document.getElementById("folderPosts"),
    textEditor = document.querySelector('.text_editor'),
    windowsRedBtn = document.querySelectorAll(".windows_red_btn");

  let lastZIndex = 1;

  // listener for click out of some blocks
  document.addEventListener("click", (event) => {
    const clickedElement = event.composedPath();

    if (
      !clickedElement.includes(startMenu) &&
      !clickedElement.includes(startBtn)
    ) {
      startMenu.classList.remove("show");
    }
  });

  // show and hide start menu
  startBtn.addEventListener("click", () => {
    startMenu.style.zIndex = lastZIndex;
    startMenu.classList.toggle("show");
    lastZIndex++;
  });

  windowsRedBtn.forEach((redBtn) => {
    redBtn.addEventListener("click", () => {
      redBtn.parentElement.parentElement.classList.remove("show");
    });
  });

  // click for open folder
  folderPostsIcon.addEventListener('click', () => {
    console.log('click');
    folderPosts.classList.remove('hide');
    folderPosts.style.zIndex = lastZIndex;
    lastZIndex++;

    let windowsFolderBodyRightWrapper = folderPosts.querySelector(".windows__folder__body__right__wrapper");
    let contentItemTemplate = folderPosts.querySelector(".windows__folder__body__right__file");

    windowsFolderBodyRightWrapper.innerHTML = "";

    fetch(
      `${window.location.origin}/api/posts?` +
      new URLSearchParams({
        select: "id, h1, pub_date, views, pub_status",
        from: "posts",
        orderBy: "pub_date",
        order: "DESC",
        limit: "5",
      })
    )
      .then((res) => res.json())
      .then((data) => {
        data.forEach((contentItem) => {
          let newContentDOM = contentItemTemplate.cloneNode(true);
          let h1 = contentItem.h1;
          if (h1.length > 30) {
            h1 = h1.slice(0, 30) + '...';
          }
          newContentDOM.querySelector(".fileinfo__title").innerHTML = h1;
          newContentDOM.querySelector(".fileinfo__status_pub").innerHTML = contentItem.pub_date;
          newContentDOM.querySelector(".views_count").innerHTML = contentItem.views;
          newContentDOM.querySelector('.draft_or_pub').innerHTML = contentItem.pub_status;
          newContentDOM.dataset.id = contentItem.id;


          windowsFolderBodyRightWrapper.appendChild(newContentDOM);
        });

        refreshFiles();
      });
  })

  const closeWindowBtn = document.querySelectorAll(".windows_red_btn");

  closeWindowBtn.forEach((redBtn) => {
    redBtn.addEventListener("click", () => {
      redBtn.closest(".hide-me").classList.add('hide');
    });
  });

  /*******************************
   * X. Open exist post for edit *
   *******************************/

  function refreshFiles() {
    let allFiles = document.querySelectorAll('.windows__folder__body__right__file');

    allFiles.forEach(file => {
      file.addEventListener('click', (event) => {
        openEditor(file.dataset.id);
      })
    })
  }

  /****************************************
   * X. Open editor for new or exist post *
   ****************************************/

  function openEditor(id) {
    if (id) {
      //open editor with post
      textEditor.classList.remove('hide');
      textEditor.dataset.id = id;
      textEditor.style.zIndex = lastZIndex;
      lastZIndex++;

      let bodyGet = {
        'select': '*',
        'from': 'posts',
        'limit': 1,
        'params[id]': id
      }

      fetch(`${window.location.origin}/api/posts?` + new URLSearchParams(bodyGet))
        .then(res => res.json())
        .then(res => {
          console.log(res[0]);
          document.querySelector('.text_editor .windows__header__name > span').innerHTML = 'ID' + res[0].id + ' ' + res[0].h1;
          document.getElementById('h1').innerHTML = res[0].h1;
          // add contenteditable = true
          document.getElementById('editor').innerHTML = res[0].text;
          document.getElementById('SEOtitle').value = res[0].title;
          document.getElementById('SEOdescription').value = res[0].description;
          // main img
          // draft or pub
          // category
          // access level
        })

    } else {
      textEditor.classList.remove('hide');
      textEditor.dataset.id = 'new';
    }
  }

});
