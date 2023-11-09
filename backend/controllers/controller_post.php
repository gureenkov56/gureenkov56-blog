<?php

class Controller_Post extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->model = new Model_Post();
    }

    function id($id)
    {
        $data = $this->model->get_data_by_id($id);
        $this->view->generate('post_view.php', 'template_view.php', $data);
    }
}
