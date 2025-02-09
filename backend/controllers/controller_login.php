<?php

class Controller_Login extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function action_main()
    {
        $this->view->generate("_", "login_view.php");
    }

    function login() {
        include 'backend/models/model_login.php';
        $model = new Model_Login();
        $model->login();
    }
}
