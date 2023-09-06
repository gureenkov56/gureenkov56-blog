<?php

class Controller_Index extends Controller
{
    function action_main()
    {
        $this->view->generate('home_view.php', 'template_view.php');
    }
}

