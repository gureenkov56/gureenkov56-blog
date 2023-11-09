<?php

class Controller {

    public $model;
    public $view;

    function __construct()
    {
        $this->view = new View();
    }

    function action_main()
    {
    }

    function id($id)
    {
        $data = $this->model->get_data_by_id($id);
        $this->view->generate('index_view.php', 'template_view.php', $data);
    }
}

?>
