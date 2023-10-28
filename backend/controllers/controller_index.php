<?php

class Controller_Index extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->model = new Model_Index();
    }

    function action_main()
    {
        $data = $this->model->get_data();
        $this->view->generate('index_view.php', 'template_view.php', $data);
    }
}

