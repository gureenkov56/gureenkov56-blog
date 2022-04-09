<div class="folder hide-me hide" id="folderPosts">

    <div class="windows__header">
        <span class="windows__header__name">
            <img src="../../img/admin/folder-icon.png" alt="folder-icon">
            <span id="windowName">Posts</span>
        </span>
        <div class="windows__header__btn_wrapper">
            <button class="windows__header__btn windows_blue_btn hover_light active_darker">_</button>
            <button class="windows__header__btn windows_blue_btn hover_light active_darker">□</button>
            <button class="windows__header__btn windows_red_btn hover_light active_darker">×</button>
        </div>
    </div>

    <div class="windows__folder__second_header"></div>

    <div class="windows__folder__body">
        <div class="windows__folder__body__left">
            <div class="windows__folder__body__left__menuWrapper">
                <div class="windows__folder__body__left__menuWrapper__header">
                    <span>Действия</span>
                    <img src="../../img/admin/folder-leftmenu-icon.png" alt="hider-icon">
                </div>
                <div class="windows__folder__body__left__menuWrapper__body">
                    <ul>
                        <li id="createNewPost">Создать новый пост</li>
                        <li>Опубликовать пост</li>
                        <li>Категории</li>
                    </ul>
                </div>
            </div>

            <div class="windows__folder__body__left__menuWrapper">
                <div class="windows__folder__body__left__menuWrapper__header">
                    <span>Директории</span>
                    <img src="../../img/admin/folder-leftmenu-icon.png" alt="hider-icon">
                </div>
                <div class="windows__folder__body__left__menuWrapper__body">
                    <ul>
                        <li>Категории</li>
                        <li>Не опубликованные</li>
                        <li>Корзина</li>
                    </ul>
                </div>
            </div>

        </div>
        <div class="windows__folder__body__right">
            <div class="windows__folder__body__right__wrapper__counter">
                Показано <span id="postsCountVuew">all</span> из <span id="postsCountTotal">Х</span> файлов
            </div>

            <div class="windows__folder__body__right__wrapper">

                <p>В процессе разработки...</p>
                <!--post template-->
                <div class="windows__folder__body__right__file">
                    <img src="../../img/admin/textfile-icon.png" alt="text-file">
                    <div class="fileinfo__wrapper" title="TEST TITLE">
                        <div class="fileinfo__title"></div>
                        <div class="fileinfo__status_pub">Date</div>
                        <div class="d-flex">
                            <div class="fileinfo__views">Просмотры: <span class="views_count"></span></div>
                            <div class="fileinfo__status">Статус: <span class="draft_or_pub"></span></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>