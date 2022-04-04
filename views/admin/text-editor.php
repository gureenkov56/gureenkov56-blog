<div class="text_editor">
    <div class="windows__header">
        <span class="windows__header__name">
            <img src="../../img/admin/folder-icon.png" alt="folder-icon">
            Имя первого поста
        </span>
        <div class="windows__header__btn_wrapper">
            <button class="windows__header__btn windows_blue_btn hover_light active_darker">_</button>
            <button class="windows__header__btn windows_blue_btn hover_light active_darker">□</button>
            <button class="windows__header__btn windows_red_btn hover_light active_darker">×</button>
        </div>
    </div>

    <div class="editor__wrapper">
        <div class="editor__controllers">
            <div class="controller_add">
                <div>Добавить</div>
                <div class="controllers_add__wrapper">
                    <div data-element="p">PARAGRAPH</div>
                    <div data-element="blockquote">BLOCKQUOTE</div>
                </div>
                <div class="controllers_add__wrapper">
                    <div data-element="h2">H2</div>
                    <div data-element="h3">H3</div>
                    <div data-element="h4">H4</div>
                    <div data-element="h5">H5</div>
                    <div data-element="h6">H6</div>
                    <div data-element="img">IMG</div>
                </div>
            </div>

            <div id="addTitleImg">
                <img src="../../img/admin/new-img.jpg" alt="">
            </div>

            <div class="finish_btn">
                <select name="category" id="category" class='cat_select'>
                    <option value="" selected disabled hidden>Категория</option>
                    <option value="1">Путешествия</option>
                    <option value="2">Коддинг</option>
                    <option value="3">Другое</option>
                </select>
                <div>
                    <button class='save_btn'>Сохранить</button>
                </div>
                <div>
                    <button class='pub_btn'>Опубликовать</button>
                </div>
            </div>
        </div>

        <div id="editor">
            <h1 contenteditable='true'>Заголовок</h1>
            <p contenteditable='true'>Start</p>

            <blockquote contenteditable='true'>Blockquote</Blockquote>
            </blockquote>

        </div>
    </div>

    <div class="modal-img-wrapper">
        <div id="imgModal">
            <div class="windows__header">
                <span class="windows__header__name">
                    <img src="../../img/admin/folder-icon.png" alt="folder-icon">
                    Изменить картинку
                </span>
                <div class="windows__header__btn_wrapper">
                    <button class="windows__header__btn windows_red_btn hover_light active_darker close-img-modal">×</button>
                </div>
            </div>

            <div class="imgModal-inner-wrapper">

                <form enctype="multipart/form-data" method="POST" id="uploadImgForm">
                    <input type="file" name="uploadimg" id="uploadImg" accept=".jpg, .jpeg, .png">
                </form>

                <div>
                    <label for="alt">alt*</label>
                    <input type="text" id="alt">
                </div>

                <div>
                    <label for="description">Подпись</label>
                    <input type="text" id="description">
                </div>

                <button id="saveNewImg">Сохранить</button>
                <button class="close-img-modal">Отменить</button>

            </div>

        </div>
    </div>

</div>