/*
  1. Create constants
  2. Create new paragraph after ENTER
  3. Create new element
  4. Adding new img and close modal
  5. Title image
  6. Save post


*/

document.addEventListener("DOMContentLoaded", () => {

  /***********************
   * 1. Create constants *
   ***********************/
  const editor = document.getElementById("editor"),
    modalImgWrapper = document.querySelector('.modal-img-wrapper'),
    closeImgModal = document.querySelectorAll('.close-img-modal'),
    saveNewImg = document.getElementById('saveNewImg'),
    alt = document.getElementById('alt'),
    description = document.getElementById('description'),
    uploadImgForm = document.getElementById('uploadImgForm'),
    addTitleImg = document.getElementById('addTitleImg'),
    savePostBtn = document.getElementById('savePostBtn'),
    btnsForCreateElement = document.querySelectorAll('.controller_add [data-element]');

  let contentEditables = editor.querySelectorAll('[contenteditable]');

  function refreshContentEditablesListeners() {
    contentEditables = editor.querySelectorAll('[contenteditable]');

    contentEditables.forEach(item => {
      item.addEventListener('focus', () => {
        contentEditables.forEach(el => el.classList.remove('active'));
        item.classList.add('active');
      })

      item.addEventListener('keyup', (event) => {
        if (item.innerHTML === '' && event.key === "Backspace" && item.classList.contains('oneStepBeforeRemove')) {
          if(item.previousElementSibling) {
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

      const activeBlock = editor.querySelector('.active');
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

  /*********************
   * 4. Adding new img *
   *********************/

  let clickedFigure = null;

  function addListenerForEditorImg() {
    let allImg = document.querySelectorAll('#editor > figure');
    allImg.forEach(el => {
      el.addEventListener('click', () => {
        modalImgWrapper.style.display = 'flex';
        clickedFigure = el;
      })
    })
  }

  addListenerForEditorImg();

  closeImgModal.forEach(closeBtn => {
    closeBtn.addEventListener('click', () => {
      modalImgWrapper.style.display = 'none';
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
      });

    let inputs = modalImgWrapper.querySelectorAll('input');
    inputs.forEach(inp => inp.value = '');
    modalImgWrapper.style.display = 'none';
  })

  /******************
   * 5. Title image *
   ******************/

  addTitleImg.addEventListener('click', () => {
    modalImgWrapper.style.display = 'flex';
    clickedFigure = addTitleImg;
  })

  /****************
   * 6. Save post *
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
    formData.append('title', document.querySelector('#SEOtitle').value);
    formData.append('description', document.querySelector('#SEOdescription').value);
    formData.append('h1', document.querySelector('#h1').innerHTML);
    formData.append('text', text);
    formData.append('pub_status', document.getElementById('pubStatus').value);
    formData.append('in_category', document.getElementById('category').value);
    formData.append('preview_img', addTitleImg.querySelector('img').getAttribute('src').split('/post/').pop());
    formData.append('level_access', document.getElementById('accessLevel').value);

    if (editor.dataset.id === 'new') {
      fetch(`${window.location.origin}/api/upload-post`, {
        method: 'post',
        body: formData
      })
        .then(res => res.json())
        .then(res => console.log(res))
    } else {
      // update post
    }

  })



  // TODO:
  // Открытие поста, обновление поста, показ постов для разных доступов, показ фрагментов для разных доступов

});
