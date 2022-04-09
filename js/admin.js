/*************
 * X. Open exist post for edit
 * X. Open editor for new or exist post
 *
 */

document.addEventListener("DOMContentLoaded", () => {

  const startMenu = document.getElementById("startMenu"),
    startBtn = document.getElementById("startBtn"),
    folderPostsIcon = document.querySelector('[data-link="Posts"]'),
    folderPosts = document.getElementById("folderPosts"),
    textEditor = document.querySelector('.text_editor'),
    createNewPost = document.getElementById('createNewPost'),
    editor = document.getElementById('editor'),
    modalImgWrapper = document.querySelector('.modal-img-wrapper'),
    closeImgModal = document.querySelectorAll('.close-img-modal'),
    saveNewImg = document.getElementById('saveNewImg'),
    alt = document.getElementById('alt'),
    description = document.getElementById('description'),
    uploadImgForm = document.getElementById('uploadImgForm'),
    addTitleImg = document.getElementById('addTitleImg'),
    savePostBtn = document.getElementById('savePostBtn'),
    alertWrapper = document.querySelector('.alert-wrapper'),
    alertHeaderText = document.getElementById('alert__header-text'),
    alertMsg = alertWrapper.querySelector('p'),
    btnsForCreateElement = document.querySelectorAll('.controller_add [data-element]'),
    windowsFolderBodyRightWrapper = folderPosts.querySelector(".windows__folder__body__right__wrapper"),
    contentItemTemplate = folderPosts.querySelector(".windows__folder__body__right__file");

  let contentEditables = editor.querySelectorAll('[contenteditable]'),
    lastZIndex = 1,
    clickedFigure = null;

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



  // click for open folder
  folderPostsIcon.addEventListener('click', () => {
    folderPosts.classList.remove('hide');
    folderPosts.style.zIndex = lastZIndex;
    lastZIndex++;

    refreshFiles();
  })

  const closeWindowBtn = document.querySelectorAll(".close-btn");

  closeWindowBtn.forEach((btn) => {
    btn.addEventListener("click", () => {
      console.log('click');
      btn.closest(".hide-me").classList.add('hide');
      console.log('btn.closest(".hide-me")', btn.closest(".hide-me"));
    });
  });

  /*******************************
   * X. Open exist post for edit *
   *******************************/

  function refreshFiles() {
    windowsFolderBodyRightWrapper.innerHTML = "";

    fetch(
      `${window.location.origin}/api/posts?` +
      new URLSearchParams({
        select: "id, h1, pub_date, views, pub_status",
        from: "posts",
        orderBy: "pub_date",
        order: "DESC",
        //limit: "5",
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
          newContentDOM.addEventListener('click', () => openEditor(newContentDOM.dataset.id));

          windowsFolderBodyRightWrapper.appendChild(newContentDOM);
        });
      });
  }


  /****************************************
   * X. Open editor for new or exist post *
   ****************************************/

  function openEditor(id) {
    textEditor.classList.remove('hide');
    textEditor.style.zIndex = lastZIndex;
    textEditor.dataset.id = id;
    lastZIndex++;

    if (id !== 'create') {
      //open editor with post

      let bodyGet = {
        'select': '*',
        'from': 'posts',
        'limit': 1,
        'params[id]': id
      }

      fetch(`${window.location.origin}/api/posts?` + new URLSearchParams(bodyGet))
        .then(res => res.json())
        .then(res => {
          console.log(res);
          // set id for editor
          document.querySelector('.text_editor .windows__header__name > span').innerHTML = 'ID' + res[0].id + ' ' + res[0].h1;

          // set H1
          document.getElementById('h1').innerHTML = res[0].h1;

          // set text and addEventListeners
          editor.innerHTML = res[0].text;
          editor.querySelectorAll('p, blockquote, h2, h3, h4, h5, h6').forEach(editorChild => {
            editorChild.setAttribute('contenteditable', 'true');
            editorChild.addEventListener('focus', () => editorChild.classList.add('active'));
          })

          // set addEventListener for image in text
          addListenerForEditorImg();


          document.getElementById('SEOtitle').value = res[0].title;
          document.getElementById('SEOdescription').value = res[0].description;

          // main img
          addTitleImg.querySelector('img').setAttribute('src', window.location.origin + '/img/post/' + res[0].preview_img);

          // draft or pub
          document.getElementById('pubStatus').value = res[0].pub_status;

          // category
          document.getElementById('category').value = res[0].in_category;

          // access level
          document.getElementById('accessLevel').value = res[0].level_access;

        })
    } else {
      document.querySelector('.text_editor .windows__header__name > span').innerHTML = 'Новый пост';
      document.getElementById('h1').innerHTML = 'h1';
      editor.innerHTML = '<p contenteditable="true">Start</p>';

      document.getElementById('SEOtitle').value = "";
      document.getElementById('SEOdescription').value = "";
      addTitleImg.querySelector('img').setAttribute('src', window.location.origin + '/img/admin/new-img.jpg');

      document.getElementById('pubStatus').value = 'draft';
      document.getElementById('category').value = '3';
      document.getElementById('accessLevel').value = 'admin';


    }
  }

  // create new post
  createNewPost.addEventListener('click', () => openEditor('create'));

  /*****************
   * X. Alert show *
   *****************/

  function showAlert(title = "", msg = "") {
    alertWrapper.classList.remove('hide');
    if (title) alertHeaderText.innerHTML = title;
    if (msg) alertMsg.innerHTML = msg;


    setTimeout(() => {
      alertWrapper.classList.add('hide');
    }, 4000);
  }

  /**********
   * EDITOR *
   **********/

  /*
  2. Create new paragraph after ENTER
  3. Create new element
  4. Adding new img and close modal
  5. Title image
  6. Save post
  7. Open exist post
*/

  function refreshContentEditablesListeners() {
    contentEditables = editor.querySelectorAll('[contenteditable]');

    contentEditables.forEach(item => {
      item.addEventListener('focus', () => {
        contentEditables.forEach(el => el.classList.remove('active'));
        item.classList.add('active');
      })

      item.addEventListener('keyup', (event) => {
        if (item.innerHTML === '' && event.key === "Backspace" && item.classList.contains('oneStepBeforeRemove')) {
          if (item.previousElementSibling) {
            item.previousElementSibling.focus();
          }
          item.remove();
        } else if (item.innerHTML === '' && event.key === "Backspace") {
          item.classList.add('oneStepBeforeRemove');
        } else {
          item.classList.remove('oneStepBeforeRemove');
        }
      })
    })
  }

  refreshContentEditablesListeners();

  /***************************************
   * 2. Create new paragraph after ENTER *
   ***************************************/
  editor.addEventListener('keyup', event => {
    if (event.key == "Enter") {
      // remove autocreated div after Enter
      event.target.innerHTML = event.target.innerHTML.replace("<div><br></div>", "");

      // create new paragrapsh
      const newP = document.createElement("p");
      newP.setAttribute("contenteditable", "true");
      contentEditables = editor.querySelectorAll('[contenteditable]');
      event.target.after(newP);

      refreshContentEditablesListeners();
      newP.focus();
    }
  })



  /*************************
   * 3. Create new element *
   *************************/
  btnsForCreateElement.forEach(btn => {
    btn.addEventListener('click', event => {

      let activeBlock = editor.querySelector('.active');
      let newElement = null,
        removeTarget = false;


      if (event.target.dataset.element != 'img') {
        // text blocks replace other
        newElement = document.createElement(event.target.dataset.element);
        newElement.setAttribute("contenteditable", "true");
        if (activeBlock) {
          newElement.innerHTML = activeBlock.innerHTML;
          removeTarget = true;
        }
      } else {
        // img upload
        newElement = document.createElement('figure');
        newElement.classList.add('post__full_width_img');

        const imgNew = document.createElement('img');
        const descriptionUnderImg = document.createElement('figcaption');
        imgNew.setAttribute('src', '../../img/admin/new-img.jpg');

        newElement.append(imgNew);
        newElement.append(descriptionUnderImg);
        if (activeBlock) activeBlock.classList.remove('active');
      }

      if (activeBlock) {
        activeBlock.after(newElement);
      } else {
        editor.append(newElement);
      }

      if (removeTarget) {
        activeBlock.remove();
      }

      addListenerForEditorImg();
      refreshContentEditablesListeners();

      newElement.focus();
    })
  })

  /*************************
   * 4. Additional new img *
   *************************/

  function addListenerForEditorImg() {
    let allImg = document.querySelectorAll('#editor > figure');
    allImg.forEach(el => {
      el.addEventListener('click', () => {
        console.log('click');
        modalImgWrapper.classList.remove('hide');
        clickedFigure = el;
      })
    })
  }

  addListenerForEditorImg();

  closeImgModal.forEach(closeBtn => {
    closeBtn.addEventListener('click', () => {
      let inputs = modalImgWrapper.querySelectorAll('input');
      inputs.forEach(inp => inp.value = '');
    })
  });

  saveNewImg.addEventListener('click', () => {
    let img = clickedFigure.querySelector('img');
    img.setAttribute('alt', alt.value);

    if (description.value) {
      let figcaption = clickedFigure.querySelector('figcaption');
      figcaption.innerHTML = description.value;
    }

    // upload new img
    fetch('../php/api/upload-img.php', {
      method: "POST",
      body: new FormData(uploadImgForm),
    })
      .then(res => res.json())
      .then(imgname => {
        img.setAttribute('src', window.location.origin + '/img/post/' + imgname);
        showAlert('Картинка загружена');
      })
      .catch((err) => {
        console.log(err);
        showAlert('Ошибка! Картинка не загружена', 'Подробная информация в консоли');
      })

    let inputs = modalImgWrapper.querySelectorAll('input');
    inputs.forEach(inp => inp.value = '');
    modalImgWrapper.classList.add('hide');
  })

  /******************
   * 5. Title image *
   ******************/

  addTitleImg.addEventListener('click', () => {
    modalImgWrapper.classList.remove('hide');
    clickedFigure = addTitleImg;
  })

  /****************
   * 6. Save post & update *
   ****************/

  savePostBtn.addEventListener('click', () => {
    let text = '';
    let editorElementsAll = document.querySelectorAll('#editor > *');
    console.log(editorElementsAll);
    editorElementsAll.forEach(el => {
      el.removeAttribute('contenteditable');
      el.classList.remove('oneStepBeforeRemove');
      el.classList.remove('active');

      text += el.outerHTML;
    })
    text = text.replaceAll('class=""', '');
    text = text.replaceAll(' >', '>');

    let formData = new FormData();

    formData.append('id', textEditor.dataset.id);
    formData.append('title', document.querySelector('#SEOtitle').value);
    formData.append('description', document.querySelector('#SEOdescription').value);
    formData.append('h1', document.querySelector('#h1').innerHTML);
    formData.append('text', text);
    formData.append('pub_status', document.getElementById('pubStatus').value);
    formData.append('in_category', document.getElementById('category').value);
    formData.append('preview_img', addTitleImg.querySelector('img').getAttribute('src').split('/').pop());
    formData.append('level_access', document.getElementById('accessLevel').value);


    if (textEditor.dataset.id === 'create') {
      // upload new post
      fetch(`${window.location.origin}/api/upload-post`, {
        method: 'post',
        body: formData
      })
        .then(() => {
          refreshFiles();
          showAlert('Пост успешно загружен');
        })
        .catch(err => {
          console.log(err);
          showAlert('Ошибка! Пост не загружен', 'Подробная информация в консоли');
        })
    } else {
      // update post
      fetch(`${window.location.origin}/api/update-post`, {
        method: 'post',
        body: formData
      })
        .then(() => {
          refreshFiles();
          showAlert('Пост успешно обновлен');
        })
        .catch(err => {
          console.log(err);
          showAlert('Ошибка обновления поста!', 'Подробная информация в консоли');
        })
    }
  })

  // TODO:
  // Показ постов для разных доступов, показ фрагментов для разных доступов




});
