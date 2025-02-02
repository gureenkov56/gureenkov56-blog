<?php

class Controller_Login extends Controller
{
    function action_main()
    {
        $this->view->generate("_", "login_view.php");
    }
}
