<?php

class Controller_Category extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->model = new Model_Category();
    }

    function id($id)
    {
        $data = $this->model->get_data_by_id($id);
        $this->view->generate('category_view.php', 'template_view.php', $data);
    }
}

