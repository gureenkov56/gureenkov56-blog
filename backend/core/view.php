<?php

class View {
    function generate($content_view, $template_view, $data = null)
    {

        if(is_array($data)) {
            // преобразуем элементы массива в переменные
            extract($data);
        }

        // $content_view используется внутри $template_view
        include 'backend/views/'.$template_view;
    }
}

