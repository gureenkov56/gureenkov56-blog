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
    closeImgModal = document.querySelector('.close-img-modal'),
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
        newElement = document.createElement('img');
        newElement.setAttribute('src', '../../img/admin/new-img.jpg');

        addListenerForEditorImg();
      }

      if (lastActiveContentEditable === null) {
        editor.append(newElement);
      } else {
        lastActiveContentEditable.after(newElement);
      }

      newElement.focus();
      lastActiveContentEditable = newElement;
    })
  })

  /*********************
   * 4. Adding new img *
   *********************/

  function addListenerForEditorImg() {
    let allImg = document.querySelectorAll('#editor > img');
    allImg.forEach(el => {
      el.addEventListener('click', () => {
        modalImgWrapper.style.display = 'flex';
      })
    })
  }

  addListenerForEditorImg();

  closeImgModal.addEventListener('click', () => {
    modalImgWrapper.style.display = 'none';
  })
});
