/*
  1. Create constants
  2. Create new paragraph after ENTER
  3. Create new element
  4. Adding new img and close modal


*/

document.addEventListener("DOMContentLoaded", () => {
  const editor = document.getElementById("editor"),
    contentEditables = document.querySelectorAll('[contenteditable]'),
    modalImgWrapper = document.querySelector('.modal-img-wrapper'),
    closeImgModal = document.querySelectorAll('.close-img-modal'),
    saveNewImg = document.getElementById('saveNewImg'),
    alt = document.getElementById('alt'),
    description = document.getElementById('description'),
    uploadImg = document.getElementById('uploadImg')
    btnsForCreateElement = document.querySelectorAll('.controller_add [data-element]');

  let lastActiveContentEditable = null;

  // class 'last-focus' allow find active block
  contentEditables.forEach(item => {
    item.addEventListener('focus', () => {
      lastActiveContentEditable = item;
    })

    item.addEventListener('change', () => {
      if (item.innerHTML === '') {
        item.remove();
      }
    })
  })


  /***************************************
   * 1. Create new paragraph after ENTER *
   ***************************************/
  editor.addEventListener('keyup', event => {
    if (event.key == "Enter") {
      // remove autocreated div after Enter
      event.target.innerHTML = event.target.innerHTML.replace("<div><br></div>", "");

      // create new paragrapsh
      const newP = document.createElement("p");
      newP.setAttribute("contenteditable", "true");
      event.target.after(newP);
      newP.focus();
    }
  })



  /*************************
   * 3. Create new element *
   *************************/
  btnsForCreateElement.forEach(btn => {
    btn.addEventListener('click', event => {

      let newElement = null;

      if (event.target.dataset.element != 'img') {
        // text blocks
        newElement = document.createElement(event.target.dataset.element);
        newElement.setAttribute("contenteditable", "true");
        newElement.innerHTML = 'new';
      } else {
        // img upload
        newElement = document.createElement('figure');
        newElement.classList.add('post__full_width_img');

        const imgNew = document.createElement('img');
        imgNew.setAttribute('src', '../../img/admin/new-img.jpg');

        newElement.append(imgNew);
      }

      if (lastActiveContentEditable === null) {
        editor.append(newElement);
      } else {
        lastActiveContentEditable.after(newElement);
      }

      addListenerForEditorImg();

      newElement.focus();
      lastActiveContentEditable = newElement;
    })
  })

  /*********************
   * 4. Adding new img *
   *********************/

  let clickedFigure = null;

  function addListenerForEditorImg() {
    let allImg = document.querySelectorAll('#editor > figure');
    console.log(allImg);
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
    })
  });

  saveNewImg.addEventListener('click', () => {
    const img = clickedFigure.querySelector('img');
    img.setAttribute('alt', alt.value);

    if (description.value) {
      const descriptionUnderImg = document.createElement('figcaption');
      descriptionUnderImg.innerHTML = description.value;
      img.after(descriptionUnderImg);
    }

    fetch('../php/api/upload-img.php', {
      method: 'POST',
    })

    modalImgWrapper.style.display = 'none';
  })


});
