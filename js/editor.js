/*
  1. Create constants
  2. Create new paragraph after ENTER
  3. Create new element


*/

document.addEventListener("DOMContentLoaded", () => {
  const editor = document.getElementById("editor"),
    contentEditables = document.querySelectorAll('[contenteditable]'),
    btnsForCreateElement = document.querySelectorAll('.controller_add [data-element]');

  let lasdActiveContentEditable = null;


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

  // class 'last-focus' allow find active block
  contentEditables.forEach(item => {
    item.addEventListener('focus', () => {
      lasdActiveContentEditable = item;
    })
  })



  btnsForCreateElement.forEach(btn => {
    btn.addEventListener('click', event => {
      let newElement = document.createElement(event.target.dataset.element);
      newElement.setAttribute("contenteditable", "true");
      newElement.innerHTML = 'new';

      if (lasdActiveContentEditable === null) {
        editor.append(newElement);
      } else {
        lasdActiveContentEditable.after(newElement);
        newElement.focus();
        lasdActiveContentEditable = newElement;
      }


    })
  })
});
