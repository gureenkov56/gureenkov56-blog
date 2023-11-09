<?php
class Router
{
    static function start()
    {
        // defaults
        $controller_name = 'index';
        $action_name = 'main';
        $id = null;


        $routes = explode('/', $_SERVER['REQUEST_URI']);

        // получаем имя контроллера
        if ( !empty($routes[1]) )
        {
            $controller_name = $routes[1];
        }

        // получаем имя экшена
        if ( !empty($routes[2]) && !is_numeric($routes[2]) )
        {
            $action_name = $routes[2];
        }

        // если число, то это id - передадим его ниже параметром
        if (!empty($routes[2]) && is_numeric($routes[2]) )
        {
            $id = $routes[2];
        }

        // добавляем префиксы
        $model_name = 'Model_'.$controller_name;
        $controller_name = 'Controller_'.$controller_name;
        $action_name = 'action_'.$action_name;

        // подцепляем файл с классом модели (файла модели может и не быть)

        $model_file = strtolower($model_name).'.php';

        $model_path = "backend/models/".$model_file;
        if(file_exists($model_path))
        {
            include "backend/models/".$model_file;
        }


        // подцепляем файл с классом контроллера
        $controller_file = strtolower($controller_name).'.php';
        $controller_path = "backend/controllers/".$controller_file;
        if(file_exists($controller_path))
        {
            include "backend/controllers/".$controller_file;
        }
        else
        {
            /*
            правильно было бы кинуть здесь исключение,
            но для упрощения сразу сделаем редирект на страницу 404
            */
            (new Router)->RedirectIndexPage();
        }

        // создаем контроллер
        $controller = new $controller_name;
        $action = $action_name;


        if(method_exists($controller, $action))
        {
            // вызываем действие контроллера
            if ($id !== null) {
                $controller->id($id);
            } else {
                $controller->$action();
            }
        }
        else
        {
            // здесь также разумнее было бы кинуть исключение
            (new Router)->RedirectIndexPage();
        }
    }

    static function ErrorPage404()
    {
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:'.$host.'404');
    }

    static function RedirectIndexPage()
    {
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('Location:'.$host);
    }
}
