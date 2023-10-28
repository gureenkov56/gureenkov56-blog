<?php

class Controller_404 extends Controller
{
    function action_main()
    {
        $this->view->generate('_', '404_view.php');
    }
}
